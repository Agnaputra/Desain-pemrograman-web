<?php
if (isset($_FILES['file'])) {
    $errors = array();
    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    
    // Split file name to get the extension
    $file_name_parts = explode('.', $file_name);
    $file_ext = strtolower(end($file_name_parts));

    $extensions = array("pdf", "doc", "docx", "txt");

    // Validate file extension
    if (in_array($file_ext, $extensions) === false) {
        $errors[] = "Ekstensi file yang diizinkan adalah PDF, DOC, DOCX, atau TXT.";
    }

    // Validate file size
    if ($file_size > 2097152) {
        $errors[] = 'Ukuran file tidak boleh lebih dari 2 MB';
    }

    // Define the target directory
    $targetDirectory = __DIR__ . "/documents/";
    
    // Check if the directory exists, if not, create it
    if (!file_exists($targetDirectory)) {
        mkdir($targetDirectory, 0777, true);  // Create the directory if it doesn't exist
    }

    // Handle upload
    if (empty($errors) == true) {
        $targetFile = $targetDirectory . $file_name;
        if (move_uploaded_file($file_tmp, $targetFile)) {
            echo "File berhasil diunggah.";
        } else {
            echo "Gagal mengunggah file.";
        }
    } else {
        echo implode(" ", $errors);
    }
}
?>
