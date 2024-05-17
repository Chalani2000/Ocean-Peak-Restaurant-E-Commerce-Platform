// Example PHP code (in a separate file, e.g., cart.php)
<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
if (isset($_POST['action']) && $_POST['action'] === 'addToCart') {
    $itemId = $_POST['itemId'];
    $itemName = $_POST['itemName'];
    $itemPrice = $_POST['itemPrice'];

    
    $newItem = [
        'id' => $itemId,
        'name' => $itemName,
        'price' => $itemPrice
    ];

    $_SESSION['cart'][] = $newItem;

    echo json_encode(['status' => 'success']);
}
?>
