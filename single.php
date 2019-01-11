<?php   
get_header( );   ?>


	<section class="header-banner-wrap blog-inner-header"
	<?php if (has_post_thumbnail()) { ?> 
	style="
	    background: url(<?php echo get_the_post_thumbnail_url() ?>) no-repeat center;
	    background-size: cover;
	"
	<?php } ?>>
		<div class="container-fluid">
			<div class="row">
				<div class="header-banner">

				</div>
			</div>
		</div>
	</section>



	<section class="pages-content-wrap blog-inner-wrap">
		<div class="container">
			<div class="row clearfix">
				<div class="pages-content blog-inner clearfix">
					<h2><?php the_title( ) ?></h2>
					<?php wp_reset_query(); the_content() ?><div class="bottom clearfix">
						<p><?php echo get_the_date() ?></p>
						<div class="link">
							<!-- AddToAny BEGIN -->
							<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
		 		
							<a class="a2a_button_facebook"></a>
							<a class="a2a_button_twitter"></a>
							<a class="a2a_button_google_plus"></a>
							<a class="a2a_button_pinterest"></a>
							</div>
							<script async src="https://static.addtoany.com/menu/page.js"></script>
							<!-- AddToAny END -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>




 
 
<?php   get_footer();  ?>