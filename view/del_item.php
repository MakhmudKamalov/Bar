<?php
ob_start();


?>
<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $stocks = mysqli_connect('localhost', 'root', 'root', 'west-pub');


    $id = mysqli_real_escape_string($stocks, $_GET['id']);

    $sql = "DELETE FROM `stocks` WHERE `id` = $id";
    $result = mysqli_query($stocks, $sql);

    if ($result) {
        header("Location: stock.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($stocks);
    }
    mysqli_close($stocks);
} else {
    echo "Invalid ID parameter.";
}
?>
