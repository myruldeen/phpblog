<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) { redirect("login.php");} ?>

<?php 

if (empty($_GET['id'])) {
    redirect("photos.php");



} else {

    $photo = Photo::find_by_id($_GET['id']);
    if (isset($_POST['edit'])) {
        if ($photo) {
            
            $photo->title = $_POST['title'];
            $photo->caption = $_POST['caption'];
            $photo->alternate = $_POST['alternate'];
            $photo->description = $_POST['description'];

            $photo->save();
        }
    }

    



}









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
                    <h1 class="page-header">Dashboard</h1>
                </div>

                <div class="col-md-8">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" value="<?php echo $photo->title; ?>">
                        </div>
                        <div class="form-group">
                            <a class="thumbnail" href="#"><img src="<?php echo $photo->picture_path(); ?>"></a>
                        </div>
                        <div class="form-group">
                            <label for="captain">Caption</label>
                            <input type="text" name="caption" class="form-control" value="<?php echo $photo->caption; ?>">
                        </div>
                        <div class="form-group">
                            <label for="alternate">Alternate</label>
                            <input type="text" name="alternate" class="form-control" value="<?php echo $photo->alternate; ?>">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" rows="10" cols="30"><?php echo $photo->description; ?></textarea>
                        </div>
                    
                </div>
                <div class="col-md-4" >
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                          Details
                        </div>
                        <div class="panel-body">
                            <?php 

                            //$photos = Photo::find_by_id(8);

                             ?>
                            <img src="<?php echo $photo->picture_path(); ?>" width="100%"><br><br>
                            <p>Uploaded on: 4/6/2018</p>
                            <p>Photo id: <?php echo $photo->id; ?></p>
                            <p>Filename: <?php echo $photo->filename; ?></p>
                            <p>File type: <?php echo $photo->type; ?></p>
                            <p>File size: <?php echo $photo->size; ?></p>
                        </div>
                        <div class="panel-footer">
                            <input type="submit" name="edit" class="btn btn-block btn-success" value="Edit">
                            <a href="delete_photo.php?id=<?php echo $photo->id; ?>" class="btn btn-block btn-danger">Delete</a>
                        </div>
                        </form>
                        
                    </div>
                </div>
               
                 
            </div>

            

        </div>
    </div>

<?php include("includes/footer.php"); ?>
