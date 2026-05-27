<?php
session_start();

// 正規アクセスでなければ戻す
if (!isset($_SESSION['send'])) {
  header('Location: index.php');
  exit;
}

// セッション削除
unset($_SESSION['send']);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>送信完了</title>

  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <section class="section">
    <div class="inner">

      <div class="section-title">
        <h2>Thanks</h2>
      </div>

      <p class="summary">
        お問い合わせありがとうございました。<br>
        内容を確認後、ご連絡させていただきます。
      </p>

      <div style="text-align:center; margin-top:40px;">
        <a href="index.php" class="btn">
          TOPへ戻る
        </a>
      </div>

    </div>
  </section>

</body>

</html>