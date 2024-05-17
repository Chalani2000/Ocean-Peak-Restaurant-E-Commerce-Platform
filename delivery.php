<?php
require('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Delivery Address Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f7f7f7;
      background:linear-gradient(rgba(0,0,0,00.65),rgba(0,0,0,0.45),rgba(0,0,0,0.35),rgba(0,0,0,0)), url(https://wallpapercave.com/wp/wp9506513.jpg)no-repeat;
      background-size:cover ;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .container {
      width: 350px;
      padding: 30px;
      background-color:transparent;
      border-radius: 8px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }
    h2 {
      color: #92a60b;
      text-align: center;
    }
    label {
      display: block;
      margin-bottom: 8px;
      color: #9d840a;
    }
    input[type="text"],
    input[type="tel"] {
      width: calc(100% - 12px);
      padding: 8px;
      margin-bottom: 15px;
      border-radius: 4px;
      border: 1px solid #ccc;
    }
    input[type="submit"] {
      padding: 10px 20px;
      background-color: #014e04;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s ease;
    }
    input[type="submit"]:hover {
      background-color: #45a049;
    }
    #successMessage {
      display: none;
      padding: 20px;
      margin-top: 20px;
      text-align: center;
      background-color: #dff0d8;
      border-radius: 4px;
      border: 1px solid #c3e6cb;
    }
    #successMessage h3 {
      color: #155724;
      margin-bottom: 10px;
    }
    #successMessage p {
      color: #155724;
      margin-bottom: 0;
    }
    .button {
        background-color: #04AA6D; /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
      }
  </style>
</head>
<body>

<div class="container">
  <h2>Delivery Address</h2>
  <form method="POST" action="code.php" id="deliveryForm" >
    <label for="name">Name:</label>
    <input type="text" id="name" name="delname" required>
    
    <label for="phone">Phone:</label>
    <input type="tel" id="phone" name="delphone" required>
    
    <label for="address">Delivery Address:</label>
    <input type="text" id="address" name="deladdress" required>
    
    <label for="city">Delivery City:</label>
    <input type="text" id="city" name="delcity" required>
    
    <button name="submit1" value="Submit" id="submitButton">Submit</button>
  </form>
</div>


</body>
</html>