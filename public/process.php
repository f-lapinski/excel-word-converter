<?php
// process.php - Handles Excel file upload

// Enable error reporting (for debugging)
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["excel_file"])) {
    $file = $_FILES["excel_file"];

    // Check for errors
    if ($file["error"] !== UPLOAD_ERR_OK) {
        die("Error uploading file.");
    }

    // Validate file type (only allow Excel files)
    $allowedTypes = ["application/vnd.ms-excel", "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"];
    if (!in_array($file["type"], $allowedTypes)) {
        die("Invalid file type. Please upload an Excel file.");
    }

    // Create 'uploads/' directory if not exists
    $uploadDir = __DIR__ . "/../uploads/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Move uploaded file to uploads/ directory
    $filePath = $uploadDir . basename($file["name"]);
    if (!move_uploaded_file($file["tmp_name"], $filePath)) {
        die("Failed to save uploaded file.");
    }

    // Redirect to the next step (for processing)
    header("Location: generate.php?file=" . urlencode(basename($file["name"])));
    exit();
} else {
    die("Invalid request.");
}
?>
