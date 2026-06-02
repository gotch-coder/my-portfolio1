<?php
session_start();

// confirm.php を経由していない場合は戻す
if (!isset($_POST['send'])) {
  header('Location: index.php');
  exit;
}

// CSRFチェック
if (
  !isset($_POST['token']) ||
  !isset($_SESSION['token']) ||
  !hash_equals($_SESSION['token'], $_POST['token'])
) {
  exit('不正なアクセスです');
}

// トークン破棄
unset($_SESSION['token']);


// フォーム値取得
$name = htmlspecialchars($_POST['name'] ?? '', ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES, 'UTF-8');
$message = htmlspecialchars($_POST['message'] ?? '', ENT_QUOTES, 'UTF-8');



// ================================
// メール送信設定
// ================================

// 送信先（自分のメールアドレス）
$to = 'hir-hdtc.18-nsx.2006.08.03-07@docomo.ne.jp';

// 件名
$subject = 'お問い合わせが届きました';

// 本文
$body = <<<EOD
お問い合わせが届きました。

【お名前】
{$name}

【メールアドレス】
{$email}

【お問い合わせ内容】
{$message}

EOD;

// ヘッダー
$headers = "From: {$email}";

// 日本語メール設定
mb_language("Japanese");
mb_internal_encoding("UTF-8");

// 管理者へ送信
$result = mb_send_mail($to, $subject, $body, $headers);

// 自動返信メール
$auto_subject = 'お問い合わせありがとうございます';

$auto_body = <<<EOD
{$name} 様

お問い合わせありがとうございます。
以下の内容で受け付けました。

【お問い合わせ内容】
{$message}

EOD;

$auto_headers = "From: あなたのメールアドレス";

// 自動返信送信
$auto_result = mb_send_mail(
  $email,
  $auto_subject,
  $auto_body,
  $auto_headers
);


// 両方成功した場合
if ($result && $auto_result) {
// if (true) {

  $_SESSION['send'] = true;

  // CSRFトークン削除
  unset($_SESSION['token']);

  header('Location: thanks.php');
  exit;

} else {

  echo 'メール送信に失敗しました。';

}