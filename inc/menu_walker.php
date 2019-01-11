<?php

// свой класс построения меню:
class magomra_walker_nav_menu extends Walker_Nav_Menu {

	// add classes to ul sub-menus
	function start_lvl( &$output, $depth ) {
		// depth dependent classes
		$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
		$display_depth = ( $depth + 1); // because it counts the first submenu as 0
		$classes = array(
			'sub-menu',
			( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
			( $display_depth >=2 ? 'sub-sub-menu' : '' ),
			'menu-depth-' . $display_depth
			);
		$class_names = implode( ' ', $classes );

		// build html.
		if ($display_depth == 1)
		$output .= "\n" . $indent . '
 
			 
			 	<ul class="submenu ' . $class_names . '">' . "\n";
		else
		$output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
	}
	function end_lvl( &$output, $depth = 0, $args = array() ) {
 	                if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
 	                        $t = '';
 	                        $n = '';
 	                } else {
 	                        $t = "\t";
 	                        $n = "\n";
 	                }
 	                $indent = str_repeat( $t, $depth );
 	               
 	               if ($display_depth == 1)
 	                $output .= "$indent</ul>  {$n}";
 	               else
 	                $output .= "$indent</ul>{$n}";
         } 
  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';
 
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
 
 
        $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );
 
 
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
 
 
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
 
        $output .= $indent . '<li' . $id . $class_names .'>';
 
        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
 
 
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
 
        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
 
        /** This filter is documented in wp-includes/post-template.php */
        $title = apply_filters( 'the_title', $item->title, $item->ID );
 
 
        $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
 		
 		$i =  in_array('menu-item-has-children',$item->classes) ? '<i class="fas fa-chevron-down"></i>' : '';
 		
        $item_output = $args->before;
        $item_output .= '<a'. $attributes .' class="'.$classes.'">';
        $item_output .= $args->link_before . $title . $args->link_after . ' '. $i;
        $item_output .= '</a>';
        $item_output .= $args->after;
  
 
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
 
}

 