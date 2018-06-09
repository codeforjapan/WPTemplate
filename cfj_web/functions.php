<?php

add_action( 'init', 'create_post_type' );
function create_post_type() {

  //post-type
  register_post_type( 'story',
    array(
      'labels' => array(
        'name' => __( 'ストーリー' ),
        'singular_name' => __( 'ストーリー' )
      ),
      'supports' => array(
        'title','editor','thumbnail'
      ),
      'public' => true,
      'has_archive' => true,
    )
  );

  register_post_type( 'fellowship',
    array(
      'labels' => array(
        'name' => __( 'フェローシップ' ),
        'singular_name' => __( 'フェローシップ' )
      ),
      'public' => true,
      'has_archive' => true,
      )
  );

  register_post_type( 'faq',
    array(
      'labels' => array(
        'name' => __( 'FAQ' ),
        'singular_name' => __( 'FAQ' )
      ),
      'public' => true,
      'has_archive' => false,
    )
  );

  register_post_type( 'brigade',
    array(
      'labels' => array(
        'name' => __( 'ブリゲード' ),
        'singular_name' => __( 'ブリゲード' )
      ),
      'public' => true,
      'has_archive' => true,
    )
  );

  //category
  register_taxonomy(
		'stories',
		array( 'story' ),
		array(
			'label' => 'ストーリー記事カテゴリー',
			'hierarchical' => true,
			'query_var' => true,
			'show_admin_column' => true,
			'rewrite' => true
//			'show_ui' => false
		)
	);

  register_taxonomy(
		'fellowship-cat',
		array( 'fellowship' ),
		array(
			'label' => '募集状態',
			'hierarchical' => true,
			'query_var' => true,
			'show_admin_column' => true,
			'rewrite' => true
//			'show_ui' => false
		)
	);

  register_taxonomy(
		'faq-cat',
		array( 'faq' ),
		array(
			'label' => 'FAQカテゴリー',
			'hierarchical' => true,
			'query_var' => true,
			'show_admin_column' => true,
			'rewrite' => true
		)
	);

  register_taxonomy(
		'brigade-area',
		array( 'brigade' ),
		array(
			'label' => 'ブリゲード所属地域',
			'hierarchical' => true,
			'query_var' => true,
			'show_admin_column' => true,
			'rewrite' => true
		)
	);

}
//Medium
function medium_post_types( $post_types ) {
     $post_types = array('story');
     return $post_types;
 }
add_filter( 'medium_allowed_post_types', 'medium_post_types', 10, 1 );
add_action("add_meta_boxes_story", array("Medium_Admin", "add_meta_boxes_post"));

//thumbnail
add_theme_support( 'post-thumbnails' );
add_image_size( storythumb, 640, 390, true );

//Pagenation
function pagination($pages = '', $range = 2)
{
     $showitems = ($range * 2)+1;//表示するページ数（５ページを表示）

     global $paged;//現在のページ値
     if(empty($paged)) $paged = 1;//デフォルトのページ

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;//全ページ数を取得
         if(!$pages)//全ページ数が空の場合は、１とする
         {
             $pages = 1;
         }
     }

     if(1 != $pages)//全ページが１でない場合はページネーションを表示する
     {
		 echo "<div class=\"pagenav\">\n";
		 echo "<ul>\n";
		 //Prev：現在のページ値が１より大きい場合は表示
         if($paged > 1) echo "<li class=\"prev\"><a href='".get_pagenum_link($paged - 1)."'>Prev</a></li>\n";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                //三項演算子での条件分岐
                echo ($paged == $i)? "<li class=\"active\">".$i."</li>\n":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>\n";
             }
         }
		//Next：総ページ数より現在のページ値が小さい場合は表示
		if ($paged < $pages) echo "<li class=\"next\"><a href=\"".get_pagenum_link($paged + 1)."\">Next</a></li>\n";
		echo "</ul>\n";
		echo "</div>\n";
     }
}

add_action('pre_get_posts', 'my_pre_get_posts');
function my_pre_get_posts($query) {
    if (!is_admin() && $query->is_main_query() && is_tax()) {
        $query->set('posts_per_page', -1);
    }
}
