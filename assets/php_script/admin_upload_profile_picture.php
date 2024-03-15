<?php
include '../../render/connection.php';

session_start();
$username = $_SESSION['username'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $targetDirectory = "../../assets/image/profile_picture/";
    $filename = $username . "." . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
    $targetFile = $targetDirectory . $filename;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["file"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        
    } else {
        // Delete existing file
        $query = "SELECT picture FROM account WHERE username = '$username'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $existingPicture = $row['picture'];
        if ($existingPicture && file_exists($targetDirectory . $existingPicture)) {
            unlink($targetDirectory . $existingPicture);
        }

        // Upload new file
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
            // Update the database with the filename
            $query = "UPDATE account SET picture = '$filename' WHERE username = '$username'";
            $result = mysqli_query($conn, $query);
        }
    }
    $redirectUrl = "../../admin/web_content/account_settings.php";
    // Redirect back to the previous window using window.location
    echo '<script type="text/javascript">';
    echo 'window.location.href = "' . $redirectUrl . '";';
    echo '</script>';
}
?>
