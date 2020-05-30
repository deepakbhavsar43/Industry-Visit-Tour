<?php
/**
 * Implement theme metabox.
 *
 * @package Travel_Eye
 */

if ( ! function_exists( 'travel_eye_add_theme_meta_box' ) ) :

	/**
	 * Add the Meta Box
	 *
	 * @since 1.0.0
	 */
	function travel_eye_add_theme_meta_box() {

		$apply_metabox_post_types = array( 'post', 'page' );

		foreach ( $apply_metabox_post_types as $key => $type ) {
			add_meta_box(
				'theme-settings',
				esc_html__( 'Theme Settings', 'travel-eye' ),
				'travel_eye_render_theme_settings_metabox',
				$type
			);
		}

	}

endif;

add_action( 'add_meta_boxes', 'travel_eye_add_theme_meta_box' );

if ( ! function_exists( 'travel_eye_render_theme_settings_metabox' ) ) :

	/**
	 * Render theme settings meta box.
	 *
	 * @since 1.0.0
	 */
	function travel_eye_render_theme_settings_metabox( $post, $metabox ) {

		$post_id = $post->ID;

		// Meta box nonce for verification.
		wp_nonce_field( basename( __FILE__ ), 'travel_eye_theme_settings_meta_box_nonce' );

		// Fetch Options list.
		$global_layout_options   = travel_eye_get_global_layout_options();
		$image_size_options      = travel_eye_get_image_sizes_options( true, array( 'disable', 'large' ), false );

		// Fetch values of current post meta.
		$values = get_post_meta( $post_id, 'travel_eye_theme_settings', true );

		$post_layout = isset( $values['post_layout'] ) ? esc_attr( $values['post_layout'] ) : '';
		$disable_breadcrumb = isset( $values['disable_breadcrumb'] ) ? esc_attr( $values['disable_breadcrumb'] ) : '';
		$single_image = isset( $values['single_image'] ) ? esc_attr( $values['single_image'] ) : '';
		$disable_banner_area = isset( $values['disable_banner_area'] ) ? esc_attr( $values['disable_banner_area'] ) : '';
		$use_featured_image_as_banner = isset( $values['use_featured_image_as_banner'] ) ? esc_attr( $values['use_featured_image_as_banner'] ) : '';

	?>
	<div id="travel-eye-settings-metabox-container" class="travel-eye-settings-container">
		<ul class='travel-eye-settings-tabs'>
			<li class='tab'><a href="#travel-eye-settings-metabox-tab-layout"><?php echo __( 'Layout', 'travel-eye' ); ?></a></li>
			<li class='tab'><a href="#travel-eye-settings-metabox-tab-image"><?php echo __( 'Image', 'travel-eye' ); ?></a></li>
			<li class='tab'><a href="#travel-eye-settings-metabox-tab-breadcrumb"><?php echo __( 'Breadcrumb', 'travel-eye' ); ?></a></li>
		</ul>
		<div id="travel-eye-settings-metabox-tab-layout">
			<h4><?php echo __( 'Layout Settings', 'travel-eye' ); ?></h4>
			<div class="travel-eye-row-content">
				<label for="travel_eye_theme_settings_post_layout">
					<?php echo esc_html__( 'Single Layout', 'travel-eye' ); ?>
				</label>
				<select name="travel_eye_theme_settings[post_layout]" id="travel_eye_theme_settings_post_layout">
					<option value=""><?php echo esc_html__( 'Default', 'travel-eye' ); ?></option>
					<?php if ( ! empty( $global_layout_options ) ) :  ?>
						<?php foreach ( $global_layout_options as $key => $val ) :  ?>

							<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $post_layout, $key ); ?> ><?php echo esc_html( $val ); ?></option>

						<?php endforeach ?>
					<?php endif ?>
				</select>
			</div><!-- .travel-eye-row-content -->
		</div><!-- #travel-eye-settings-metabox-tab-layout -->

		<div id="travel-eye-settings-metabox-tab-image">
			<h4><?php _e( 'Image Settings', 'travel-eye' ); ?></h4>
			<div class="travel-eye-row-content">
				<input type="hidden" name="travel_eye_theme_settings[disable_banner_area]" value="0" />
				<label for="travel_eye_theme_settings_disable_banner_area"><input type="checkbox" name="travel_eye_theme_settings[disable_banner_area]" id="travel_eye_theme_settings_disable_banner_area" value="1" <?php checked( $disable_banner_area, '1' )  ?> />&nbsp;<span class="field-description"><?php _e( 'Check to Disable Banner Image Area', 'travel-eye' )?></span></label>
			</div>
			<div class="travel-eye-row-content">
				<input type="hidden" name="travel_eye_theme_settings[use_featured_image_as_banner]" value="0" />
				<label><input type="checkbox" name="travel_eye_theme_settings[use_featured_image_as_banner]" id="travel_eye_theme_settings_use_featured_image_as_banner" value="1" <?php checked( $use_featured_image_as_banner, '1' );  ?> />&nbsp;<span class="field-description"><?php _e( 'Check to Use Featured Image as Banner', 'travel-eye' )?></span></label>
			</div>

			<!-- Image in single post/page -->
			<div class="travel-eye-row-content">
				<label for="travel_eye_theme_settings_single_image"><?php echo esc_html__( 'Image Size in Single Post/Page', 'travel-eye' ); ?></label>
				<select name="travel_eye_theme_settings[single_image]" id="travel_eye_theme_settings_single_image">
					<option value=""><?php echo esc_html__( 'Default', 'travel-eye' ); ?></option>
					<?php if ( ! empty( $image_size_options ) ) :  ?>
						<?php foreach ( $image_size_options as $key => $val ) :  ?>

							<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $single_image, $key ); ?> ><?php echo esc_html( $val ); ?></option>

						<?php endforeach ?>
					<?php endif ?>
				</select>
			</div><!-- .travel-eye-row-content -->

		</div><!-- #travel-eye-settings-metabox-tab-image -->

		<div id="travel-eye-settings-metabox-tab-breadcrumb">
			<h4><?php echo __( 'Breadcrumb Settings', 'travel-eye' ); ?></h4>
			<div class="travel-eye-row-content">
				<input type="hidden" name="travel_eye_theme_settings[disable_breadcrumb]" value="0" />
				<label for="travel_eye_theme_settings_disable_breadcrumb"><input type="checkbox" name="travel_eye_theme_settings[disable_breadcrumb]" id="travel_eye_theme_settings_disable_breadcrumb" value="1" <?php checked( $disable_breadcrumb, '1' );  ?> />&nbsp;<span class="field-description"><?php _e( 'Check to Disable Breadcrumb', 'travel-eye' )?></span></label>
			</div><!-- .travel-eye-row-content -->
		</div><!-- #travel-eye-settings-metabox-tab-breadcrumb -->

	</div><!-- #travel-eye-settings-metabox-container -->

    <?php
	}

endif;



if ( ! function_exists( 'travel_eye_save_theme_settings_meta' ) ) :

	/**
	 * Save theme settings meta box value.
	 *
	 * @since 1.0.0
	 *
	 * @param int     $post_id Post ID.
	 * @param WP_Post $post Post object.
	 */
	function travel_eye_save_theme_settings_meta( $post_id, $post ) {

		// Verify nonce.
		if (
			! ( isset( $_POST['travel_eye_theme_settings_meta_box_nonce'] )
			&& wp_verify_nonce( sanitize_key( $_POST['travel_eye_theme_settings_meta_box_nonce'] ), basename( __FILE__ ) ) )
		) {
			return;
		}

		// Bail if auto save or revision.
		if ( defined( 'DOING_AUTOSAVE' ) || is_int( wp_is_post_revision( $post ) ) || is_int( wp_is_post_autosave( $post ) ) ) {
			return;
		}

		// Check the post being saved == the $post_id to prevent triggering this call for other save_post events.
		if ( empty( $_POST['post_ID'] ) || absint( $_POST['post_ID'] ) !== $post_id ) {
			return;
		}

		// Check permission.
		if ( isset( $_POST['post_type'] ) && 'page' === $_POST['post_type'] ) {
			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return;
			}
		} else if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		if ( isset( $_POST['travel_eye_theme_settings'] ) && is_array( $_POST['travel_eye_theme_settings'] ) ) {
			$raw_value = wp_unslash( $_POST['travel_eye_theme_settings'] );

			if ( ! array_filter( $raw_value ) ) {

				// No value.
				delete_post_meta( $post_id, 'travel_eye_theme_settings' );

			} else {

				$meta_fields = array(
					'post_layout' => array(
						'type' => 'select',
						),
					'disable_breadcrumb' => array(
						'type' => 'checkbox',
						),
					'single_image' => array(
						'type' => 'select',
						),
					'disable_banner_area' => array(
						'type' => 'checkbox',
						),
					'use_featured_image_as_banner' => array(
						'type' => 'checkbox',
						),
					);

				$sanitized_values = array();

				foreach ( $raw_value as $mk => $mv ) {

					if ( isset( $meta_fields[ $mk ]['type'] ) ) {
						switch ( $meta_fields[ $mk ]['type'] ) {
							case 'select':
								$sanitized_values[ $mk ] = sanitize_key( $mv );
								break;
							case 'checkbox':
								$sanitized_values[ $mk ] = absint( $mv ) > 0 ? 1 : 0;
								break;
							default:
								$sanitized_values[ $mk ] = sanitize_text_field( $mv );
								break;
						}
					} // End if.

				}

				update_post_meta( $post_id, 'travel_eye_theme_settings', $sanitized_values );
			}

		} // End if theme settings.

	}

endif;

add_action( 'save_post', 'travel_eye_save_theme_settings_meta', 10, 2 );
