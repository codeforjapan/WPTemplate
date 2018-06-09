<?php
/**
 * Template Name: page
 */
get_header(); ?>
<?php the_post(); ?>
<div id="bread" class="bread">
  <ol>
    <li class="bread__item" itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
      <a href="" itemprop="url"><span itemprop="title">ホーム</span></a>
    </li>
    <li class="bread__item" itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
      <span itemprop="title"><?php the_title(); ?></span>
    </li>
  </ol>
</div>
<div id="main" class="main storydetail">
  <div id="content" class="content storydetail">
<?php the_content(); ?>
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
