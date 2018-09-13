<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) { redirect("login.php");} ?>

<?php 

$message = "";
if (isset($_POST['submit'])) {
    
    $photo = new Photo();
    $photo->title = $_POST['title'];
    $photo->caption = $_POST['caption'];
    $photo->alternate = $_POST['alternate'];
    $photo->description = $_POST['description'];
    $photo->set_file($_FILES['file_upload']);

    if ($photo->save()) {
        $message = "Photo upload successfully";
    } else {
        $message = join("<br>" , $photo->errors);
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
                    <h1 class="page-header">Upload</h1>
                </div>
              

                <div class="col-md-6">
                    <?php echo $message; ?>
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="caption">Caption</label>
                            <input type="text" name="caption" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="alternate">Alternate text</label>
                            <input type="text" name="alternate" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="description" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input type="file" name="file_upload" class="form-control">
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary">
                    </form>
                </div>   
            </div>

            

        </div>
    </div>

<?php include("includes/footer.php"); ?>
