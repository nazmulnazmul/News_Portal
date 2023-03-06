<?php
include "db/config.php";

if (empty($_FILES['logo']['name'])) {
    $file_name = $_POST['old_logo'];
} else {
    $error = array();

    $file_name = $_FILES['logo']['name'];
    $file_size = $_FILES['logo']['size'];
    $file_tmp = $_FILES['logo']['tmp_name'];
    $file_type = $_FILES['logo']['type'];
    $file_ext = end(explode('.', $file_name));
    $extension = array("jpeg", "jpg", "png");

    if (in_array($file_ext, $extension) === false) {
        $error[] = "This extension file not allowed, Please choose a JPG or PNG file.";
    }

    if ($file_size > 2097152) {
        $error[] = "File size must be 2mb pr lower.";
    }

    if (empty($error) == true) {
        move_uploaded_file($file_tmp, "images/" . $file_name);
    } else {
        print_r($error);
        die();
    }
}

echo $_POST["postdesc"];

$sql = "UPDATE `setting` SET websitename = '{$_POST["website_name"]}', logo = '{$file_name}', footerdesc = '{$_POST["footer_desc"]}'";

$result = mysqli_query($conn, $sql);

if ($result) {
    header("Location:/news-template/admin/setting.php");
} else {
    echo "Query Failed.";
}
