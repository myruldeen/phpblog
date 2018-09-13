<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) { redirect("login.php");} ?>

<?php 

$message = "";
if (empty($_GET['id'])) {
    redirect("users.php");



} else {

    $user = User::find_by_id($_GET['id']);
    if (isset($_POST['edit'])) {
        if ($user) {
            
            $user->username = $_POST['username'];
            $user->password = $_POST['password'];
            $user->first_name = $_POST['first_name'];
            $user->last_name = $_POST['last_name'];

            if (empty($_FILES['file_upload'])) {
                
                $user->save();
                $message = "User Updated Successfully";
            } else {

                $user->set_file($_FILES['file_upload']);
                $user->upload_photo();
                $user->save();

                $message = "User Updated Successfully";

                redirect("edit_user.php?id={$user->id}");
            }

         

            //

            // if ($user->save_user_and_image()) {
            //     $message = "<div class='alert alert-success' role='alert'>
            //   User Updated Successfully
            // </div>";
            // } else {
            //     $message = join("<br>" , $user->errors);
            // }
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
                    <h1 class="page-header">Edit</h1>
                </div>

                <div class="col-md-8">
                    <p><?php echo $message; ?></p>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $user->username; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" name="password" class="form-control" value="<?php echo $user->password; ?>">
                        </div>
                        <div class="form-group">
                            <label for="first_name">First name</label>
                            <input type="text" name="first_name" class="form-control" value="<?php echo $user->first_name; ?>">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last name</label>
                            <input type="text" name="last_name" class="form-control" value="<?php echo $user->last_name; ?>">
                        </div>
                        
                    
                </div>
                <div class="col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                          Details
                        </div>
                        <div class="panel-body">
                            <?php 

                            //$users = user::find_by_id(8);

                             ?>
                            <img src="<?php echo $user->image_path_and_placeholder(); ?>" width="100%" class="user_image_round"><br><br>
                            <p>Uploaded on: 4/6/2018</p>
                            <p>user id: <?php echo $user->id; ?></p>
                            <p>Filename: <?php //echo $user->filename; ?></p>
                            <p>File type: <?php //echo $user->type; ?></p>
                            <p>File size: <?php //echo $user->size; ?></p>
                            <div class="form-group">
                                <input type="file" name="file_upload">
                            </div>
                        </div>
                        <div class="panel-footer">
                            <input type="submit" name="edit" class="btn btn-block btn-success" value="Edit">
                            <a href="delete_user.php?id=<?php echo $user->id; ?>" class="btn btn-block btn-danger">Delete</a>
                        </div>
                        </form>
                        
                    </div>
                </div>
               
                 
            </div>

            

        </div>
    </div>

<?php include("includes/footer.php"); ?>
