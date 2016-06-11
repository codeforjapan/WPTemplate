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
//			'show_ui' => false
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
//			'show_ui' => false
		)
	);

}
