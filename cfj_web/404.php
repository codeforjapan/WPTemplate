<!-- 404.php -->
<?php get_header(); ?>
<div id="topunder" class="topunder">
<div class="topunder__inner">
<h2>指定されたページは存在しませんでした。</h2>
<p>このページの URL ：
<span class="error_msg">
http://<?php echo esc_html($_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']); ?>
</span></p>
<p><a href="<?php echo home_url(); ?>">トップページへ戻る</a></p> 
</div>
</div>
<?php get_footer(); ?>
