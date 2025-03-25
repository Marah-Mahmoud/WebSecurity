<?php
$username = htmlspecialchars($_GET["username"]);
$host = "localhost";
$username_db = "root";
$password = "";
$database_name = "testdatabase";

$conn = new mysqli($host,$username_db,$password,$database_name);

$sql_select = "SELECT * FROM comments";
$sql_edit = $conn->prepare($sql_select);
$sql_edit->execute();
$result = $sql_edit->get_result();

// عرض البيانات بطريقة آمنة لمنع XSS
while ($row = $result->fetch_assoc()) {
    echo htmlspecialchars($row["comment_text"], ENT_QUOTES, 'UTF-8') . "<br>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
</head>
<body>
    <h1> Hello <?php echo $username; ?> in home page</h1>
    <form action="add_comment_logic.php" method="post">
        <textarea name = "comment" >

        </textarea>
        <button type = "submit" name = "add_comment" value = "add comment"> Add comment </button>

    </form>


</body>
<style>
        .container {
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

                    textarea, input 
                    {
                        width: 90%;
                        padding: 12px;
                        border: none;
                        border-radius: 8px;
                        margin-top: 10px;
                        font-size: 16px;
                        background: rgba(255, 255, 255, 0.2);
                        color: white;
                        outline: none;
                        transition: 0.3s;
                    }

                    textarea:focus, input:focus 
                    {
                        background: rgba(255, 255, 255, 0.3);
                    }

                    button 
                    {
                        padding: 12px 20px;
                        background: #ff6b81;
                        color: white;
                        border: none;
                        border-radius: 8px;
                        cursor: pointer;
                        font-size: 16px;
                        transition: 0.3s;
                        margin-top: 10px;
                    }

                    button:hover 
                    {
                        background: #ff4757;
                        transform: scale(1.05);
                    }
</style>
</html>