<?php
$prediction_result = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    $file = $_FILES['image']['tmp_name'];

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "http://127.0.0.1:5000/predict/disease");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, [
        'image' => new CURLFile($file)
    ]);

    $response = curl_exec($curl);
    curl_close($curl);

    $result = json_decode($response, true);
    $prediction_result = $result['prediction'] ?? "Please upload a clearer, well-lit image.";
    $prediction_result_description = $result['description'] ?? "";
    $confidence_score = $result['confidence'] ?? 0.0;
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Peanut Diseases Detection</title>

  <!-- Boostrap file Linkage -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  
  <!-- Bootstrap 4 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">


  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />


  <!-- Unicons CSS for Navbar -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />

  
  <!-- favicon -->
  <link rel="icon" type="image/x-icon" href="images/logo.png">


  <!-- Custom Files -->
  <link rel="stylesheet" href="css/image_classification.css" />
  <link rel="stylesheet" href="css/image_classification_media_query.css" /> 

  <!--  -->
</head>

<body>

  <!-- Navbar Code -->

  <?php

  include 'components/_navbar.php';
  
  ?>

  <!-- Image regonition code -->

  <section class="peanut-assessment">
    <div class="container padding-top-custom">
      <div class="content">
        <h1>Peanut Disease Detection</h1>
        <p>Detect peanut diseases early using AI-driven image analysis trained to recognize signs of infection, rot, and abnormalities. Our system scans uploaded images to identify common diseases such as Alternaria Leaf Spot, Healthy, Early and Late Leaf Spot, Rosette, and Rust, providing instant results and helping farmers take timely action. Boost crop health, reduce losses, and make informed decisions with powerful, precision-driven diagnostics.</p>
        <form action="image_diseases_detection.php" method="post" enctype="multipart/form-data">
          <div class="file-input-wrapper">
            <input type="file" class="choose-image" name="image" required accept="image/*">
          </div>
          
          <button type="submit" class="btn assessment-btn">Analyze Disease Image</button>
        </form>
      </div>
      <div class="peanut-image">
        <img src="images/peanut-disease.jpg" alt="Peanut quality inspection">
      </div>
    </div>
  </section>

  <!-- <?php echo $confidence_score ?> -->


  <!-- Results Display -->

  <?php if (!empty($prediction_result)) : ?>
    <div class="container">
        <div class="jumbotron text-center py-4 px-4 mt-4">
          <h1 class="display-5 mb-4"><i class="fas fa-search fa-xs"></i> Disease Detection </h1>

          <?php echo isset($result['prediction']) 
            ? '<p class="lead">The peanut disease falls under the category of:</p>' 
            : '<p class="lead">We were unable to recognize the image.</p>'; ?>
          
          <hr class="my-4">
          <p class="mb-4">
            <strong><i class="fas fa-check-circle text-success mx-1"></i><?php echo htmlspecialchars($prediction_result); ?></strong>
          </p>

          <!-- Display the description -->
          <p class="mb-4">
            <strong><?php echo htmlspecialchars($prediction_result_description); ?></strong>
          </p>
            
          <hr class="my-4">
          
          <!-- Add statistical info -->
          <!-- <p><strong>Model Used:</strong> ConvNeXt-Small</p>
          <p><strong>Accuracy: </strong> 98.91%</p>
          <p><strong>Precison:</strong> 99.15%</p>
          <p><strong>Recall:</strong> 99.30%</p>
          <p><strong>F1 Score:</strong> 99.21%</p> -->

          <?php if (isset($result['prediction']) && !empty($result['prediction']) && $result['prediction'] != 'Unknown'): ?>
            <img src="images/Peanut_Desease_Detection_Graph.png" alt="Statistical Graph" class="img-fluid">
          <?php endif; ?>

          <a class="btn btn-primary btn-lg mt-4" href="" role="button"><i class="fas fa-redo-alt"></i> Try Another Image</a>
        </div>
    </div>
  <?php endif; ?>


  <!-- Footer -->

  <footer class="footer">
    <div class="footer-container">
      <div class="footer-section about">
        <h4>ABOUT</h4>
        <p>
        PeanutInfo is an AI-powered platform for farmers, specializing in peanut classification and pest detection to enhance crop management and efficiency
        </p>
      </div>
      <div class="footer-section categories">
        <h4>IMAGE PROCESSING</h4>
        <ul>
          <li><a href="image_classification.php">Peanut Classification</a></li>
          <li><a href="image_diseases_detection.php">Peanut Disease Detection</a></li>
          <li><a href="image_pest_detection.php">Peanut Pest Detection</a></li>
        </ul>
      </div>
      <div class="footer-section quick-links">
        <h4>QUICK LINKS</h4>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="#">Publication</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </div>
      <div class="footer-section get-in-touch">
        <h4>GET IN TOUCH</h4>
        <p>Follow us on different social media platforms</p>
        <div class="social-icons">
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-whatsapp"></i></a>
          <a href="#"><i class="fab fa-pinterest"></i></a>
        </div>
      </div>
    </div>
    <div class="copyright">
      <h6>© 2025 PeanutInfo. All Rights Reserved.</h6>
    </div>
  </footer>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

  <script src="js/contact_validation.js"></script>
  <script src="js/index.js"></script>
</body>

</html>