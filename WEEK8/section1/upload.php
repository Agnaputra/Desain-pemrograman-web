<?php
if(isset($_POST["submit"])){
    $targetdir = "uploads/"; // The directory where files will be stored
    $targetfile = $targetdir . basename($_FILES["myfile"]["name"]); // Full path for the file
    
    // Check if the uploads/ directory exists, if not, create it
    if (!is_dir($targetdir)) {
        mkdir($targetdir, 0777, true); // Create the directory with appropriate permissions
    }
    
    // Move the file from temporary location to the target directory
    if(move_uploaded_file($_FILES["myfile"]["tmp_name"], $targetfile)){
        echo "File berhasil diunggah."; // File uploaded successfully
    } else {
        echo "Gagal mengunggah file."; // Failed to upload file
    }
}
?>
