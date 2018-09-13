<?php include("includes/header.php"); ?>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">


        <?php include("includes/top_nav.php"); ?>

        <!-- Sidebar -->
        <?php include("includes/side_nav.php"); ?>
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Photos</h1>
                </div>

                <div class="col-lg-12">
                    
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Photo</th>
                                <th>title</th>
                                <th>file name</th>
                                <th>size</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                <th>View</th>
                                <th>comments</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $photos = Photo::find_all();
                            foreach ($photos as $photo) {
                                ?>
                                <tr>
                                    <td><?php echo $photo->id; ?></td>
                                    <td>
                                        <img src="<?php echo $photo->picture_path(); ?>" width="200px">
                                    </td>
                                    <td><?php echo $photo->title; ?></td>
                                    <td><?php echo $photo->filename; ?></td>
                                    <td><?php echo $photo->size; ?></td>
                                    <td><a href="edit_photo.php?id=<?php echo $photo->id; ?>">Edit</a></td>
                                    <td><a href="delete_photo.php?id=<?php echo $photo->id; ?>">Delete</a></td>
                                    <td><a href="../photo.php?id=<?php echo $photo->id; ?>">View</a></td>

                                    <td><a href="comment_photo.php?id=<?php echo $photo->id; ?>">
                                        <?php 

                                        $comments = Comment::find_comments($photo->id);
                                        echo count($comments);
                                         ?></a>
                                    </td>
                                </tr>
                                <?php
                            }

                             ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>

            

            

        </div>
    </div>

<?php include("includes/footer.php"); ?>
