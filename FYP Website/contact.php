<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contact</title>

  <!-- Boostrap file Linkage -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />


  <!-- Unicons CSS for Navbar -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  

  <!-- favicon -->
  <link rel="icon" type="image/x-icon" href="images/logo.png">


  <!-- Custom Files -->
  <link rel="stylesheet" href="css/contact.css" />
  <link rel="stylesheet" href="css/contact_media_queries.css" /> 

  <!--  -->
</head>

<body>

  <!-- Navbar Code -->

  <?php

  include 'components/_navbar.php';
  
  ?>


  <!-- Frequently Ask Questions -->

  <div class="cardHeadings">
    <h2>
      Got Questions? We've Got Answers!
    </h2>
    <div class="bordercards"></div>
    <h5>
      Find quick answers to common queries.
    </h5>
  </div>



  <div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
          aria-expanded="true" aria-controls="collapseOne">
          What is PeanutInfo?
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          PeanutInfo is an advanced AI-powered platform designed specifically for farmers. It helps with peanut classification, pest detection, and disease diagnosis, all aimed at improving crop management and increasing efficiency in peanut farming.
        </div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
          aria-expanded="false" aria-controls="collapseTwo">
          How does PeanutInfo classify images?
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          PeanutInfo uses AI-based image processing to classify peanuts and detect pests and diseases. The process involves data acquisition, image pre-processing, feature extraction, and training the AI model to identify key visual traits. Once trained, it delivers accurate, real-time analysis to assist farmers in making informed decisions for pest management and crop evaluation.
        </div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          What pests can PeanutInfo detect?
        </button>
      </h2>
      <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          PeanutInfo detects a wide range of pests including Aphids, Armyworms, Caterpillars, Thrips, and Wireworms. With real-time alerts, the platform helps farmers detect pest infestations early, allowing for timely intervention to protect crops.
        </div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
          What diseases can PeanutInfo diagnose?
        </button>
      </h2>
      <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          PeanutInfo can diagnose common peanut diseases like Leaf Spot, Rust, White Mold, and Root Rot. This early detection helps prevent further spread, ensuring healthier crops and reduced losses.
        </div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
          How accurate is the pest, disease, and peanut classification detection?
        </button>
      </h2>
      <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          PeanutInfo utilizes sophisticated AI algorithms trained on vast datasets, ensuring high accuracy in detecting pests, diseases, and classifying peanuts. The system analyzes critical visual cues, such as shape, size, and color, to deliver precise results.
        </div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
          Is PeanutInfo easy to use?
        </button>
      </h2>
      <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          Yes! PeanutInfo is designed to be user-friendly. Simply upload images of your peanuts, and the platform instantly provides detailed analysis, helping farmers take immediate action based on the results.
        </div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
          Can PeanutInfo be used for large-scale farming?
        </button>
      </h2>
      <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          Absolutely! PeanutInfo is scalable and perfect for both small and large-scale farming operations. Its real-time analysis and easy-to-use features make it ideal for optimizing crop management at any scale.
        </div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
          How can I get started with PeanutInfo?
        </button>
      </h2>
      <div id="collapseEight" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          Getting started is simple! Just sign up on our platform, upload your crop images, and immediately start benefiting from accurate insights and analysis that will help improve your peanut farming practices.
        </div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
          Is there a mobile app for PeanutInfo?
        </button>
      </h2>
      <div id="collapseNine" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          Currently, PeanutInfo is accessible via a web platform. However, we are working on expanding our services, and a mobile app may be available in the future to enhance accessibility.
        </div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
          How can I contact support if I need help?
        </button>
      </h2>
      <div id="collapseTen" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          For any support, you can reach out to us through our contact page. Our dedicated team is ready to assist you with any technical inquiries or questions you may have.
        </div>
      </div>
    </div>
  </div>




  <!-- Contact Form -->



  <div class="contact-section row">

    <div class="top col-lg-3 col-md-11 col-sm-11">
      <h2>Cultivating Connections for a Better Tomorrow</h2>
      <p class="divider"></p>
      <p>Join us in advancing agriculture through collaboration and innovation!</p>
    </div>

    <div class="center form-section col-lg-6 col-md-11 col-sm-11">

      <form action="contact_form.php" method="post" class="contact-form">

        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="fullname" placeholder="Full name" name="name">
          <label for="floatingInput">Full Name</label>
          <div class="invalid-feedback">
            Please enter a valid name started by a-z / A-z between (3-15).
          </div>
        </div>

        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="Phone" placeholder="Phone" name="phone">
          <label for="floatingPassword">Phone</label>
          <div class="invalid-feedback">
            Please enter a valid Phone started by country code i.e +92-3371788897.
          </div>
        </div>

        <div class="form-floating mb-3">
          <input type="email" class="form-control" id="email" placeholder="email address" name="email" required>
          <label for="floatingPassword">Email address</label>
          <div class="invalid-feedback">
            Please enter a valid email started by a-z / A-z i.e kashif0987@gmail.com.
          </div>
        </div>

        <hr class="form-divider">

        <div class="row">

          <div class="form-floating mb-3 col-lg-6 clo-md-11">
            <input type="text" class="form-control" id="country" name="country" placeholder="Country">
            <label for="floatingInput"> &nbsp &nbspCountry</label>
            <div class="invalid-feedback">
              Plzz Enter your Country name which contains atleast 4 to 40 characters, no special symbols are
              allowed
            </div>
          </div>
          <div class="form-floating col-lg-6 col-md-11 mb-3">
            <input type="text" class="form-control" id="city" placeholder="City" name="city">
            <label for="floatingPassword"> &nbsp &nbspCity</label>
            <div class="invalid-feedback">
              Plzz Enter your City name which contains atleast 4 to 40 characters, no special symbols are
              allowed
            </div>
          </div>

        </div>

        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="address" placeholder="address" name="address">
          <label for="floatingPassword">Address</label>
          <div class="invalid-feedback">
            Plzz enter the Adress atleast between 20 to 50 characters, only - _ . # symbols are allowed with
            numbers and characters
          </div>
        </div>

        <div class="row">

          <div class="col1 col-lg-12 col-md-11 col-sm-11 mb-3">
            <h6>How did you find us?</h6>
            <div class="form-floating">
              <input type="text" class="form-control" id="word_of_mouth" placeholder="word of mouth" name="words_of_mouth">
              <label for="floatingPassword">Word of mouth</label>
              <div class="invalid-feedback">
                Plzz fill the required field and help us to grow our channel
              </div>
            </div>
          </div>


        </div>


        <div class="form-group mt-3">
          <textarea class="form-control" id="message" rows="3" placeholder="Message" name="message"></textarea>
          <div class="invalid-feedback">
            Plzz fill the required field and give your suggestions
          </div>
        </div>

        <button type="submit" class="btn submit-btn mt-3" id="submitBtn" name="submit_form">Submit</button>

        <div id="isEmpty">

        </div>


      </form>
    </div>
    <div class="bottom col-lg-3 col-md-11 col-sm-11">

    </div>

    <div class="bottom col-lg-3 col-md-11 col-sm-11">
      <h2>Growing Together for a Sustainable Future</h2>
      <p class="divider"></p>
      <p>By working hand in hand, we can revolutionize farming for the betterment of humanity!</p>
    </div>


  </div>







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



  <script src="js/index.js"></script>
  <script src="js/contact_validation.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>