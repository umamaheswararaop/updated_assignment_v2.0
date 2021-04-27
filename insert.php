<?php require_once 'header.php'; ?>  
<?php 
//Databse Connection file
include('dbconnection.php');
if(isset($_POST['submit'])) {
  	//getting the post values
    $name=$_REQUEST['username'];
    $fname=$_REQUEST['fname'];
    $lname=$_REQUEST['lname'];
    $email=$_REQUEST['email'];
    $gender=$_REQUEST['gender'];
    $color= $_REQUEST['color'];   
        $chk="";  
        foreach($color as $chk1)  
        {  
        print_r($chk .= $chk1.",");  
        }  
    $password1=$_REQUEST['password'];
    $confirmpassword=$_REQUEST['confirm_password'];
     $password = md5($password1);
     $inser_chk= mysqli_query($con,"select * from multiple_users where user_name= '$name' OR user_email= '$email'");
     $rows= mysqli_num_rows($inser_chk);
     if($rows > '0')
     {
         echo "<script>alert('User Name or Email already Exist');</script>";
     }
     else
     {
     $query=mysqli_query($con, "insert into multiple_users(user_name, user_fname, user_lname ,user_email, user_gender, user_favcolor, user_password) value('$name','$fname','$lname', '$email', '$gender', '$chk', '$password' )");
    if ($query) {
    echo "<script>alert('You have successfully inserted the User data');</script>";
    echo "<script type='text/javascript'> document.location ='index.php'; </script>";
  }
     }
//  else
//    {
//      echo "<script>alert('Something Went Wrong. Please try again');</script>";
//    }
     
     
  // Query for data insertion
     
}
?>
  <main id="main">
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">
        <div class="row mt-5">   
          <div class="col-lg-8 mt-5 mt-lg-0">
              <script src="validations.js"></script>
<form  method="POST" name="form" id="form" action="insert.php" onsubmit="return validateForm()">
    <div class="section-title">
        <h1>Registration Form</h1>
    </div>
		
                <div class="row">
                <div class=" col-md-3 form-group">
                    User Name
        </div>
                    <div class=" col-md-8 form-group">
                        <input type="text" class="form-control" name="username" placeholder="Enter User Name">
                    </div>
                </div>
        <div class="row">
                <div class=" col-md-3 form-group">
                    First Name
        </div>
                    <div class=" col-md-8 form-group">
                <input type="text" class="form-control" name="fname" placeholder="First Name" ></div>
        </div>
		<div class="row">
                <div class=" col-md-3 form-group">
                    Last Name
        </div>
                    <div class=" col-md-8 form-group">		
                <input type="text" class="form-control" name="lname" placeholder="Last Name" ></div>
                </div>
			
        <div class="row">
                <div class=" col-md-3 form-group">
                    Email
        </div>
                    <div class=" col-md-8 form-group">
        	<input type="text" class="form-control" name="email" placeholder="Enter your Email id" >
        </div>
        </div>
                <div class="row">
                <div class=" col-md-3 form-group">
        <label>Gender</label>
                </div>
                    <div class=" col-md-8 form-group">
        <input name="gender" id="gender" type="radio" value="male" > Male 
                         <input name="gender" id="gender" type="radio" value="female"> Female

                </div>
                </div>
                <div class="row">
                <div class=" col-md-3 form-group">
                    Choose Colour
        </div>
                    <div class=" col-md-8 form-group">
                        <input type="checkbox" name="color[]" id="Blue" value="Blue">
                        <label for="blue"> Blue </label><br>
                        <input type="checkbox" name="color[]" id="Red" value="Red">
                        <label for="red"> Red </label><br>
                        <input type="checkbox" name="color[]" id="Green" value="Green">
                        <label for="green"> Green </label><br>
                </div>
                </div>
		<div class="row">
                <div class=" col-md-3 form-group">
                    Password
        </div>
                    <div class=" col-md-8 form-group">
			
             <input type="password" class="form-control" name="password" id="password" placeholder="Password"></div>
                </div>
                <div class="row">
                <div class=" col-md-3 form-group">
                    Confirm Password
        </div>
                    <div class=" col-md-8 form-group">
				<input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm password" ></div>
                </div>
                                <div style="color:green;" id="CheckPasswordMatch"></div>
                        </div>        	
        
      
		<div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Submit</button>
        </div>
    </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <?php require_once 'footer.php'; ?>

</body>

</html>