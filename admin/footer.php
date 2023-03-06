<?php
include "db/config.php";
?>
<!-- Footer -->
<div id="footer">
    <div class="container">
        <div class="row">

            <?php
            $sql = "SELECT * FROM `setting`";

            $result = mysqli_query($conn, $sql) or die("Query failed.");

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="col-md-12">
                        <span> Copyright 2022 News | Powered by <?php echo $row['footerdesc']; ?></span>
                <?php
                }
            }
                ?>
                    </div>
        </div>
    </div>
</div>
<!-- /Footer -->
</body>

</html>