// ===== JavaScript（jQuery）の役割：動き・操作 =====

$(function (){

  // 使う要素を変数にまとめる
  const $btn     = $('#hamburgerBtn');/* ハンバーガーメニュー */
  const $menu    = $('#navi__content');/* ナビゲーションメニュー */
  const $overlay = $('#overlay');/* 背景オーバーレイ */

  const isSp = () => window.innerWidth <= 767;

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
    // ハンバーガーメニュー自体をsp限定
    if (isSp()) {
    toggleMenu();
    }
  });

  // オーバーレイ（メニュー例）をクリックしたとき→閉じる
  $overlay.on('click', function() {
    toggleMenu();
  });

  // メニューのリンクをクリックしたとき→閉じる
  $menu.find('a').on('click', function(){
    // スマホ時だけ閉じる
    if (isSp()) {
      toggleMenu();
    }
  });

  // フェイドイン
  // $(window).on('scroll', function(){
  function fadeInCheck() {
    $('.fadeIn').each(function() {



      const position = $(this).offset().top;
      const scroll = $(window).scrollTop();
      const windowHeight = $(window).height();

      if(scroll > position - windowHeight + 100) {
        $(this).addClass('active');
      }
    });
  };

  // 初回読み込み時にも実行
  $(window).on('load scroll', fadeInCheck);
  fadeInCheck(); // 初回実行


  // トップスライド
    $('.slider').slick({
      autoplay: true,
      autoplaySpeed: 0,
      speed: 4000,
      cssEase: 'linear',
      arrows: false,
      dots: false,
      pauseOnHover: false,
      pauseOnFocus: false,
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1

    });
    // ローディング

    $(window).on('load', function() {

      setTimeout(function() {

        // loadingを消す
        $('#loading').addClass('fadeout');

        // main visual表示
        setTimeout(function(){
          $('#main').addClass('show');
        }, 500);

        // hello, world!表示
        setTimeout(function(){
          $('h1').addClass('show');
        }, 1300);


        // スクロール解除
        setTimeout(function() {
          $('body').removeClass('loading');
        }, 1000);

      }, 2500);
    });

    $('.loading__title span').each(function(index){

      $(this).css(
        'transition-delay',
        `${index * 0.12}s`
      );
    });
});






