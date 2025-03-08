<?php
    
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
    <style>
        body 
        { 
            font-family: Arial, sans-serif; 
            margin: 50px; 
            text-align: center; 
        }
        textarea 
        { 
            width: 80%; 
            height: 100px; 
            margin: 10px; 
        }
        button 
        { 
            padding: 10px 20px; 
            margin: 10px; 
            font-size: 16px; 
        }
    </style>
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
</html>
