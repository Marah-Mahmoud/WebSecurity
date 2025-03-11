<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
        <form action="register_logic.php" method="post">
            <label>username</label>
            <input type = "text" name = "username">
            <br>
            <br>
            <label>email</label>
            <input type = "email" name = "email">
            <br>
            <br>
            <label>password</label>
            <input type = "password" name = "password">
            <br>
            <br>
            <button type = "submit" name = "register" value = "register"> Register </button>
        </form>


    </center>
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