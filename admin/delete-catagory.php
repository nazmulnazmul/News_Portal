<?php
include "db/config.php";

// if ($_SESSION["user_role"] == '0') {
//     header("Location:/news-template/admin/post.php");
// }

$cat_id = $_GET['id'];

$sql = "DELETE FROM `category` WHERE category_id = '$cat_id'";

if (mysqli_query($conn, $sql)) {
    header("Location:/news-template/admin/catagory.php");
}

mysqli_close($conn);
