<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "VibeCine";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['agree'])){
        $name = $_POST['username'];
        $email = $_POST['email'];
        $Password = md5($_POST["password"]); 
        $agree = $_POST['agree']

        $sql = "INSERT INTO userdata (username, email, password,terms) VALUES ('$name', '$email', '$Password' , '$agree')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        header("Location: register.html?error=wrong");
    }

    $conn->close();
?>
