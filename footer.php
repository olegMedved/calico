<a class="fancybox success-popup" href="#submit-window"></a>
	<div style="display: none">
		<div id="submit-window">
			<h2>Thank You!</h2>
			<p>Your message has been successfully sent. We will contact you very soon!</p>
		</div>
	</div>

	<footer>
		<div class="container">
			<div class="row">
				<div class="footer clearfix">
					<div class="item item-menu col-md-4">
						<?php al_main_menu('footer menu' ) ?>
					</div>
					<div class="item item-logo col-md-4">
						<div class="item-logo-wrap">
							<div class="logo"><a href="index.html"><img src="<?php echo get_template_directory_uri() ?>/img/footer-logo.png" alt=""></a></div>
							<p>© <?php echo date('Y') ?> Calico Photography
								Designed by Jay Hafling</p>
						</div>
					</div>
					<div class="item item-soc col-md-4">
						<p>Phone</p>
						<a href="tel:<?php the_field('phone','option') ?>"><?php the_field('phone','option') ?></a>
						<p>email</p>
						<a href="mailto:<?php the_field('email','option') ?>"><?php the_field('email','option') ?></a>
						<p>Social Networks</p>
						<a href="<?php the_field('facebook','option') ?>"><i class="fab fa-facebook-square"></i></a>
						<a href="<?php the_field('instagramm','option') ?>"><i class="fab fa-instagram"></i></a>
					</div>
					
			 
						
				</div>
			</div>
		</div>
	</footer>
	<script>$ = jQuery</script>
	<?php wp_footer() ?>
</body>
</html>
	
