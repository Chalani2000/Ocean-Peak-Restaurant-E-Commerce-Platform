
<?php
require_once "Classes/ItemManager.php";
$ItemManager = new ItemManager();
$initialQuantity ='1';
$selectedItemsJSON = $_GET['cart'];
$selectedItems = json_decode($selectedItemsJSON, true);
if (!empty($selectedItems)) {
  $idValues = array(); 
  foreach ($selectedItems as $item) {
      $id = $item['id'];
      $idValues[] = $id;
  }
} 
$itemarray = $ItemManager->getitemdetailsforcart($idValues); 
// print_r ($itemarray);
// exit ();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Damion&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,700;1,200;1,600&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <link rel="stylesheet" href="style.css">
    <title>Restaurent</title>


  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

<style>  
.transparent-button {
    background-color: transparent;
    border: none;
    cursor: pointer;
    font-size: 20px;
    color: rgba(255, 0, 0, 0.8); /* Red color with 80% opacity */
  }

  .transparent-button:hover {
    color: rgba(255, 0, 0, 1); /* Red color with 100% opacity on hover */
  }
</style>
<script>

function updateQuantity(index, price, newValue) {
  const quantityElement = document.getElementById('quantity_' + index);
  quantityElement.textContent = newValue;
  const newAmount = price * newValue;
  const amountElement = document.getElementById('amount_' + index);
  amountElement.textContent = '$' + newAmount.toFixed(2);
  setTotalValues();
}

function changeQuantity(index, action, price) {
  const quantityElement = document.getElementById('quantity_' + index);
  let currentQuantity = parseInt(quantityElement.textContent, 10);
  if (action === 'increase') {
    currentQuantity++;
  } else if (action === 'decrease' && currentQuantity > 1) {
    currentQuantity--;
  }
  quantityElement.textContent = currentQuantity;
  const newAmount = price * currentQuantity;
  const amountElement = document.getElementById('amount_' + index);
  amountElement.textContent = '$' + newAmount.toFixed(2);
  setTotalValues();
}

function calculateTotalAmount() {
  let totalAmount = 0;
  <?php for ($i = 0; $i < count($itemarray); $i++) { ?>
    const amount<?php echo $i; ?> = parseFloat(document.getElementById('amount_<?php echo $itemarray[$i]['id']; ?>').textContent.replace('$', ''));
    totalAmount += amount<?php echo $i; ?>;
  <?php } ?>
  const totalAmountElement = document.getElementById('total_amount');
  totalAmountElement.textContent = '$' + totalAmount.toFixed(2);
}
window.onload = calculateTotalAmount;
window.onload = setTotalValues;
function deleteItem(itemId) {

  const confirmed = confirm("Are you sure you want to remove this item?");
  if (!confirmed) {
    return; 
  }
  const rowToRemove = document.getElementById('row_' + itemId);
  const amountToRemove = parseFloat(document.getElementById('amount_' + itemId).textContent.replace('$', ''));

  document.getElementById('quantity_' + itemId).textContent = '0';
  document.getElementById('amount_' + itemId).textContent = '$0.00';
  setTotalValues()
  rowToRemove.parentNode.removeChild(rowToRemove);
  
}
function setTotalValues() {
  let totalAmount = 0;
  let totalItems = 0;

  <?php for ($i = 0; $i < count($itemarray); $i++) { ?>
    const quantity<?php echo $i; ?> = parseInt(document.getElementById('quantity_<?php echo $itemarray[$i]['id']; ?>').textContent, 10);
    const amount<?php echo $i; ?> = parseFloat(document.getElementById('amount_<?php echo $itemarray[$i]['id']; ?>').textContent.replace('$', ''));
    totalAmount += amount<?php echo $i; ?>;
    totalItems += quantity<?php echo $i; ?>;
  <?php } ?>

  const totalAmountElement = document.getElementById('total_amount');
  totalAmountElement.textContent = '$' + totalAmount.toFixed(2);

  const totalItemsElement = document.getElementById('total_items');
  totalItemsElement.textContent = totalItems;

  // Set values to hidden fields
  document.getElementById('total_amount_hidden').value = totalAmount.toFixed(2);
  document.getElementById('total_items_hidden').value = totalItems;
}

function passValues() {
  var totalAmount = document.getElementById('total_amount_hidden').value;
  var totalItems = document.getElementById('total_items_hidden').value;

  window.open('CardPayment.php?quantity=' + totalItems + '&amount=' + totalAmount);
  
}

</script>

</head>


<header>

<div style="display: flex; align-items:left; justify-content:left;">
<img src="images/image70-removebg-preview.png" height="90px" >
    <left><h2 style="font-size: 20px; font-family:Calibri Light (Headings); color: #862c05;"><i>Ocean Peak <br> Restaurant</i></h2></left>
</div>
</header>

<body>
<!-- <div class="container"> -->
    <!-- <h2 class="title">Discover the Best Food</h2> -->
    <div> 
    <input type="hidden" name="total_amount" id="total_amount_hidden" value="">
    <input type="hidden" name="total_items" id="total_items_hidden" value="">
    <table width="100%" border="0" width="400" style="padding-top: 170px; ">
          <?php
          for ($i = 0; $i < count($itemarray); $i++) {
            $item = $itemarray[$i]; 
            // print_r ($itemarray);
            // exit ();
            ?>
          
          <tr  class="<?php echo (($i % 2) ? "td2" : "td1") ?>">
              <td width="20"><div align="center">&bull;</div></td>
              <td width="80"><div align="left"><?php echo $item["name"] ?></div></td>
              <td width="83"><div align="left"><?php echo $item["category"] ?></div></td>
              <td width="67"><div align="center">$<?php echo $item["price"] ?>.00</div></td>
              <td width="20">
                <div align="center" >
                  <button onclick="changeQuantity(<?php echo $item['id']; ?>, 'increase',<?php echo $item['price']; ?>)">+</button>
                </div>
              </td>
              <td width="20">
                <div align="center"><lable id="quantity_<?php echo $item['id']; ?>" oninput="updateQuantity(<?php echo $item['id']; ?>,<?php echo $item['price']; ?>, this.value)"><?php echo $initialQuantity; ?></lable></div>
              </td>
              <td width="20">
              <div align="center"><button onclick="changeQuantity(<?php echo $item['id']; ?>,'decrease',<?php echo $item['price']; ?>)">-</button></div>
              </td>
              <td width="67"><div id="amount_<?php echo $item['id']; ?>" align="center">$<?php echo $item["price"]; ?>.00</div></td>
              <td width="67">
                <div align="center">
                <!--<button onclick="deleteItem(<?php echo $item['id']; ?>)">Remove item</button>-->
                <button onclick="deleteItem(<?php echo $item['id']; ?>)" class="material-icons transparent-button">&#xe872;</button>
                      <!-- <i class="material-icons" style="color:red;><font-color = "red">&#xe872;</i> -->
  
                </div>
              </td>
              
          <?php } ?>
          </tr>
          <tr>
            <td colspan="9" style="height: 30px;"></td>
          </tr>
          <tr>
          <td width="20"><div align="center"></div></td>
          <td width="80"><div align="center"></div></td>
          <td width="90"><div align="left" style="font-family:verdana; color:green; font-size:25px;"><b>Total Amount</b></font></div></td>
          <td width="67"><div align="center" style="font-family:verdana; color:white; font-size:25px;">:</div></td>
          <td width="20"><div align="center"></div></td>
          <td width="20"><div align="center"></div></td>
          <td width="20"><div align="center"></div></td>
          <td width="67"><div align="center" style="font-family:verdana; color:green; font-size:25px;"><span id="total_amount"><b>$0.00</b></span></div></td>
          <td width="67"><div align="center"></div></td>
          </tr>
          <tr>
          <td width="20"><div align="center"></div></td>
          <td width="80"><div align="center"></div></td>
          <td width="83"><div align="left" style="font-family:verdana; color:green; font-size:25px;"><b>Total Items</b></font></div></td>
          <td width="67"><div align="center" style="font-family:verdana; color:white; font-size:25px;">:</div></td>
          <td width="20"><div align="center"></div></td>
          <td width="20"><div align="center"></div></td>
          <td width="20"><div align="center"></div></td>
          <td width="67"><div align="center" style="font-family:verdana; color:green; font-size:25px;"><span id="total_items">0</span></div></td>
          <td width="67"><div align="center"></div></td>
          </tr>
        </table>
    </div>
<br><br>

    <div class = "hover">
      <form>
  
      <input type="submit" value="Check out" class="btn" name="submit" align="center" onclick="passValues()" />
      
      </form>
    </div>
    

</body>
</html>