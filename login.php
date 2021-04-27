<?php
session_start();
require_once "dbconnection.php";
if(isset($_SESSION['username'])!="") {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $result = mysqli_query($con, "SELECT * FROM multiple_users WHERE user_name = '" . $username. "' and user_password = '" . md5($password). "'");
//    exit("SELECT * FROM multiple_users WHERE user_name = '" . $username. "' and user_password = '" . md5($password). "'");
    $result_rows= $result->num_rows; 
    $_SESSION['username_admin'] = $username;
    if($result_rows != '0'){
                   header("Location: index.php");
        } 
    else {
        echo "<script>alert('Incorrect Email or Password!!!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>PHP Login Operation!!</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="font-awesome.min.css">
<script src="jquery-3.5.1.min.js"></script>

<style>
body {
	color: #fff;
	background: #63738a;
	font-family: 'Roboto', sans-serif;
}
.form-control {
	height: 40px;
	box-shadow: none;
	color: #969fa4;
}
.form-control:focus {
	border-color: #5cb85c;
}
.form-control, .btn {        
	border-radius: 3px;
}
.signup-form {
	width: 450px;
	margin: 0 auto;
	padding: 30px 0;
  	font-size: 15px;
}
.signup-form h2 {
	color: #636363;
	margin: 0 0 15px;
	position: relative;
	text-align: center;
}
.signup-form h2:before, .signup-form h2:after {
	content: "";
	height: 2px;
	width: 30%;
	background: #d4d4d4;
	position: absolute;
	top: 50%;
	z-index: 2;
}	
.signup-form h2:before {
	left: 0;
}
.signup-form h2:after {
	right: 0;
}
.signup-form .hint-text {
	color: #999;
	margin-bottom: 30px;
	text-align: center;
}
.signup-form form {
	color: #999;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #f2f3f7;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.signup-form .form-group {
	margin-bottom: 20px;
}
.signup-form input[type="checkbox"] {
	margin-top: 3px;
}
.signup-form .btn {        
	font-size: 16px;
	font-weight: bold;		
	min-width: 140px;
	outline: none !important;
}
.signup-form .row div:first-child {
	padding-right: 10px;
}
.signup-form .row div:last-child {
	padding-left: 10px;
}    	
.signup-form a {
	color: #fff;
	text-decoration: underline;
}
.signup-form a:hover {
	text-decoration: none;
}
.signup-form form a {
	color: #5cb85c;
	text-decoration: none;
}	
.signup-form form a:hover {
	text-decoration: underline;
}  
</style>
<script>
		
			// Function to check Whether both passwords
			// is same or not.
			function checkPassword(form) {
                            alert(document.getElementById(password));
                            alert(in);
				password1 = form.password.value;
				password2 = form.confirm_password.value;

				// If password not entered
				if (password1 == '')
					alert ("Please enter Password");
					
				// If confirm password not entered
				else if (password2 == '')
					alert ("Please enter confirm password");
					
				// If Not same return False.	
				else if (password1 != password2) {
					alert ("\nPassword did not match: Please try again...")
					return false;
				}

				// If same return True.
				else{
					alert("Password Match: Welcome to GeeksforGeeks!")
					return true;
				}
			}
		</script>

</head>
<body>
<div class="signup-form">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		<h2>Fill Data</h2>
		<p class="hint-text">Fill below form.</p>
                <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Enter User Name" required="true">
        </div>
                        
		<div class="form-group">
                             <input type="password" class="form-control" name="password" placeholder="Enter User Password" required="true">
    	
        </div>  
      
		<div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg btn-block" name="submit" onclick = "return checkPassword(this)">Submit</button>
        </div>
    </form>
    <div class="text-center">For Signup !!!<a href="insert.php">Click here to Signup</a></div>
</div>
</body>
</html>