<?php   
get_header( );   ?>

 	<section class="header-banner-wrap gallery-header">
		<div class="container-fluid">
			<div class="row">
				<div class="header-banner">
					<h1>Gallery</h1>
				</div>
			</div>
		</div>
	</section>



	<section class="pages-content-wrap gallery-wrap">
		<div class="container-fluid">
			<div class="row clearfix">
				<div class="pages-content gallery">
					<ul class="menu-gallery">
						<li class="active"><a href="<?php echo get_post_type_archive_link('gallery') ?>">All</a></li>
						<?php     
						$wp_query = new WP_query(array('post_type' => 'gallery'));                            
                    	while ($wp_query->have_posts()) {
							$wp_query->the_post();
						?>
						<li><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li>
						<?php } ?>
					</ul>
					<div class="select-block">
						<div class="form-group">
							<label class="form-label" for="categories"></label>
							<select id="categories" onchange="location.href=this.value">
								<option value="<?php echo get_post_type_archive_link('gallery') ?>" data-display="All">All</option>
								<?php     
								$wp_query = new WP_query(array('post_type' => 'gallery'));                            
		                    	while ($wp_query->have_posts()) {
									$wp_query->the_post();
								?>
								<option <?php selected($post_id, $post->ID) ?> value="<?php the_permalink() ?>"><?php the_title() ?></option>
								 
								<?php } ?>
								 
							</select>
						</div>

					</div>
					<div class="  filter-area">
					<div class="grid clearfix  ">
			 
						<div class="grid-sizer"></div>
					 
						<?php
						wp_reset_query();
						$per_page = $_GET['pp'] ? $_GET['pp'] : 50;
		 
					 
						    
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
						
 
						$wp_query = new WP_Query( array( 
							'post__in' => $post__in,
							  
							'orderby' => 'rand',
							'post_status'   => 'inherit',
							'posts_per_page' => $per_page,
							'post_type'     => 'attachment',
							'post_mime_type'     => 'image/%',
						) );
						
					 	
					 	while ($wp_query->have_posts() && $post__in) {
							$wp_query->the_post();
							$loop++;
							$url = wp_get_attachment_image_url($post->ID, 'full');
							$r = $loop == 1 ? '2' : '1';
 
							$thumb = wp_get_attachment_image_url($post->ID, 'width'.$r);
	 
							?>
							
					 
							<div class="grid-item <?php echo $loop == 1 ? 'grid-item--width2' : '' ?>">
								<a  href="<?php echo $url ?>" data-fancybox="images" class="fancybox">
									<img src="<?php echo $thumb  ?>">
								</a>
							</div>
						<?php } ?>
						
						</div>
						<?php
						global $wp_query;			 
						$total    = $wp_query->found_posts;
						 
		 			
						?>
					<?php  if ( $loop <= $total   ) {	?>
					<div class="btn"><a data-all="1" data-loop="<?php echo $loop ?>" data-count="<?php echo $total ?>"  data-post_id="<?php echo $post_id ?>" href="<?php echo $new_url ?>" class="btn-default show-more">View More</a></div>
					<?php  } ?>
					</div>
				</div>
			</div>
		</div>
	</section>



 
 
<?php   get_footer();  ?>