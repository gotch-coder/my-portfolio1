<?php

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$to = 'あなたのメールアドレス';
$subject = 'お問い合わせが届きました';

$body = "お問い合わせ内容\n\n";
$body .= "お名前：".$name."\n";
$body .= "メール：".$email."\n\n";
$body .= "内容：\n".$message;

$headers = "From: ".$email;

mb_language("Japanese");
mb_internal_encoding("UTF-8");

mb_send_mail($to, $subject, $body, $headers);

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
        内容を確認後、ご連絡いたします。
      </p>

    </div>
  </section>

</body>

</html>