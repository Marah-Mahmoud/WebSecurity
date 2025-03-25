<?php
$host = "localhost";
$username = "root";
$password = "";
$database_name = "testdatabase";

$connection = new mysqli($host, $username, $password, $database_name);

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = $connection->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $sql->bind_param("ss", $username, $password);

    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows >= 1) {
        echo "Login data true";
    } else {
        echo "Login data false";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>    </body>

<style>
    .container 
    {
        background: rgba(255, 255, 255, 0.1);
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        width: 50%;
        max-width: 500px;
    }

    body 
    {
        font-family: 'Poppins', sans-serif;
        text-align: center;
        background: linear-gradient(to right, #8360c3, #2ebf91);
        color: white;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

</style>
</html>
