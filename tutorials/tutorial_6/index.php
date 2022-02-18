<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 6</title>
</head>
<body>
    <?php
    $folder = $_POST['folder'];
    $result = mkdir($folder);

    if ($result == '1') {
        $target_path = $folder .'/' . basename( $_FILES['uploadedfile']['name']);
        if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
        echo "The file ".  basename( $_FILES['uploadedfile']['name']). " has been uploaded";
        } else {
        echo "There was an error uploading the file, please try again!";
        }
    }
    ?>
    <form method="post" enctype="multipart/form-data">
        <label for="uploadedfile">Upload an image :</label><br>
        <input name="uploadedfile" type="file"><br><br>
        <label for="folder">Fill the folder name :</label><br>
        <input type="text"  id="folder" name="folder"><br><br>
        <input type="submit" name="test" value="Upload">
    </form>
</body>
</html>