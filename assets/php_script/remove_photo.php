<?php
include '../../render/connection.php';
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the file name from the form
        if(isset($_POST['file_name'])){
            $file_name = $_POST['file_name']; // Assuming you are passing the file name from your HTML form
            
            // Delete record from the database
            $sql_delete = "DELETE FROM gallery WHERE file_name = '$file_name'";
            if (mysqli_query($conn, $sql_delete)) {
                // Delete the image file from the server
                $file_path = "../../assets/image/gallery/" . $file_name; // Adjust the file path based on your directory structure
                if (file_exists($file_path)) {
                    unlink($file_path);
                    $redirectUrl = "../../admin/web_content/gallery.php";
                    // Redirect back to the previous window using window.location
                    echo '<script type="text/javascript">';
                    echo 'window.location.href = "' . $redirectUrl . '";';
                    echo '</script>';
                } else {
                    echo "File not found.";
                }
            } else {
                echo "Error deleting record: " . mysqli_error($conn);
            }
        }
        else{
            echo "File name not provided.";
        }
    }
?>
