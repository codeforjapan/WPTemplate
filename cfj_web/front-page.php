<?php
	$loop = new WP_Query(array(
		'post_status' => 'publish',
		'post_type' => 'story',
		'posts_per_page'=> 9
	) );
	$loop2 = new WP_Query(array(
		'post_status' => 'publish',
		'post_type' => 'fellowship',
		'orderby' => 'meta_value',
		'order' => 'ASC',
		'meta_key'=>'fellowship_no',
		'posts_per_page'=> -1,
		'tax_query' => array(
	    array(
	        'taxonomy' => 'fellowship-cat',
	        'field' => 'slug',
	        'terms' => 'wanted',
	        ),
	    ),
	) );
get_header(); ?>
<body>
<div id="topkey" class="topkey">
  <div class="topkey__inner">
		<h1 class="topkey__title">Code for Japan</h1>
		<p class="topkey__sutitle">ともに考え、ともにつくる</p>
		<p class="topkey__btn"><a href="/join/" target="_blank">CfJへ参加する</a></p>
    <div id="topmain" class="grid">
<?php if($loop->have_posts()) : ?>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
<?php
$terms = wp_get_object_terms($post->ID,'stories');
?>
    <section><div class="topsec grid-item"><a href="<?php the_permalink(); ?>">
		<div class="topsec__SPright">
      <p class="topsec__cat"><span>
<?php
$str = '';
foreach($terms as $term) {
	$str .=  $term->name . ', ';
}
echo rtrim($str, ", ");
?>
			</span><time><?php the_time('Y.m.d'); ?></time></p>
      <h2 class="topsec__title"><?php the_title(); ?></h2>
		</div>
			<?php if (has_post_thumbnail()) : ?>
      	<div class="topsec__img"><?php the_post_thumbnail('storythumb'); ?></div>
			<?php else: ?>
				<div class="topsec__img"><img src="/assets/images/story_dummy.png" style="border: 1px solid #ccc;"></div>
			<?php endif ; ?>
    </a></div></section>
<?php endwhile;endif; ?>
<?php wp_reset_query(); ?>
    </div><!--topsec-->
  </div>
</div>

<p class="topkeyunder">
	<a class="topkeyunder__btn" href="/story/">ストーリーの一覧へ</a>
</p>

<div class="topfellowship">
  <div class="secinner">
    <div class="topsectitle"><h2><span class="topsectitle__en">Fellowship</span><i class="topsectitle__ja">地域フィールドラボ</i></h2></div>
    <div class="topfellowship__box">
<?php if($loop2->have_posts()) : ?>
<?php while ( $loop2->have_posts() ) : $loop2->the_post(); ?>
      <div class="topfellowship__item"><a href="<?php the_permalink(); ?>">
				<span class="topfellowship__icn"><img src="<?php the_field('fellowship_icn'); ?>" alt="<?php the_title(); ?>"></span>
        <h3 class="topfellowship__title"><?php the_field('fellowship_title'); ?><i></i></h3>
        <p class="topfellowship__txt"><?php the_field('fellowship_businessObjective'); ?></p>
      </a></div>
<?php endwhile;endif; ?>
<?php wp_reset_query(); ?>
    </div>
  </div>
</div>

<div id="topunder" class="topunder">
  <ul class="topunder__inner">
    <li><a href="/aboutus/" class="topunder--icnorg">
      <span class="topunder__title">団体概要について</span>
      <span class="topunder__txt">現在の理事や事務局、運営委員の紹介です。</span>
    </a></li>
    <li><a href="/brigade/" class="topunder--icnmap">
      <span class="topunder__title">各地のブリゲードについて</span>
      <span class="topunder__txt">ブリゲードの活動を通じて</span>
    </a></li>
  </ul>
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://unpkg.com/masonry-layout@4.2.0/dist/masonry.pkgd.js"></script>
	<script type="text/javascript">
  var w = $(window).width();
  if(w > 768){
    $('.grid').masonry({
      itemSelector: '.grid-item',
      columnWidth: 305,
      gutter: 25
    });
  }
  </script>
</body>
</html>
