<?php require_once 'header.php';
include('dbconnection.php');
session_start();
if(!isset($_SESSION["username_admin"])){
//header("Location: login.php");
echo '<script type="text/javascript"> window.location = "login.php" </script>'; }
if(isset($_POST['submit']))
  {
     	$eid=$_REQUEST['editid'];
   
  	//Getting Post Values
    $name=$_REQUEST['username'];
    $fname=$_REQUEST['fname'];
    $lname=$_REQUEST['lname'];
    $email=$_REQUEST['email'];
    $gender=$_REQUEST['gender'];
    $color= $_REQUEST['color']; 
    $pwd= MD5($_REQUEST['password']);
    
        $chk="";  
        foreach($color as $chk1)  
        {  
        $chk .= $chk1.",";  
        }  
    $inser_chk= mysqli_query($con,"select * from multiple_users where (user_name= '$name' OR user_email= '$email') AND user_id !='$eid'");
     $rows= mysqli_num_rows($inser_chk);
     //exit("select * from multiple_users where (user_name= '$name' OR user_email= '$email') AND user_id !='$eid'");
     if($rows > '0')
     {
         echo "<script>alert('User Name or Email already Exist');</script>";
     }
     else
     {
    //Query for data updation
     $query=mysqli_query($con, "update  multiple_users set user_name='$name',user_fname='$fname', user_lname='$lname', user_email='$email', user_gender='$gender', user_favcolor='$chk', user_password='$pwd' where user_id='$eid'");
     //("update  multiple_users set user_name='$name',user_fname='$fname', user_lname='$lname', user_email='$email', user_gender='$gender', user_favcolor='$chk' where user_id='$eid'");
    if ($query) {
    echo "<script>alert('You have successfully update the User data');</script>";
    echo "<script type='text/javascript'> document.location ='index.php'; </script>";
  }
//  else
//    {
//      echo "<script>alert('Something Went Wrong. Please try again');</script>";
//    }
}
  }
?>
 <script src="validations.js"></script>
  <main id="main">
    <!-- ======= Contact Section ======= -->
    <!--<form  method="POST" name="form" id="form" onsubmit="return validateForm()">-->
        <form  method="POST" name="form" id="form" >
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">
        <div class="row mt-5">   
          <div class="col-lg-8 mt-5 mt-lg-0">
             
              
 <?php
$eid=$_GET['editid'];
$sql="select * from multiple_users where user_id='$eid'";
$ret = mysqli_query($con, $sql) or die( mysqli_error($con));
//$ret=mysqli_query($con,"");
while ($row= mysqli_fetch_array($ret)) {
    $color = $row['user_favcolor'];
    $color1 = explode(',', $color);
 ?>
    <div class="section-title">
        <h1>User Update Form</h1>
    </div>
              
                  <div>
                <div class="row">
                <div class=" col-md-3 form-group">
                    User Name
        </div>
                    <div class=" col-md-8 form-group">
                        <input type="text" class="form-control" name="username" placeholder="Enter User Name" required value="<?php echo $row['user_name']?>">
                    </div>
                </div>
        <div class="row">
                <div class=" col-md-3 form-group">
                    First Name
        </div>
                    <div class=" col-md-8 form-group">
                <input type="text" class="form-control" name="fname" placeholder="First Name" required value="<?php echo $row['user_fname']?>"></div>
        </div>
		<div class="row">
                <div class=" col-md-3 form-group">
                    Last Name
        </div>
                    <div class=" col-md-8 form-group">		
                <input type="text" class="form-control" name="lname" placeholder="Last Name"  required value="<?php echo $row['user_lname']?>"></div>
                </div>
			
        <div class="row">
                <div class=" col-md-3 form-group">
                    Email
        </div>
                    <div class=" col-md-8 form-group">
        	<input type="email" class="form-control" name="email" placeholder="Enter your Email id" required value="<?php echo $row['user_email']?>">
        </div>
        </div>
                <div class="row">
                <div class=" col-md-3 form-group">
        <label>Gender</label>
                </div>
                    <div class=" col-md-8 form-group">
       <input name="gender" id="gender" type="radio" value="male" <?php echo ($row['user_gender'] == 'male') ?  "checked" : "" ;  ?>> Male 
                         <input name="gender" id="gender" type="radio" value="female" <?php echo ($row['user_gender']== 'female') ?  "checked" : "" ;  ?>> Female


                </div>
                </div>
                <div class="row">
                <div class=" col-md-3 form-group">
                    Choose Colour
        </div>
                    <div class=" col-md-8 form-group">
                        
                             <input type="checkbox" id="blue" name="color[]" value="Blue" <?php echo (@$color1['0'] == 'Blue' || @$color1['1'] == 'Blue' || @$color1['2'] == 'Blue') ?  "checked" : "" ;  ?>>
                        <label for="blue"> Blue </label><br>
                        <input type="checkbox" id="red" name="color[]" value="Red" <?php echo (@$color1['0'] == 'Red' || @$color1['1'] == 'Red' || @$color1['2'] == 'Red') ?  "checked" : "" ;  ?>>
                        <label for="red"> Red </label><br>
                        <input type="checkbox" id="green" name="color[]" value="Green" <?php echo (@$color1['0'] == 'Green' || @$color1['1'] == 'Green' || @$color1['2'] == 'Green') ?  "checked" : "" ;  ?>>
                        <label for="green"> Green </label><br>
                </div>
                </div>
		<div class="row">
                <div class=" col-md-3 form-group">
                    Password
        </div>
                    <div class=" col-md-8 form-group">
			
             <input type="password" class="form-control" name="password" id="password" placeholder="Password" required value="<?php echo $row['user_password']; ?>"></div>
                </div>
                <div class="row">
                <div class=" col-md-3 form-group">
                    Confirm Password
        </div>
                    <div class=" col-md-8 form-group">
				<input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm password" required value="<?php echo $row['user_password']; ?>"></div>
                </div>
<?php } ?>
                        </div>        	
        
      <?php 
//}?>
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" name="submit" >submit</button>
            

        </div>
          </div>
   
          </div>

        </div>

      
    </section>
     </form><!-- End Contact Section -->

  </main><!-- End #main -->

  <?php require_once 'footer.php'; ?>

</body>

</html>