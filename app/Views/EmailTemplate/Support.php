<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Support Inquiry</title>
</head>
<body>
    <table cellpadding='0' cellspacing='0' border='0' width='100%' bgcolor='#f0f0f0'>
        <tr>
            <td>
                <table align='center' cellpadding='0' cellspacing='0' border='0' width='600' style='border-collapse: collapse;'>
                    <!-- Header -->
                    <tr>
                        <td bgcolor='#3498db' style='padding: 20px; color: #fff; font-size: 24px; font-weight: bold; text-align: center;'>
                            Support Inquiry: <?=@$name?>
                        </td>
                    </tr>
                    <!-- Content -->
                    <tr>
                        <td b gcolor='#ecf0f1' style='padding: 20px; font-size: 16px; line-height: 1.6;'>
                            <p><strong>Name:</strong> <?=@$name?></p>
                            <p><strong>Email:</strong> <?=@$email?></p>
                            <p><strong>Mobile:</strong> <?=@$mobile?></p>
                            <p><strong>Message:</strong> <?=@$message?></p>
                            <a href="<?=@$website_url.'/'.@$attachment_url?>" download>
                                <button>Download Attachment</button>
                            </a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>