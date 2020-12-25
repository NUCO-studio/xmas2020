<?php
error_reporting(E_ALL);
$LF = fopen(__DIR__ . "/db.lock","w");
flock($LF,LOCK_SH);
$db = file_get_contents(__DIR__ . "/db.json");
$db = json_decode($db,true);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="shortcut icon" href="favicon.ico">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN MODE</title>
</head>
<body>
    <ol>
        <?php foreach ($db as &$value) echo "<li>" . $value . "</li>\n"; ?>
    </ol>
</body>
</html>