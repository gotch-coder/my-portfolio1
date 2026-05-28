<?php
session_start();

 // CSRFトークン生成
// $token = bin2hex(random_bytes(32));
// $_SESSION['token'] = $token;

// CSRFトークンチェック
if (
  !isset($_POST['token']) ||
  !isset($_SESSION['token']) ||
  $_POST['token'] !== $_SESSION['token']
) {

  exit('不正なアクセスです');

}



// フォームの値を取得

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

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

// 文字数チェック
if (mb_strlen($name) > 50) {
$errors['name'] = 'お名前は50文字以内で入力してください。';
}

if (mb_strlen($message) > 1000) {
$errors['message'] = 'お問い合わせ内容は1000文字以内で入力してください。';
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