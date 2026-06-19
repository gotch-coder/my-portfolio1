<?php
session_start();

// CSRFトークン生成
$token = bin2hex(random_bytes(32));
$_SESSION['token'] = $token;

// フォームの値保持
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';
?>


<?php include 'header.php'; ?>

<div id="container">


  <!-- ナビゲーションメニュー -->
  <!-- <nav class="nav-menu" id="navMenu">
    <ul>
      <li><a href="#about">About</a></li>
      <li><a href="#service">Service</a></li>
      <li><a href="#works">Works</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
  </nav> -->

  <!-- オーバーレイ（メニュー外クリックで閉じる用） -->
  <div class="overlay" id="overlay"></div>

  <!-- 新しいローディング -->
  <div id="loading"></div>

  <!-- fv画面 -->
  <section id="main">
    <div class="fv-overlay"></div>
    <div id="top-slide">
      <div class="slider">
        <div><img src="images/rd8_500_r1.jpg" alt="topslide_1"></div>
        <div><img src="images/rd8_500_r2.jpg" alt="topslide_2"></div>
        <div><img src="images/rd8_500_r3.jpg" alt="topslide_3"></div>
      </div>
    </div>

    <!-- 文字 -->
    <!-- <div class="fv__content">
          <h1 class="loading__text">Hello, World!</h1>
        </div> -->

    <div class="scroll-indicator">
      <span>SCROLL</span>
    </div>


    <div class="fv__content">
      <h1 class="loading__title">
        <span>H</span>
        <span>e</span>
        <span>l</span>
        <span>l</span>
        <span>o</span>
        <span>,</span>

        <br class="sp-only">

        <span>W</span>
        <span>o</span>
        <span>r</span>
        <span>l</span>
        <span>d</span>
        <span>!</span>
      </h1>
    </div>


  </section>

  <section id="about" class="section fadeIn">
    <div class="inner">

      <div class="section-title">
        <h2>About</h2>
      </div>

      <div class="about__flex">

        <div class="about__img">
          <!-- <img src="images/240316180731150.jpg" class="sp_none" alt="about_img"> -->
          <img src="images/about-picture.png" class="sp_none" alt="about_img">
          <!-- <img src="images/240316180731150.jpg" class="pc_none" alt="about_img"> -->
          <img src="images/about-picture.png" class="pc_none" alt="about_img">
        </div>

        <div class="about__textarea">
          <p>Hiroki Gotoh / <br>1978年生まれ。<br>大学卒業後、協同組合、工場勤務、商社勤務を経て、<br>2024年3月、
            Web制作の道へ。<br>
            様々な職種で経験したことを活かして、お客様のご要望に
            応えてまいります。よろしくお願いいたします。
          </p>
        </div>

      </div>
    </div>
  </section>

  <section id="service" class="section bg-gray fadeIn">
    <div class="inner">
      <div class="section-title">
        <h2>Service</h2>
        <p>サービス一覧</p>
      </div>
      <div class="service__list">
        <div class="service__content">
          <img src="images/HTML_CSS.svg" alt="html&css">
          <p>HTML&CSS</p>
        </div>
        <div class="service__content">
          <img src="images/JavaScript.svg" alt="javascript">
          <p>Javascript</p>
        </div>
        <div class="service__content">
          <img src="images/Git.svg" alt="wordpress">
          <p>Git</p>
        </div>
      </div>
    </div>
  </section>

  <section id="works" class="section fadeIn">
    <div class="inner">

      <div class="section-title">
        <h2>Works</h2>
        <p>サービスご利用者様HP一覧</p>
      </div>

      <div class="work__list">

        <!-- 1 -->
        <div class="work-card">

          <div class="work-card__img">
            <img src="images/hotel_01.jpg" alt="〇〇旅館">
          </div>

          <div class="work-card__body">
            <h3>〇〇旅館 様</h3>
            <p>HTML / CSS / JQuery</p>

            <a href="detail.php" class="btn">
              View More
            </a>
          </div>
        </div>

        <!-- 2 -->
        <div class="work-card">

          <div class="work-card__img">
            <img src="images/TKL_R6_8741_TP_V4.jpg" alt="〇〇農園">
          </div>

          <div class="work-card__body">
            <h3>〇〇農園 様</h3>
            <p>HTML / CSS / JQuery</p>

            <a href="detail.php" class="btn">
              View More
            </a>
          </div>
        </div>

        <!-- 3 -->
        <div class="work-card">

          <div class="work-card__img">
            <img src="images/office_01.jpg" alt="〇〇株式会社">
          </div>

          <div class="work-card__body">
            <h3>〇〇株式会社 様</h3>
            <p>HTML / CSS / JQuery</p>

            <a href="detail.php" class="btn">
              View More
            </a>
          </div>
        </div>


        <!-- 4 -->
        <div class="work-card">

          <div class="work-card__img">
            <img src="images/carfactory_01.jpg" alt="〇〇自動車工場">
          </div>

          <div class="work-card__body">
            <h3>〇〇自動車工場 様</h3>
            <p>HTML / CSS / JQuery</p>

            <a href="detail.php" class="btn">
              View More
            </a>
          </div>
        </div>

      </div>
    </div>
  </section>

  <section id="contact" class="section bg-gray fadeIn">
    <div class="inner">

      <div class="section-title">
        <h2>Contact</h2>
      </div>

      <p class="summary">
        お気軽にお問い合わせください。<br>24時間以内に担当者よりご連絡させて頂きます。
      </p>

      <div class="contact__form">
        <form action="confirm.php" method="post">

          <input type="hidden" name="token" value="<?php echo htmlspecialchars($token ?? '', ENT_QUOTES, 'UTF-8'); ?>">

          <!-- お名前 -->
          <div class="form-group">
            <label for="name">お名前</label>

            <input type="text" name="name" value="<?php echo htmlspecialchars($name ?? '', ENT_QUOTES, 'UTF-8'); ?>">

          </div>

          <!-- メール -->
          <div class="form-group">
            <label for="email">メールアドレス</label>

            <input type="email" name="email" value="<?php echo htmlspecialchars($email ?? '', ENT_QUOTES); ?>">

          </div>

          <!-- お問い合わせ内容 -->
          <div class="form-group">
            <label for="message">お問い合わせ内容</label>

            <textarea name="message"><?php echo htmlspecialchars($message ?? '', ENT_QUOTES); ?></textarea>

          </div>

          <button type="submit" class="contact__btn">
            送信画面へ
          </button>

        </form>
      </div>
    </div>
  </section>


</div>



<?php include 'footer.php'; ?>