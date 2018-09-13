<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) { redirect("login.php");} ?>

<?php 

$message = "";
$user = new User();
if (isset($_POST['add'])) {
    
    
    $user->username = $_POST['username'];
    $user->password = $_POST['password'];
    $user->first_name = $_POST['first_name'];
    $user->last_name = $_POST['last_name'];
    $user->set_file($_FILES['file_upload']);

    if ($user->save_user_and_image()) {
        $message = "user add successfully";
    } else {
        $message = join("<br>" , $user->errors);
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
                    <h1 class="page-header">Add user</h1>
                </div>
              

                <div class="col-md-6">
                    <p class="bg-success"><?php echo $message; ?></p>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="file" name="file_upload">
                        </div>

                        <div class="form-group">
                            <label for="title">Username</label>
                            <input type="text" name="username" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="caption">Password</label>
                            <input type="password" name="password" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="alternate">First name</label>
                            <input type="text" name="first_name" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="description">Last name</label>
                            <input type="text" name="last_name" class="form-control" autocomplete="off">
                        </div>
                        
                        <input type="submit" name="add" class="btn btn-primary">
                    </form>
                </div>   
            </div>

            

        </div>
    </div>

<?php include("includes/footer.php"); ?>
