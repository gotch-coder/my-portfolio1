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

  // トップスライド
  // const slides = document.querySelectorAll('#top-slide img');

  // let current = 0;

  // 最初の画像を表示
  // slides[current].classList.add('active');

  // setInterval(() => {
    // 今の画像を消す
    // slides[current].classList.remove('active');
    // 次の画像へ
    // current++;
    // 最後まで行ったら最初へ戻る
    // if (current >= slides.length) {
    //   current = 0;
    // }

      // 次の画像を表示
  //   slides[current].classList.add('active');

  // }, 4000);

  // 横スクロール
  // const wrapper = document.querySelector('.slide-wrapper');

  // let slideIndex = 0;

  // setInterval(() => {
  //   slideIndex++;

  //   if(slideIndex > 1){
  //     slideIndex = 0;
  //   }
  //   wrapper.style.transform = `translateX(-${slideIndex * 100}%)`;
  // }, 4000);
  
  // トップスライド
    $('.slider').slick({
      autoplay: true,
      autoplaySpeed: 1,
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






