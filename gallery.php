<?php
    switch ($_GET["page"]) {
        case 'value':
            $contentpath = "\/resources\/images\/gallery\/value\/"
            break;
        default:
            http_response_code(404)
            exit();
    }
    $files = scandir($contentpath)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php foreach($files as $file): ?>
        <img src="<?= "$contentpath$file"; ?>"></img>
    <?php endforeach; ?>
</body>
</html>