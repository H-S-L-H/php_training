<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial 7</title>
</head>
<body>
  <form action="" method="post" align="center">
    <h2>Create Your QRCODE</h2>
    <label for="name">Enter your name : </label>
    <input type="text" name="name" id="name"><br><br>
    <label for="text">Enter your qr text : </label>
    <input type="text" name="text" id="text"><br><br>
    <input type="submit" name="sub" value="Generate QRCODE">
  </form>
  <?php 
  require_once "phpqrcode/qrlib.php";
  
  if (isset($_POST['sub'])) {
    $path='img/';
    $file=$path.$_POST['name'].'.png';
    $text=$_POST['text'];
    echo '<br><br><center>'.$_POST['name'].", your qr code is here</center>";
  ?>
  <center><img src="img/<?php echo $_POST['name']?>.png" alt="<?php $_POST['name']?>"></center>
  <?php
    Qrcode::png($text,$file);
  }
  ?>
</body>
</html>