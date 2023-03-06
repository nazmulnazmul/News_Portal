<?php
include "db/config.php";

if ($_SESSION["user_role"] == '0') {
    header("Location:/news-template/admin/post.php");
}

$userid = $_GET['id'];

$sql = "DELETE FROM `user` WHERE user_id = '$userid'";

if (mysqli_query($conn, $sql)) {
    header("Location:/news-template/admin/users.php");
} else {
    echo "<p style='color:red; margin10px 0;'>Can't Delete the user Record.</p>";
}

mysqli_close($conn);
