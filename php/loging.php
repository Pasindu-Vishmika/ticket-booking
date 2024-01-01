<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "VibeCine";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    $email = $_POST['email'];
    $password = md5($_POST["password"]); // Fixed variable name here
    $saveLogin = false;
    
    if(isset($_POST["remember"])){
        $saveLogin = true;
    }
    
    $sql = "SELECT * FROM userdata WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Login successful!";
    } else {
        echo "Invalid username or password";
    }


$conn->close();
?>