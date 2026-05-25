<?php
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

</html>