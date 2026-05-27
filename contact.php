<?php
session_start();

 // CSRFトークン生成
$token = bin2hex(random_bytes(32));
$_SESSION['token'] = $token;



// フォームの値を取得
$name = $_POST['name']??'';
$email = $_POST['email']??'';
$message = $_POST['message']??'';

// エラー保存用
$errors = [];

// 名前チェック
if ($name === '') {
$errors['name'] = 'お名前を入力してください。';
}

// メールチェック
if ($email === '') {
$errors['email'] = 'メールアドレスを入力してください。';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
$errors['email'] = '正しいメールアドレス形式で入力してください。';
}

// お問い合わせ内容チェック
if ($message === '') {
$errors['message'] = 'お問い合わせ内容を入力してください。';
}

// エラーがある場合
if (!empty($errors)) {

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>入力エラー</title>
</head>

<body>

  <h1>入力内容にエラーがあります</h1>

  <ul>

    <?php foreach($errors as $error): ?>
    <li><?php echo $error; ?></li>
    <?php endforeach; ?>

  </ul>

  <a href="index.php#contact">戻る</a>

</body>

</html>

<?php

?>