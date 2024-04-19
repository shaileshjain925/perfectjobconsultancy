<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Subscribing</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            width: 80%;
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
            text-align: center;
        }
        p {
            margin-bottom: 20px;
        }
        .unsubscribe-btn {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px;
            text-align: center;
            background-color: #dc3545;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }
        .unsubscribe-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Thank You for Subscribing!</h2>
        <p>We appreciate you joining our newsletter. Stay tuned for exciting updates and offers.</p>
        <p>If you wish to unsubscribe, click the button below:</p>
        <a href="<?= $website_url . "/unsubscribe?email=" . @$email ?>" class="unsubscribe-btn">Unsubscribe</a>
    </div>
</body>
</html>
