<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial 5</title>
</head>
<body>
  <p>
    <?php
      $filename="HelloWorld.txt";
      $file=fopen($filename,"r");
      if ($file==false) {
        echo "Error in opening the file";
      }
      $filesize=filesize($filename);
      $filetext=fread($file,$filesize);
      echo $filetext;
    ?>
  </p>

  <p>
    <?php
    /**
     * Read document file
     *
     * @param $filename
     * @return text from file
     */
      function readDocument($filename)
      {
        $fileHandle = fopen($filename, "r");
        $line = @fread($fileHandle, filesize($filename));
        $lines = explode(chr(0x0D), $line);
        $outtext = "";
        foreach ($lines as $thisline) {
          $pos = strpos($thisline, chr(0x00));
          if (($pos !== false) || (strlen($thisline) == 0)) {
            echo " ";
          } else {
            $outtext .= $thisline . " ";
          }
        }
          $outtext = preg_replace("/[^a-zA-Z0-9\s\,\.\-\n\r\t@\/\_\(\)]/", "", $outtext);
          return $outtext;
      }
      $filename = "HelloWorld.doc";
      $fileread = readDocument($filename);
      echo $fileread;
    ?>
  </p>

  <table>
    <?php
      require "vendor/autoload.php";

      $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
      $spreadsheet = $reader->load("UserList.xlsx");
      $worksheet = $spreadsheet->getActiveSheet();
      
      foreach ($worksheet->getRowIterator() as $row) {
        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(false);
        echo "<tr>";
        foreach ($cellIterator as $cell) { 
          echo "<td>". $cell->getValue() ."</td>"; 
        }
        echo "</tr>";
      }
    ?>
  </table>

  <table>
    <?php
      require "vendor/autoload.php";

      $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
      $spreadsheet = $reader->load("UserCSV.csv");
      $worksheet = $spreadsheet->getActiveSheet();
      
      foreach ($worksheet->getRowIterator() as $row) {
        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(false);
        echo "<tr>";
        foreach ($cellIterator as $cell) {
          echo "<td>". $cell->getValue() ."</td>";
        }
        echo "</tr>";
    }
    ?>
  </table>
</body>
</html>
