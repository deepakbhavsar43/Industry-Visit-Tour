<?php
class WP_Travel_FW_Field {
	private $fields;
	private $field_types;
	function init( $fields = array(), $args = array() ) {
		$this->includes();
		$this->fields = $fields;
		if ( ! empty( $args['single'] ) && true === $args['single'] ) {
			$this->fields = array( $fields );
		}
		$this->field_types = $this->field_types();
		return $this;
	}

	private function includes() {
		include_once WP_TRAVEL_ABSPATH . 'inc/framework/form/fields/class.field.text.php';
		include_once WP_TRAVEL_ABSPATH . 'inc/framework/form/fields/class.field.email.php';
		include_once WP_TRAVEL_ABSPATH . 'inc/framework/form/fields/class.field.number.php';
		include_once WP_TRAVEL_ABSPATH . 'inc/framework/form/fields/class.field.hidden.php';
		include_once WP_TRAVEL_ABSPATH . 'inc/framework/form/fields/class.field.select.php';
		include_once WP_TRAVEL_ABSPATH . 'inc/framework/form/fields/class.field.category_dropdown.php';
		include_once WP_TRAVEL_ABSPATH . 'inc/framework/form/fields/class.field.country_dropdown.php';
		include_once WP_TRAVEL_ABSPATH . 'inc/framework/form/fields/class.field.textarea.php';
		include_once WP_TRAVEL_ABSPATH . 'inc/framework/form/fields/class.field.date.php';
		include_once WP_TRAVEL_ABSPATH . 'inc/framework/form/fields/class.field.radio.php';
		include_once WP_TRAVEL_ABSPATH . 'inc/framework/form/fields/class.field.checkbox.php';
		include_once WP_TRAVEL_ABSPATH . 'inc/framework/form/fields/class.field.text-info.php';
		include_once WP_TRAVEL_ABSPATH . 'inc/framework/form/fields/class.field.heading.php';
		include_once WP_TRAVEL_ABSPATH . 'inc/framework/form/fields/class.field.range.php';
		include_once WP_TRAVEL_ABSPATH . 'inc/framework/form/fields/class.field.date_range.php';
	}

	private function field_types() {
		$field_types['text'] = 'WP_Travel_FW_Field_Text';
		$field_types['email'] = 'WP_Travel_FW_Field_Email';
		$field_types['number'] = 'WP_Travel_FW_Field_Number';
		$field_types['hidden'] = 'WP_Travel_FW_Field_Hidden';
		$field_types['select'] = 'WP_Travel_FW_Field_Select';
		$field_types['category_dropdown'] = 'WP_Travel_FW_Field_Category_Dropdown';
		$field_types['country_dropdown'] = 'WP_Travel_FW_Field_Country_Dropdown';
		$field_types['textarea'] = 'WP_Travel_FW_Field_Textarea';
		$field_types['date'] = 'WP_Travel_FW_Field_Date';
		$field_types['radio'] = 'WP_Travel_FW_Field_Radio';
		$field_types['checkbox'] = 'WP_Travel_FW_Field_Checkbox';
		$field_types['text_info'] = 'WP_Travel_FW_Field_Text_Info';
		$field_types['heading'] = 'WP_Travel_FW_Field_Heading';
		$field_types['range'] = 'WP_Travel_FW_Field_Range';
		$field_types['date_range'] = 'WP_Travel_FW_Field_Date_Range';
		$field_types = apply_filters( 'wp_travel_register_field_types', $field_types );
		return $field_types;
	}

	private function process() {
		$output = '';
		if ( ! empty( $this->fields ) ) {
			foreach ( $this->fields as $field ) {
				$field = $this->verify_arguments( $field );
				if ( $field ) {
					$content = $this->process_single( $field );
					$output .= ( in_array( $field['type'], array( 'hidden', 'heading' ), true ) ) ? $content : $this->template( $field, $content );
				}
			}
		}
		return $output;
	}

	function template( $field, $content ) {
		ob_start(); ?>
			<div class="wp-travel-form-field <?php echo esc_attr( (isset($field['wrapper_class']))? $field['wrapper_class'] : '' ); ?>">
				<label for="<?php echo esc_attr( $field['id'] ); ?>">
					<?php echo esc_attr( $field['label'] ); ?>
					<?php if ( isset( $field['validations']['required'] ) ) { ?>
						<span class="required-label">*</span>
					<?php } ?>
				</label>
				<?php echo $content; ?>
			</div>
		<?php
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}

	function render() {
		echo $this->process();
	}

	function render_input( $field ) {
		if ( ! $field  ) {
			return;
		}
		echo $this->process_single( $field );
	}

	private function process_single( $field ) {
		$field = $this->verify_arguments( $field );
		if ( $field ) {
			$field_init = new $this->field_types[ $field['type'] ];
			return $field_init->init( $field )->render( false );
		}
		return;
	}

	function verify_arguments( $field ) {
		if ( ! empty( $field['type'] ) && array_key_exists( $field['type'], $this->field_types ) ) {
			$field['label'] = isset( $field['label'] ) ? $field['label'] : '';
			$field['name'] = isset( $field['name'] ) ? $field['name'] : '';
			$field['id'] = isset( $field['id'] ) ? $field['id'] : $field['name'];
			$field['class'] = isset( $field['class'] ) ? $field['class'] : '';
			$field['placeholder'] = isset( $field['placeholder'] ) ? $field['placeholder'] : '';
			$field['wrapper_class'] = isset( $field['wrapper_class'] ) ? $field['wrapper_class'] : '';
			$field['wrapper_class'] = ( 'text_info' === $field['type'] ) ? $field['wrapper_class'] . ' wp-travel-text-info' : $field['wrapper_class'];
			$field['default'] = isset( $field['default'] ) ? $field['default'] : '';
			$field['attributes'] = isset( $field['attributes'] ) ? $field['attributes'] : array();

			// remove required attr if set false.
			if ( isset( $field['validations']['required'] ) && ( false === $field['validations']['required'] || '' === $field['validations']['required'] ) ) {
				unset( $field['validations']['required'] );
			}

			// Lagacy code starts.
			if ( empty( $field['attributes']['placeholder'] ) && ! empty( $field['placeholder'] ) ) {
				$field['attributes']['placeholder'] = $field['placeholder'];
			}

			if ( empty( $field['attributes']['rows'] ) && ! empty( $field['rows'] ) ) {
				$field['attributes']['rows'] = $field['rows'];
			}

			if ( empty( $field['attributes']['cols'] ) && ! empty( $field['cols'] ) ) {
				$field['attributes']['cols'] = $field['cols'];
			}
			// Lagacy code ends.

			return $field;
		}

		return false;
	}
}
