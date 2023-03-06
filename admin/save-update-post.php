<?php
include "db/config.php";

if (empty($_FILES['new-image']['name'])) {
    $file_name = $_POST['old-image'];
} else {
    $error = array();

    $file_name = $_FILES['new-image']['name'];
    $file_size = $_FILES['new-image']['size'];
    $file_tmp = $_FILES['new-image']['tmp_name'];
    $file_type = $_FILES['new-image']['type'];
    $file_ext = end(explode('.', $file_name));
    $extension = array("jpeg", "jpg", "png");

    if (in_array($file_ext, $extension) === false) {
        $error[] = "This extension file not allowed, Please choose a JPG or PNG file.";
    }

    if ($file_size > 2097152) {
        $error[] = "File size must be 2mb pr lower.";
    }

    if (empty($error) == true) {
        move_uploaded_file($file_tmp, "upload/" . $file_name);
    } else {
        print_r($error);
        die();
    }
}


// $sql = "UPDATE post SET title = '{$_POST["post_title"]}', description = '" . $_POST["postdesc"] . "', category = '{$_POST["category"]}', post_img = '{$file_name}' WHERE post_id = {$_POST["post_id"]}";

$desc = mysqli_real_escape_string($conn, $_POST["postdesc"]);

$sql = "UPDATE post SET title = '{$_POST["post_title"]}', description = '{$desc}', category = '{$_POST["category"]}', post_img = '{$file_name}' WHERE post_id = {$_POST["post_id"]}";

// echo $sql;
// die();


$result = mysqli_query($conn, $sql);

if ($result) {
    header("Location:/news-template/admin/post.php");
} else {
    echo "Query Failed.";
}
