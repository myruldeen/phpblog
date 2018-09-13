<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) { redirect("login.php");} ?>

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
                    <h1 class="page-header">Users</h1>
                </div>
                
                <div class="col-lg-12">
                    <p><a href="add_user.php" class="btn btn-primary"><i class="fa fa-plus fa-fw"></i></a></p>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>picture</th>
                                <th>username</th>
                                <th>first_name</th>
                                <th>last_name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                <th>Views</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $users = User::find_all();
                            foreach ($users as $user) {
                                ?>
                                <tr>
                                    <td><?php echo $user->id; ?></td>
                                    <td>
                                        <img src="<?php echo $user->image_path_and_placeholder(); ?>" class="user_image">
                                    </td>
                                    <td><?php echo $user->username; ?></td>

                                    <td><?php echo $user->first_name; ?></td>
                                    <td><?php echo $user->last_name; ?></td>
                                    <td><a href="edit_user.php?id=<?php echo $user->id; ?>"><i class="fa fa-edit fa-fw"></i></a></td>
                                    <td><a onClick="javascript: return confirm('Are you sure you want to delete this user')" href="delete_user.php?id=<?php echo $user->id; ?>"><i class="fa fa-trash fa-fw"></i></a></td>
                                    <td><a href="#">View</a></td>
                                   
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
