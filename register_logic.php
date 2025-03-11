<?php
$host = "localhost";
$username = "root";
$password = "";
$database_name = "testdatabase";

$conn = new mysqli($host,$username,$password,$database_name);

if (isset($_POST["register"])) 
{
    $username_form = $_POST["username"];
    $email_form = $_POST["email"];
    $password_form = $_POST["password"];

    $hased_password = password_hash($password_form,PASSWORD_BCRYPT);

    $insert_sql = "INSERT INTO  users (username,email,password) VALUES('$username_form','$email_form','$hased_password')";
    $result = $conn->query($insert_sql);
    if ($result == true) 
    {
        echo "insertion done :)";
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