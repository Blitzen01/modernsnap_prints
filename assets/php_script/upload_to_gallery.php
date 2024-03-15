<?php
include '../../render/connection.php';
require_once '../../vendor/autoload.php'; // Include TinyPNG library

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if files were uploaded
    if (!empty($_FILES["images"]["name"][0])) {
        // Specify the directory to store uploaded files
        $uploadDirectory = '../../assets/image/gallery/';
        
        // Initialize TinyPNG client with your API key
        $apiKey = 'Ny8gG0nGvZM4q3Kg57DyxCKkPF2zvSxW';
        $client = \Tinify\Tinify::setKey($apiKey);

        // Loop through each uploaded file
        for ($i = 0; $i < count($_FILES["images"]["name"]); $i++) {
            $fileName = $_FILES["images"]["name"][$i];
            $fileTmpName = $_FILES["images"]["tmp_name"][$i];
            $fileSize = $_FILES["images"]["size"][$i];
            $fileError = $_FILES["images"]["error"][$i];

            // Check if file is an image
            $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $allowedTypes = array("jpg", "jpeg", "png", "gif");
            if (!in_array($fileType, $allowedTypes)) {
                echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
                continue; // Skip processing this file
            }

            // Check if file size is within limits (adjust as needed)
            $maxFileSize = 5 * 1024 * 1024; // 5 MB
            if ($fileSize > $maxFileSize) {
                echo "Sorry, your file is too large.";
                continue; // Skip processing this file
            }

            // Compress the image using TinyPNG
            try {
                $source = \Tinify\fromFile($fileTmpName);
                $source->toFile($fileTmpName);
            } catch (\Tinify\Exception $e) {
                echo "Error compressing image: " . $e->getMessage();
                continue; // Skip processing this file
            }

            // Generate a unique name for the file to prevent overwriting
            $uniqueFileName = uniqid("image_") . "." . $fileType;

            // Move the compressed file to the destination directory
            if (move_uploaded_file($fileTmpName, $uploadDirectory . $uniqueFileName)) {
                // File uploaded successfully, insert data into database
                $serviceName = $_POST["upload_select_service"];
                $sql = "INSERT INTO gallery (service, file_name) VALUES ('$serviceName', '$uniqueFileName')";

                if ($conn->query($sql) === TRUE) {
                    echo "New record inserted successfully.";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.<br>";
            }
        }

        // Close the database connection
        $conn->close();
    } else {
        echo "No files were uploaded.";
    }
}
?>
