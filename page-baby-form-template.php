<?php 
   /*
   Template name:  Baby form Page*/
    
   get_header(); ?>
  
  
   
	<section class="header-banner-wrap baby-package-header"
		<?php if (has_post_thumbnail()) { ?> 
	style="
	    background: url(<?php echo get_the_post_thumbnail_url() ?>) no-repeat center;
	    background-size: cover;
	"
	<?php } ?>
	>
		<div class="container-fluid">
			<div class="row">
				<div class="header-banner">
					<h1><?php the_title() ?></h1>
					<?php wp_reset_query(); the_content() ?>
					
				</div>
			</div>
		</div>
	</section>



	<section class="pages-content-wrap baby-package-wrap">
		<div class="container">
			<div class="row clearfix">
				<div class="pages-content baby-package">
					<div   id="babyForm" class="clearfix">
						<?php echo do_shortcode('[contact-form-7 id="72102" title="Baby package"]') ?>
					</div>
				</div>
			</div>
		</div>
	</section>



<?php   get_footer();  ?>