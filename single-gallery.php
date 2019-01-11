<?php   
get_header( ); 
$post_id = get_the_id(); 
$link = get_permalink($post_id); ?>
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
						<li ><a href="<?php echo get_post_type_archive_link('gallery') ?>">All</a></li>
						<?php     
						$wp_query = new WP_query(array('post_type' => 'gallery'));                            
                    	while ($wp_query->have_posts()) {
							$wp_query->the_post();
						?>
						<li class="<?php echo $post_id == $post->ID ? 'active' : '' ?>"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li>
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
						<?php //   if (!$_GET['pp']) { ?>
					 	<div class="grid-sizer"></div> 
						<?php //  } ?>
						<?php
						$loop = 0;
						wp_reset_query();
						$per_page = $_GET['pp'] ? $_GET['pp'] : 50;
						
						
						
						wp_reset_query();
						
					 
					 	$post__in = wp_list_pluck(get_field('images'), 'ID');
						
				 
						$wp_query = new WP_Query( array( 
							'post__in' => $post__in,
	 
							'orderby' => 'post__in',
							'post_status'   => 'any',
							'posts_per_page' => 50,
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
						$total    = count($post__in);
						  
				 			
						?>
					<?php  if ( $loop <= $total && $post__in  ) {	?>
					<div class="btn"><a data-loop="<?php echo $loop ?>" data-count="<?php echo $total ?>"  data-post_id="<?php echo $post_id ?>" href="<?php echo $new_url ?>" class="btn-default show-more">View More</a></div>
					<?php  } ?>
					</div>
				</div>
			</div>
		</div>
	</section>



 
 
<?php   get_footer();  ?>