<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home Page</title>

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
  <link rel="stylesheet" href="css/index.css" />
  <link rel="stylesheet" href="css/index_media_queries.css" />


  <!-- Google Font -->
  

</head>
<body>

  <!-- Navbar Code -->

  <?php

  include 'components/_navbar.php';
  
  ?>


  <!-- Main section of Main Page -->
   

  <div class="section1">
    <h2 class="text-center">The Ultimate AI-Powered Peanut Analysis Platform</h2>
    <h2 class="paddingBorder text-center ">Ensure Precision in Peanut Classification, Pest, and Disease Detection.
    </h2>
    <div class="border-after-h2"></div>
    <h3 class="text-center">
      Leverage AI to classify peanuts, detect diseases, and pests.
    </h3>
    <h3 class="text-center">
      Enhance productivity and quality with real-time insights.
    </h3>


    <div class="container">
      <div class="fields">
        <div class="col-md mx-5 processing-buttons">
          <a href="image_classification.php" class="btn41-43 btn-41">Peanut Classification</a>
        </div>

        <div class="col-md mx-3 processing-buttons">
          <a href="image_pest_detection.php" class="btn41-43 btn-41">Peanut Pest Detection</a>
        </div>

        <!-- <div class="col-md mx-3 processing-buttons">
          <a href="image_maturity.php" class="btn41-43 btn-41">Maturity Detection</a>
        </div> -->

        <div class="col-md mx-3 processing-buttons">
          <a href="image_diseases_detection.php" class="btn41-43 btn-41">Disease Detection</a>
        </div>


      </div>
    </div>
  </div>


  <!-- Cards of All Categories -->



  <div class="cardHeadings">
    <h2>
      Our Research Areas
    </h2>
    <div class="bordercards"></div>
    <h5>
      Check Out Our Work
    </h5>
  </div>



  <!-- Card 1 (Peanut Classification)-->

  <div class="cards">
    <div class="container custom-container">
      <div class="card mb-3 custom-card">
        <div class="row g-0">
          <div class="col-md-4 back_image1 cardImage">
            <div class="overlay"></div>
            <button type="button" class="button btn btn-outline-light p-2 px-5">Peanut Classification</button>
          </div>


          <div class="col-md-4">
            <div class="card-body second-column-card">
              <h5 class="card-title mx-3 text-start">Peanut Classification</h5>
              <p class="card-text mx-3">An AI-powered system for peanut classification, differentiating between various
                peanut types.</p>
              <a href="#" class="card-text mx-3 text-decoration-none"><i class="fa-solid fa-book"></i> Nature, Springer,
                IEEE, Elsevier</a>

              <div class="data-accuracy">

                <div class="dataset my-4 mx-4">
                  <p class="card-title">Dataset</p>
                  <p class="card-title"><i class="fa-solid fa-folder-open"></i> Self Created</p>
                </div>

                <div class="Accuracy-achieved my-4 mx-4">
                  <p class="card-title">Accuracy Achieved</p>
                  <p class="card-title"><i class="fa-solid fa-robot"></i> 98.26%</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card-body third-column-card">
              <h6 class="card-title">Model Used</h6>
              <h4 class="card-title">ConvNeXt-Tiny</h4>
              <p class="card-text custom-text">By</p>
              <h6 class="card-text custom-heading">Kashif Mahmood, Ume Habiba, Nabeel Abbas</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>





  <!-- Card 2 (Peanut Maturity Detection) -->

  <!-- <div class="cards">
    <div class="container custom-container">
      <div class="card mb-3 custom-card">
        <div class="row g-0">
          <div class="col-md-4 back_image2 cardImage">
            <div class="overlay"></div>
            <button type="button" class="button btn btn-outline-light p-2 px-5">Peanut Maturity Detection</button>
          </div>


          <div class="col-md-4">
            <div class="card-body second-column-card">
              <h5 class="card-title mx-3 text-start">Peanut Maturity Detection</h5>
              <p class="card-text mx-3">Using deep learning and image analysis, we can determine the maturity level of
                peanuts.</p>
              <a href="#" class="card-text mx-3 text-decoration-none"><i class="fa-solid fa-book"></i> Nature, Springer,
                IEEE, Elsevier</a>

              <div class="data-accuracy">

                <div class="dataset my-4 mx-4">
                  <p class="card-title">Dataset</p>
                  <p class="card-title"><i class="fa-solid fa-folder-open"></i> Kaggle</p>
                </div>

                <div class="Accuracy-achieved my-4 mx-4">
                  <p class="card-title">Accuracy Achieved</p>
                  <p class="card-title"><i class="fa-solid fa-robot"></i> 97%</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card-body third-column-card">
              <h6 class="card-title">Model Used</h6>
              <h4 class="card-title">Convolutional Neural Networks (CNN)</h4>
              <p class="card-text custom-text">By</p>
              <h6 class="card-text custom-heading">Kashif Mahmood, Ume Habiba, Nabeel Abbas</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->





  <!-- Card 3 (Peanut Disease Detection) -->

  <div class="cards">
    <div class="container custom-container">
      <div class="card mb-3 custom-card">
        <div class="row g-0">
          <div class="col-md-4 back_image3 cardImage">
            <div class="overlay"></div>
            <button type="button" class="button btn btn-outline-light p-2 px-5">Peanut Disease Detection</button>
          </div>


          <div class="col-md-4">
            <div class="card-body second-column-card">
              <h5 class="card-title mx-3 text-start">Peanut Disease Detection</h5>
              <p class="card-text mx-3">We have trained a deep learning model to detect peanut diseases, helping in
                precision agriculture.</p>
              <a href="#" class="card-text mx-3 text-decoration-none"><i class="fa-solid fa-book"></i> Nature, Springer,
                IEEE, Elsevier</a>

              <div class="data-accuracy">

                <div class="dataset my-4 mx-4">
                  <p class="card-title">Dataset</p>
                  <p class="card-title"><i class="fa-solid fa-folder-open"></i>Mendeley Data</p>
                </div>

                <div class="Accuracy-achieved my-4 mx-4">
                  <p class="card-title">Accuracy Achieved</p>
                  <p class="card-title"><i class="fa-solid fa-robot"></i> 98.91%</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card-body third-column-card">
              <h6 class="card-title">Model Used</h6>
              <h4 class="card-title">ConvNeXt-Small</h4>
              <p class="card-text custom-text">By</p>
              <h6 class="card-text custom-heading">Kashif Mahmood, Ume Habiba, Nabeel Abbas</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>





  <!-- Card 4 (Peanut Pest Detection) -->

  <div class="cards">
    <div class="container custom-container">
      <div class="card mb-3 custom-card">
        <div class="row g-0">
          <div class="col-md-4 back_image4 cardImage">
            <div class="overlay"></div>
            <button type="button" class="button btn btn-outline-light p-2 px-5">Peanut Pest Detection</button>
          </div>


          <div class="col-md-4">
            <div class="card-body second-column-card">
              <h5 class="card-title mx-3 text-start">Peanut Pest Detection</h5>
              <p class="card-text mx-3">Our AI-driven pest detection model helps identify common peanut pests, assisting
                farmers in early intervention.</p>
              <a href="#" class="card-text mx-3 text-decoration-none"><i class="fa-solid fa-book"></i> Nature, Springer,
                IEEE, Elsevier</a>

              <div class="data-accuracy">

                <div class="dataset my-4 mx-4">
                  <p class="card-title">Dataset</p>
                  <p class="card-title"><i class="fa-solid fa-folder-open"></i> IP102</p>
                </div>

                <div class="Accuracy-achieved my-4 mx-4">
                  <p class="card-title">Accuracy Achieved</p>
                  <p class="card-title"><i class="fa-solid fa-robot"></i> 99.42%</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card-body third-column-card">
              <h6 class="card-title">Model Used</h6>
              <h4 class="card-title">ConvNeXt-Tiny</h4>
              <p class="card-text custom-text">By</p>
              <h6 class="card-text custom-heading">Kashif Mahmood, Ume Habiba, Nabeel Abbas</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>





  <!-- Want to Contribute to the industry with us -->


  <div class="parallax">
    <h1 class="text-center">Revolutionizing Peanut Analysis with AI</h1>
    <h1 class="paddingBorder text-center ">Empowering Farmers with Smart Insights for Quality and Yield Optimization
    </h1>
    <div class="border-after-h1"></div>
    <h3 class="text-center">
      Harness AI to analyze peanut classification, pest detection, and disease identification.
    </h3>
    <h3 class="text-center">
      Join us in transforming agriculture with precision and innovation.
    </h3>

    <div class="buttons">
      <button class="btn btn-small changeColor">Contribute Data</button>
      <button class="btn btn-small whiteColor">Explore Insights</button>
    </div>
  </div>




  <!-- What our professors say about us -->


  <div class="cardHeadings">
    <h2>
      What Our Professors Say About Us
    </h2>
    <div class="bordercards"></div>
    <h5>
      Hear from those who inspire us daily
    </h5>
  </div>

  <div class="testimonial-wrapper">
    <!-- Testimonial Card 1 -->
    <div class="testimonial-card">
      <div class="testimonial-text">
        This team has shown remarkable dedication and professionalism in their project. Their ability to work cohesively, communicate effectively, and deliver high-quality results is truly commendable. What impressed me most was their extraordinary commitment to research, which enabled them to produce three academic papers. They represent the kind of excellence we strive to instill in all our students.
      </div>
      <div class="user-info">
        <div class="user-image-circle">
          <img src="images/Sir khursheed Yusuf 3.png" alt="User 1">
        </div>
        <div class="user-details">
          <div class="user-name">khursheed Yusuf</div>
          <div class="user-location">Director HRDC</div>
        </div>
      </div>
    </div>

    <!-- Testimonial Card 2 -->
    <div class="testimonial-card">
      <div class="testimonial-text">
        I am thoroughly impressed by the creativity and technical expertise demonstrated in this project. The team’s attention to detail, innovative solutions, and commitment to excellence have resulted in an exceptional piece of work. Without a doubt, this is one of the most remarkable Deep Learning projects of the year, reflecting strong skills in Artificial Intelligence, collaboration, and dedication.
      </div>
      <div class="user-info">
        <div class="user-image-circle">
          <img src="images/Sir Naveed Ahmad.jpg" alt="User 2">
        </div>
        <div class="user-details">
          <div class="user-name">Naveed Ahmad</div>
          <div class="user-location">Lecturer</div>
        </div>
      </div>
    </div>

    <!-- Testimonial Card 3 -->
    <div class="testimonial-card">
      <div class="testimonial-text">
        From ideation to execution, this group exceeded expectations. Their attention to detail, adherence to timelines, and ability to incorporate feedback showcase maturity and professionalism. Most notably, the publication of three papers in well-known journals such as IEEE, Sensors, and PLOS ONE highlights the academic impact of their work. This project would serve as an excellent benchmark for future batches.
      </div>
      <div class="user-info">
        <div class="user-image-circle">
          <img src="images/Muhammad Ramzan.jpg" alt="User 3">
        </div>
        <div class="user-details">
          <div class="user-name">Dr. Muhammad Ramzan</div>
          <div class="user-location">Project Supervisor</div>
        </div>
      </div>
    </div>

  </div>


  <!-- Followed Journals -->


  <div class="cardHeadings">
    <h2>
      Followed Journals
    </h2>

    <div class="bordercards"></div>


    <div class="journals">
      <img src="images/IEEE-Logo.jpg" class="img-fluid" alt="IEEE Journal Logo">
      <img src="images/nature.png" class="img-fluid" alt="Nature Journal Logo">
      <img src="images/Elsivier.jpeg" class="img-fluid" alt="Elsevier Journal Logo">
      <img src="images/springer.jpg" class="img-fluid" alt="Springer Journal Logo">
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




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
    <script src="js/index.js"></script>
</body>

</html>