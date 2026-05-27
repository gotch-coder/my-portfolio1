<?php
session_start();


//  CSRFトークンチェック
if (
!isset($_POST['token']) ||
!isset($_SESSION['token']) ||
!hash_equals($_SESSION['token'], $_POST['token'])
) {
exit('不正なアクセスです');
}

//  フォーム値を取得
$token = $_POST['token'] ?? '';
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

$errors = [];

if ($name === '') {
$errors['name'] = 'お名前を入力してください';
}

if ($email === '') {
$errors['email'] = 'メールアドレスを入力してください';
}

if ($message === '') {
$errors['message'] = 'お問い合わせ内容を入力してください';
}

if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
$errors['email'] = '正しいメール形式で入力してください';
}

?>



<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>確認画面</title>
</head>

<body>

  <h1>確認画面</h1>

  <!-- ここがエラー表示 -->
  <?php if (!empty($errors)): ?>

  <ul>

    <?php foreach ($errors as $error): ?>

    <li>
      <?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
    </li>

    <?php endforeach; ?>

  </ul>

  <?php endif; ?>

  <!-- エラーがない時だけ表示 -->
  <?php if (empty($errors)): ?>

  <p>
    お名前：
    <?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>
  </p>

  <p>
    メール：
    <?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>
  </p>

  <p>
    内容：
    <?php echo nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8')); ?>
  </p>

  <!-- 戻る -->
  <form action="contact.php" method="post">

    <input type="hidden" name="token" value="<?php echo htmlspecialchars($token, ENT_QUOTES, 'UTF-8'); ?>">

    <input type="hidden" name="name" value="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>">

    <input type="hidden" name="email" value="<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>">

    <input type="hidden" name="message" value="<?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?>">

    <button type="submit">戻る</button>

  </form>


  <!-- 送信 -->

  <form action="send.php" method="post">

    <input type="hidden" name="token" value="<?php echo htmlspecialchars($token, ENT_QUOTES, 'UTF-8'); ?>">

    <input type="hidden" name="name" value="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>">

    <input type="hidden" name="email" value="<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>">

    <input type="hidden" name="message" value="<?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?>">

    <button type="submit" name="send" class="contact__btn">
      送信する
    </button>

  </form>


  <?php endif; ?>

</body>

</html>