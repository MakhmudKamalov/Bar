<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stocks = mysqli_connect('localhost', 'root', 'root', 'west-pub');

    $item_id = $_POST['id'];
    $item_name = $_POST['item_name'];
    $item_quantity = $_POST['item_quantity'];
    $item_type = $_POST['item_type'];
    $item_price = $_POST['item_price'];

    $query = "UPDATE stocks SET item_name = '$item_name', item_quantity = '$item_quantity', item_type = '$item_type', item_price = '$item_price' WHERE id = $item_id";

    $result = mysqli_query($stocks, $query);

    if ($result) {
        header("Location: stock.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($stocks);
    }

    mysqli_close($stocks);
} else {
    echo "error";
    header("Location: edit_item.php");
    exit();
}
?>
