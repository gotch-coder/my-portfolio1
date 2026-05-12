// ===== JavaScript（jQuery）の役割：動き・操作 =====

$(function (){

  // 使う要素を変数にまとめる
  const $btn     = $('#hamburgerBtn');/* ハンバーガーメニュー */
  const $menu    = $('#navMenu');/* ナビゲーションメニュー */
  const $overlay = $('#overlay');/* 背景オーバーレイ */


  // メニューと開く/閉じる関数
  function toggleMenu(){
    // is-open　クラスをつけ外しする（cssがアニメーション）担当）
    $btn.toggleClass('is-open');
    $menu.toggleClass('is-open');
    $overlay.toggleClass('is-open');
  }

  // ハンバーガーボタンをクリックしたとき
  $btn.on('click', function(){
    toggleMenu();
  });

  // オーバーレイ（メニュー例）をクリックしたとき→閉じる
  $overlay.on('click', function() {
    toggleMenu();
  });

  // メニューのリンクをクリックしたとき→閉じる
  $menu.find('a').on('click', function(){
    toggleMenu();
  });

});