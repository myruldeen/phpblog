<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) { redirect("login.php");} ?>

<?php 


if (empty($_GET['id'])) {

    redirect("photos.php");
}

$comments = Comment::find_comments($_GET['id']);


 ?>

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
                    <h1 class="page-header">Comments</h1>
                </div>
                
                <div class="col-lg-12">
                    
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>photo id</th>
                                <th>author</th>
                                <th>body</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            
                            foreach ($comments as $comment) {
                                ?>
                                <tr>
                                    <td><?php echo $comment->id; ?></td>
                                    
                                    <td><?php 

                                    //$comment->photo_id;
                                    $photo = Photo::find_by_id($comment->photo_id); 
                                    echo $photo->title;

                                    ?></td>

                                    <td><?php echo $comment->author; ?></td>
                                    <td><?php echo $comment->body; ?></td>
                                    
                                    <td><a onClick="javascript: return confirm('Are you sure you want to delete this comment')" href="delete_comment_photo.php?id=<?php echo $comment->id; ?>"><i class="fa fa-trash fa-fw"></i></a></td>

                                   
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
