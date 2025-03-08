<?php
   /*https://github.com/Marah-Mahmoud/WebSecurity/blob/main/Ass_1.php*/ 
    $publicKey = file_get_contents("public_key.pem");
    $privateKey = file_get_contents("private_key.pem");

    if (isset($_POST['encrypt']))
    {
        $plaintext = $_POST['message'];
        openssl_public_encrypt($plaintext, $encrypted, $publicKey);
        $encryptedMessage = base64_encode($encrypted);
    }

    if (isset($_POST['decrypt'])) 
    {
        $encryptedInput = base64_decode($_POST['encryptedMessage']);
        openssl_private_decrypt($encryptedInput, $decryptedMessage, $privateKey);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSA Encryption in PHP</title>

</head>
<body>

    <h2>RSA Encryption & Decryption</h2>

    <form method="post">
        <label><strong>Enter a message to encrypt:</strong></label><br>
        <textarea name="message"><?php echo isset($plaintext) ? htmlspecialchars($plaintext) : ''; ?></textarea><br>
        <button type="submit" name="encrypt">Encrypt</button>
    </form>

    <?php if (!empty($encryptedMessage)) : ?>
        <h3>Encrypted Message:</h3>
        <textarea readonly><?php echo $encryptedMessage; ?></textarea>

        <form method="post">
            <input type="hidden" name="encryptedMessage" value="<?php echo $encryptedMessage; ?>">
            <button type="submit" name="decrypt">Decrypt</button>
        </form>
    <?php endif; ?>

    <?php if (!empty($decryptedMessage)) : ?>
        <h3>Decrypted Message:</h3>
        <textarea readonly><?php echo htmlspecialchars($decryptedMessage); ?></textarea>
    <?php endif; ?>

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
