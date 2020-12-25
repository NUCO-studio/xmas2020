<?php
$db = file(__DIR__ . "/db.txt");
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
    <ul>
        <?php foreach ($db as &$value) echo "<li>" . $value . "</li>\n"; ?>
    </ul>
</body>
</html>