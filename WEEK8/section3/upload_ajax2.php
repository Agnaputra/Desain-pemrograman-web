<?php
if (isset($_FILES['files'])) {
    $errors = array();
    $totalFiles = count($_FILES['files']['name']);  // Get the number of files uploaded

    $allowedExtensions = array("jpg", "jpeg", "png", "gif");

    // Define the target directory
    $targetDirectory = __DIR__ . "/images/";

    // Check if the directory exists, if not, create it
    if (!file_exists($targetDirectory)) {
        mkdir($targetDirectory, 0777, true);  // Create the directory if it doesn't exist
    }

    // Loop through each file
    for ($i = 0; $i < $totalFiles; $i++) {
        $file_name = $_FILES['files']['name'][$i];
        $file_size = $_FILES['files']['size'][$i];
        $file_tmp = $_FILES['files']['tmp_name'][$i];
        
        // Split file name to get the extension
        $file_name_parts = explode('.', $file_name);
        $file_ext = strtolower(end($file_name_parts));

        // Validate file extension
        if (!in_array($file_ext, $allowedExtensions)) {
            $errors[] = "Ekstensi file yang diizinkan hanya JPG, JPEG, PNG, atau GIF untuk file $file_name.";
            continue;
        }

        // Validate file size (limit: 2MB)
        if ($file_size > 2097152) {
            $errors[] = "Ukuran file $file_name tidak boleh lebih dari 2 MB.";
            continue;
        }

        // Construct the target file path
        $targetFile = $targetDirectory . $file_name;

        // Move the file to the target directory
        if (move_uploaded_file($file_tmp, $targetFile)) {
            echo "File $file_name berhasil diunggah.<br>";
        } else {
            echo "Gagal mengunggah file $file_name.<br>";
        }
    }

    // If there are any errors, display them
    if (!empty($errors)) {
        echo implode("<br>", $errors);
    }
}
?>
