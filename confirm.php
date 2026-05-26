<!-- <?php
$name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
$message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>確認画面</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <section class="section">
    <div class="inner">

      <div class="section-title">
        <h2>Confirm</h2>
      </div>

      <div class="confirm-box">

        <div class="confirm-item">
          <h3>お名前</h3>
          <p><?php echo nl2br($name); ?></p>
        </div>

        <div class="confirm-item">
          <h3>メールアドレス</h3>
          <p><?php echo nl2br($email); ?></p>
        </div>

        <div class="confirm-item">
          <h3>お問い合わせ内容</h3>
          <p><?php echo nl2br($message); ?></p>
        </div>

        <form action="send.php" method="post">

          <input type="hidden" name="name" value="<?php echo $name; ?>">
          <input type="hidden" name="email" value="<?php echo $email; ?>">
          <input type="hidden" name="message" value="<?php echo $message; ?>">

          <div class="confirm-btns">

            <button type="button" onclick="history.back()" class="back-btn">
              戻る
            </button>

            <button type="submit" class="send-btn">
              送信する
            </button>

          </div>

        </form>

      </div>

    </div>
  </section>

</body>

</html> --><?php

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

<!-- <?php if (!empty($errors)): ?>

<ul class="error-list">
  <?php foreach ($errors as $error): ?>
  <li><?php echo $error; ?></li>
  <?php endforeach; ?>
</ul>

<?php endif; ?> -->


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
      <?php echo htmlspecialchars($error, ENT_QUOTES); ?>
    </li>

    <?php endforeach; ?>

  </ul>

  <?php endif; ?>



  <!-- エラーがない時だけ表示 -->
  <?php if (empty($errors)): ?>

  <p>
    お名前：
    <?php echo htmlspecialchars($name, ENT_QUOTES); ?>
  </p>

  <p>
    メール：
    <?php echo htmlspecialchars($email, ENT_QUOTES); ?>
  </p>

  <p>
    内容：
    <?php echo nl2br(htmlspecialchars($message, ENT_QUOTES)); ?>
  </p>

  <!-- 戻る -->
  <form action="contact.php" method="post">

    <input type="hidden" name="name" value="<?php echo htmlspecialchars($name, ENT_QUOTES); ?>">

    <input type="hidden" name="email" value="<?php echo htmlspecialchars($email, ENT_QUOTES); ?>">

    <input type="hidden" name="message" value="<?php echo htmlspecialchars($message, ENT_QUOTES); ?>">

    <button type="submit">戻る</button>
  </form>

  <!-- 送信 -->

  <form action="send.php" method="post">

    <input type="hidden" name="name" value="<?php echo htmlspecialchars($name, ENT_QUOTES); ?>">

    <input type="hidden" name="email" value="<?php echo htmlspecialchars($email, ENT_QUOTES); ?>">

    <input type="hidden" name="message" value="<?php echo htmlspecialchars($message, ENT_QUOTES); ?>">

    <!-- <button type="submit">送信する</button> -->
    <button type="submit" name="send" class="contact__btn">
      送信する
    </button>

  </form>


  <?php endif; ?>

</body>

</html>