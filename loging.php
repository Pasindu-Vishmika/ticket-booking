<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "VibeCine";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['username']) && isset($_POST['password'])){
        $name = $_POST['username'];
        $Password = md5($_POST["password"]);
        $saveLoging =   false;
        
        if(isset($_POST["remember"])){
            $saveLoging = true;
        }
        

        $sql = "SELECT * FROM your_table_name WHERE username='$name' AND password='$Password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            echo "Login successful!";
        } else {
        
            echo "Invalid username or password";
        }
    } else {
        echo "Please provide username and password";
    }

    $conn->close();
?>
