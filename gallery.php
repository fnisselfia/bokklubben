<?php
include("config.php"); 
include("header.php"); 

    $dirname = "uploadedfiles/";
    $images = glob($dirname."*.jpg");
    foreach($images as $image) {
    echo '<img src="'.$image.'" /><br />';
    }
?>

<a href="fileUpload.php">Upload files</a>

