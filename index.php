<?php require_once 'header.php'; 
//Databse Connection file
include('dbconnection.php'); ?>
<?php
session_start();
if(!isset($_SESSION["username_admin"])){
//header("Location: login.php");
echo '<script type="text/javascript"> window.location = "login.php" </script>'; }
if(isset($_GET['delid']))
{
$rid=intval($_GET['delid']);
$sql=mysqli_query($con,"delete from multiple_users where user_id=$rid");
echo "<script>alert('Data deleted');</script>"; 
echo "<script>window.location.href = 'index.php'</script>";     
} 
?>
  <main id="main">
    <!-- ======= Contact Section ======= -->
    
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">
        <div class="row mt-5">   
            
          <div class="col-lg-12 mt-5 mt-lg-0">
              
              <script src="validations.js"></script>
              <section class="title">
        <h1>List of Registered Users</h1>
    </section>
<table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User Name</th>   
                        <th>First Name</th>  
                        <th>Last Name</th>  
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Favourite Colour</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                     <?php
$ret=mysqli_query($con,"select * from multiple_users");
$cnt=1;
$row=mysqli_num_rows($ret);
if($row>0){
while ($row=mysqli_fetch_array($ret)) {
$color_dis = $row['user_favcolor'];
$color1_dis = explode(',', $color_dis);
?>
<!--Fetch the Records -->
                    <tr>
                        <td><?php echo $cnt;?></td>
                        <td><?php echo $row['user_name']; ?></td>
                        <td><?php  echo $row['user_fname'];?></td>
                        <td> <?php  echo $row['user_lname'];?></td>
                        <td><?php  echo $row['user_email'];?></td>                        
                        <td><?php  echo $row['user_gender'];?></td>
                        <td> <?php  echo @$color1_dis[0] .' '. @$color1_dis[1].' ' .@$color1_dis[2];?></td>
                        
                        <td>
                            <a href="edit.php?editid=<?php echo htmlentities ($row['user_id']);?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="index.php?delid=<?php echo ($row['user_id']);?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Do you really want to Delete ?');"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                    <?php 
$cnt=$cnt+1;
} } else {?>
<tr>
    <th style="text-align:center; color:red;" colspan="6">No Record Found</th>
</tr>
<?php } ?>                 
                
                </tbody>
            </table>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <?php require_once 'footer.php'; ?>

</body>

</html>