<?php 
require_once "Classes/ItemManager.php";
$ItemManager = new ItemManager();
$name = '';
$price = '';
$image='';
$remark='';
$category=0;


if (isset($_REQUEST['name'])) {
    $name = $_REQUEST['name'];
} 
if (isset($_REQUEST['price'])) {
    $price = $_REQUEST['price'];
}
if (isset($_REQUEST['remark'])) {
    $remark = $_REQUEST['remark'];
}

if (isset($_REQUEST['image'])) {
    $image = $_REQUEST['image'];
}

if (isset($_REQUEST['category'])) {
    $category = $_REQUEST['category'];
}

if (isset($_POST["submit"])) {
    
    $targetDir = "uploads/"; // Create this directory if it doesn't exist
    $fileExtension = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION)); // Get the file extension
    $allowedExtensions = array("jpg", "jpeg", "png", "gif", "webp"); // Define an array of allowed image extensions
    if (in_array($fileExtension, $allowedExtensions)) { // Check if the file extension is in the allowed extensions array
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            $image = basename($_FILES["image"]["name"]);
        }
        $status = $ItemManager->additemdetails($name,$price,$remark,$image,$category);  
    } else {
        $status = 'Errorimage';  
    }

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
    
    <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="style.css">
    <title>Restaurent</title>
   
    <script> 
        var loadFile = function(event) {
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
     
        function Validate() {

        if (document.form.name.value == "") {
            window.alert("Please enter a name");
            document.form.name.focus();
            event.preventDefault();
            return false;
        }
        if (document.form.price.value == "") {
            window.alert("Please enter a price");
            document.form.price.focus();
            event.preventDefault();
            return false;
        }
        if (document.form.remark.value == "") {
            window.alert("Please enter a remark");
            document.form.remark.focus();
            event.preventDefault();
            return false;
        }
        if (document.form.image.value == "") {
            window.alert("Please select an image");
            document.form.image.focus();
            event.preventDefault();
            return false;
        }
         if (document.form.category.value == '0') {
            window.alert("Please select a cetergory");
            document.form.category.focus();
            event.preventDefault();
            return false;
        }

    }
    $(document).ready(function () {
                var status = $('#status').val();
                if (status == 'Success') {
                    alert('Record added successfully.');
                    $('#status').val(""); // Reset the status
                    $('input[type="text"]').val(""); // Clear text input fields
                    $('input[type="password"]').val(""); // Clear password input fields
                    $('select').prop('selectedIndex', 0);
                }
                if (status == 'Errorimage') {
                    alert('Invalid image file. Allowed extensions: jpg, jpeg, png, gif.');
                    document.form.image.focus();
                    $('#status').val("");
                }
                if (status == 'Error') {
                    alert('Error');
                    $('#status').val("");
                }
                $('#status').val('');
            });
        function validateNumber(input) {
            input.value = input.value.replace(/[^0-9]/g, ''); // Remove non-numeric characters
        }
        
    </script>
</head>
<body bgcolor="black">
<input type="hidden" name="status" id="status" value="<?php echo $status; ?>">
    <div class="top">
        <div>
         Contact Us +1 966366 20000 / 01 | oceanrestaurant@.com 
        </div>
    </div>
    <hr>   

    <header>
    <div style="display: flex; align-items:left; justify-content:left;">
    <img src="images/image70-removebg-preview.png" height="90px" >
        <left><h2 style="font-size: 20px; font-family:Calibri Light (Headings); color: #862c05;"><i>Ocean Peak <br> Restaurant</i></h2></left>
    </div>

        <ul class="navbar">
            <li><a href="index.php#home"home>Home</a></li>
            <li><a href="index.php#about"about>About</a></li>
            <li><a href="index.php#menu"menu>Menu</a></li>
            <li><a href="index.php#services"Service>Service</a></li>
            <li><a href="index.php#content"Contact>Contact</a></li>
        </ul>
      </header>
      <div class="middle">
		<div style="background-image:url('./images/image21.jpg');">
		<p>
			<br> <br>
					Healthy Food Services  <br>
			<font size="5px"> We Care About Your  </font>
		</p> 
		</div>
	</div>
	
    <form action="" name="form" method="post" enctype="multipart/form-data" action="admin.php">

<div align="center">
      <table width="1055" height="222" border="0">
        <tr>
          <th width="114" height="23" scope="row">&nbsp;</th>
          <td width="867">&nbsp;</td>
          <td width="60">&nbsp;</td>
        </tr>
        <tr>
            <th height="81" scope="row">&nbsp;</th>
            <td><p>
            <label for="name">Name of the item</label>
            <input type="text" name="name" id="name" value="<?php ?>" placeholder="Please enter Name of the meal..." />
            <label for="fname"><br />
            Price</label>
            <input type="text" id="price" name="price" value="<?php ?>" placeholder="Please enter a price" oninput="validateNumber(this)"/>
            <label for="age"><br />
            Remark</label>
            <input type="text" id="remark" name="remark" value="<?php ?>" placeholder="Please enter a remark..." />
            <br>
            <label for="image">Item Image:</label> 
            <input style="margin-left: 20px; " type="file" name="image" id="image" accept="image/*" onchange="loadFile(event)"> 
                <br>
            <p><img style="margin-left: 150px; margin-top: 10px;" id="output" width="200" /></p>
            <br>
            <label for="category"><br/>
            Category</label> 
            <select name="category" id="category" value="<?php ?>">
               <option value="0" <?php ?>>Select a category</option> 
               <option value="Lunch">Lunch</option>
               <option value="Dinner">Dinner</option>
               <option value="Lunch/Dinner">Lunch/Dinner</option>
               <option value="Testy Food">Testy Food</option>  
               <option value="Drinks">Drinks</option>  
               <option value="Healthy Juice">Healthy Juice</option> 
               <option value="Flavor">Flavor</option> 
            </select> 
            <p align="center">
              <input type="submit" value="Add" name="submit" onclick="return Validate()" />
              <input type="submit" value="Add To Menu" name="submit" />
          </p>

          </td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th height="21" scope="row">&nbsp;</th>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </div>
  </form>
