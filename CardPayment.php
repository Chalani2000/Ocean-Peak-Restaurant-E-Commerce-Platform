
<?php 
require_once "Classes/ItemManager.php";
$ItemManager = new ItemManager();
$name = '';
$price = '';
$image='';
$remark='';
$category=0;
$quantity='';
$amount='';
// $status='';
if (isset($_GET['quantity'])) {
  $quantity = $_GET['quantity'];
} 
if (isset($_GET['amount'])) {
  $amount = $_GET['amount'];
} 
if (isset($_REQUEST['name'])) {
    $name = $_REQUEST['name'];
} 
if (isset($_REQUEST['email'])) {
    $email = $_REQUEST['email'];
}
if (isset($_REQUEST['address'])) {
    $address = $_REQUEST['address'];
}

if (isset($_REQUEST['city'])) {
    $city = $_REQUEST['city'];
}

if (isset($_REQUEST['state'])) {
    $state = $_REQUEST['state'];
}
if (isset($_REQUEST['zip'])) {
  $zip = $_REQUEST['zip'];
}

if (isset($_POST["submit"])) {
  if (isset($_REQUEST['quantity'])) {
    $quantity = $_REQUEST['quantity'];
  } 
  if (isset($_REQUEST['amount'])) {
    $amount = $_REQUEST['amount'];
  } 
        $status = $ItemManager->addorderdetails($name,$email,$address,$city,$state,$zip,$quantity,$amount);  
   
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Damion&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,700;1,200;1,600&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <link rel="stylesheet" href="style_1.css">
    
    <title>Restaurent</title>
<style>
  .text-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            width: 100%;
        }

        .text-overlay h2 {
            font-size: 50px;
            color: aliceblue;
        }
        .text-overlay1 {
            position: absolute;
            top: 65%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            width: 100%;
        }
        .text-overlay2 {
            position: absolute;
            top: 98%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            width: 100%;
        }
        input[type="submit"] {
        width: 1250px; 
        margin: 0 auto; /* Center the button horizontally */
        display: block; /* Ensure it's displayed as a block element */
    }
    /* ul.navbar {
        height: 40px;
    }
    img {
        height: 60px;
    }
    h2 {
        font-size: 16px;
    } */
</style>
<script> 
  function Validate() {
    if (document.payment.name.value == "") {
        window.alert("Please enter a name");
        document.payment.name.focus();
        event.preventDefault();
        return false;
    }
    if (document.payment.email.value == "") {
        window.alert("Please enter your email");
        document.payment.email.focus();
        event.preventDefault();
        return false;
    }
    if (document.payment.address.value == "") {
        window.alert("Please enter address");
        document.payment.address.focus();
        event.preventDefault();
        return false;
    }
    if (document.payment.city.value == "") {
        window.alert("Please enter your city");
        document.payment.city.focus();
        event.preventDefault();
        return false;
    }
    if (document.payment.state.value == "") {
        window.alert("Please enter your state");
        document.payment.state.focus();
        event.preventDefault();
        return false;
    }
    if (document.payment.zip.value == "") {
        window.alert("Please enter zip code");
        document.payment.zip.focus();
        event.preventDefault();
        return false;
    }
    if (document.payment.cardname.value == "") {
        window.alert("Please enter a name on your card");
        document.payment.cardname.focus();
        event.preventDefault();
        return false;
    }
    if (document.payment.cardnumber.value == "") {
        window.alert("Please enter a number on your card");
        document.payment.cardnumber.focus();
        event.preventDefault();
        return false;
    }
    if (document.payment.expmonth.value == "") {
        window.alert("Please enter a exp month");
        document.payment.expmonth.focus();
        event.preventDefault();
        return false;
    }
    if (document.payment.expyear.value == "") {
        window.alert("Please enter a exp year");
        document.payment.expyear.focus();
        event.preventDefault();
        return false;
    }
    if (document.payment.cvv.value == "") {
        window.alert("Please enter a CVV");
        document.payment.cvv.focus();
        event.preventDefault();
        return false;
    }
  
  }
    $(document).ready(function () {
        var status = $('#status').val();
        if (status == 'Success') {
            alert('🛍️ Your order has been placed successfully!'); 
            window.location.href = "index.php";
            return false;
           
        }
        if (status == 'Error') {
            alert('Error');
            $('#status').val("");
        }
        // $('#status').val('');
    });
        
</script>
</head>

<header>

<div style="display: flex; align-items:left; justify-content:left;">
    <img src="images/image70-removebg-preview.png" height="30px">
        <left><h2 style="font-size: 16px; font-family:Calibri Light (Headings); color: #862c05;"><i>Ocean Peak <br> Restaurant</i></h2></left>

<ul class="navbar" style="padding-left:120px; ">
    <li><a href="index.php#home"home>Home</a></li>
    <li><a href="index.php#about"about>About</a></li>
    <li><a href="index.php#menu"menu>Menu</a></li>
    <li><a href="index.php#service"Service>Service</a></li>
    <li><a href="index.php#contact"Contact>Contact</a></li>
</ul>

</header>

<body>
<input type="text" name="status" id="status" value="<?php echo $status; ?>">
  <div class = "bd_image">
  <div style="display: flex; align-items:left; justify-content:left;">
    <img src="images/image21.jpg" height="600px" width="100%" style="opacity: 0.3;">
   
</div>
<h2 style="font-size: 50px; color: aliceblue;" class="text-overlay"><center>Shopping Cart</center></h2>


  <p  class="text-overlay1" style="font-size:20px;font-family:; color:aliceblue; text-align: center; ">
    🛒  Welcome to Your Shopping Cart!!!<br><br></p>
     <p  class="text-overlay2" style="font-size:20px;font-family:; color:aliceblue;">A click will take you on a culinary adventure. Taste the flavors, customize them, and enjoy them all in one location.</p>
     </div>
     <div class="row">
  <div class="col-75">
    <div class="container">
      <form action="CardPayment.php" method="post" name="payment">
      <input type="hidden" id="amount" name="amount" value="<?php echo $amount ?>">
    <input type="hidden" id="quantity" name="quantity" value="<?php echo $quantity ?>">
        <div class="row">
          <div class="col-50" style="color:#000;">
            <h3>Billing Details</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" >
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="Enter your email">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adress" name="address" placeholder="Enter your address" >
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="Enter a city">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="Enter a state" >
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="Enter a zip code" >
              </div>
            </div>
          </div>
          <!-- <div class="vertical-line"></div> -->
          <div class="col-50" style="color:#000;">
            <h3 style="padding-bottom:28px;">Payment Details</h3>
            <label for="fname">Accepted Cards</label>
            <div style="padding-bottom:15px;">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>

            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="Enter a name on card" >
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="Enter card number" >
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="Enter exp month" >
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="Enter exp year" >
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352" >
              </div>
              <!-- <div class="row"> -->
              <div class="col-50">
              <label for="expmonth">Order Amount</label>
              <span id="total_amount"><?php echo $amount; ?></span>
              </div>
              <div class="col-50">
              <label for="expmonth">Order Quantity</label>
              <span id="quantity"><?php echo $quantity; ?></span>
              </div>
            <!-- </div> -->
          </div>
          
        </div>
        <label style="color:#000;">
          <input type="checkbox" checked="checked" name="sameadr" > Shipping address same as billing
        </label>


       <div class = "hover">
      <input type="submit" value="Place Order" name="submit" align="center" onclick="passValues()" />
      </div>
    </div>


      </form>
    </div>
  </div>
 

  <br>
<center><p style="font-size:21px;font-family:font-align:center;; color:rgb(239, 250, 31); margin: left 50px;">🙌 We appreciate you selecting <b>Ocean Peak Restaurant</b>. A unique culinary adventure awaits you.!</p><br></center>

</body>
</html>