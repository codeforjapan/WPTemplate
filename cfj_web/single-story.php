<!DOCTYPE html>
<html lang="ja">
<head>
<?php the_post(); ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/assets/css/style.css?ver=170804">
  <title><?php the_title(); ?> | Code for Japan</title>
  <meta property="fb:app_id" content="355861924755174">
  <meta property="og:url" content="<?php echo get_the_permalink(); ?>">
  <meta property="og:title" content="<?php the_title(); ?>">
  <meta property="og:type" content="article">
  <meta property="og:image" content="http://www.code4japan.org/assets/images/story_dummy.png">
  <meta property="og:site_name" content="Code for Japan">
<?php
echo '<meta property="og:description" content="'.mb_substr(get_the_excerpt(), 0, 100).'" />';echo "\n";
?>
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
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.10";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
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
        <a href="/story/" itemprop="url"><span itemprop="title">ストーリー</span></a>
      </li>
      <li class="bread__item" itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
        <?php if ( wp_is_mobile() ) : ?>
          <span itemprop="title"><?php echo mb_strimwidth(get_the_title(), 0, 30, "…", "UTF-8"); ?></span>
        <?php else: ?>
          <span itemprop="title"><?php the_title(); ?></span>
        <?php endif; ?>
      </li>
    </ol>
  </div>
  <div id="main" class="main storydetail">
    <div id="content" class="content storydetail">
<?php
$terms = wp_get_object_terms($post->ID,'stories');
?>
      <p class="storydetail__cat"><span><?php foreach($terms as $term) { echo $term->name; } ?></span><time datetime="" pubdate="pubdate"><?php the_time('Y.m.d'); ?></time></p>
      <h1 class="storydetail__headline"><?php the_title(); ?></h1>
      <div id="blogtext">
<?php the_content(); ?>
      </div>
      <div class="storydetail__sharearea">
        <div class="storydetail__shareleft">
            <img src="/assets/images/story_dummy.png" alt="code for japan">
        </div>
        <div class="storydetail__shareright">
          <p class="storydetail__sharetitle"><?php the_title(); ?></p>
          <p class="storydetail__sharerequest">この記事に共感したらシェアをお願いします</p>
          <ul class="storydetail__sharerebtn">
            <li class="storydetail__sharerebtn--facebook"><a href="http://www.facebook.com/share.php?u=<?php echo get_the_permalink(); ?>" onclick="window.open(encodeURI(decodeURI(this.href)), 'FBwindow', 'width=554, height=470, menubar=no, toolbar=no, scrollbars=yes'); return false;" rel="nofollow"><i></i>この記事をシェア</a></li>
            <li class="storydetail__sharerebtn--twitter"><a href="http://twitter.com/share?url=<?php echo get_the_permalink(); ?>&hashtags=codeforjapan" onClick="window.open(encodeURI(decodeURI(this.href)), 'tweetwindow', 'width=650, height=470, personalbar=0, toolbar=0, scrollbars=1, sizable=1'); return false;" rel="nofollow"><i></i>この記事をツイート</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

<?php get_template_part('notice'); ?>

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
<div id="snsfooter">
<div class="fb-like" data-href="<?php echo get_the_permalink(); ?>" data-layout="button_count" data-action="recommend" data-size="small" data-show-faces="false" data-share="true"></div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</body>
</html>
