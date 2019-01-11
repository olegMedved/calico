<?php 
   /*
   Template name:  FAQ Page*/
    
   get_header();

    ?>
  
  
  	<section class="header-banner-wrap about-faq-header"
  	<?php if (has_post_thumbnail()) { ?> 
	style="
	    background: url(<?php echo get_the_post_thumbnail_url() ?>) no-repeat center;
	    background-size: cover;
	"
	<?php } ?>>
		<div class="container-fluid">
			<div class="row">
				<div class="header-banner">
					<h1>FAQ</h1>
				</div>
			</div>
		</div>
	</section>



	<section class="pages-content-wrap about-faq-wrap">
		<div class="container">
			<div class="row clearfix">
				<div class="pages-content about-faq">
					<?php wp_reset_query(); the_content() ?>
				</div>
			</div>
		</div>
	</section>




<?php   get_footer();  ?>