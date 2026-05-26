<?php
session_start();

// confirm.php を経由していない場合は戻す
if (!isset($_POST['send'])) {
  header('Location: index.php');
  exit;
}

// フォーム内容取得
$name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
$message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');

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

// メール送信
mb_send_mail($to, $subject, $body, $headers);

// 完了画面へ移動
header('Location: thanks.php');
exit;