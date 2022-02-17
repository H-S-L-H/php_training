<?php
  $username="admin";
  $pwd="1234";

  session_start();

  if (isset($_SESSION['username'])) {
    echo "<h1>Welcome ".$_SESSION['username']."</h1><br>";
    echo "<a href='logout.php'><input type=button value=logout name=logout></a>";
  } else {
    if ($_POST['username']==$username && $_POST['pwd']==$pwd) {
      $_SESSION['username']=$username;
      echo "<script>location.href='index.php'</script>";
    } else {
      echo "<script>alert('username or password incorrect!')</script>";
      echo "<script>location.href='login.php'</script>";
    }
  }
?>