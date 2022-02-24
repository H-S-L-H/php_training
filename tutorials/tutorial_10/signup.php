<?php
session_start();

include 'connection.php';

if (isset($_POST['signup'])) {
   $user_name=$_POST['user_name'];
   $password=$_POST['password'];
   $email=$_POST['email'];
   $phone=$_POST['phone'];
   $age=$_POST['age'];

   if (empty($user_name) || empty($password) || empty($email) || empty($phone) || empty($age)) {
      $message[]='Please fill out all';
   } else {
      $insert="INSERT INTO users(user_name, password, email, phone, age) VALUES('$user_name', '$password', '$email', '$phone', '$age')";
      $upload=mysqli_query($conn,$insert);
      if ($upload) {
         $message[]='New user added successfully';
      } else {
         $message[]='Could not add the user';
      }
   }
};

if (isset($_GET['delete'])) {
   $id=$_GET['delete'];
   mysqli_query($conn, "DELETE FROM users WHERE id = $id");
   header('location:signup.php');
};

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="design.css">
  <title>Tutorial 8</title>
</head>
<body>
  

  <div class="container">
    <div class="form-sec">
        <h3>Signup</h3>
        <?php
        if (isset($message)) {
            foreach ($message as $message) {
                echo '<span class="message" style="color:red">'.$message.'</span>';
            }
        }
        ?>
        <form action="signup.php" method="post" enctype="multipart/form-data">
        <input type="text" placeholder="Enter username" name="user_name"><br><br>
        <input type="password" placeholder="Enter password" name="password"><br><br>
        <input type="email" placeholder="Enter email" name="email"><br><br>
        <input type="text" placeholder="Enter phone number" name="phone"><br><br>
        <input type="text" placeholder="Enter age" name="age"><br><br>
        <input type="submit" name="signup" value="Signup"><br><br>
        <div>
            <p>Already have an account? <a href="index.php">Login</a></p>
         </div>
        </form>
    </div><br><br>

    <?php $select=mysqli_query($conn, "SELECT * FROM users"); ?>
   

   <div>
      <table>
         <thead>
         <tr>
            <th>Username</th>
            <th>Password</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Age</th>
            <th></th>
         </tr>
         </thead>
         <?php while ($row=mysqli_fetch_assoc($select)) { ?>
         <tr>
            <td><?php echo $row['user_name']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td>
               <a class="edit-btn" href="update.php?edit=<?php echo $row['id']; ?>"> edit </a>
               <a class="delete-btn" href="signup.php?delete=<?php echo $row['id']; ?>"> delete </a>
            </td>
         </tr>
      <?php } ?>
      </table>
   </div>
  </div>
</body>
</html>