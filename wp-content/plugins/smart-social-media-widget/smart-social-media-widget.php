<?php
/*
 * Plugin Name: Smart Social Media Widget
 * Description: Minimalistic and clean social media widget that is easy to use.
 * Author: Alexander Tchernitchenko
 * Version: 2.0.0
 * Author URI: http://www.tchernitchenko.com
 * License: GPL2
 */

class Smart_Social_Media_Widget extends WP_Widget
{

	private $all;
	private $social_media;
	private $design;
	private $music;
	private $programming;
	private $gaming;
	private $other; 

	public function __construct() {
		$widget_ops = array( 'classname' => 'smart-social-media-widget', 'description' => 'A smart and simple social media widget' );
		parent::__construct( 'smart-social-media-widget', 'Smart Social Media Widget', $widget_ops );

		add_action( 'init', array( $this, 'upload_scripts' ) );
		// add_action( 'wp_enqueue_scripts', array( $this, 'check_scripts' ), 99999 );

		$this->social_media = array( 'facebook', 'twitter', 'instagram', 'youtube', 'pinterest', 'snapchat', 'skype', 'whatsapp', 'google_plus', 'linkedin', 'vine', 'weibo', 'vkontakte', 'odnoklassniki', 'xing', 'viadeo', 'vimeo', 'tumblr' );
		$this->design = array( 'behance', 'dribbble', 'deviantart' );
		$this->music = array( 'spotify', 'soundcloud' );
		$this->programming = array( 'github', 'stack_overflow', 'codepen', 'gitlab', 'jsfiddle' );
		$this->gaming = array( 'twitch', 'steam' );
		$this->other = array( 'flickr', 'reddit', 'medium', 'stack_exchange', 'amazon', 'foursquare', 'tripadvisor', 'yelp', 'paypal', '500px' );
		$this->all = array_merge( $this->social_media, $this->design, $this->music, $this->programming, $this->gaming, $this->other );

	}

	public function upload_scripts() {

		if( !wp_script_is('jquery')) {
		    wp_enqueue_script('jquery');
		}

        wp_enqueue_style( 'ssmw-style', plugin_dir_url(__FILE__) . 'css/style.css' );
        wp_enqueue_script( 'ssmw-js', plugin_dir_url(__FILE__) . 'js/custom.js', array( 'jquery' ) );
        wp_enqueue_style('font-awesome', plugin_dir_url(__FILE__) . 'css/font-awesome.min.css', array(), '4.6.3' );
    }

	public function widget( $args, $instance ) {

		/** This filter is documented in wp-includes/default-widgets.php */
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$rows = ! empty( $instance['rows'] ) ? $instance['rows'] : 'one';
		$alignment = ! empty( $instance['alignment'] ) ? $instance['alignment'] : 'left';
		$color = ! empty( $instance['color'] ) ? $instance['color'] : 'black';
		$animation = ! empty( $instance['animation'] ) ? $instance['animation'] : 'fade';
		$fontsize = ! empty( $instance['fontsize'] ) ? $instance['fontsize'] : '20px';
		$style = ! empty( $instance['style'] ) ? $instance['style'] : 'simple';
		foreach ( $this->all as $social ) {
			$$social = ! empty( $instance[$social] ) ? $instance[$social] : '';
		}

		//Output
		echo $args['before_widget'];
		echo $args['before_title'] . $title . $args['after_title'];

		//Count how many icons will be shown
		$amount = 0;
		foreach ( $this->all as $social ) {
			if ( ! empty( $$social ) ) {
				$amount++;
			}
		}

		//Simple styling with one row.
		if ( $style == 'simple' && $rows == 'one' && $amount !== 0 ) {

			$width = 100 / $amount;

			if ( $width !== 100 && $amount > 2 ) {
				$width = str_replace( ".", "", substr( $width, 0, 2 ) );
			} else {
				$width = 'custom';
			}

			//Icon classes
			$classes =  'ssmw-' . $animation . ' ssmw-button' . ' ssmw-color-' . $color . ' ssmw-icon-' . $fontsize;

			//Output
			foreach ( $this->all as $social ) {
				if ( ! empty( $$social ) ) {
					?>

					<p class="ssmw-simple ssmw-button-container <?php echo 'ssmw-' . $alignment . ' ssmw-width-' . $width; ?>" >
						<a target="_blank" href="<?php echo esc_url( $$social ); ?>" class="<?php echo $classes . ' ssmw-' . $social; ?>">
						</a>
					</p>

					<?php
				}
			}
		} 
		//Simple style two rows
		elseif ( $style == 'simple' && $rows == 'two' && $amount !== 0 ) {

			//Check if amount is uneven
			if ( $amount & 1 ) {
				$amount++;
			}

			//Determine the width for each icon
			$width = 200 / $amount;
			if ( strlen( $width > 2 ) && $width !== 100 ) {
				$width = str_replace( ".", "", substr( $width, 0, 2 ) );
			}

			$classes =  'ssmw-' . $animation . ' ssmw-button' . ' ssmw-color-' . $color . ' ssmw-icon-' . $fontsize;
			?>

			<div class="ssmw-first-row">

			<?php
			//For counting where to open next row.
			$i = 0;
			$max = round( $amount / 2 );

			//Output
			foreach ( $this->all as $social ) {
				if ( !empty( $$social ) ) {


					if( $i == $max ) {
						?>
						</div>
						<div class="ssmw-second-row">
						<?php
					}
					?>

					<p class="ssmw-simple ssmw-button-container <?php echo 'ssmw-' . $alignment . ' ssmw-width-' . $width; ?>" >
						<a target="_blank" href="<?php echo esc_url( $$social ); ?>" class="<?php echo $classes . ' ssmw-' . $social; ?>">

						</a>
					</p>

					<?php
					$i++;
				}


			}
			?>
			</div>

	<?php
		} 
		//Boxed style
		elseif ( $style == 'boxed' ) {


			//Output
			foreach ( $this->all as $social) {
				if ( !empty( $$social ) ) {
				?>
			
					<a target="_blank" href="<?php echo esc_url( $$social ); ?>" class="ssmw-boxed ssmw-boxed-<?php echo $social . ' ssmw-icon-' . $fontsize . ' ssmw-' . $animation; ?>">
						
						<p class="<?php echo 'ssmw-' . $social . ' ssmw-icon-' . $fontsize; ?>"></p>

					</a>

				<?php
				}
			}
		}


		echo $args['after_widget'];

	}


	//Update
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['rows'] = $new_instance['rows'];
		$instance['alignment'] = $new_instance['alignment'];
		$instance['color'] = $new_instance['color'];
		$instance['animation'] = $new_instance['animation'];
		$instance['fontsize'] = $new_instance['fontsize'];
		$instance['style'] = $new_instance['style'];

		foreach ( $this->all as $social ) {
			$instance[$social] = esc_url( $new_instance[$social] );
		}

		return $instance;
	}



//Form
public function form( $instance ) {

	//Defaults
	$title = ! empty( $instance['title'] ) ? esc_attr($instance['title']) : '' ;
	$rows = ! empty( $instance['rows'] ) ? $instance['rows'] : 'one';
	$alignment = ! empty( $instance['alignment'] ) ? $instance['alignment'] : 'left';
	$color = ! empty( $instance['color'] ) ? $instance['color'] : 'black';
	$animation = ! empty( $instance['animation'] ) ? $instance['animation'] : 'fade';
	$fontsize = ! empty( $instance['fontsize'] ) ? $instance['fontsize'] : '20px';
	$style = ! empty( $instance['style'] ) ? $instance['style'] : 'simple';


    foreach ( $this->all as $social ) {
    	$$social = ! empty( $instance[$social] ) ? esc_url( $instance[$social] ) : '';
    }
    ?>


<div class="ssmw-form-container">
	<!--Intro message-->
    <p class="ssmw-info">
    	Thank you for using Smart Social Media Widget! If you like this little widget I'd love if you could <a href="<?php echo esc_url( 'https://wordpress.org/support/view/plugin-reviews/smart-social-media-widget' ); ?>" target="_blank">leave a quick review.</a> Thank you. &#x2764;
    </p>

    <!-- Style option -->
	<p class="ssmw-style-label"><?php _e( 'Style', 'ssmw' ); ?></p>
	<p>
	    <label class="ssmw-radio-label" for="<?php echo $this->get_field_id('style'); ?>">
	        <?php _e('Simple:', 'ssmw'); ?>
	        <input class="ssmw-is-simple ssmw-radio" id="<?php echo $this->get_field_id('simple'); ?>" name="<?php echo $this->get_field_name('style'); ?>" type="radio" value="simple" <?php if($style == 'simple'){ echo 'checked="checked"'; } ?> />
	    </label><br>
	    <label class="ssmw-radio-label" for="<?php echo $this->get_field_id('style'); ?>">
	        <?php _e('Boxed:', 'ssmw'); ?>
	        <input class="ssmw-is-boxed ssmw-radio" id="<?php echo $this->get_field_id('boxed'); ?>" name="<?php echo $this->get_field_name('style'); ?>" type="radio" value="boxed" <?php if($style == 'boxed'){ echo 'checked="checked"'; } ?> />
	    </label>
	</p>


	<!-- Title setting -->
	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title', 'ssmw' ); ?></label>
		<input class="widefat ssmw-input" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	</p>


	<!-- Animation option -->
	<p>
		<label for="<?php echo $this->get_field_id('animation'); ?>"><?php _e( 'Hover animation', 'ssmw' ); ?></label>
		<select class="widefat ssmw-input" id="<?php echo $this->get_field_id('animation'); ?>" name="<?php echo $this->get_field_name('animation'); ?>">
			<option <?php if ( $animation == 'fade' ) { echo 'selected="selected"'; } ?> value="fade"><?php _e( 'Fade', 'ssmw' ); ?></option>
			<option <?php if ( $animation == 'none' ) { echo 'selected="selected"'; } ?> value="none"><?php _e( 'None', 'ssmw' ); ?></option>
		</select>
	</p>


	<!-- Size option-->
	<p><label for="<?php echo $this->get_field_id('fontsize'); ?>"><?php _e( 'Font Size', 'ssmw' ); ?></label>
	<select class="widefat ssmw-input" id="<?php echo $this->get_field_id('fontsize'); ?>" name="<?php echo $this->get_field_name('fontsize'); ?>">
		<option <?php if ( $fontsize == '16px' ) { echo 'selected="selected"'; } ?> value="16px"><?php _e( '16', 'ssmw' ); ?></option>
		<option <?php if ( $fontsize == '18px' ) { echo 'selected="selected"'; } ?> value="18px"><?php _e( '18', 'ssmw' ); ?></option>
		<option <?php if ( $fontsize == '20px' ) { echo 'selected="selected"'; } ?> value="20px"><?php _e( '20', 'ssmw' ); ?></option>
		<option <?php if ( $fontsize == '22px' ) { echo 'selected="selected"'; } ?> value="22px"><?php _e( '22', 'ssmw' ); ?></option>
		<option <?php if ( $fontsize == '24px' ) { echo 'selected="selected"'; } ?> value="24px"><?php _e( '24', 'ssmw' ); ?></option>
		<option <?php if ( $fontsize == '26px' ) { echo 'selected="selected"'; } ?> value="26px"><?php _e( '26', 'ssmw' ); ?></option>
		<option <?php if ( $fontsize == '28px' ) { echo 'selected="selected"'; } ?> value="28px"><?php _e( '28', 'ssmw' ); ?></option>
	</select></p>


	<!-- Color option -->
	<p class="ssmw-color <?php if ( $style == 'boxed' ) { echo 'ssmw-hidden'; } ?>">
		<label for="<?php echo $this->get_field_id('color'); ?>"><?php _e( 'Icon color', 'ssmw' ); ?></label>
		<select class="widefat ssmw-input" id="<?php echo $this->get_field_id('color'); ?>" name="<?php echo $this->get_field_name('color'); ?>">
			<option <?php if ( $color == 'black' ) { echo 'selected="selected"'; } ?> value="black"><?php _e( 'Black', 'ssmw' ); ?></option>
			<option <?php if ( $color == 'white' ) { echo 'selected="selected"'; } ?> value="white"><?php _e( 'White', 'ssmw' ); ?></option>
		</select>
	</p>


	<!-- Rows option -->
	<p class="ssmw-rows <?php if ( $style == 'boxed' ) { echo 'ssmw-hidden'; } ?>">
		<label for="<?php echo $this->get_field_id('rows'); ?>"><?php _e( 'Rows', 'ssmw' ); ?></label>
		<select class="widefat ssmw-input" id="<?php echo $this->get_field_id('rows'); ?>" name="<?php echo $this->get_field_name('rows'); ?>">
			<option <?php if ( $rows == 'one' ) { echo 'selected="selected"'; } ?> value="one">One</option>
			<option <?php if ( $rows == 'two' ) { echo 'selected="selected"'; } ?> value="two">Two</option>
		</select>
	</p>


	<!-- Align option -->
	<p class="ssmw-align <?php if ( $style == 'boxed' ) { echo 'ssmw-hidden'; } ?>">
		<label for="<?php echo $this->get_field_id('alignment'); ?>"><?php _e( 'Alignment', 'ssmw' ); ?></label>
		<select class="widefat ssmw-input" id="<?php echo $this->get_field_id('alignment'); ?>" name="<?php echo $this->get_field_name('alignment'); ?>">
			<option <?php if ( $alignment == 'left' ) { echo 'selected="selected"'; } ?> value="left"><?php _e( 'Left', 'ssmw' ); ?></option>
			<option <?php if ( $alignment == 'center' ) { echo 'selected="selected"'; } ?> value="center"><?php _e( 'Center', 'ssmw' ); ?></option>
			<option <?php if ( $alignment == 'right' ) { echo 'selected="selected"'; } ?> value="right"><?php _e( 'Right', 'ssmw' ); ?></option>
		</select>
	</p>


	<!-- Social media input fields -->
	<div class="ssmw-links-container">

		<div class="ssmw-dropdown-button">
			<h4 class="ssmw-dropdown-title">Social Media</h4>
			<span class="ssmw-dropdown-toggle ssmw-closed"></span>
		</div>
		<div class="ssmw-dropdown-container">

		<?php foreach ( $this->social_media as $social ): ?>

			<p>
				<label for="<?php echo $this->get_field_id($social); ?>">
					<?php echo ucfirst( str_replace( '_', ' ', $social ) ); ?>
				</label>

				<input class="widefat ssmw-input" 
						id="<?php echo $this->get_field_id($social); ?>" 
						name="<?php echo $this->get_field_name($social); ?>" 
						type="text" value="<?php echo $$social; ?>" />
			</p>

		<?php endforeach; ?>

		</div>


		<div class="ssmw-dropdown-button">
			<h4 class="ssmw-dropdown-title">Design</h4>
			<span class="ssmw-dropdown-toggle ssmw-closed"></span>
		</div>

		<div class="ssmw-dropdown-container">
		<?php foreach ( $this->design as $social ): ?>

			<p>
				<label for="<?php echo $this->get_field_id($social); ?>">
					<?php echo ucfirst( str_replace( '_', ' ', $social ) ); ?>
				</label>

				<input class="widefat ssmw-input" 
						id="<?php echo $this->get_field_id($social); ?>" 
						name="<?php echo $this->get_field_name($social); ?>" 
						type="text" value="<?php echo $$social; ?>" />
			</p>

		<?php endforeach; ?>
		</div>


		<div class="ssmw-dropdown-button">
			<h4 class="ssmw-dropdown-title">Music</h4>
			<span class="ssmw-dropdown-toggle ssmw-closed"></span>
		</div>

		<div class="ssmw-dropdown-container">
		<?php foreach ( $this->music as $social ): ?>

			<p>
				<label for="<?php echo $this->get_field_id($social); ?>">
					<?php echo ucfirst( str_replace( '_', ' ', $social ) ); ?>
				</label>

				<input class="widefat ssmw-input" 
						id="<?php echo $this->get_field_id($social); ?>" 
						name="<?php echo $this->get_field_name($social); ?>" 
						type="text" value="<?php echo $$social; ?>" />
			</p>

		<?php endforeach; ?>
		</div>


		<div class="ssmw-dropdown-button">
			<h4 class="ssmw-dropdown-title">Programming</h4>
			<span class="ssmw-dropdown-toggle ssmw-closed"></span>
		</div>

		<div class="ssmw-dropdown-container">
		<?php foreach ( $this->programming as $social ): ?>

			<p>
				<label for="<?php echo $this->get_field_id($social); ?>">
					<?php echo ucfirst( str_replace( '_', ' ', $social ) ); ?>
				</label>

				<input class="widefat ssmw-input" 
						id="<?php echo $this->get_field_id($social); ?>" 
						name="<?php echo $this->get_field_name($social); ?>" 
						type="text" value="<?php echo $$social; ?>" />
			</p>

		<?php endforeach; ?>
		</div>


		<div class="ssmw-dropdown-button">
			<h4 class="ssmw-dropdown-title">Gaming</h4>
			<span class="ssmw-dropdown-toggle ssmw-closed"></span>
		</div>

		<div class="ssmw-dropdown-container">
		<?php foreach ( $this->gaming as $social ): ?>

			<p>
				<label for="<?php echo $this->get_field_id($social); ?>">
					<?php echo ucfirst( str_replace( '_', ' ', $social ) ); ?>
				</label>

				<input class="widefat ssmw-input" 
						id="<?php echo $this->get_field_id($social); ?>" 
						name="<?php echo $this->get_field_name($social); ?>" 
						type="text" value="<?php echo $$social; ?>" />
			</p>

		<?php endforeach; ?>
		</div>

		<div class="ssmw-dropdown-button">
			<h4 class="ssmw-dropdown-title">Other</h4>
			<span class="ssmw-dropdown-toggle ssmw-closed"></span>
		</div>

		<div class="ssmw-dropdown-container">
		<?php foreach ( $this->other as $social ): ?>

			<p>
				<label for="<?php echo $this->get_field_id($social); ?>">
					<?php echo ucfirst( str_replace( '_', ' ', $social ) ); ?>
				</label>

				<input class="widefat ssmw-input" 
						id="<?php echo $this->get_field_id($social); ?>" 
						name="<?php echo $this->get_field_name($social); ?>" 
						type="text" value="<?php echo $$social; ?>" />
			</p>

		<?php endforeach; ?>
		</div>

	</div>
</div>

<?php
//Because custom.js is not loading properly on customize.php page.
$current_page = get_current_screen();
if ( $current_page->id === 'customize' ): ?>

<script>
	jQuery( document ).ready(function( $ ) {

		$( '.ssmw-radio').on( "click", function() {

			if( $(this).val() == 'simple' ) {
				$('.ssmw-align').show();
				$('.ssmw-rows').show();
				$('.ssmw-color').show();
			} else if ( $(this).val() == 'boxed' ) {
				$('.ssmw-align').hide();
				$('.ssmw-rows').hide();
				$('.ssmw-color').hide();
			}

		});


		$( '.ssmw-dropdown-button' ).on( "click", function() {

			var toggle = $( this ).children( 'span' );

			$( this ).next().slideToggle();

			if( toggle.hasClass( 'ssmw-closed' ) ) {
				toggle.removeClass('ssmw-closed');
				toggle.addClass('ssmw-opened');
			} else {
				toggle.removeClass('ssmw-opened');
				toggle.addClass('ssmw-closed');
			}
		});



	});
</script>

<?php endif; ?>

<?php
	}

}

//Register widget
function smart_social_media_widget_init() {
	register_widget( 'Smart_Social_Media_Widget' );
}

add_action( 'widgets_init', 'smart_social_media_widget_init' );
