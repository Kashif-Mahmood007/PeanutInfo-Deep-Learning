<?php

require 'components/_connect.php';

$result = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(isset($_POST['submit_form'])){


      // Secure the form inputs for SQL Injection and XSS Protection

      $phone = mysqli_real_escape_string($conn, $_POST['phone']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $country = mysqli_real_escape_string($conn, $_POST['country']);
      $city = mysqli_real_escape_string($conn, $_POST['city']);
      $address = mysqli_real_escape_string($conn, $_POST['address']);
      $words_of_mouth = mysqli_real_escape_string($conn, $_POST['words_of_mouth']);
      $message = mysqli_real_escape_string($conn, $_POST['message']);

      // XSS Protection: Encode special characters
      $phone = htmlspecialchars($phone, ENT_QUOTES, 'UTF-8');         // <, >, &, ', " are converted to HTML entities
      $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
      $country = htmlspecialchars($country, ENT_QUOTES, 'UTF-8');
      $city = htmlspecialchars($city, ENT_QUOTES, 'UTF-8');
      $address = htmlspecialchars($address, ENT_QUOTES, 'UTF-8');
      $words_of_mouth = htmlspecialchars($words_of_mouth, ENT_QUOTES, 'UTF-8');
      $message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');


      $sql = "INSERT INTO `contact` (`name`, `phone`, `email`, `country`, `city`, `address`, `word_of_mouth`, `message`) VALUES ('$name', '$phone', '$email', '$country', '$city', '$address', '$words_of_mouth', '$message')";

      $result = mysqli_query($conn, $sql);
      
      header("location: index.php");

  }
}

?>

