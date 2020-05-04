<?php

function mtm_acf_check() { // Does ACF Exist?

	if( !function_exists( 'acf_add_options_page' ) ) {
		return false;
	}
}

/**
* Output header logo inside image tag, with link to homepage
* Optionally specify image size and class
*/
if( !function_exists( 'the_mtm_header_logo' ) ) {
	function the_mtm_header_logo( $path = '', $class = 'header-logo', $size = 'large' ) {

			if ( has_custom_logo() ) { // make sure field value exists

				$alt = get_bloginfo( 'name' );
				$custom_logo_id = get_theme_mod( 'custom_logo' );
				$thumb = wp_get_attachment_image_src( $custom_logo_id , $size );
				?>

				<a href="<?php echo esc_url( home_url( $path ) ); ?>"><img class="<?php echo $class ?>" src="<?php echo esc_url( $thumb[0] ); ?>" alt="<?php echo esc_attr( $alt ); ?>" /></a>

			<?php } else { // If nothing else is entered, show the blog name as usual ?>

				<a href="<?php echo esc_url( home_url( $path ) ); ?>"><?php bloginfo( 'name' ); ?></a>

			<?php }

	}
}

/**
* Output mobile logo inside image tag, with link to homepage
* Optionally specify image size and class
*/
if( !function_exists( 'the_mtm_mobile_logo' ) ) {
	function the_mtm_mobile_logo( $path = '', $class = 'header-logo-mobile', $size = 'medium' ) {

		if ( get_theme_mod( 'mtm_mobile_logo') ) : // make sure mobile logo exists

			$alt2 = get_bloginfo( 'name' );
			$custom_logo_id2 = get_theme_mod( 'mtm_mobile_logo' );
			$thumb2 = wp_get_attachment_image_src( $custom_logo_id2 , $size );
			?>

			<a href="<?php echo esc_url( home_url( $path ) ); ?>"><img class="<?php echo $class; ?>" src="<?php echo esc_url( $thumb2[0] ); ?>" alt="<?php echo esc_attr( $alt2 ); ?>" /></a>

		<?php endif;
	}
}

/**
* Outputs footer logo inside image tag, with link to homepage
*/
if( !function_exists( 'the_mtm_footer_logo' ) ) {
	function the_mtm_footer_logo(  $path = '', $class = 'footer-logo', $size = 'large'  ) {

			if ( get_theme_mod( 'mtm_footer_logo' ) ) { // make sure field value exists

				$alt = get_bloginfo( 'name' );
				$custom_logo_id = get_theme_mod( 'mtm_footer_logo' );
				$thumb = wp_get_attachment_image_src( $custom_logo_id , $size );
				?>

				<a href="<?php echo esc_url( home_url( $path ) ); ?>"><img class="<?php echo $class ?>" src="<?php echo esc_url( $thumb[0] ); ?>" alt="<?php echo esc_attr( $alt ); ?>" /></a>

			<?php }
	}
}

/**
* Outputs additional header text
*/
if( !function_exists( 'the_mtm_header_text' ) ) {
	function the_mtm_header_text() {

		if ( false !== mtm_acf_check() ) {

			if ( get_field( 'mtm_header_text', 'option' ) ) { // make sure field value exists

				esc_html( the_field( 'mtm_header_text', 'option' ) );

			}
		}
	}
}



/**
* Outputs copyright text with year and date
*/
if( !function_exists( 'the_mtm_footer_copyright' ) ) {
	function the_mtm_footer_copyright() {

		$html = '';

		if ( false !== mtm_acf_check() ) {

			if ( get_field( 'mtm_copyright_text', 'option' ) ) { // make sure field value exists

				$html .= '&copy; ' . date( 'Y' ) . ' ' . esc_html( get_field( 'mtm_copyright_text', 'option' ) );

			} else { // Show copyright year and site name

				$html .= '&copy; ' . date( 'Y' ) . ' ' . get_bloginfo( 'name' );

			}

		} else { // If ACF is inactive, Show copyright year and site name

			$html .= '&copy; ' . date( 'Y' ) . ' ' . get_bloginfo( 'name' );

		}

			echo '<p>' . $html . '</p>';

	}
}

/**
* Outputs additional footer text
*/
if( !function_exists( 'the_mtm_footer_text' ) ) {
	function the_mtm_footer_text() {

		if ( false !== mtm_acf_check() ) {

			if ( get_field( 'mtm_additional_text', 'option' ) ) { // make sure field value exists

				esc_html( the_field( 'mtm_additional_text', 'option' ) );

			}
		}
	}
}

/**
* Outputs social icons with custom classes based on social network name
* Compatible with Font Awesome if installed
* Fallback for unsupported social networks as well
*/
if( !function_exists( 'the_mtm_social_icons' ) ) {
	function the_mtm_social_icons( $prepend = '', $showtext = false, $btntxt = '' ) {

		//$btntxt = '';

		if ( false !== mtm_acf_check() ) :

			if ( get_field( 'mtm_default_social_accounts', 'option' ) ) :

	 				// ACF Repeater Field
					if( have_rows( 'mtm_default_social_accounts', 'option' ) ) : ?>

					<div class="social-icons">

						<?php while( have_rows( 'mtm_default_social_accounts', 'option'  ) ) : the_row(); // Loop through each item

							$btnclass = $prepend . sanitize_title_with_dashes( get_sub_field( 'mtm_default_social_name' ) );

							if ( $showtext ) {
								$btntxt = get_sub_field( 'mtm_default_social_name' );
							} ?>

							<a href="<?php the_sub_field( 'mtm_default_social_url' ); ?>"class="button button-social <?php echo $btnclass; ?>"><?php echo esc_html( $btntxt ); ?></a>

						<?php endwhile; ?>

					</div>

				<?php endif; // End ACF Repeater Field
			endif;
		endif;
	}
}

/**
* Social Icons Shortcode for use in content or widgets
*/

function social_icon_shortcode( $atts ) {
  $a = shortcode_atts( array(
        'prepend' => '',
        'showtext' => false,
        // ...etc
    ), $atts );
  ob_start();
  the_mtm_social_icons( $a['prepend'], $a['showtext'] );
  return ob_get_clean();
}

add_shortcode( 'social_icons', 'social_icon_shortcode' );

/**
* Outputs the post thumbnail with fallback for the default image
*/
if( !function_exists( 'the_mtm_post_thumbnail' ) ) {
	function the_mtm_post_thumbnail( $size = 'full', $class = '', $link = true, $attr ='' ) {
		$linkOpen = $link ? '<a aria-hidden="true" tabindex="-1" href="' . get_the_permalink() . '">':'';
    $linkClose = $link ? '</a>':'';
		if ( false !== mtm_acf_check() ) :
			if ( has_post_thumbnail() ) :
				echo $linkOpen . '<figure class="post--thumbnail bla ' . $class . '">'; the_post_thumbnail( $size, $attr ); echo '</figure>' . $linkClose;
			elseif ( get_field( 'mtm_default_featured_image', 'option' ) ) : // make sure field value exists
				$image = get_field( 'mtm_default_featured_image', 'option' );
				$thumb = $image['sizes'][ $size ];
				$alt = $image['alt'];
				echo $linkOpen . '<figure class="post--thumbnail default-thumbnail ' . $class . '"><img src="' . esc_url( $thumb ) .'" alt="' . esc_html( $alt ) . '" /></figure>' . $linkClose;
			endif;
		endif;
	}
}

/**
* Outputs the post thumbnail with fallback for the first inline image, then the default image
*/
if( !function_exists( 'the_mtm_post_thumbnail_inline' ) ) {
	function the_mtm_post_thumbnail_inline( $post_ID = '', $size = 'full', $class = '', $link = true, $attr ='' ) {
		$attachments = get_children( 'post_parent='. $post_ID .'&post_type=attachment&post_mime_type=image' );
    $linkOpen = $link ? '<a aria-hidden="true" tabindex="-1" href="' . get_the_permalink() . '">':'';
    $linkClose = $link ? '</a>':'';
		if ( false !== mtm_acf_check() ) :
			if ( has_post_thumbnail() ) : // is there a post thumbnail?
				echo $linkOpen . '<figure class="post--thumbnail bla ' . $class . '">'. get_the_post_thumbnail( $post_ID, $size, $attr ) . '</figure>' . $linkClose;
			elseif ( $attachments ) : // is there an inline image?
				$keys = array_reverse( array_keys ( $attachments ) );
				$image = wp_get_attachment_image( $keys[0], $size, true );
				echo $linkOpen . '<figure class="post--thumbnail ' .$class . '">' . $image . '</figure>' . $linkClose;
			elseif ( get_field( 'mtm_default_featured_image', 'option' ) ) : // make sure field value exists
				$image = get_field( 'mtm_default_featured_image', 'option' );
				$thumb = $image['sizes'][ $size ];
				$alt = $image['alt'];
				echo $linkOpen . '<figure class="post--thumbnail default-thumbnail ' . $class . '"><img src="' . esc_url( $thumb ) .'" alt="' . esc_html( $alt ) . '" /></figure>' . $linkClose;
			endif;
		endif;
	}
};
