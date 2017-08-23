<?php
/**
 * Multiple checkbox customize control class.
 *
 * @since  1.1.38
 * @package hestia
 * @access public
 */

/**
 * Class Hestia_Multiple_Checkbox
 */
class Hestia_Multiple_Checkbox extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.1.38
	 * @access public
	 * @var    string
	 */
	public $type = 'checkbox-multiple';

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.1.38
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'hestia_multiple_checkbox_script', trailingslashit( get_template_directory_uri() ) . 'inc/customizer-multiple-checkbox/js/script.js', array( 'jquery' ), HESTIA_VERSION, true );
	}

	/**
	 * Displays the control content.
	 *
	 * @since  1.1.38
	 * @access public
	 * @return void
	 */
	public function render_content() {

		if ( empty( $this->choices ) ) {
			return;
		} ?>

		<?php if ( ! empty( $this->label ) ) : ?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<?php endif; ?>

		<?php if ( ! empty( $this->description ) ) : ?>
			<span class="description customize-control-description"><?php echo $this->description; ?></span>
		<?php endif; ?>

		<?php
		$multi_values = $this->value();
		if ( ! is_array( $multi_values ) ) {
			$multi_values = explode( ',', $this->value() );
		}
		?>

		<ul>
			<?php foreach ( $this->choices as $value => $label ) : ?>

				<li>
					<label>
						<input type="checkbox" value="<?php echo esc_attr( $value ); ?>" <?php checked( in_array( $value, $multi_values ) ); ?> />
						<?php echo esc_html( $label ); ?>
					</label>
				</li>

			<?php endforeach; ?>
		</ul>

		<input type="hidden" <?php $this->link(); ?> value="<?php echo esc_attr( implode( ',', $multi_values ) ); ?>" />
		<?php
	}
}

/**
 * Sanitize Hestia_Multiple_Checkbox input.
 *
 * @since  1.1.38
 * @param string $values Input value.
 * @return array
 */
function hestia_sanitize_multiple_checkbox( $values ) {

	$multi_values = ! is_array( $values ) ? explode( ',', $values ) : $values;

	return ! empty( $multi_values ) ? array_map( 'sanitize_text_field', $multi_values ) : array();
}
