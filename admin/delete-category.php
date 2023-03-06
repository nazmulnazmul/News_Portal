<?php
include "db/config.php";

// if ($_SESSION["user_role"] == '0') {
//     header("Location:/news-template/admin/post.php");
// }

$c_id = $_GET['id'];

$sql = "DELETE FROM `category` WHERE category_id = '$c_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_query($conn, $sql)) {
    header("Location:/news-template/admin/category.php");
} else {
    echo "<p style='color:red; margin:10px 0;'>Can't Delete the user Record.</p>";
}

mysqli_close($conn);
