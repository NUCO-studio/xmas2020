<?php
error_reporting(E_ALL);
session_start();
if (
    empty($_POST["present"]) ||
    $_POST["present"] == $_SESSION["priv"]
) {
    header("Location: index.php?e=true");
    exit();
}

$LF = fopen(__DIR__ . "db.lock","w");
flock($LF,LOCK_SH);

try {
    $db = file_get_contents(__DIR__ . "db.json");
    $db = json_decode($db,true);
} catch (\Throwable $th) {
    $db = ["チルノの肩たたたき券"];
}

shuffle($db);
$get = $db[0];
$db[] = str_replace("<","＜",$_POST["present"]);

flock($LF,LOCK_EX);
file_put_contents(__DIR__ . "db.json",json_encode($db));
flock($LF,LOCK_UN);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>結果 | 幻想郷クリスマス2020</title>
</head>
<body>
    <h1>幻想郷クリスマス2020</h1>
    <h2>結果</h2>
    <?php echo $get; ?>
    <p>「<?php echo $get; ?>」をもらいました！</p>
    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-text="<?php echo "プレゼント交換で「 $get 」をもらいました！"; ?>" data-url="http://c.nucosen.live/" data-hashtags="幻想郷プレゼント交換2020" data-related="Poltergeist_L" data-lang="ja" data-dnt="true" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    <form action="/index.php" method="get"><input type="submit" value="　もう一度やりなおす　"></form>
</body>
</html>