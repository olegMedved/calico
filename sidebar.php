<div class="left col-lg-3">
							<div>
								<div class="top">
									<h3>Categories</h3>
								</div>
								<ul class="data-menu">
									<?php wp_list_categories('title_li=') ?>	
								</ul>
							</div>
							<div>
								<div class="top">
									<h3>Archives</h3>
								</div>
								
								<ul class="data-menu data-menu2 ">
				 
									<?php
								    $currentyear = date("Y");
								    $years = range($currentyear, 2016);
								    foreach($years as $year) { ?>
								    		<li><a href="#"><?php echo $year; ?></a>
								        <?php
								        $archi = wp_get_archives('echo=0&show_post_count=0&type=monthly&year=' . $year);
								        $archi = explode('</li>', $archi);
								        $links = array();
								        foreach($archi as $link) {
								            $link = str_replace(array('<li>', "\n", "\t", "\s"), '' , $link);
								            if('' != $link)
								                $links[] = $link;
								            else
								                continue;
								        }
								        $fliplinks = array_reverse($links);
								        if(!empty($fliplinks)) {
								            echo '<ul class="sub-menu">';
								            foreach($fliplinks as $link) {
								                echo '<li>' . $link . '</li>';
								            }
								            echo '</ul>';
								        } else {
								           
								        }
								        ?>
								        </li>
								    <?php } ?>
								</ul>
								
						 
							</div>
						</div>