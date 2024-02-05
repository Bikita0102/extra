<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="about.css">
</head>
<body>
<script>
    function goBack(){
        window.history.back();
    }
</script>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $enquiry = htmlspecialchars($_POST["enquiry"]);

    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db1";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the database
    $sql = "INSERT INTO details (name, email, enquiry) VALUES ('$name', '$email', '$enquiry')";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    echo '<br><button onclick="goBack()" class="button button1">Go back to home page</button>';

    $conn->close();
} else {
    echo "Invalid request";
}
?>

</body>
</html>
