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

<!------------------start php code for data insert----------------------->
<?php
if(isset($_POST['rReg']))
{
if(($_POST['rName']=="")||($_POST['rEmail']=="")||($_POST['rPass']=="")||($_POST['rConPass']=="")||empty($_POST['rGender'])||($_POST['rAddress']=="")||($_POST['rBranch']=="")||empty($_POST['rOcc'])||($_POST['rDeposite']=="")||empty($_POST['rDate'])||empty($_POST['rTime'])||empty($_FILES['rImage']))
{
echo '<div class="alert alert-success mt-3 text-center">Please Fill All The Fields</div>';
}
else
{
$rName=$_POST['rName'];
$rEmail=$_POST['rEmail'];
$rPass=$_POST['rPass'];
$rConPass=$_POST['rConPass'];
$rGender=$_POST['rGender'];
$rAddress=$_POST['rAddress'];
$rBranch=$_POST['rBranch'];
$rOcc=$_POST['rOcc'];
$rDeposite=$_POST['rDeposite'];
$rDate=$_POST['rDate'];
$rTime=$_POST['rTime'];
$rImage=$_FILES['rImage'];
$rFinalOcc=implode(',',$rOcc);
$iName=$_FILES['rImage']['name'];
$i_tmp_name=$_FILES['rImage']['tmp_name'];
$ext=explode(".",$iName);
$allowed=array("jpg","jpeg","png");
if(in_array($ext[1],$allowed))
{
move_uploaded_file($i_tmp_name,'images/'.$iName);
$sql="SELECT rEmail FROM sbi WHERE rEmail='".$rEmail."'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==1)
{
echo '<div class="alert alert-warning mt-3 text-center">Email ALerady Registred</div>';
}
else
{
if($rPass==$rConPass)
{
$sql="INSERT INTO sbi(rName,rEmail,rPass,rConPass,rGender,rAddress,rBranch,rOcc,rDeposite,rDate,rTime,rImage)VALUES(
'$rName',
'$rEmail','$rPass','$rConPass','$rGender','$rAddress','$rBranch','$rFinalOcc','$rDeposite',
'$rDate','$rTime','$iName')";
if(mysqli_query($conn,$sql))
{
echo '<div class="alert alert-success mt-3 text-center">Data Registered Successfully</div>';
}
}
else
{
echo '<div class="alert alert-warning mt-3 text-center">Password And Confirm Password Must Be Same</div>';
}
}
}
}
}
?>
<!-----------------End php code for data insert------------------>

<!-------------------start registration page------------------------>
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<title>Registrationpage</title>
</head>
<body>

<div class="conatiner">
<div class="row">
<div class="col-sm-12">

<form action="" method="POST" enctype="multipart/form-data" class="shadow-lg p-5">
<h5>Welcome To Registration Page</h5>

<div class="form-group">
<label for="Name">Name</label>
<input type="text" placeholder="Type Your Name Here" name="rName" class="form-control">
</div>

<div class="form-group">
<label for="Email">Email</label>
<input type="text" placeholder="Type your Email Here" name="rEmail" class="form-control">
</div>

<div class="form-group">
<label for="Password">Password</label>
<input type="password" placeholder="Type Your Password Here" name="rPass" class="form-control">
</div>

<div class="form-group">
<label for="Confirm Password">Confirm Password</label>
<input type="password" placeholder="Confirm Your Password Here" name="rConPass" class="form-control">
</div>

<div class="form-group">
<label for="Gender">Gender</label>
Male<input type="radio" name="rGender" value="Male" class="form-inline">
Female<input type="radio" name="rGender" value="Female" class="form-inline">
Others<input type="radio" name="rGender" value="Others" class="form-inline">
</div>

<div class="form-group">
<label for="Address">Address</label>
<input type="text" placeholder="Type Your Address Here" name="rAddress" class="form-control">
</div>

<div class="form-group">
<label for="Branch">Branch</label>
<input type="text" placeholder="Type your Branch Name Here" name="rBranch" class="form-control">
</div>

<div class="form-group">
<label for="Occupation">Occupation</label>
Employee<input type="checkbox" name="rOcc[]" value="Employee">
Student<input type="checkbox" name="rOcc[]" value="Student">
Business<input type="checkbox" name="rOcc[]" value="Business">
HouseWife<input type="checkbox" name="rOcc[]" value="HouseWife">
</div>

<div class="form-group">
<label for="Deposite">Deposite</label>
<input type="text" placeholder="Enter The Amount Of Money to Deposite" name="rDeposite" class="form-control">
</div>

<div class="form-group">
<label for="Date">Date</label>
<input type="date" name="rDate">
</div>

<div class="form-group">
<label for="Time">Time</label>
<input type="time" name="rTime">
</div>

Upload Your Image Here<input type="file" name="rImage">

<input type="submit" value="Register" name="rReg" class="btn btn-warning">
<a href="login.php" class="btn btn-info">Login</a>
<a href="transationpage.php" class="btn btn-info">Transation History</a>
</form>

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
<!-------------------End registration page-------------------------->