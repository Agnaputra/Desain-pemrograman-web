<?php
if (isset($_FILES['file'])) {
    $errors = array();
    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];

    // Check for upload errors
    if ($_FILES['file']['error'] !== UPLOAD_ERR_OK) {
        echo "Error during upload: " . $_FILES['file']['error'];
        exit;
    }

    // Split file name to get the extension
    $file_name_parts = explode('.', $file_name);
    $file_ext = strtolower(end($file_name_parts));

    // Allowed file extensions
    $allowedExtensions = array("pdf", "doc", "docx", "txt");

    // Validate file extension
    if (!in_array($file_ext, $allowedExtensions)) {
        $errors[] = "Ekstensi file yang diizinkan adalah PDF, DOC, DOCX, atau TXT.";
    }

    // Validate file size (limit: 2MB)
    if ($file_size > 2097152) {
        $errors[] = 'Ukuran file tidak boleh lebih dari 2 MB.';
    }

    // Define the target directory
    $targetDirectory = __DIR__ . "/documents/";

    // Check if the directory exists, if not, create it
    if (!file_exists($targetDirectory)) {
        mkdir($targetDirectory, 0777, true);
    }

    // Handle upload
    if (empty($errors) == true) {
        $targetFile = $targetDirectory . basename($file_name);
        if (move_uploaded_file($file_tmp, $targetFile)) {
            echo "File berhasil diunggah.";
        } else {
            echo "Gagal mengunggah file.";
        }
    } else {
        echo implode("<br>", $errors);
    }
}
?>
