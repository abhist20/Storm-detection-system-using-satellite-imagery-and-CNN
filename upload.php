<?php
$target_dir = "D:\home\site\wwwroot\uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.\n";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.\n";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 838860800) {
    echo "Sorry, your file is too large.\n";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileTyre != "pb" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.\n";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo nl2br("Sorry, your file was not uploaded.\n");
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.\n";
    
    } else {
        echo nl2br("Sorry, there was an error uploading your file.\n");
    }
}
echo <strong>nl2br("Please go back to last Page and press predict")</strong>;
?>
