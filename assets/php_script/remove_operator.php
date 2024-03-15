<?php
include '../../render/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["operator"])) {
    $operatorId = $_POST["operator"];

    // Construct the SQL query to delete the operator
    $query = "DELETE FROM account WHERE id = $operatorId AND permission = 'operator'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $redirectUrl = "../../admin/web_content/operator.php";
        // Redirect back to the previous window using window.location
        echo '<script type="text/javascript">';
        echo 'window.location.href = "' . $redirectUrl . '";';
        echo '</script>';
    } else {
        echo "Error removing operator: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>
