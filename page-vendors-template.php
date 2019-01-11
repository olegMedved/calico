<?php 
   /*
   Template name:  Vendors Page*/
    
   get_header(); ?>
  
  
   
 
 
 	<section class="header-banner-wrap recommended-vendors-header"
 	<?php if (has_post_thumbnail()) { ?> 
		style="
		    background: url(<?php echo get_the_post_thumbnail_url() ?>) no-repeat center;
		    background-size: cover;
		"
		<?php } ?>>
		<div class="container-fluid">
			<div class="row">
				<div class="header-banner">
					<h1><?php the_title() ?></h1>
					<?php wp_reset_query(); the_content() ?>
					
				</div>
			</div>
		</div>
	</section>



	<section class="pages-content-wrap recommended-vendors-wrap">
		<div class="container">
			<div class="row clearfix">
				<div class="pages-content recommended-vendors">
					
					<?php
					while (have_rows('vendors')) {
						the_row(); ?>
					 
					<div class="item">
						<div class="img">
							<img src="<?php echo get_sub_field('image')['url'] ?>" alt="">
						</div>
						<div class="text">
							<h2><?php the_sub_field('title') ?></h2>
							<?php the_sub_field('text') ?>
						</div>
					</div>
					
					<?php } ?>
					 

				</div>
			</div>
		</div>
	</section>


<?php   get_footer();  ?>