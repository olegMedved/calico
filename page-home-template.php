<?php 
   /*
   Template name:  Home Page*/
    
   get_header();

    ?>
	<section class="top-slider-wrap">
		<div class="container-fluid">
			<div class="row">
				<div class="top-slider">
					<h1><?php the_field('title' ) ?></h1>
					<div class="text-right">
						<ul>
							<li><a href="tel:<?php the_field('phone','option') ?>"><?php the_field('phone','option') ?></a></li>
							<li><a href="mailto:<?php the_field('email','option') ?>"><?php the_field('email','option') ?></a></li>
							<li><a href="<?php the_field('facebook','option') ?>"><i class="fab fa-facebook-square"></i></a></li>
							<li><a href="<?php the_field('instagramm','option') ?>"><i class="fab fa-instagram"></i></a></li>
						</ul>
					</div>
					<div class="slider owl-carousel">
						<?php
						foreach (get_field('slider') as $image) { ?> 
						<div>
							<img src="<?php echo $image['url'] ?>" alt="">							
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="portraits-wrap">
		<div class="container-fluid">
			<div class="row">
				<div class="portraits">
					<ul class="nav nav-tabs">
						<?php
						while (have_rows('tabs')) {
							the_row();$loop++ ?>
						 
						<li class="<?php echo $loop == 1 ? 'active' : '' ?>"><a data-toggle="tab" href="#tab-<?php echo $loop ?>"><?php the_sub_field('title') ?></a></li>
			 
						<?php } ?>
					</ul>
					<div class="tab-content clearfix">
						<?php
						$loop = 0;
						while (have_rows('tabs')) {
							the_row();$loop++ ?>
						<div id="tab-<?php echo $loop ?>" class="tab-pane fade <?php echo $loop == 1 ? ' in active' : '' ?> clearfix">
							<div class="left col-md-7 clearfix">
								<img src="<?php  echo get_sub_field('image_1')['url'] ?>" alt="">
								<img src="<?php echo get_template_directory_uri() ?>/img/portraits-bg.png" alt="">
								<img src="<?php  echo get_sub_field('image_2')['url'] ?>" alt="">
							</div>
							<div class="right col-md-5">
								<p><?php the_sub_field('text') ?></p>
								<ul>
									<li><a href="<?php the_sub_field('link') ?>">Read more</a></li>
									<li><a href="<?php the_sub_field('gallery') ?>">View Gallery</a></li>
								</ul>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="about-wrap">
		<div class="container-fluid ">
			<div class="row clearfix">
				<div class="about col-lg-offset-7 col-lg-5 col-sm-6 col-sm-offset-6">
					<?php the_field('text' ) ?>
					<a href="<?php echo get_permalink(72021) ?>">Read more</a>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="testimonials">
					<div class="slider owl-carousel">
						<?php
						$loop = 0;
						while (have_rows('testimonials')) {
							the_row();$loop++ ?>
						<div class="slider-item">
							<div class="img">
							<img src="<?php  echo get_sub_field('image')['url'] ?>" alt=""></div>
							<div class="text">
								<h4>Testimonials</h4>
								<blockquote><?php the_sub_field('text') ?></blockquote>
								<!--<div class="bottom">
									<p><span><?php the_sub_field('name') ?></span> <a href="#">View all testimonials</a></p>
								</div>-->
							</div>
						</div>
						<?php } ?>

					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="blog-wrap">
		<div class="container">
			<div class="row">
				<div class="blog">
					<div class="item">
						<h2>Recent BlogPosts</h2>
						<p><?php the_field('text2' ) ?></p>
						<a href="<?php echo get_permalink(72105) ?>">Read our blog</a>
					</div>
					<?php
					$q = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 2));
					
					while ($q->have_posts()) {
						$q->the_post(); ?>
					 
					<div class="item item-foto">
						<div class="img">
						<a href="<?php the_permalink() ?>">
						<?php if (get_post(get_field('_thumbnail_id'))->post_status == 'inherit' )                         
		                         the_post_thumbnail('post');
		                         elseif(catch_that_image()) 
		                         echo '<img src="'.catch_that_image().'" >';
		                         
		                           ?>
						</a></div>
						<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="container">
			<div class="row">
				<div class="form">
					<h2>Send me a message</h2>
					<p>I love getting your emails and learning more about you and what you are looking for in your photographer. I am here to answer any questions you have and make the process simple and fun!
					</p>
					<div   id="contactForm" class="clearfix">
						<?php echo do_shortcode('[contact-form-7 id="4" title="Contact form 1"]') ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	

<?php   get_footer();  ?>