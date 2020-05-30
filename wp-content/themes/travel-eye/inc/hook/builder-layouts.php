<?php
/**
 * Hooks for prebuilt layout in site origin panels.
 *
 * @package Travel_Eye
 */

// Home page.
if ( ! function_exists( 'travel_eye_prebuilt_home_page' ) ) :

	/**
	 * Add prebuilt layout.
	 *
	 * @since 1.0.0
	 *
	 * @param array $layouts Array of layouts.
	 * @return array Modified array.
		 */
	function travel_eye_prebuilt_home_page( $layouts ){

	    $layouts['travel-eye-home-page'] = array(
	        // We'll add a title field
	        'name' => __('Home', 'travel-eye'),    // Required
	        'description' => __('Prebuilt Layout for Home page', 'travel-eye'),
	        'widgets' =>
	        array (
	          0 =>
	          array (
	            'frames' =>
	            array (
	              0 =>
	              array (
	                'content' => '<h4 style="text-align: left;">Plan Your</h4><h2 style="text-align: left;">Road Trip Around</h2><h2 style="text-align: left;">The Globe</h2><p style="text-align: left;">[buttons]</p>',
	                'content_selected_editor' => 'tmce',
	                'buttons' =>
	                array (
	                  0 =>
	                  array (
	                    'button' =>
	                    array (
	                      'text' => 'Book A Trip',
	                      'url' => '#',
	                      'new_window' => true,
	                      'button_icon' =>
	                      array (
	                        'icon_selected' => 'fontawesome-tty',
	                        'icon_color' => '#ffffff',
	                        'icon' => 0,
	                        'so_field_container_state' => 'open',
	                      ),
	                      'design' =>
	                      array (
	                        'align' => 'left',
	                        'theme' => 'flat',
	                        'button_color' => '#dd3333',
	                        'text_color' => '#ffffff',
	                        'hover' => true,
	                        'font_size' => '1.45',
	                        'rounding' => '0',
	                        'padding' => '1',
	                        'so_field_container_state' => 'open',
	                      ),
	                      'attributes' =>
	                      array (
	                        'id' => '',
	                        'title' => '',
	                        'onclick' => '',
	                        'so_field_container_state' => 'closed',
	                      ),
	                    ),
	                  ),
	                ),
	                'background' =>
	                array (
	                  'image' => 0,
	                  'image_fallback' => 'http://demo.wenthemes.com/travel-eye/wp-content/uploads/sites/15/2016/03/banner-5.jpg',
	                  'opacity' => 100,
	                  'color' => '#333333',
	                  'url' => '#',
	                  'new_window' => true,
	                  'so_field_container_state' => 'closed',
	                  'videos' =>
	                  array (
	                  ),
	                ),
	              ),
	              1 =>
	              array (
	                'content' => '<h4 style="text-align: right;">The Best theme</h4><h2 style="text-align: right;">With Adventure<br />Tours &amp;Travel</h2><p style="text-align: right;">[buttons]</p>',
	                'content_selected_editor' => 'tmce',
	                'buttons' =>
	                array (
	                  0 =>
	                  array (
	                    'button' =>
	                    array (
	                      'text' => 'Book Now',
	                      'url' => '#',
	                      'new_window' => true,
	                      'button_icon' =>
	                      array (
	                        'icon_selected' => 'fontawesome-tty',
	                        'icon_color' => '#ffffff',
	                        'icon' => 0,
	                        'so_field_container_state' => 'open',
	                      ),
	                      'design' =>
	                      array (
	                        'align' => 'left',
	                        'theme' => 'flat',
	                        'button_color' => '#dd3333',
	                        'text_color' => '#ffffff',
	                        'hover' => true,
	                        'font_size' => '1.45',
	                        'rounding' => '0',
	                        'padding' => '1',
	                        'so_field_container_state' => 'open',
	                      ),
	                      'attributes' =>
	                      array (
	                        'id' => '',
	                        'title' => '',
	                        'onclick' => '',
	                        'so_field_container_state' => 'closed',
	                      ),
	                    ),
	                  ),
	                ),
	                'background' =>
	                array (
	                  'image' => 0,
	                  'image_fallback' => 'http://demo.wenthemes.com/travel-eye/wp-content/uploads/sites/15/2016/03/banner-2.jpg',
	                  'opacity' => 100,
	                  'color' => '#333333',
	                  'url' => '#',
	                  'new_window' => true,
	                  'so_field_container_state' => 'open',
	                  'videos' =>
	                  array (
	                  ),
	                ),
	              ),
	              2 =>
	              array (
	                'content' => '<h4 style="text-align: left;">The Best theme</h4><h2 style="text-align: left;">With Adventure<br />Tours &amp;Travel</h2><p style="text-align: left;">[buttons]</p>',
	                'content_selected_editor' => 'tmce',
	                'buttons' =>
	                array (
	                  0 =>
	                  array (
	                    'button' =>
	                    array (
	                      'text' => 'Book Now',
	                      'url' => '#',
	                      'new_window' => true,
	                      'button_icon' =>
	                      array (
	                        'icon_selected' => 'fontawesome-tty',
	                        'icon_color' => '#ffffff',
	                        'icon' => 0,
	                        'so_field_container_state' => 'open',
	                      ),
	                      'design' =>
	                      array (
	                        'align' => 'left',
	                        'theme' => 'flat',
	                        'button_color' => '#dd3333',
	                        'text_color' => '#ffffff',
	                        'hover' => true,
	                        'font_size' => '1.45',
	                        'rounding' => '0',
	                        'padding' => '1',
	                        'so_field_container_state' => 'open',
	                      ),
	                      'attributes' =>
	                      array (
	                        'id' => '',
	                        'title' => '',
	                        'onclick' => '',
	                        'so_field_container_state' => 'closed',
	                      ),
	                    ),
	                  ),
	                ),
	                'background' =>
	                array (
	                  'image' => 0,
	                  'image_fallback' => 'http://demo.wenthemes.com/travel-eye/wp-content/uploads/sites/15/2016/03/banner-8.jpg',
	                  'opacity' => 100,
	                  'color' => '#333333',
	                  'url' => '#',
	                  'new_window' => true,
	                  'so_field_container_state' => 'open',
	                  'videos' =>
	                  array (
	                  ),
	                ),
	              ),
	              3 =>
	              array (
	                'content' => '<h4 style="text-align: right;">The Best theme</h4><h2 style="text-align: right;">With Adventure<br />Tours &amp;Travel</h2><p style="text-align: right;">[buttons]</p>',
	                'content_selected_editor' => 'tmce',
	                'buttons' =>
	                array (
	                  0 =>
	                  array (
	                    'button' =>
	                    array (
	                      'text' => 'Book Now',
	                      'url' => '#',
	                      'new_window' => true,
	                      'button_icon' =>
	                      array (
	                        'icon_selected' => 'fontawesome-tty',
	                        'icon_color' => '#ffffff',
	                        'icon' => 0,
	                        'so_field_container_state' => 'open',
	                      ),
	                      'design' =>
	                      array (
	                        'align' => 'left',
	                        'theme' => 'flat',
	                        'button_color' => '#dd3333',
	                        'text_color' => '#ffffff',
	                        'hover' => true,
	                        'font_size' => '1.45',
	                        'rounding' => '0',
	                        'padding' => '1',
	                        'so_field_container_state' => 'open',
	                      ),
	                      'attributes' =>
	                      array (
	                        'id' => '',
	                        'title' => '',
	                        'onclick' => '',
	                        'so_field_container_state' => 'closed',
	                      ),
	                    ),
	                  ),
	                ),
	                'background' =>
	                array (
	                  'image' => 0,
	                  'image_fallback' => 'http://demo.wenthemes.com/travel-eye/wp-content/uploads/sites/15/2016/03/banner-4.jpg',
	                  'opacity' => 100,
	                  'color' => '#333333',
	                  'url' => '#',
	                  'new_window' => true,
	                  'so_field_container_state' => 'open',
	                  'videos' =>
	                  array (
	                  ),
	                ),
	              ),
	            ),
	            'controls' =>
	            array (
	              'speed' => 800,
	              'timeout' => 8000,
	              'nav_color_hex' => '#FFFFFF',
	              'nav_style' => 'thin',
	              'nav_size' => 25,
	              'so_field_container_state' => 'closed',
	            ),
	            'design' =>
	            array (
	              'height' => '700px',
	              'height_unit' => 'px',
	              'padding' => '235px',
	              'padding_unit' => 'px',
	              'extra_top_padding' => '0px',
	              'extra_top_padding_unit' => 'px',
	              'padding_sides' => '12px',
	              'padding_sides_unit' => 'px',
	              'width' => '1170px',
	              'width_unit' => 'px',
	              'heading_font' => '',
	              'heading_color' => '#FFFFFF',
	              'heading_size' => '38px',
	              'heading_size_unit' => 'px',
	              'heading_shadow' => 50,
	              'text_size' => '16px',
	              'text_size_unit' => 'px',
	              'text_color' => '#F6F6F6',
	              'so_field_container_state' => 'closed',
	            ),
	            '_sow_form_id' => '56bd8264ab836',
	            'panels_info' =>
	            array (
	              'class' => 'SiteOrigin_Widget_Hero_Widget',
	              'raw' => false,
	              'grid' => 0,
	              'cell' => 0,
	              'id' => 0,
	              'style' =>
	              array (
	                'background_display' => 'tile',
	              ),
	            ),
	          ),
	          1 =>
	          array (
	            'title' => 'Book A Trip',
	            'sub_title' => '',
	            'form_id' => '18',
	            'start_offset' => -110,
	            '_sow_form_id' => '56efb89d22a86',
	            'panels_info' =>
	            array (
	              'class' => 'Travel_Eye_Booking_Form_Widget',
	              'raw' => false,
	              'grid' => 1,
	              'cell' => 0,
	              'id' => 1,
	              'style' =>
	              array (
	                'padding' => '0px',
	                'background_display' => 'tile',
	              ),
	            ),
	          ),
	          2 =>
	          array (
	            'title' => 'Explore The World',
	            'sub_title' => ' Come Explore the world with us and enjoy the best trip of your life. We offer Trips to every end of the world.',
	            'trips' =>
	            array (
	              0 =>
	              array (
	                'trip_name' => 'Featured Trip',
	                'trip_price' => '$ 450',
	                'trip_days' => '20',
	                'trip_url' => '',
	                'profile_picture' => 0,
	                'profile_picture_fallback' => 'http://demo.wenthemes.com/travel-eye/wp-content/uploads/sites/15/2016/04/gallery3.jpg',
	              ),
	              1 =>
	              array (
	                'trip_name' => 'Featured Trip ',
	                'trip_price' => '$ 450',
	                'trip_days' => '20',
	                'trip_url' => '',
	                'profile_picture' => 0,
	                'profile_picture_fallback' => 'http://demo.wenthemes.com/travel-eye/wp-content/uploads/sites/15/2016/04/gallery6.jpg',
	              ),
	              2 =>
	              array (
	                'trip_name' => 'Featured Trip ',
	                'trip_price' => '$ 450',
	                'trip_days' => '20',
	                'trip_url' => '',
	                'profile_picture' => 0,
	                'profile_picture_fallback' => 'http://demo.wenthemes.com/travel-eye/wp-content/uploads/sites/15/2016/04/gallery7.jpg',
	              ),
	              3 =>
	              array (
	                'trip_name' => 'Featured Trip',
	                'trip_price' => '$ 450',
	                'trip_days' => '20',
	                'trip_url' => '',
	                'profile_picture' => 0,
	                'profile_picture_fallback' => 'http://demo.wenthemes.com/travel-eye/wp-content/uploads/sites/15/2016/04/gallery8.jpg',
	              ),
	              4 =>
	              array (
	                'trip_name' => 'Featured Trip ',
	                'trip_price' => '$ 450',
	                'trip_days' => '20',
	                'trip_url' => '',
	                'profile_picture' => 0,
	                'profile_picture_fallback' => 'http://demo.wenthemes.com/travel-eye/wp-content/uploads/sites/15/2016/04/gallery2.jpg',
	              ),
	            ),
	            '_sow_form_id' => '56ee545201221',
	            'panels_info' =>
	            array (
	              'class' => 'Travel_Eye_Featured_Trips_Widget',
	              'raw' => false,
	              'grid' => 2,
	              'cell' => 0,
	              'id' => 2,
	              'style' =>
	              array (
	                'background_display' => 'tile',
	              ),
	            ),
	          ),
	          3 =>
	          array (
	            'features' =>
	            array (
	              0 =>
	              array (
	                'container_color' => '#dd3333',
	                'icon' => 'fontawesome-plane',
	                'icon_color' => '#dd3333',
	                'icon_image' => 0,
	                'title' => 'Our Services',
	                'text' => 'Tempor invidunt ut labore etdolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.',
	                'more_text' => 'Read More',
	                'more_url' => '#',
	              ),
	              1 =>
	              array (
	                'container_color' => '#dd3333',
	                'icon' => 'fontawesome-cab',
	                'icon_color' => '#dd3333',
	                'icon_image' => 0,
	                'title' => 'Our Services',
	                'text' => 'Tempor invidunt ut labore etdolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.',
	                'more_text' => 'Read More',
	                'more_url' => '#',
	              ),
	              2 =>
	              array (
	                'container_color' => '#dd3333',
	                'icon' => 'fontawesome-ship',
	                'icon_color' => '#dd3333',
	                'icon_image' => 0,
	                'title' => 'Our Services',
	                'text' => 'Tempor invidunt ut labore etdolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.',
	                'more_text' => 'Read More',
	                'more_url' => '#',
	              ),
	            ),
	            'fonts' =>
	            array (
	              'title_options' =>
	              array (
	                'font' => 'default',
	                'size' => '20px',
	                'size_unit' => 'px',
	                'color' => '#000000',
	                'so_field_container_state' => 'closed',
	              ),
	              'text_options' =>
	              array (
	                'font' => 'default',
	                'size' => 'px',
	                'size_unit' => 'px',
	                'color' => false,
	                'so_field_container_state' => 'closed',
	              ),
	              'more_text_options' =>
	              array (
	                'font' => 'default',
	                'size' => '16px',
	                'size_unit' => 'px',
	                'color' => false,
	                'so_field_container_state' => 'open',
	              ),
	              'so_field_container_state' => 'open',
	            ),
	            'container_shape' => 'sticker',
	            'container_size' => '85px',
	            'container_size_unit' => 'px',
	            'icon_size' => '30px',
	            'icon_size_unit' => 'px',
	            'per_row' => 3,
	            'responsive' => true,
	            '_sow_form_id' => '56ea53134e0e4',
	            'title_link' => false,
	            'icon_link' => false,
	            'new_window' => false,
	            'panels_info' =>
	            array (
	              'class' => 'SiteOrigin_Widget_Features_Widget',
	              'raw' => false,
	              'grid' => 3,
	              'cell' => 0,
	              'id' => 3,
	              'style' =>
	              array (
	                'background_display' => 'tile',
	              ),
	            ),
	          ),
	          4 =>
	          array (
	            'primary_title' => 'Welcome to Travel Eye Theme',
	            'secondary_title' => 'Voluptatem quia voluptas sit aspernatur aut ',
	            'title_content' => 'Tempor invidunt ut labore etdolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et Tempor ',
	            'align' => 'center',
	            '_sow_form_id' => '56ef8215d3e9b',
	            'panels_info' =>
	            array (
	              'class' => 'Travel_Eye_Title_Subtitle_Widget',
	              'raw' => false,
	              'grid' => 4,
	              'cell' => 0,
	              'id' => 4,
	              'style' =>
	              array (
	                'background_display' => 'tile',
	              ),
	            ),
	          ),
	          5 =>
	          array (
	            'text' => 'Upgrade to PRO',
	            'url' => 'https://themepalace.com/downloads/travel-eye-pro',
	            'new_window' => true,
	            'button_icon' =>
	            array (
	              'icon_selected' => 'fontawesome-check-square-o',
	              'icon_color' => '#ffffff',
	              'icon' => 0,
	              'so_field_container_state' => 'open',
	            ),
	            'design' =>
	            array (
	              'align' => 'center',
	              'theme' => 'flat',
	              'button_color' => '#dd3333',
	              'text_color' => '#ffffff',
	              'hover' => true,
	              'font_size' => '1.3',
	              'rounding' => '0',
	              'padding' => '1',
	              'so_field_container_state' => 'open',
	            ),
	            'attributes' =>
	            array (
	              'id' => '',
	              'title' => '',
	              'onclick' => '',
	              'so_field_container_state' => 'closed',
	            ),
	            '_sow_form_id' => '56ef8231891ab',
	            'panels_info' =>
	            array (
	              'class' => 'SiteOrigin_Widget_Button_Widget',
	              'raw' => false,
	              'grid' => 4,
	              'cell' => 0,
	              'id' => 5,
	              'style' =>
	              array (
	                'background_display' => 'tile',
	              ),
	            ),
	          ),
	          6 =>
	          array (
	            'title' => 'Our Trip Gallery',
	            'sub_title' => '',
	            'images' =>
	            array (
	              0 =>
	              array (
	                'image' => 0,
	                'image_fallback' => 'http://demo.wenthemes.com/travel-eye/wp-content/uploads/sites/15/2016/04/gallery8.jpg',
	                'title' => 'Trip Gallery',
	                'url' => '#',
	              ),
	              1 =>
	              array (
	                'image' => 0,
	                'image_fallback' => 'http://demo.wenthemes.com/travel-eye/wp-content/uploads/sites/15/2016/04/gallery7.jpg',
	                'title' => 'Trip Gallery',
	                'url' => '#',
	              ),
	              2 =>
	              array (
	                'image' => 0,
	                'image_fallback' => 'http://demo.wenthemes.com/travel-eye/wp-content/uploads/sites/15/2016/04/gallery6.jpg',
	                'title' => 'Trip Gallery',
	                'url' => '#',
	              ),
	              3 =>
	              array (
	                'image' => 0,
	                'image_fallback' => 'http://demo.wenthemes.com/travel-eye/wp-content/uploads/sites/15/2016/04/gallery5.jpg',
	                'title' => 'Trip Gallery',
	                'url' => '#',
	              ),
	              4 =>
	              array (
	                'image' => 0,
	                'image_fallback' => 'http://demo.wenthemes.com/travel-eye/wp-content/uploads/sites/15/2016/04/gallery4.jpg',
	                'title' => 'Trip Gallery',
	                'url' => '#',
	              ),
	              5 =>
	              array (
	                'image' => 0,
	                'image_fallback' => 'http://demo.wenthemes.com/travel-eye/wp-content/uploads/sites/15/2016/04/gallery3.jpg',
	                'title' => 'Trip Gallery',
	                'url' => '#',
	              ),
	              6 =>
	              array (
	                'image' => 0,
	                'image_fallback' => 'http://demo.wenthemes.com/travel-eye/wp-content/uploads/sites/15/2016/04/gallery2.jpg',
	                'title' => 'Trip Gallery',
	                'url' => '#',
	              ),
	              7 =>
	              array (
	                'image' => 0,
	                'image_fallback' => 'http://demo.wenthemes.com/travel-eye/wp-content/uploads/sites/15/2016/04/gallery1.jpg',
	                'title' => 'Trip Gallery',
	                'url' => '#',
	              ),
	            ),
	            'display' =>
	            array (
	              'attachment_size' => 'medium',
	              'column_number' => '4',
	              'so_field_container_state' => 'open',
	            ),
	            '_sow_form_id' => '572069f0e0d8f',
	            'panels_info' =>
	            array (
	              'class' => 'Travel_Eye_Advance_Image_Grid_Widget',
	              'raw' => false,
	              'grid' => 5,
	              'cell' => 0,
	              'id' => 6,
	              'style' =>
	              array (
	                'background_display' => 'tile',
	              ),
	            ),
	          ),
	          7 =>
	          array (
	            'title' => 'Meet Our Trip Organizer',
	            'sub_title' => 'We have the best in the whole world that organizes the best trips for our clients and make their journeys life remembering.',
	            'members' =>
	            array (
	              0 =>
	              array (
	                'full_name' => 'Mrs. Rina',
	                'position' => 'Manager',
	                'profile_picture' => 0,
	                'profile_picture_fallback' => 'http://demo.wenthemes.com/travel-eye/wp-content/uploads/sites/15/2016/03/team-1-300x300.png',
	              ),
	              1 =>
	              array (
	                'full_name' => 'Mr. John',
	                'position' => 'Manager',
	                'profile_picture' => 0,
	                'profile_picture_fallback' => 'http://demo.wenthemes.com/travel-eye/wp-content/uploads/sites/15/2016/03/team-2-300x300.png',
	              ),
	              2 =>
	              array (
	                'full_name' => 'Mr. Jozi Mart',
	                'position' => 'Manager',
	                'profile_picture' => 0,
	                'profile_picture_fallback' => 'http://demo.wenthemes.com/travel-eye/wp-content/uploads/sites/15/2016/03/team-1-1-300x300.png',
	              ),
	              3 =>
	              array (
	                'full_name' => 'Mrs. Rina',
	                'position' => 'Manager',
	                'profile_picture' => 0,
	                'profile_picture_fallback' => 'http://demo.wenthemes.com/travel-eye/wp-content/uploads/sites/15/2016/03/team-1-300x300.png',
	              ),
	            ),
	            'image_size' => 'medium',
	            '_sow_form_id' => '56e98a6a66bdb',
	            'panels_info' =>
	            array (
	              'class' => 'Travel_Eye_Team_Widget',
	              'raw' => false,
	              'grid' => 6,
	              'cell' => 0,
	              'id' => 7,
	              'style' =>
	              array (
	                'background_display' => 'tile',
	              ),
	            ),
	          ),
	          8 =>
	          array (
	            'title' => 'Did You Know ?',
	            'sub_title' => 'What are the thing you should always do on a trip? Plan a Trip with us and we will tell all about it.',
	            'posts' => 'posts_per_page=4',
	            'settings' =>
	            array (
	              'featured_image' => 'medium',
	              'excerpt_length' => 20,
	              'more_text' => 'Read more',
	              'disable_comment' => true,
	              'so_field_container_state' => 'open',
	              'disable_date' => false,
	              'disable_excerpt' => false,
	              'disable_more_text' => false,
	            ),
	            '_sow_form_id' => '56e9347ce1ea0',
	            'panels_info' =>
	            array (
	              'class' => 'Travel_Eye_Latest_News_Widget',
	              'raw' => false,
	              'grid' => 7,
	              'cell' => 0,
	              'id' => 8,
	              'style' =>
	              array (
	                'background_display' => 'tile',
	              ),
	            ),
	          ),
	          9 =>
	          array (
	            'primary_title' => 'Welcome to Travel Eye Theme',
	            'secondary_title' => 'Voluptatem quia voluptas sit aspernatur aut ',
	            'title_content' => 'Tempor invidunt ut labore etdolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et Tempor ',
	            'align' => 'center',
	            '_sow_form_id' => '56f37dbe1c47e',
	            'panels_info' =>
	            array (
	              'class' => 'Travel_Eye_Title_Subtitle_Widget',
	              'raw' => false,
	              'grid' => 8,
	              'cell' => 0,
	              'id' => 9,
	              'style' =>
	              array (
	                'background_display' => 'tile',
	              ),
	            ),
	          ),
	          10 =>
	          array (
	            'text' => 'Download',
	            'url' => 'https://wordpress.org/themes/travel-eye',
	            'new_window' => true,
	            'button_icon' =>
	            array (
	              'icon_selected' => 'fontawesome-download',
	              'icon_color' => '#ffffff',
	              'icon' => 0,
	              'so_field_container_state' => 'open',
	            ),
	            'design' =>
	            array (
	              'align' => 'center',
	              'theme' => 'flat',
	              'button_color' => '#dd3333',
	              'text_color' => '#ffffff',
	              'hover' => true,
	              'font_size' => '1.3',
	              'rounding' => '0',
	              'padding' => '1',
	              'so_field_container_state' => 'open',
	            ),
	            'attributes' =>
	            array (
	              'id' => '',
	              'title' => '',
	              'onclick' => '',
	              'so_field_container_state' => 'closed',
	            ),
	            '_sow_form_id' => '56f41ec4b5ef5',
	            'panels_info' =>
	            array (
	              'class' => 'SiteOrigin_Widget_Button_Widget',
	              'raw' => false,
	              'grid' => 8,
	              'cell' => 0,
	              'id' => 10,
	              'style' =>
	              array (
	                'background_display' => 'tile',
	              ),
	            ),
	          ),
	        ),
	        'grids' =>
	        array (
	          0 =>
	          array (
	            'cells' => 1,
	            'style' =>
	            array (
	              'row_stretch' => 'full-stretched',
	              'background_display' => 'tile',
	            ),
	          ),
	          1 =>
	          array (
	            'cells' => 1,
	            'style' =>
	            array (
	            ),
	          ),
	          2 =>
	          array (
	            'cells' => 1,
	            'style' =>
	            array (
	              'row_stretch' => 'full',
	              'background_image_attachment' => 17,
	              'background_display' => 'parallax',
	            ),
	          ),
	          3 =>
	          array (
	            'cells' => 1,
	            'style' =>
	            array (
	              'row_stretch' => 'full',
	              'background' => '#ffffff',
	              'background_display' => 'tile',
	            ),
	          ),
	          4 =>
	          array (
	            'cells' => 1,
	            'style' =>
	            array (
	              'row_stretch' => 'full',
	              'background' => '#fafafa',
	              'background_image_attachment' => 17,
	              'background_display' => 'parallax',
	            ),
	          ),
	          5 =>
	          array (
	            'cells' => 1,
	            'style' =>
	            array (
	              'row_stretch' => 'full-stretched',
	              'background_display' => 'tile',
	            ),
	          ),
	          6 =>
	          array (
	            'cells' => 1,
	            'style' =>
	            array (
	            ),
	          ),
	          7 =>
	          array (
	            'cells' => 1,
	            'style' =>
	            array (
	              'row_stretch' => 'full',
	              'background' => '#fafafa',
	              'background_image_attachment' => 122,
	              'background_display' => 'parallax',
	            ),
	          ),
	          8 =>
	          array (
	            'cells' => 1,
	            'style' =>
	            array (
	              'row_stretch' => 'full',
	              'background_image_attachment' => 1940,
	              'background_display' => 'tile',
	            ),
	          ),
	        ),
	        'grid_cells' =>
	        array (
	          0 =>
	          array (
	            'grid' => 0,
	            'weight' => 1,
	          ),
	          1 =>
	          array (
	            'grid' => 1,
	            'weight' => 1,
	          ),
	          2 =>
	          array (
	            'grid' => 2,
	            'weight' => 1,
	          ),
	          3 =>
	          array (
	            'grid' => 3,
	            'weight' => 1,
	          ),
	          4 =>
	          array (
	            'grid' => 4,
	            'weight' => 1,
	          ),
	          5 =>
	          array (
	            'grid' => 5,
	            'weight' => 1,
	          ),
	          6 =>
	          array (
	            'grid' => 6,
	            'weight' => 1,
	          ),
	          7 =>
	          array (
	            'grid' => 7,
	            'weight' => 1,
	          ),
	          8 =>
	          array (
	            'grid' => 8,
	            'weight' => 1,
	          ),
	        ),


		 );

	    return $layouts;

	}

endif;

add_filter('siteorigin_panels_prebuilt_layouts','travel_eye_prebuilt_home_page');
