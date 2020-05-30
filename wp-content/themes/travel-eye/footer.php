<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Travel_Eye
 */

	/**
	 * Hook - travel_eye_action_after_content.
	 *
	 * @hooked travel_eye_content_end - 10
	 */
	do_action( 'travel_eye_action_after_content' );
?>

	<?php
	/**
	 * Hook - travel_eye_action_before_footer.
	 *
	 * @hooked travel_eye_footer_start - 10
	 */
	do_action( 'travel_eye_action_before_footer' );
	?>
    <?php
	  /**
	   * Hook - travel_eye_action_footer.
	   *
	   * @hooked travel_eye_footer_copyright - 10
	   */
	  do_action( 'travel_eye_action_footer' );
	?>
	<?php
	/**
	 * Hook - travel_eye_action_after_footer.
	 *
	 * @hooked travel_eye_footer_end - 10
	 */
	do_action( 'travel_eye_action_after_footer' );
	?>

<?php
	/**
	 * Hook - travel_eye_action_after.
	 *
	 * @hooked travel_eye_page_end - 10
	 * @hooked travel_eye_footer_goto_top - 20
	 */
	do_action( 'travel_eye_action_after' );
?>

<?php wp_footer(); ?>
</body>
</html>
