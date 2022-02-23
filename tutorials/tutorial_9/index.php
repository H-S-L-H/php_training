<?php
require_once("C:/Apache24/htdocs/tutorials/tutorial_9/phpChart_Lite/conf.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tutorial 9</title>
</head>
<body>
<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="123456789";
$dbname="login_sample_db";

$conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
$select=mysqli_query($conn, "SELECT * FROM users");
while ($row=mysqli_fetch_assoc($select)) {
  $user_name[]=$row['user_name'];
  $password[]=$row['password'];
  $email[]=$row['email'];
  $phone[]=$row['phone'];
  $age[]=$row['age'];
}

$s1 = array(json_encode(intval($age[0])),json_encode(intval($age[1])),json_encode(intval($age[2])));

$pc = new C_PhpChartX(array($s1),'user_chart');
$pc->set_title(array('text'=>'User Chart'));
$pc->set_animate(true);
$pc->draw();
  
?>

</body>
</html>