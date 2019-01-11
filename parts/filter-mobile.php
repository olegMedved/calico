<div class="select-block">
	<div class="form-group">
		<label class="form-label" for="categories"></label>
		<select id="categories" onchange="location.href = this.value">
			<option data-display="Categories">Please select</option>
			<?php
			foreach (get_categories() as $cat) { ?>									
			 
				<option value="<?php echo get_category_link($cat->term_id) ?>"><?php echo $cat->name ?></option>
			<?php } ?>
		</select>
	</div>
	<div class="form-group">
		<label class="form-label" for="archives"></label>
		<select id="archives">
			<option data-display="Archives">Please select</option>
			<?php wp_get_archives( 'type=monthly&format=option&show_post_count=0' ); ?>
		</select>
	</div>
</div>