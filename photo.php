<?php include("includes/header.php"); ?>
<?php 


if (empty($_GET['id'])) {
    
    redirect("index.php");
}

$photo = Photo::find_by_id($_GET['id']);

if (isset($_POST['submit'])) {
    
    $author = trim($_POST['author']);
    $body = trim($_POST['body']);

    $create_comment = Comment::create_comment($photo->id, $author, $body);

    if ($create_comment && $create_comment->save()) {
        
        redirect("photo.php?id={$photo->id}");
    }
} else {

    $author = "";
    $body = "";
}






 ?>
    <!-- Page Content -->


      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

          <!-- Title -->
          <h1 class="mt-4"><?php echo $photo->title; ?></h1>

          <!-- Author -->
          <p class="lead">
            by
            <a href="#">Start Bootstrap</a>
          </p>

          <hr>

          <!-- Date/Time -->
          <p>Posted on January 1, 2018 at 12:00 PM</p>

          <hr>

          <!-- Preview Image -->
          <img class="img-fluid rounded" src="admin/<?php echo $photo->picture_path(); ?>" alt="" width="100%">

          <hr>

          <!-- Post Content -->
          <p><?php echo $photo->description; ?></p>


          <hr>

          <!-- Comments Form -->

          <div class="well">
            <h4>Leave a Comment:</h4>
                <form action="" method="post" role="form">
                    
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" name="author" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="comment-content">Comment</label>
                            <textarea name="body" class="form-control" rows="3" required></textarea>
                        </div>
                        
                       <div class="form-group">
                           <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                       </div>
               
                    
                </form>
            </div>

             <hr>


          <!-- Single Comment -->

          <?php $comments = Comment::find_comments($photo->id); ?>

          <?php 
          foreach ($comments as $comment) {?>

            <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment->author; ?> <small><?php echo $comment->date; ?></small>
                        </h4><p><?php echo $comment->body; ?></p>
                    </div>
             </div>


            <?php    
          }
           ?>
          
          <!-- Comment with nested comments -->
          

        </div>

        <!-- Sidebar Widgets Column -->
        

      </div>
      <!-- /.row -->





<?php include("includes/footer.php"); ?>   