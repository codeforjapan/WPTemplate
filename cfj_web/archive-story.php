<?php
	$loop = new WP_Query(array(
		'post_status' => 'publish',
		'post_type' => 'story',
		'posts_per_page'=> 10,
		'paged' => $paged
	) );
get_header(); ?>
	<div id="storycatWrap">
    <ul id="storycat">
<?php
$args = array(
	'taxonomy' => 'stories',
);
$categories = get_categories($args);
foreach($categories as $category) {
	echo '<li><a href="/stories/'.$category->slug.'" title="'.$category->name.'" '.'>'.$category->name.'</a></li>';
}
?>
    </ul>
  </div>
  <div id="bread" class="bread">
    <ol>
      <li class="bread__item" itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
        <a href="/" itemprop="url"><span itemprop="title">ホーム</span></a>
      </li>
      <li class="bread__item" itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
        <span itemprop="title">ストーリー</span>
      </li>
    </ol>
  </div>
  <div id="main" class="main story">
    <div id="headline" class="headline">
      <h1 class="headline__box">
        <span class="headline__title">Story<i class="headline__titleja">ストーリー</i></span>
        <span class="headline__summary">Code for Japanの活動やフェローへのインタビューなどをお届けいたします</span>
      </h1>
    </div>
    <div id="content" class="content story">
<?php if($loop->have_posts()) : ?>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
<?php
$terms = wp_get_object_terms($post->ID,'stories');
?>
      <section><a href="<?php the_permalink(); ?>" class="storysec" style="border-top:1px dotted #D3D3D3;">
        <div class="storysec__box">
          <p class="storysec__cat"><span>
<?php
$str = '';
foreach($terms as $term) {
	$str .=  $term->name . ', ';
}
echo rtrim($str, ", ");
?>
					</span><?php the_time('Y.m.d'); ?></p>
          <h2 class="storysec__title"><?php the_title(); ?></h2>
          <p class="storysec__summary">
<?php
if(mb_strlen($post->post_content,'UTF-8')>160){
	$content= str_replace('\n', '', mb_substr(strip_tags($post-> post_content), 0, 160,'UTF-8'));
echo $content.'…';
}else{
	echo str_replace('\n', '', strip_tags($post->post_content));
}
?>
          </p>
        </div>
<?php if ( has_post_thumbnail() ) : ?>
<?php
  $image_id = get_post_thumbnail_id();
  $image_url = wp_get_attachment_image_src($image_id, 'storythumb');
 ?>
	      	<div class="storysec__img" style="background-image:url(<?php echo $image_url[0]; ?>)"></div>
				<?php else: ?>
					<div class="storysec__img" style="background-image:url(/assets/images/story_dummy.png)"></div>
				<?php endif ; ?>
      </a></section><!--sec-->
<?php endwhile;endif; ?>
<?php wp_reset_query(); ?>

<?php
if (function_exists("pagination")) {
	pagination($additional_loop->max_num_pages);
}
?>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
var w = $(window).width();
if(w < 768){
  var catArray = [];
  for(var i = 0; i < $("#storycat li").length; i++){
		catArray.push($("#storycat li").eq(i).width());
	}
	var childElementWidth = 0;
	for(var j = 0; j < catArray.length; j++){
		childElementWidth += catArray[j];
	}
  $('#storycat').css('width', childElementWidth + 20);
}
</script>
</body>
</html>
