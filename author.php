<?php 
include'db/config.php';
include 'header.php';
 ?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                <?php
                    if (isset($_GET['aid'])) {
                        $author_id = $_GET['aid'];
                   
                        $sql1 = "SELECT * FROM `post`JOIN `user` 
                        ON post.author = user.user_id WHERE user_id = '$author_id'";
                        $result1 = mysqli_query($conn, $sql1) or die("Query failed");
                        $row1 = mysqli_fetch_assoc($result1);

                        //print_r($row1);
                  
                    ?>
                        <h2 class="page-heading"><?php echo $row1['username']?></h2>
                  <?php
                        // if (isset($_GET['cid'])) {
                        //     $cat_id = $_GET['cid'];
                        // }
                        //      //  calculate offset code
                            $limit = 3;

                            if (isset($_GET['page'])) {
                                $page = $_GET['page'];
                            } else {
                                $page = 1;
                            }

                            $offset = ($page - 1) * $limit;



                            $sql = "SELECT post.post_id, post.title, post.description, post.post_img, post.post_date, category.category_name, user.username, post.category, post.post_img FROM post LEFT JOIN category ON post.category = category.category_id LEFT JOIN user ON post.author = user.user_id WHERE post.author = {$author_id} ORDER BY post.post_id DESC LIMIT {$offset}, {$limit}";

                            $result = mysqli_query($conn, $sql) or die("Query failed.");
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    
                        ?>
                      
                        <div class="post-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="post-img" href="single.php?id=<?php echo $row['post_id'];?>"><img src="admin/upload/<?php echo $row['post_img'];?>" alt=""/></a>
                                </div>
                                <div class="col-md-8">
                                    <div class="inner-content clearfix">
                                        <h3><a href='single.php?id=<?php echo $row['post_id'];?>'><?php echo $row['title'];?></a></h3>
                                        <div class="post-information">
                                            <span>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <a href='category.php'><?php echo $row['category_name'];?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <a href='author.php'><?php echo $row['username'];?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                <?php echo $row['post_date'];?>
                                            </span>
                                        </div>
                                        <p class="description"><?php echo substr($row['description'],0,100)."...";?></p>
                                        <a class='read-more pull-right' href='single.php?id=<?php echo $row['post_id'];?>'>read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                            <?php
                                }
                            }else {
                                echo "<h2>No Record Found.</h2>";
                            }
                            
                        if (mysqli_num_rows($result) > 0) {

                            // $total_records = mysqli_num_rows($result);
                            $total_records = mysqli_num_rows($result1);

                            $total_page = ceil($total_records / $limit);


                            echo "<ul class='pagination admin-pagination'>";
                            if ($page > 1) {
                                echo '<li><a href="index.php?aid=' .$author_id . '&page='.($page -1).'">Prev</a></li>';
                            }

                            for ($i = 1; $i <= $total_page; $i++) {

                                if ($i == $page) {
                                    $active = "active";
                                } else {
                                    $active = "";
                                }
                                echo '<li class="' . $active . '"><a href ="index.php?aid=' . $i . '">' . $i . '</a></li>';
                            }
                            if ($total_page > $page) {
                                echo '<li><a href="index.php?aid=' . ($page + 1) . '">Next</a></li>';
                            }
                            echo '</ul>';
                        }else {
                            echo "<h2>No Record Found.</h2>";
                        }
                   
                        ?>

                        <?php } ?>
                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
