<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>幻想郷プレゼント交換2020</title>
</head>
<body>
    <?php if(isset($_GET["e"])): ?>
    <p>エラー：違うものを入れてみてください</p>
    <?php endif; ?>
    <h1>幻想郷プレゼント交換2020</h1>
    <p>プレゼント交換しようね！</p>
    <h2>ルール</h2>
    <ul>
        <li>プレゼントを得るためには１つプレゼントを入れる必要があります</li>
        <li>「誰のプレゼントで」「それは何か」がわかるように書きましょう</li>
        <li>Twitterに投稿しちゃダメなものは入れてはいけません</li>
        <li>ボタンを連打するとぶっ壊れます。やめてね</li>
        <li>楽しもうね！</li>
    </ul>
    <h2>会場はこちら</h2>
    <form action="post.php" method="post">
        <input name="present" type="text" placeholder="例）ルナサの握手券">
        <input type="submit" value="　交換！　">
    </form>
    <h2>遊び方</h2>
    <ol>
        <li>テキストボックスに、あなたがプレゼント交換に出すプレゼントを入力します</li>
        <li>「交換！」を押します</li>
        <li>結果画面になります</li>
        <li>ツイートして自慢します</li>
        <li>気に入らなかったら別のプレゼントを入れてみます</li>
    </ol>
</body>
</html>