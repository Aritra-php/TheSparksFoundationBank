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

<!----------------------start data insert code---------------------------->
<?php
if(isset($_REQUEST['rLoan']))
{
if(($_REQUEST['rName']=="")||($_REQUEST['rEmail']=="")||empty($_REQUEST['rDOB'])||empty($_REQUEST['rDOA'])||($_REQUEST['rPhno']=="")||($_REQUEST['rCity']=="")||($_REQUEST['rState']=="")||($_REQUEST['rAddress']=="")||empty($_REQUEST['rOcc'])||($_REQUEST['rPinCode']=="")||($_REQUEST['rAdharno']=="")||($_REQUEST['rPanno']=="")||($_REQUEST['rMonSalary']==""))
{
echo '<div class="alert alert-warning mt-3 text-center">Please Fill All The Fields</div>';
}
else
{
$rName=$_REQUEST['rName'];
$rEmail=$_REQUEST['rEmail'];
$rDOB=$_REQUEST['rDOB'];
$rDOA=$_REQUEST['rDOA'];
$rPhno=$_REQUEST['rPhno'];
$rCity=$_REQUEST['rCity'];
$rState=$_REQUEST['rState'];
$rAddress=$_REQUEST['rAddress'];
$rOcc=$_REQUEST['rOcc'];
$rPinCode=$_REQUEST['rPinCode'];
$rAdharno=$_REQUEST['rAdharno'];
$rPanno=$_REQUEST['rPanno'];
$rMonSalary=$_REQUEST['rMonSalary'];
$rFinalOcc=implode(',',$rOcc);
$sql="SELECT rEmail FROM vehicleloan WHERE rEmail='".$rEmail."'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==1)
{
echo '<div class="alert alert-warning mt-3 text-center">You Have Already Applied Using This Email
</div>';
}
else
{
$sql="INSERT INTO vehicleloan(rName,rEmail,rDOB,rDOA,rPhno,rCity,rState,rAddress,rOcc,rPinCode,rAdharno,rPanno,
rMonSalary)VALUES
('$rName','$rEmail','$rDOB','$rDOA','$rPhno','$rCity','$rState','$rAddress','$rFinalOcc',
'$rPinCode','$rAdharno','$rPanno','$rMonSalary')";
if(mysqli_query($conn,$sql))
{
echo '<div class="alert alert-success mt-3 text-center">Request For Loan Successfully Applied</div>';
}
else
{
echo '<div class="alert alert-warning mt-3 text-center">Unable To Apply For Loan</div>';
}
}
}
}
?>
<!-----------------------End data insert code--------------------------->

<!-----------------------start loan form--------------------------------->
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<title>VehicleLoanForm.com</title>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-sm-12">
    
<form action="" method="post" class="shadow-lg p-5">
<h5>Vehicle Loan Form</h5>

<label for="Name">Name</label>
<input type="text" placeholder="Type Your Name Here" name="rName" class="form-control">

<label for="Email">Email</label>
<input type="text" placeholder="Type Your Email Here" name="rEmail" class="form-control">

<label for="Date Of Birth">Date Of Birth</label>
<input type="date" name="rDOB" class="form-control">

<label for="Date Of Application">Date Of Application</label>
<input type="date" name="rDOA" class="form-control">

<label for="Phone Number">Phone Number</label>
<input type="text" placeholder="Type Your Phone Number Here" name="rPhno" class="form-control">

<label for="City">City</label>
<input type="text" placeholder="Type Your City Name Here" name="rCity" class="form-control">

<label for="State">State</label>
<select name="rState" class="form-control">
<option value=""></option>
<option value="West Bengal">West Bengal</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="Karnataka">Karnataka</option>
<option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Jharkand">Jharkand</option>
<option value="Bihar">Bihar</option>
<option value="Gujarat">Gujarat</option>
<option value="Delhi">Delhi</option>
</select>

<label for="Address">Address</label>
<input type="text" placeholder="Type Your Address Here" name="rAddress" class="form-control">

<label for="Occupation">Occupation</label>
Employee<input type="checkbox" name="rOcc[]" value="Employee">
Business<input type="checkbox" name="rOcc[]" value="Business">
Startup<input type="checkbox" name="rOcc[]" value="Startup">
HouseWife<input type="checkbox" name="rOcc[]" value="HouseWife">
  
<label for="Pincode">Pincode</label>
<input type="text" placeholder="Type Your Pincode Here" name="rPinCode" class="form-control">
  
<label for="Adhar Number">Adhar Number</label>
<input type="text" placeholder="Type Your Adhar Number Here" name="rAdharno" class="form-control">
  
<label for="Pan Number">Pan Number</label>
<input type="text" placeholder="Type Your Pan Number Here" name="rPanno" class="form-control">
  
<label for="Monthly Salary">Monthly Salary</label>
<input type="text" placeholder="Type Your Monthly Salary Here" name="rMonSalary" class="form-control">
<br/> 
<input type="submit" value="Request For Loan" name="rLoan" class="btn btn-info">
   
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
<!-------------------------End Loan Form------------------------------->