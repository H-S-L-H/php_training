<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial 1</title>
  <style>
    .container {
      width: 400px;
      margin: 0 auto;
      background-color: grey;
      padding: 40px 0px;
    }

    table{
      width: 270px;
      border: 2px solid  black;
      margin: 0 auto;
    }

    .td1{
      height: 30px;
      width: 30px;
      background-color: white;
    }

    .td2{
      height: 30px;
      width: 30px;
      background-color: black;
    }
  </style>
</head>
<body>
  <div class="container">
    <table cellspacing="0px" cellpadding="0px">
      <?php
          for ($i=1; $i<=8; $i++) {
            echo "<tr>";
            for ($j=1; $j<=8; $j++) {
              $total=$i+$j;
              if ($total%2==0) {
                echo "<td class='td1'> </td>";
              } else {
                echo "<td class='td2'> </td>";
              }
            }
            echo "</tr>";
          }
      ?>
    </table>
  </div>
</body>
</html>