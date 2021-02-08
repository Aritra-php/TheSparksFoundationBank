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

<!----------------start bootstrap code----------------------------->
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<title>Transation History</title>
</head>
<body>
<h5>Transation Histroy</h5>
<a href="registrationpage.php" class="btn btn-danger">Back To Registration Page</a>

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
<!-------------------End bootstrap code--------------------->

<!-------------------start php code for fetch data---------->
<?php
$sql="SELECT *FROM sbi";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
echo '<div class="jumbotron mt-5" style="border-radius:2px; background-color:bg-success">';
echo '<div class="container">';
echo '<div class="row text-center">';
while($row=mysqli_fetch_assoc($result))
{
echo '<div class="col-sm-4 mb-2">';
echo '<div class="card" style="width:20rem">';
echo '<div class="card-body">';
echo "Email:";
echo '<br>';
echo $row['rEmail'];
echo '<br>';
echo '<br>';
echo "Deposite:";
echo '<br>';
echo $row['rDeposite'];
echo '<br>';
echo '<br>';
echo "Date:";
echo '<br>';
echo $row['rDate'];
echo '<br>';
echo '<br>';
echo "Time:";
echo '<br>';
echo $row['rTime'];
echo '<br>';
echo '<br>';
echo '</div>';
echo '</div>';
echo '</div>';
}
echo '</div>';
echo '</div>';
echo '</div>';
}
?>
<!-------------------End php code for fetch data------------>