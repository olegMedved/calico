<?php 
 
  get_header( );  ?>
    
    
 	<section class="header-banner-wrap blog-page-header">
		<div class="container-fluid">
			<div class="row">
				<div class="header-banner">
					<h1>Blog</h1>
				</div>
			</div>
		</div>
	</section>



	<section class="pages-content-wrap blog-page-wrap">
		<div class="container">
			<div class="row clearfix">
				<div class="pages-content blog-page">
					 
					<?php                                 
                    	while ($wp_query->have_posts()) {
						$wp_query->the_post();
					?>
					
					<div class="item item-last">
						<div class="img">
							<a href="<?php the_permalink() ?>">
								<?php if (get_post(get_field('_thumbnail_id'))->post_status == 'inherit' )                         
		                         the_post_thumbnail('large');
		                         elseif(catch_that_image()) 
		                         echo '<img src="'.catch_that_image().'" >';
		                         
		                           ?>
							</a>
						</div>
						<div class="text">
							<h2><?php the_title( ) ?></h2>
							<div class="text-long">
								<p><?php echo al_short_excerpt(300) ?></p>
							</div>
							<div class="bottom">
								<p><span><?php echo get_the_date() ?></span> <a href="<?php the_permalink() ?>">Read More</a></p>
							</div>
						</div>
					</div>
					
					<?php } ?>
					
					<div class="pagination-wrap">
						<div class="pagination">
							<?php al_corenavi() ?>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>


 
 
<?php   get_footer();  ?>