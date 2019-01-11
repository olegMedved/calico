<?php 
   /*
   Template name:  About Page*/
    
   get_header();

    ?>
 	<section class="header-banner-wrap about-header-wrap">
		<div class="container-fluid">
			<div class="row">
				<div class="header-banner about-header col-sm-6 col-sm-offset-6">
					<h1><span>About Calico
</span><br/><span>Photography</span></h1>
					<?php wp_reset_query(); the_content() ?>
				</div>
			</div>
		</div>
	</section>



	<section class="pages-content-wrap about-page-wrap">
		<div class="container-fluid">
			<div class="row clearfix">
				<div class="pages-content about-page clearfix">
					<div class="left col-md-6">
						<img src="<?php  echo get_field('from_helen')['image_1']['url'] ?>" alt="">
						<img src="<?php echo get_template_directory_uri() ?>/img/about-page-bg.png" alt="">
						<img src="<?php  echo get_field('from_helen')['image_2']['url'] ?>" alt="">
					</div>
					<div class="right col-md-6">
						<h2>From Helen</h2>
						<blockquote>
							<?php  echo get_field('from_helen')['text']  ?>
						</blockquote>
						<div class="bottom">
							<p><span>Helen Tackett</span></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>



<?php   get_footer();  ?>