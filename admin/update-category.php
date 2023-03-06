<?php
include "db/config.php";
include "header.php";

// if ($_SESSION["user_role"] == '0') {
//     header("Location:/news-template/admin/post.php");
// }

if (isset($_POST['sumbit'])) {
    $catgory_id = $_GET['id'];
    $cat_name = mysqli_real_escape_string($conn, $_POST['cat_name']);

    $sql = "UPDATE `category` SET `category_name` = '{$cat_name}' WHERE category_id = '$catgory_id'";

    if (mysqli_query($conn, $sql)) {
        header("Location:/news-template/admin/category.php");
    }
}

?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="adin-heading"> Update Category</h1>
            </div>
            <?php
            $c_id = $_GET['id'];

            $sql = "SELECT * FROM `category` WHERE category_id = '$c_id'";
            $result = mysqli_query($conn, $sql) or die("Query failed.");

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

            ?>
                    <div class="col-md-offset-3 col-md-6">
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                            <div class="form-group">
                                <input type="hidden" name="catgory_id" class="form-control" value="<?php echo $row['category_id']; ?>" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" name="cat_name" class="form-control" value="<?php echo $row['category_name']; ?>" placeholder="" required>
                            </div>
                            <input type="submit" name="sumbit" class="btn btn-primary" value="Update" required />
                        </form>
                    </div>
        </div>
<?php
                }
            }
?>
    </div>
</div>
<?php include "footer.php"; ?>