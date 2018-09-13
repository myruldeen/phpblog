<?php require_once("includes/header.php"); ?>

<?php 

if ($session->is_signed_in()) {

	redirect("index.php");
}

if (isset($_POST['submit'])) {

	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

	$user_found = User::verify_user($username, $password);


	//method
	if ($user_found) {

		$session->login($user_found);
		redirect("index.php");

	} else {

		$message = "Your password or username are incorrect";
	}

} else {

	$message = "";
	$username = "";
	$password = "";
}




 ?>

 <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                        	<h4 class="bg-danger"><?php echo $message; ?></h4>
                            <form role="form" action="" method="post">
                                <fieldset>
                                    <div class="form-group">
                                    	<label for="username">Username</label>
                                        <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                    	<label for="password">Password</label>
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>
                                    
                                    <input type="submit" name="submit" class="btn btn-lg btn-success btn-block" value="Login">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>