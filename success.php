<?php

require("includes/common.php");
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thank You for Shopping</title>
  <style>
     body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-image: url('./img/BGpic.jpg'); /* Change 'background-image.jpg' to your image file */
      background-size: cover;
      background-position: center;
    }
    .container {
      text-align: center;
      background-color: rgba(255, 255, 255, 0.8); /* Added opacity for better readability */
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
      color: #333;
    }
    p {
      color: #666;
      margin-bottom: 20px;
    }
    a {
      text-decoration: none;
      background-color: #007bff;
      color: #fff;
      padding: 10px 20px;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }
    a:hover {
      background-color: #0056b3;
    }
      
  </style>
</head>
<body>
  <div class="container">
    <h1>Thank You for Shopping with Us!</h1>
    <p>Your order is confirmed.</p>
    <a href="products.php">Purchase Another Item</a>
    <?php include("includes/footer.php"); ?>
  </div>
  
</body>
</html>


