<!----------------start php code for database connection------------>
<?php
$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="bankingsystem";
$conn=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
if(!$conn)
{
die("Connection Failed");
}
?>
<!----------------End php code for database connection-------------->

<!---------------start php code for profile form---------------->
<?php
session_start();
if(isset($_SESSION['islogin']))
{
$rEmail=$_SESSION['rEmail'];
}
else
{
echo '<script>location.href="login.php"</script>';
}
$sql="SELECT *FROM sbi WHERE rEmail='".$rEmail."'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$rName=$row['rName'];
$rGender=$row['rGender'];
$rAddress=$row['rAddress'];
$rBranch=$row['rBranch'];
$rOcc=$row['rOcc'];
$rDeposite=$row['rDeposite'];
?>
<!---------------End php code for profile form------------------>

<!-----------------start profile form------------------------->
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<title>UserProfile.com</title>
</head>
<body>

<?php
if(isset($_SESSION['islogin']))
{
$rEmail=$_SESSION['rEmail'];
}
else
{
echo '<script>location.href="login.php"</script>';
}
$sql="SELECT *FROM sbi WHERE rEmail='".$rEmail."'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$rName=$row['rName'];
$rGender=$row['rGender'];
$rAddress=$row['rAddress'];
$rBranch=$row['rBranch'];
$rOcc=$row['rOcc'];
$rDeposite=$row['rDeposite'];
$rImage=$row['rImage'];
?>

<div class="container">
<div class="row">
<div class="col-sm-15">

<form action="" method="POST" class="shadow-lg p-5">

<h5>Welcome To Your Profile</h5>

<label for="Name">Name</label>
<input type="text" name="rName" class="form-control"
value="<?php echo $rName; ?>">

<label for="Email">Email</label>
<input type="text" name="rEmail" class="form-control"
value="<?php if(isset($rEmail)) {echo $rEmail;} ?>">

<label for="Gender">Gender</label>
<input type="text" name="rGender" class="form-control"
value="<?php echo $rGender;?>">

<label for="Address">Address</label>
<input type="text" name="rAddress" class="form-control"
value="<?php echo $rAddress; ?>">

<label for="Branch">Branch</label>
<input type="text" name="rBranch" class="form-control"
value="<?php echo $rBranch; ?>">

<label for="Occupation">Occupation</label>
<input type="text" name="rOcc[]" class="form-control"
value="<?php echo $rOcc; ?>">

<label for="Deposite">Deposite</label>
<input type="text" name="rDeposite" class="form-control"
value="<?php echo $rDeposite; ?>">

<img src="<?php if(isset($rImage)) {echo "images/".$row['rImage'];}?>" style="border-radius:150px; width:100px ; height:100px;">
<a href="changepass.php" class="btn btn-warning">Change Password</a>
<input type="submit" value="Update" name="rUpdate" class="btn btn-danger">
<input type="hidden" name="Srno" value="<?php if(isset($row['Srno'])) {echo $row['Srno'];} ?>">

<label for="DepositeMoney">DepositeMoney</label>
<input type="text" placeholder="Enter The Amount For Deposite" name="rDeposite">
<input type="submit" value="Deposite Money" name="aDeposite" class="btn btn-warning">

<label for="WithdrawMoney">WithdrawMoney</label>
<input type="text" placeholder="Enter The Amount For Withdraw" name="rWithdraw">
<input type="submit" value="Withdraw" name="aWithdraw" class="btn btn-info">


</form>
<a href="logout.php" class="btn btn-info">Logout</a>

</div>
</div>    
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
-->
</body>
</html>
<!-----------------End Profile Form-------------------------->

<!-----------------start php code for update button------------->
<?php
if(isset($_REQUEST['rUpdate']))
{
if(($_REQUEST['rName']=="")||($_REQUEST['rEmail']=="")||($_REQUEST['rAddress']=="")||($_REQUEST['rBranch']==""))
{
echo '<div class="alert alert-warning mt-3 text-center">Please Fill All The Fields</div>';
}
else
{
$Srno=$_REQUEST['Srno'];
$rName=$_REQUEST['rName'];
$rEmail=$_REQUEST['rEmail'];
$rAddress=$_REQUEST['rAddress'];
$rBranch=$_REQUEST['rBranch'];
$sql="UPDATE sbi SET rName='$rName',rEmail='$rEmail',rAddress='$rAddress',rBranch='$rBranch' 
WHERE Srno='".$Srno."'";
if(mysqli_query($conn,$sql))
{
echo '<div class="alert alert-success mt-3 text-center">Data Updated Successfully</div>';
}
else
{
echo '<div class="alert alert-warning mt-3 text-center">Unable To Update Data</div>';
}
}
}
?>
<!-----------------End php code for update button---------------> 

<!----------------start php code for deposite money--------------->
<?php
if(isset($_REQUEST['aDeposite']))
{
if(($_REQUEST['rDeposite']==""))
{
echo "Please Fill All The Fields";
}
else
{
$a=$_REQUEST['rDeposite']+$_REQUEST['rDeposite'];
$sql="UPDATE sbi SET  rDeposite='".$a."' WHERE rEmail='".$rEmail."'" ;
if(mysqli_query($conn,$sql))
{
echo '<div class="alert alert-success mt-3 text-center">Money Deposite successfull</div>';
}
else
{
echo '<div class="alert alert-warning mt-3 text-center">Unable To Deposite Money</div>';
}
}
}
?>
<!----------------End php code for deposite money----------------->

<!----------------start php code for withdraw money--------------->
<?php
if(isset($_REQUEST['aWithdraw']))
{
if(($_REQUEST['rWithdraw']==""))
{
echo '<div class="alert alert-success mt-3 text-center">Please Fill All The Fields</div>';
}
else
{
$b=$_REQUEST['rWithdraw'] - $_REQUEST['rDeposite'];
$sql="UPDATE sbi SET  rDeposite='".$b."' WHERE rEmail='".$rEmail."'" ;
if(mysqli_query($conn,$sql))
{
echo '<div class="alert alert-success mt-3 text-center">Money Withdrawn successfull</div>';
}
else
{
echo '<div class="alert alert-warning mt-3 text-center">Unable To withdraw Money</div>';
}
}
}
?>
<!----------------End php code for withdraw money----------------->
