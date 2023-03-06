<?php
include "db/config.php";
include "header.php";
?>

<div class="admin-content">
    <div class="container">
        <div class="row">
            <div class="com-md-12">
                <h1 class="admin-heading">Website Setting</h1>
            </div>
            <?php

            //$post_id = $_GET['id'];

            $sql = "SELECT * FROM `setting`";

            $result = mysqli_query($conn, $sql) or die("Query failed.");

            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="col-md-offset-3 col-md-6 form" style="padding-bottom: 30px;">
                        <!-- from -->
                        <form action="save-setting.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="website_name">Website Name</label>
                                <input type="text" name="website_name" value="<?php echo $row['websitename']; ?>" class="form-control" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <input type="file" name="logo" class="form-control">
                                <img src="images/<?php echo $row['logo']; ?>" alt="" width="500px;">
                                <input type="hidden" name="old_logo" value="<?php echo $row['logo']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="footer_desc">Footer Description</label>
                                <textarea name="footer_desc" class="form-control" id="" cols="30" rows="5"><?php echo $row['footerdesc']; ?></textarea>
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary" value="Submit">

                        </form>
                        <!-- from end-->
                <?php
                }
            }
                ?>
                    </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>