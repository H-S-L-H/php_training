<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial 3</title>
  <style>
    h1 {
      text-align: center;
    }
  </style>
</head>
<body>
  <?php
  /**
     * Show the Current Age of User
     *
     * @param $dob
     * @return "Current Age of User"
   */
    function calculateAge($dob) 
    {
      $birthdate=new DateTime($dob);
      $currentdate=new DateTime(date('m.d.y'));
      if ($birthdate>$currentdate) {
        return "You are not born.";
      }
      $diff=$currentdate->diff($birthdate);
      return "Your Current Age is : ".$diff->y. "Years, ".$diff->m. "Months, ".$diff->d. "Days";
    }
  ?>
  <h1>Caculate Your Current Age</h1>
  <form action="#">
    <label for="dob">Date of Birth</label>
    <input type="date" name="dob" id="dob">
    <input type="submit" value="Calculate Age">
  </form>
  
  <?php if (isset($_GET['dob']) && $_GET['dob']!='') {?>
    <div>
      <?php echo calculateAge($_GET['dob']);?>
    </div>
  <?php } ?>
</body>
</html>