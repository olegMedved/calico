<?php
 /*
 error_reporting(E_ALL);
ini_set('display_errors', 'On');
*/
include('inc/menu_walker.php');


/*  SETUP THEME
================================== */
if ( ! function_exists( 'al_setup' ) ) :

	function al_setup() {
		// several theme support
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( "title-tag" );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );	
		add_theme_support( 'html5', array( 'gallery', 'caption' ) ); 
	 
	 
}
endif; 
add_action( 'after_setup_theme', 'al_setup' );
 

  
/* my_class_names
================================== */

add_filter('body_class','my_class_names');
function my_class_names( $classes ) {
 
			
	if(($key = array_search('blog', $classes)) !== false) {
	    unset($classes[$key]);
	}
	
	if (is_single() || is_home() || is_singular('page')  || is_archive()) {
		$classes[] = 'pages';
	}
	
	return $classes;
}


/*
 * Add filter to query archives by year
 */
function newmarket_getarchives_filter($where, $args) {
    if(isset($args['year'])) {
        $where .= ' AND YEAR(post_date) = ' . intval($args['year']);
    }

    return $where;
}

add_filter('getarchives_where', 'newmarket_getarchives_filter', 10, 2);

 
  
/* options
================================== */
 

 

add_filter('acf/options_page/settings', 'my_acf_options_page_settings');

 if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}
 
/*google_api_key
================================== */

function my_acf_init() {
	
	acf_update_setting('google_api_key', 'AIzaSyBry7mEuX-qMQTb3TdqOpBYXtOgoSfCgdk');
}

add_action('acf/init', 'my_acf_init');

 /*google_api_key
================================== */

 
  
  
/*Thumbnails
================================== */
 
add_image_size( 'post', 235, 180, false );
add_image_size( 'width1', 340, 999999, false );
add_image_size( 'width2', 700, 999999, false );
 
 /*allow span
================================== */
 
function override_mce_options($initArray) 
{
  $opts = '*[*]';
  $initArray['valid_elements'] = $opts;
  $initArray['extended_valid_elements'] = $opts;
  return $initArray;
 }
 add_filter('tiny_mce_before_init', 'override_mce_options');
 
 
/*main menu
================================== */

function al_main_menu($menu='menu',$class=' ') {
	$args = array(
		'menu'            => $menu, 
		'container' => '', 
		'container_class' => '', 
		'menu_class'      => $class, 
 		//'walker'        => new magomra_walker_nav_menu(),
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		//'items_wrap'      => '%3$s',
	);
	wp_nav_menu( $args ); 
}
 
 
/*short excerpt
================================== */

function al_short_excerpt( $charlength ){
	$excerpt =  get_the_excerpt() ;
	$charlength++;
	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		return '...';
	} else {
		return $excerpt;
	}
}
add_filter('excerpt_more', function($more) {
	return '...';
});


/*short description
================================== */

function al_short_description( $charlength, $term ){
	$excerpt = $term->description;
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		echo '[...]';
	} else {
		echo $excerpt;
	}
}

 /* catch_that_image
================================== */
 
  function catch_that_image() {
  global $post, $posts;
  $first_img = '';
 /* ob_start();
  ob_end_clean();*/
 // $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  
  //$output = get_attached_media( 'image',$post->ID );
  $output = get_children( array( 
		'post_parent' => $post->ID,
		'post_status'   => 'any',
		'post_type'     => 'attachment',
		'post_mime_type'     => 'image/%',
	),ARRAY_A  );

  $first_img = reset($output );
 /* if(empty($first_img)){ //Defines a default image
    $first_img = "";
  }*/
//  print_r(get_post(4507));
  return wp_get_attachment_image_url($first_img['ID'], 'thumbnail-big');
}  



 
/* ENQUEUES
================================== */
function al_theme_enqueues() {
	
	

	
 
    $styles = array(     
	 	"css/bootstrap.min.css"
		,"css/reset.css"	 
		,"css/font.css"
		,"css/owl.carousel.min.css"
		,"css/jquery.fancybox.min.css"
		,"css/nice-select.css"
		,"fonts/fontawesome-free-5.0.6/web-fonts-with-css/css/fontawesome-all.min.css"
		,"css/style.css"
		,"css/responsive.css"
	   
  	 ) ;
  	 
  	 
     foreach ($styles  as $style)
     	wp_enqueue_style( $style,   get_template_directory_uri() . '/'.$style, array(   ), '1.0'  );
	
	 wp_enqueue_style( 'style', get_stylesheet_uri(), null, null );	
	
 	 
	
	
     $sripts = array( 
 
		"js/bootstrap.min.js"
		,"js/owl.carousel.js"
		,"js/jquery.dotdotdot.js"
		,"js/jquery.fancybox.min.js"
		,"js/jquery.nice-select.min.js"
		,"js/imagesloaded.pkgd.min.js"
		,"js/isotope.pkgd.min.js"
		,"js/script.js"
	 );
     foreach ($sripts  as $sript)
     	wp_enqueue_script( $sript , get_template_directory_uri() . '/'.$sript, array( 'jquery' ), null, true );
	 
 	// wp_deregister_script('jquery-migrate');

	wp_localize_script('jquery', 'global',
        array(
            'url' => admin_url('admin-ajax.php')
        )
    );

}
add_action( 'wp_enqueue_scripts', 'al_theme_enqueues' );
 
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
  
   //  add_post_type_support( 'page', 'excerpt' );
 
/*Pagination
================================== */
 

function al_corenavi() {
 
  global $wp_query, $wp_rewrite;
  $pages = '';
  $max = $wp_query->max_num_pages;
  if (!$current = get_query_var('paged')) $current = 1;
  $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));	
  $a['total'] = $max;
  $a['current'] = $current;
 

  $total = 0;  
  $a['mid_size'] = 3;  
  $a['end_size'] = 1;  
  $a['prev_next'] = 1;  
  $a['prev_text'] = '<img src="'.get_template_directory_uri().'/img/left.png" alt="">'; //текст ссылки "Следующая страница"
  $a['next_text'] = '<img src="'.get_template_directory_uri().'/img/right.png" alt="">'; //текст ссылки "Следующая страница"
  $a['type'] = 'array';
  if ($max > 1) echo '';
  if ($total == 1 && $max > 1) $pages = '<span class="pages">'. $current .' cтраница </span><br>
'."\r\n";
  $pages = paginate_links($a);
 
 if ($pages ) {
 // echo ' <ul class="pagination  ">';
  foreach ( $pages as $page ) {   
  	$i ++;
  	$class = '';
  			if ( $i == get_query_var('paged')     ) $class = "class='active current'";
           echo " $page ";
        }
 // echo '</ul> ';
  if ($max > 1) echo ''; 
 }
}   

 
 
 
 

/*Menus
================================== */
  

 function al_register_my_menus()
{
register_nav_menus
(
array( 'header-menu' => 'Main Menu', 
 'footer' => 'Footer', 
)
);
}
if (function_exists('register_nav_menus'))
{
	add_action( 'init', 'al_register_my_menus' );
}
 
 
 

add_action( 'wp_ajax_nopriv_ajax_gallery', 'ajax_gallery' );
add_action( 'wp_ajax_ajax_gallery', 'ajax_gallery' );

function ajax_gallery(){ 
	$post__in = wp_list_pluck(get_field('images',  (int)$_GET['post_id']), 'ID');
	
	if ($_GET['all']) {
		$q = new WP_Query( array( 
			'post_type' => 'gallery',
		));
		while ($q->have_posts()  ) { 
			$q->the_post();
			$gallery  = get_field('images');
			foreach ($gallery as $img) {
				$post__in[] = $img['ID'] ;
			}
		}
	}
	
	$q = new WP_Query( array( 
		'post__in' => $post__in,
		'offset' => $_GET['offset'],
		'orderby' => 'post__in',
		'post_status'   => 'any',
		'posts_per_page' => 6,
		'post_type'     => 'attachment',
		'post_mime_type'     => 'image/%',
	) );

	

		
		

	while ($q->have_posts() && $post__in) {
		$q->the_post();
		$loop++;
		$url = wp_get_attachment_image_url($post->ID, 'full');
		$r = $loop == 1 ? '2' : '1';
		 
		
		$thumb = wp_get_attachment_image_url($post->ID, 'width'.$r);
		$display = '';
		
		 
		?>
		

		<div style="display: <?php echo $display ?> " class="grid-item <?php echo $loop == 1 ? 'grid-item--width2' : '' ?>">
			<a  href="<?php echo $url ?>" data-fancybox="images" class="fancybox">
				<img src="<?php echo $thumb  ?>">
			</a>
		</div>
	<?php }  

	die();
}
 


  