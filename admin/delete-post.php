<?php
include "db/config.php";

// if ($_SESSION["user_role"] == '0') {
//     header("Location:/news-template/admin/post.php");
// }

$post_id = $_GET['id'];

// for upload folder image delete start code
$sql1 = "SELECT * FROM `post` WHERE post_id = '$post_id'";
$result = mysqli_query($conn, $sql1);
$row = mysqli_fetch_assoc($result);

unlink("upload/" . $row['post_img']);
// for upload folder image delete end code

$sql = "DELETE FROM `post` WHERE post_id = '$post_id'";
// $sql .= "UPDATE `category` SET post = post-1 WHERE category_id = '$cat_id'";

if (mysqli_query($conn, $sql)) {
    header("Location:/news-template/admin/post.php");
} else {
    echo "<p style='color:red; margin:10px 0;'>Can't Delete the user Record.</p>";
}

mysqli_close($conn);
