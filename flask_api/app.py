from flask import Flask, request, jsonify
from torchvision import transforms
from PIL import Image
import torch
import torch.nn as nn
from torchvision.models import convnext_tiny, convnext_small
import io

# Initialize Flask app
app = Flask(__name__)

# Use GPU if available
device = torch.device("cuda" if torch.cuda.is_available() else "cpu")


# === TRANSFORMATIONS ===

common_transform = transforms.Compose([
    transforms.Resize((224, 224)),
    transforms.ToTensor(),
    transforms.Normalize(mean=[0.485, 0.456, 0.406],
                         std=[0.229, 0.224, 0.225])
])


# === MODEL LOADER FUNCTIONS ===

def load_convnext_tiny_model(model_path, num_classes):
    model = convnext_tiny(pretrained=False)
    model.classifier[2] = nn.Linear(model.classifier[2].in_features, num_classes)
    model.load_state_dict(torch.load(model_path, map_location=device))
    model.to(device)
    model.eval()
    return model


def load_convnext_small_model(model_path, num_classes):
    model = convnext_small(pretrained=False)
    model.classifier[2] = nn.Linear(model.classifier[2].in_features, num_classes)
    model.load_state_dict(torch.load(model_path, map_location=device))
    model.to(device)
    model.eval()
    return model


# === LOAD MODELS ===
classification_model = load_convnext_tiny_model('Classification_Model.pth', num_classes=3)
pest_model = load_convnext_tiny_model('Pest_Model.pth', num_classes=5)
disease_model = load_convnext_small_model('Disease_Model.pth', num_classes=5)



# === HELPER FUNCTION TO PREDICT ===

def predict_image(model, image, threshold=0.7):
    image = Image.open(image).convert('RGB')
    image = common_transform(image).unsqueeze(0).to(device)
    with torch.no_grad():
        outputs = model(image)
        probabilities = torch.nn.functional.softmax(outputs, dim=1)
        max_prob, predicted = torch.max(probabilities, 1)
        
    confidence = max_prob.item()
    if confidence < threshold:
        return None, confidence  # If confidence is low, return pridiction as None and confidence score
    
    return predicted.item(), confidence


# === Labels ===

PEST_LABELS = {
    0: 'Aphids',
    1: 'Armyworm',
    2: 'Caterpillar',
    3: 'Thrips',
    4: 'Wireworm'
}

DISEASE_LABELS = {
    0: 'ALTERNARIA LEAF SPOT',
    1: 'HEALTHY',
    2: 'LEAF SPOT (EARLY AND LATE)',
    3: 'ROSETTE',
    4: 'RUST'
}


CLASSIFICATION_LABELS = {
    0: 'Gojjra',
    1: 'Gujjar Khan',
    2: 'Parachinaar'
}


# === PEST DESCRIPTIONS ===

PEST_DESCRIPTIONS = {
    0: 'Aphids are small, sap-sucking insects that damage plants by causing yellowing and leaf distortion. Control them by encouraging natural predators like ladybugs, using insecticidal soaps or neem oil, and practicing intercropping with crops like corn to reduce their populations.',
    1: 'Armyworms are caterpillars that feed heavily on peanut foliage, leading to severe defoliation. Manage them through regular monitoring and by applying insecticides such as Bacillus thuringiensis (Bt) or chlorantraniliprole when populations exceed economic thresholds.',
    2: 'Caterpillars like corn earworms and loopers chew on peanut leaves, reducing plant health and yield. Effective management includes routine scouting and timely application of recommended insecticides like Bt or nucleopolyhedrovirus-based products.',
    3: 'Thrips are tiny sap-feeding insects that cause silver streaks and leaf deformities, and they can transmit Tomato Spotted Wilt Virus. They are best controlled using resistant peanut varieties and in-furrow insecticides like phorate during planting.',
    4: 'Wireworms, the larvae of click beetles, attack crops by feeding on seeds and roots, hindering plant growth. Crop rotation and the use of suitable soil insecticides or seed treatments are effective control methods.'
}



# === DISEASE DESCRIPTIONS ===
DISEASE_DESCRIPTIONS = {
    0: 'Alternaria Leaf Spot is a fungal disease that causes dark, irregular spots on leaves, leading to yellowing, curling, and premature leaf drop. Control involves using certified disease-free seeds, practicing crop rotation, and applying fungicides like copper oxychloride or mancozeb upon symptom appearance.',
    1: 'Healthy plants exhibit vigorous growth with no signs of disease or pest infestation. Maintaining plant health involves proper cultivation practices, regular monitoring, and timely interventions to prevent potential issues.',
    2: 'Leaf Spot (Early and Late) are fungal diseases that produce brown to black lesions on leaves, often surrounded by yellow halos, leading to defoliation. Management includes planting resistant varieties, implementing crop rotation, and applying fungicides such as chlorothalonil or tebuconazole at recommended intervals.',
    3: 'Rosette is a viral disease causing stunted growth and a rosette-like appearance of leaves, often transmitted by aphids. Control strategies encompass planting resistant varieties, early sowing, and removing infected plants to prevent disease spread.',
    4: 'Rust is a fungal disease characterized by reddish-orange pustules on the undersides of leaves, leading to premature leaf drop. Effective control includes timely application of fungicides like chlorothalonil or tebuconazole and regular field monitoring during susceptible periods.'
}




# === CLASSIFICATION DESCRIPTIONS ===


CLASSIFICATION_DESCRIPTIONS = {
    0: "Gojjra, located in Punjab, Pakistan, is known for producing high-quality peanuts that are favored for their balanced taste and are commonly used in local dishes and snacks. These peanuts are moderately sized and widely appreciated for their consistency.",
    1: "Gujjar Khan peanuts are celebrated for their rich flavor and crunchiness, making them a popular snack choice; they are often roasted and enjoyed throughout Pakistan. Their availability and affordability make them a household favorite.",
    2: "Parachinar peanuts, cultivated in the fertile soils of Parachinar, Pakistan, are renowned for their large size, rich earthy flavor, and high oil content, making them a premium choice for snacking and culinary uses. Known for containing three nuts per pod, they are considered a top-tier variety.",
}


 
# Add more when trained model are available

# === ROUTES ===

@app.route('/predict/classification', methods=['POST'])
def predict_classification():
    if 'image' not in request.files:
        return jsonify({'error': 'No image provided'}), 400

    image = request.files['image']
    prediction, confidence  = predict_image(classification_model, image, threshold=0.8)

    if prediction is None:
        return jsonify({
            'prediction': 'Unknown',
            'description': 'This image does not belong to any known peanut pest class.',
            'confidence': confidence
        })

    class_name = CLASSIFICATION_LABELS.get(prediction, "Unknown")
    description = CLASSIFICATION_DESCRIPTIONS.get(prediction, "No description available.")

    return jsonify({
        'prediction': class_name,
        'description': description,
        'confidence': round(confidence, 2)
    })



@app.route('/predict/pest', methods=['POST'])
def predict_pest():
    if 'image' not in request.files:
        return jsonify({'error': 'No image provided'}), 400
    
    image = request.files['image']
    prediction, confidence = predict_image(pest_model, image, threshold=0.8)

    if prediction is None:
        return jsonify({
            'prediction': 'Unknown',
            'description': 'This image does not belong to any known peanut pest class.',
            'confidence': confidence
        })
    
    class_name = PEST_LABELS.get(prediction, "Unknown")
    description = PEST_DESCRIPTIONS.get(prediction, "No description available.")

    return jsonify({
        'prediction': class_name,
        'description': description,
        'confidence': round(confidence, 2)
    })




@app.route('/predict/disease', methods=['POST'])
def predict_disease():
    if 'image' not in request.files:
        return jsonify({'error': 'No image provided'}), 400
    
    image = request.files['image']
    prediction, confidence = predict_image(disease_model, image, threshold=0.7)

    if prediction is None:
        return jsonify({
            'prediction': 'Unknown',
            'description': 'This image does not belong to any known peanut pest class.',
            'confidence': confidence
        })
    

    class_name = DISEASE_LABELS.get(prediction, "Unknown")
    description = DISEASE_DESCRIPTIONS.get(prediction, "No description available.")

    return jsonify({
        'prediction': class_name,
        'description': description,
        'confidence': round(confidence, 2)
    })


# === MAIN ===

if __name__ == '__main__':
    app.run(debug=True)
