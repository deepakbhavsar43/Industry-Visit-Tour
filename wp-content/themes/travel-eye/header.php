<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Travel_Eye
 */

?><?php
	/**
	 * Hook - travel_eye_action_doctype.
	 *
	 * @hooked travel_eye_doctype -  10
	 */
	do_action( 'travel_eye_action_doctype' );
?>
<head>
	<?php
	/**
	 * Hook - travel_eye_action_head.
	 *
	 * @hooked travel_eye_head -  10
	 */
	do_action( 'travel_eye_action_head' );
	?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php
	/**
	 * Hook - travel_eye_action_before.
	 *
	 * @hooked travel_eye_page_start - 10
	 * @hooked travel_eye_skip_to_content - 15
	 */
	do_action( 'travel_eye_action_before' );
	?>

    <?php
	  /**
	   * Hook - travel_eye_action_before_header.
	   *
	   * @hooked travel_eye_add_top_header - 5
	   * @hooked travel_eye_header_start - 10
	   */
	  do_action( 'travel_eye_action_before_header' );
	?>
		<?php
		/**
		 * Hook - travel_eye_action_header.
		 *
		 * @hooked travel_eye_site_branding - 10
		 */
		do_action( 'travel_eye_action_header' );
		?>
    <?php
	  /**
	   * Hook - travel_eye_action_after_header.
	   *
	   * @hooked travel_eye_header_end - 10
	   * @hooked travel_eye_add_primary_navigation - 20
	   */
	  do_action( 'travel_eye_action_after_header' );
	?>

	<?php
	/**
	 * Hook - travel_eye_action_before_content.
	 *
	 * @hooked travel_eye_add_breadcrumb - 7
	 * @hooked travel_eye_content_start - 10
	 */
	do_action( 'travel_eye_action_before_content' );
	?>
    <?php
	  /**
	   * Hook - travel_eye_action_content.
	   */
	  do_action( 'travel_eye_action_content' );
	?>
