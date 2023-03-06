<?php
session_start();
include"db/config.php";

if (isset($_FILES['fileToUpload'])) {
    $error = array();

    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];
    $file_ext = end(explode('.',$file_name));
    $extension = array("jpeg", "jpg", "png");

    if (in_array($file_ext, $extension) === false) {
        $error[] = "This extension file not allowed, Please choose a JPG or PNG file.";
    }

    if ($file_size > 2097152) {
        $error[] = "File size must be 2mb pr lower.";
    }

    if (empty($error) == true) {
        move_uploaded_file($file_tmp,"upload/".$file_name);
    }else{
        print_r($error);
        die();
    }
}

$title = mysqli_real_escape_string($conn, $_POST['post_title']);
$postdesc = mysqli_real_escape_string($conn, $_POST['postdesc']);
$category = mysqli_real_escape_string($conn, $_POST['category']);
$date = date("d M, Y");
$atuhor = $_SESSION['user_id'];

$sql = "INSERT INTO `post`(title, description, category, post_date, author, post_img) 
VALUES ('{$title}', '{$postdesc}', '{$category}', '{$date}', '{$atuhor}', '{$file_name}');";

$sql .= "UPDATE `category` SET post = post + 1 WHERE category_id = $category";

if (mysqli_multi_query($conn, $sql)) {
    header("Location:/news-template/admin/post.php");
}else{
    echo "<div class='alert alert-danger'>Query Failed.</div>";
}


?>