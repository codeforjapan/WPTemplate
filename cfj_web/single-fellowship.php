<!DOCTYPE html>
<html lang="ja">
<head>
<?php the_post(); ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/assets/css/style.css">
  <title><?php the_title(); ?> | Code for Japan</title>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-45275834-1', 'auto');
ga('send', 'pageview');
</script>
</head>
<body>

<header>
  <div id="header" class="header">
    <div class="header__inner">
      <p class="header__logo"><a href="/">
        <img src="/assets/images/logo.png" alt="Code for Japan" srcset="
        /assets/images/logo@2.png 2x,
        /assets/images/logo@3.png 3x
        ">
      </a></p>
      <nav>
        <ul class="nav">
          <li class="nav__item item01"><a href="/story/"><span>ストーリー</span><i>Story</i></a></li>
          <li class="nav__item item02"><a href="/join/"><span>参加/サポート</span><i>Join</i></a></li>
          <li class="nav__item item03"><a href="/fellowship/"><span>フェローシップ</span><i>Fellow</i></a></li>
          <li class="nav__item item04"><a href="/brigade/"><span>ブリゲード</span><i>Brigade</i></a></li>
          <li class="nav__item item05"><a href="/aboutus/"><span>団体概要</span><i>Outline</i></a></li>
        </ul>
      </nav>
    </div>
  </div>
</header>

<div id="bread" class="bread">
  <ol>
    <li class="bread__item" itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
      <a href="/" itemprop="url"><span itemprop="title">ホーム</span></a>
    </li>
    <li class="bread__item" itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
      <a href="/fellowship/" itemprop="url"><span itemprop="title">フェローシップ</span></a>
    </li>
    <li class="bread__item" itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
      <span itemprop="title"><?php the_title(); ?></span>
    </li>
  </ol>
</div>

<div id="main" class="main storydetail">
  <div id="content" class="content storydetail">
<?php
$cat = get_the_category();
$cat = $cat[0];
$cat_name = $cat->cat_name;
?>
    <div id="blogtext">
<?php the_content(); ?>
    </div>
  </div>
</div>

<div id="footer" class="footer">
  <div class="footer__inner">
    <p class="footer__copy">「ともに考え、ともにつくる」© 2016 Code for Japan</p>
    <ul class="footer__sns">
      <li><a class="icn--facebook" href="https://www.facebook.com/codeforjapan" target="_blank"></a></li>
      <li><a class="icn--twitter" href="https://twitter.com/codeforJP" target="_blank"></a></li>
      <li><a class="icn--flickr" href="http://www.flickr.com/photos/codeforjapan/" target="_blank"></a></li>
      <li><a class="icn--youtube" href="https://www.youtube.com/user/codeforJP" target="_blank"></a></li>
      <li><a class="icn--githube" href="https://github.com/codeforjapan" target="_blank"></a></li>
    </ul>
  </div>
</div><!--footer-->

</body>
</html>
