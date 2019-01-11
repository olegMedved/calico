<?php 
   /*
   Template name:  Contact Page*/
    
  get_header( ); ?>
    
    
  <section class="contact-page">
		<div class="top-head">
			<h1>Contact Us</h1>
		</div> 
		<div class="container">
			<div class="row">
				<div class="pages-content clearfix">
					<div class="left col-md-4">
						<?php wp_reset_query();  the_content() ?>
						<ul>
							<li><?php the_field('address', 'option') ?></li>
							<li><a href="tel:<?php echo preg_replace('~^[0\D]++|\D++~', '', get_field('phone', 'option')) ?>"><?php the_field('phone', 'option') ?></a></li>
							<li><a href="tel:<?php echo preg_replace('~^[0\D]++|\D++~', '', get_field('fax', 'option')) ?>"><?php the_field('fax', 'option') ?></a></li>
							<li><a href="mailto:<?php the_field('mail', 'option') ?>"><?php the_field('mail', 'option') ?></a></li>
						</ul>
					</div>
					<div class="right col-md-8">
						<?php echo do_shortcode('[contact-form-7 id="4" title="Contact form 1"]') ?>

						
					</div>


				</div>
			</div>
		</div>
	</section>
	
	
	<?php get_template_part('parts/news-events') ?>  
 
 
<?php   get_footer();  ?>