# PeanutInfo: Deep Learning for Peanut Variety Classification, Disease Detection and Pest Identification

Final year project, BS Software Engineering, University of Sargodha, Pakistan (session 2021 to 2025).

**Team:** Kashif Mahmood, Nabeel Abbas, Ume Habiba
**Supervisor:** Dr. Muhammad Ramzan, Department of Software Engineering, University of Sargodha

---

## Overview

PeanutInfo is a web application that analyses peanut images with deep learning. A user uploads a photo and the system returns a prediction, a confidence score and a short description with management advice. It has three modules:

| Module | What it predicts | Classes | Dataset |
|---|---|---|---|
| Variety classification | Peanut variety from pod images | 3: Gojjra, Gujjar Khan, Parachinaar | Custom dataset collected by the team (not released: lighting was inconsistent across images) |
| Disease detection | Leaf condition | 5: Alternaria leaf spot, Healthy, Leaf spot (early and late), Rosette, Rust | Public groundnut leaf dataset (1,720 images; Sasmal et al., *Data in Brief*, 2024) |
| Pest identification | Pest type | 5: Aphids, Armyworm, Caterpillar, Thrips, Wireworm | Three classes from the public IP102 dataset, extended by the team with Armyworm and Thrips |

If the model's confidence is below a threshold (0.8 for variety and pest, 0.7 for disease), the API returns **"Unknown"** instead of forcing a label, so out-of-scope photos are not given a confident wrong answer.

## Results

We compared ImageNet-pretrained CNNs (ResNet-50, EfficientNet-B0/B4 and ConvNeXt variants) with transfer learning. Accuracies are on the validation split.

| Module | Deployed model | Validation accuracy |
|---|---|---|
| Disease detection (5 classes) | ResNet-50 (transfer learning) | **98.37%** |
| Variety classification (3 classes) | ConvNeXt-Tiny | **98.26%** |
| Pest identification (5 classes) | ConvNeXt-Tiny | 91.94% |


ConvNeXt-Tiny and ConvNeXt-Small tied in variety classification, so the smaller and faster ConvNeXt-Tiny was deployed.

> **Note on later work.** The disease-detection part was later redone as a separate research study, now under review at *Scientific Reports* ([preprint](https://www.researchsquare.com/article/rs-9294795/v1)). That study uses ResNet-50 with augmentation, a OneCycleLR schedule and a weighted loss, and reports 97.28% accuracy. The numbers in this repository are validation accuracies from the final year project; the paper uses a different training and evaluation setup, so the two are not directly comparable. The variety dataset's lighting problems also led to a separate, larger dataset with controlled backgrounds and lighting: PakGroundnut-4V (see below).

## System architecture

```
Browser (HTML, CSS, Bootstrap, JavaScript)
        │  image upload
        ▼
PHP website + MySQL (accounts, contact form)
        │  HTTP POST
        ▼
Flask API (PyTorch, torchvision models)
   /predict/classification   /predict/disease   /predict/pest
        │
        ▼
JSON: prediction, confidence, description
```

- **Frontend:** HTML, CSS, Bootstrap and JavaScript, responsive across devices.
- **Backend:** PHP and MySQL for sign-up, login and the contact form. Passwords are stored with `password_hash()` and checked with `password_verify()`; user input is escaped with `htmlspecialchars()`.
- **Model service:** a Flask API that loads the three trained models (`.pth`) and serves predictions. Images are resized to 224 × 224 and normalised with ImageNet statistics.

## Repository structure

```
PeanutInfo-Deep-Learning/
├── FYP Website/                       # PHP website (pages for each module)
├── flask_api/
│   ├── app.py                         # prediction API (3 endpoints)
│   ├── Classification_Model.pth       # ConvNeXt-Tiny, 3 varieties
│   ├── Disease_Model.pth              # ResNet-50, 5 classes
│   └── Pest_Model.pth                 # ConvNeXt-Tiny, 5 classes
├── Database Details/                  # screenshots of the MySQL tables
└── Screen Shots/                      # screenshots of the web app
```

## Running the model API locally

```bash
git clone https://github.com/Kashif-Mahmood007/PeanutInfo-Deep-Learning.git
cd PeanutInfo-Deep-Learning/flask_api
pip install flask torch torchvision pillow
python app.py
```

Example request:

```bash
curl -X POST -F "image=@leaf.jpg" http://127.0.0.1:5000/predict/disease
```

The PHP website in `FYP Website/` runs on a local PHP and MySQL server (for example XAMPP). The table layout is shown in `Database Details/`.

## Screenshots

| Landing page | Image analysis |
|---|---|
| ![Landing page](Screen%20Shots/Landing%20Page%20Hero%20Section.png) | ![Image analysis](Screen%20Shots/analyze%20image.png) |
| **Research areas** | **Process** |
| ![Research areas](Screen%20Shots/Our%20Research%20Area.png) | ![Process](Screen%20Shots/Process.png) |

## Related work by the author

- Deep Learning-Based Disease Detection in Peanut Cultivars Utilizing Transfer Learning. Under review, *Scientific Reports*. [Preprint](https://www.researchsquare.com/article/rs-9294795/v1)
- PakGroundnut-4V: a published, separate dataset of 8,944 images of four expert-verified Pakistani groundnut varieties, with cross-background and cross-lighting splits. [Zenodo](https://doi.org/10.5281/zenodo.22014996) · [GitHub](https://github.com/Kashif-Mahmood007/pakgroundnut-4v)
- A Systematic Review of Visual Computing Technologies for Intelligent Peanut Agriculture. Under review, *USJICT* (corresponding author).

## Contact

Kashif Mahmood · kashifmahmood.scholar@gmail.com · [Portfolio](https://kashif-mahmood007.github.io/Kashif-Mahmood-Portfolio/)
