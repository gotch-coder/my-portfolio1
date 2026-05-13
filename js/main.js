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

    // bodyクラスに付与
    $('body').toggleClass('is-fixed');
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

  // フェイドイン
  $(window).on('scroll', function(){

    $('.fadeIn').each(function() {

      // 要素の位置
      // const target =$(this).offset().top;
      // スクロール量
      // const scroll = $(this).scrollTop();
      // 画面高さ
      // const windowHeight = $(window).height();
      // 要素が画面に入ったら
      // if(scroll > target - windowHeight + 100){
      //   $(this).addClass('show');
      // }

      const position = $(this).offset().top;
      const scroll = $(window).scrollTop();
      const windowHeight = $(window).height();

      if(scroll > position - windowHeight + 100) {
        $(this).addClass('active');
      }
    });
  });

  // 初回読み込み時にも実行
  $(window).trigger('scroll');

});