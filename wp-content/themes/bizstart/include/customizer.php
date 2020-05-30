<?php
/**
 * Bizstart Theme Customizer
 *
 */


	function bizstart_customize_register( $wp_customize ) {
		
		 class bizstart_theme_info_text extends WP_Customize_Control{
        public function render_content(){  ?>
            <span class="customize-control-title">
                <?php echo esc_html( $this->label ); ?>
            </span>
            <?php if($this->description){ ?>
                <span class="description customize-control-description">
                <?php echo wp_kses_post($this->description); ?>
                </span>
            <?php }
        }
    }

		// Bizstart theme choice options
		if (!function_exists('bizstart_section_choice_option')) :
			function bizstart_section_choice_option()
			{
				$bizstart_section_choice_option = array(
					'show' => esc_html__('Show', 'bizstart'),
					'hide' => esc_html__('Hide', 'bizstart')
				);
				return apply_filters('bizstart_section_choice_option', $bizstart_section_choice_option);
			}
		endif;
		
		/**
		 * Sanitizing the select callback example
		 *
		 */
		if ( !function_exists('bizstart_sanitize_select') ) :
			function bizstart_sanitize_select( $input, $setting ) {

				// Ensure input is a slug.
				$input = sanitize_text_field( $input );

				// Get list of choices from the control associated with the setting.
				$choices = $setting->manager->get_control( $setting->id )->choices;

				// If the input is a valid key, return it; otherwise, return the default.
				return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
			}
		endif;

		/**
		 * Drop-down Pages sanitization callback example.
		 *
		 * - Sanitization: dropdown-pages
		 * - Control: dropdown-pages
		 * 
		 * Sanitization callback for 'dropdown-pages' type controls. This callback sanitizes `$page_id`
		 * as an absolute integer, and then validates that $input is the ID of a published page.
		 * 
		 * @see absint() https://developer.wordpress.org/reference/functions/absint/
		 * @see get_post_status() https://developer.wordpress.org/reference/functions/get_post_status/
		 *
		 * @param int                  $page    Page ID.
		 * @param WP_Customize_Setting $setting Setting instance.
		 * @return int|string Page ID if the page is published; otherwise, the setting default.
		 */
		function bizstart_sanitize_dropdown_pages( $page_id, $setting ) {
			// Ensure $input is an absolute integer.
			$page_id = absint( $page_id );
			
			// If $page_id is an ID of a published page, return it; otherwise, return the default.
			return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
		}
		
		
		
	    $wp_customize->add_section('bizstart-footer_info', 
	        array(
	            'title'   => esc_html__('Footer Option', 'bizstart'),
	            'description' => '',
	            'priority'    => 3
	        )
	    );
		
		$wp_customize->add_setting('bizstart_footer_section_hideshow',
	        array(
	            'default' => 'show',
	            'sanitize_callback' => 'bizstart_sanitize_select',
	        )
	    );

	    $bizstart_footer_section_hide_show_option = bizstart_section_choice_option();
	  
	    $wp_customize->add_control('bizstart_footer_section_hideshow',
	        array(
	            'type' => 'radio',
	            'label' => esc_html__('Footer Option', 'bizstart'),
	            'description' => esc_html__('Show/hide option for Footer Section.', 'bizstart'),
	            'section' => 'bizstart-footer_info',
	            'choices' => $bizstart_footer_section_hide_show_option,
	            'priority' => 1
	        )
	    );

		$wp_customize->add_setting('bizstart-footer_title', 
	        array(
	            'default'   => '',
	            'type'      => 'theme_mod',
	    	    'sanitize_callback'	=> 'wp_kses_post'
	        )
	    );

		$wp_customize->add_control('bizstart-footer_title', 
		    array(
		        'label'   => esc_html__('Copyright', 'bizstart'),
		        'section' => 'bizstart-footer_info',
		        'type'      => 'textarea',
		        'priority'  => 1
		    )
		);
		
        /** Front Page Section Settings starts **/	

	    $wp_customize->add_panel('frontpage', 
	        array(
	            'title' => esc_html__('Front Page Options', 'bizstart'),        
			    'description' => '',                                        
			    'priority' => 3,
			)
	    );
		
		/** Slider Section Settings starts **/
	    // Panel - Slider Section 1
	    $wp_customize->add_section('sliderinfo', 
	    	array(
			    'title'   => esc_html__('Home Slider Section', 'bizstart'),
			    'description' => 'Slider only works if there are featured images.',
				'panel' => 'frontpage',
			    'priority'    => 130
	        )
	    );

		$bizstart_slider_no = 3;
		for( $i = 1; $i <= $bizstart_slider_no; $i++ ) {
			$bizstart_slider_page = 'bizstart_slider_page_' .$i;
			$bizstart_slider_btntxt = 'bizstart_slider_btntxt_' . $i;
			$bizstart_slider_btnurl = 'bizstart_slider_btnurl_' .$i;
			 

			$wp_customize->add_setting( $bizstart_slider_page,
				array(
					'default'           => 1,
					'sanitize_callback' => 'bizstart_sanitize_dropdown_pages',
				)
			);

			$wp_customize->add_control( $bizstart_slider_page,
				array(
					'label'    			=> esc_html__( 'Slider Page ', 'bizstart' ) .$i,
					'section'  			=> 'sliderinfo',
					'type'     			=> 'dropdown-pages',
					'priority' 			=> 100,
				)
			);

			$wp_customize->add_setting( $bizstart_slider_btntxt,
				array(
					'default'           => '',
					'sanitize_callback' => 'sanitize_text_field',
				)
			);

			$wp_customize->add_control( $bizstart_slider_btntxt,
				array(
					'label'    			=> esc_html__( 'Slider Button Text','bizstart' ),
					'section'  			=> 'sliderinfo',
					'type'     			=> 'text',
					'priority' 			=> 100,
				)
			);
			
			$wp_customize->add_setting( $bizstart_slider_btnurl,
				array(
					'default'           => '',
					'sanitize_callback' => 'sanitize_text_field',
				)
			);

			$wp_customize->add_control( $bizstart_slider_btnurl,
				array(
					'label'    			=> esc_html__( 'Button URL', 'bizstart' ),
					'section'  			=> 'sliderinfo',
					'type'     			=> 'text',
					'priority' 			=> 100,
				)
			);
	    }
	    /** Slider Section Settings end **/

	    //	About Us section
		$wp_customize->add_section('aboutus',             
	    	array(
	            'title' => esc_html__('Home About Section', 'bizstart'),        
	        	'description' => '',            
	        	'panel' => 'frontpage',		 
	        	'priority' => 140,
	        )
	    );
		
		$wp_customize->add_setting(
	    'bizstart_aboutus_section_hideshow',
	        array(
	            'default' => 'hide',
	            'sanitize_callback' => 'bizstart_sanitize_select',
	        )
	    );

	    $bizstart_aboutus_section_hide_show_option = bizstart_section_choice_option();
	    
	    $wp_customize->add_control(
	    'bizstart_aboutus_section_hideshow',
	        array(
	            'type' => 'radio',
	            'label' => esc_html__('About Us Option', 'bizstart'),
	            'description' => esc_html__('Show/hide option for About Us Section.', 'bizstart'),
	            'section' => 'aboutus',
	            'choices' => $bizstart_aboutus_section_hide_show_option,
	            'priority' => 1
	        )
	    );

	
        // About Us title
	    $wp_customize->add_setting('bizstart-about_title', 
	        array(
	            'default'   => '',
	            'type'      => 'theme_mod',
	    	    'sanitize_callback'	=> 'sanitize_text_field'
	        )
	    );

	    $wp_customize->add_control('bizstart-about_title', 
	        array(
	            'label'   => esc_html__('About Title', 'bizstart'),
	            'section' => 'aboutus',
	            'priority'  => 1
	        )
	    );
		
		$wp_customize->add_setting('bizstart-about_subtitle', 
	        array(
	            'default'   => '',
	            'type'      => 'theme_mod',
	    	    'sanitize_callback'	=> 'sanitize_text_field'
	        )
	    );

	    $wp_customize->add_control('bizstart-about_subtitle', 
	        array(
	            'label'   => esc_html__('About description', 'bizstart'),
	            'section' => 'aboutus', 
	    	    'type'  => 'text',
	            'priority'  => 4
	        )
	    );
	    
	  
	    $bizstart_about_no = 1;
	    for( $i = 1; $i <= $bizstart_about_no; $i++ ) {
	    	$bizstart_about_page = 'bizstart_about_page_' .$i;
	    	
	    	$wp_customize->add_setting( $bizstart_about_page,
	    		array(
	    			'default'           => 1,
	    			'sanitize_callback' => 'bizstart_sanitize_dropdown_pages',
	    		)
	    	);

	    	$wp_customize->add_control( $bizstart_about_page,
	    		array(
	    			'label'    			=> esc_html__( 'About Page ', 'bizstart' ) .$i,
	    			'section'  			=> 'aboutus',
	    			'type'     			=> 'dropdown-pages',
	    			'priority' 			=> 100,
	    		)
	    	);
	    }

	    //  Services section

	    if (!function_exists('bizstart_col_layout_option')) :
		    function bizstart_col_layout_option()
		    {
		        $bizstart_col_layout_option = array(
		            '6' => esc_html__('2 Column Layout', 'bizstart'),
					'4' => esc_html__('3 Column Layout', 'bizstart'),
		        );
		        return apply_filters('bizstart_col_layout_option', $bizstart_col_layout_option);
		    }
		endif;

		$wp_customize->add_section('services',              
			array('title' => esc_html__('Home Service Section', 'bizstart'),          
				'description' => '',             
				'panel' => 'frontpage',		 
				'priority' => 140,
		    )
	    );
		
		$wp_customize->add_setting(
	    'bizstart_services_section_hideshow',
		    array(
		        'default' => 'hide',
		        'sanitize_callback' => 'bizstart_sanitize_select',
		    )
	    );
	    $bizstart_services_section_hide_show_option = bizstart_section_choice_option();
		$wp_customize->add_control(
		    'bizstart_services_section_hideshow',
		    array(
		        'type' => 'radio',
		        'label' => esc_html__('Services Option', 'bizstart'),
		        'description' => esc_html__('Show/hide option Section.', 'bizstart'),
		        'section' => 'services',
		        'choices' => $bizstart_services_section_hide_show_option,
		        'priority' => 1
		    )
	    );

	    // column layout
		$wp_customize->add_setting(
		'bizstart_service_col_layout',
			array(
				'default' => '4',
				'sanitize_callback' => 'bizstart_sanitize_select',
			)
		);
		$bizstart_section_col_layout = bizstart_col_layout_option();
		
		$wp_customize->add_control(
		'bizstart_service_col_layout',
			array(
				'type' => 'radio',
				'label' => esc_html__('Column Layout option ', 'bizstart'),
				'description' => '',
				'section' => 'services',
				'choices' => $bizstart_section_col_layout,
				'priority' => 2
			)
		);

	    // Services title
	    $wp_customize->add_setting('bizstart-services_title', 
	    	array(
	            'default'   => '',
	            'type'      => 'theme_mod',
		        'sanitize_callback'	=> 'sanitize_text_field'
	        )
	    );

	    $wp_customize->add_control('bizstart-services_title', 
	    	array(
	            'label'   => esc_html__('Services Section Title', 'bizstart'),
	            'section' => 'services',
	            'priority'  => 3
	        )
	    );
		
		$wp_customize->add_setting('bizstart-services_subtitle',
		    array(
	            'default'   => '',
	            'type'      => 'theme_mod',
		        'sanitize_callback'	=> 'sanitize_text_field'
	        )
		);

	    $wp_customize->add_control('bizstart-services_subtitle', 
	    	array(
		        'label'   => esc_html__('Service Description', 'bizstart'),
		        'section' => 'services', 
			    'type'  => 'text',
		        'priority'  => 4
	        )
	    );

	    $bizstart_service_no = 6;
		for( $i = 1; $i <= $bizstart_service_no; $i++ ) {
			$bizstart_servicepage = 'bizstart_service_page_' . $i;
			$bizstart_serviceicon = 'bizstart_page_service_icon_' . $i;
			
			// Setting - Feature Icon
			$wp_customize->add_setting( $bizstart_serviceicon,
				array(
					'default'           => '',
					'sanitize_callback' => 'sanitize_text_field',
				)
			);

			$wp_customize->add_control( $bizstart_serviceicon,
				array(
					'label'    			=> esc_html__( 'Service Icon ', 'bizstart' ).$i,
					'description' =>  __('Select a icon in this list <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">Font Awesome icons</a> and enter the class name','bizstart'),
					'section'  			=> 'services',
					'type'     			=> 'text',
					'priority' 			=> 100,
				)
			);
			
			$wp_customize->add_setting( $bizstart_servicepage,
				array(
					'default'           => 1,
					'sanitize_callback' => 'bizstart_sanitize_dropdown_pages',
				)
			);

			$wp_customize->add_control( $bizstart_servicepage,
				array(
					'label'    			=> esc_html__( 'Service Page ', 'bizstart' ) .$i,
					'section'  			=> 'services',
					'type'     			=> 'dropdown-pages',
					'priority' 			=> 100,
				)
			);
	    }
        
        // Blog section
	    $wp_customize->add_section('bizstart-blog_info', 
	        array(
	            'title'   => esc_html__('Home Blog Section', 'bizstart'),
	            'description' => '',
	            'panel' => 'frontpage',
	            'priority'    => 160
	        )
	    );
		
	  	$wp_customize->add_setting('bizstart_blog_section_hideshow',
	        array(
	            'default' => 'show',
	            'sanitize_callback' => 'bizstart_sanitize_select',
	        )
	    );
	  
	    $bizstart_blog_section_hide_show_option = bizstart_section_choice_option();
	    
	    $wp_customize->add_control('bizstart_blog_section_hideshow',
	        array(
	            'type' => 'radio',
	            'label' => esc_html__('Blog Option', 'bizstart'),
	            'description' => esc_html__('Show/hide option for Blog Section.', 'bizstart'),
	            'section' => 'bizstart-blog_info',
	            'choices' => $bizstart_blog_section_hide_show_option,
	            'priority' => 1
	        )
	    );
		
	    $wp_customize->add_setting('bizstart_blog_title', 
	        array(
	            'default'   => '',
	            'type'      => 'theme_mod',
	            'sanitize_callback'	=> 'sanitize_text_field'
	        )
	    );

	    $wp_customize->add_control('bizstart_blog_title', 
	        array(
	            'label'   => esc_html__('Blog Title', 'bizstart'),
	            'section' => 'bizstart-blog_info',
	            'priority'  => 1
	        )
	    );
		
	/**
	 * Important Link
	*/
	$wp_customize->add_section( 'bizstart_implink_section', array(
	  'title'       => esc_html__( 'Important Links', 'bizstart' ),
	  'priority'      => 2
	) );

	    $wp_customize->add_setting( 'bizstart_imp_links', array(
	      'sanitize_callback' => 'bizstart_text_sanitize'
	    ));

	    $wp_customize->add_control( new bizstart_theme_info_text( $wp_customize,'bizstart_imp_links', array(
	        'settings'    => 'bizstart_imp_links',
	        'section'   => 'bizstart_implink_section',
	        'description' => '<a class="implink" href="http://freehtmldesigns.com/docs/bizstart-doc/index.html" target="_blank">'.esc_html__('Documentation', 'bizstart').'</a><a class="implink" href="http://freehtmldesigns.com/demo/bizstart/" target="_blank">'.esc_html__('Live Demo', 'bizstart').'</a><a class="implink" href="https://wordpress.org/support/theme/bizstart" target="_blank">'.esc_html__('Support Forum', 'bizstart').'</a>',
	      )
	    ));

	    $wp_customize->add_setting( 'bizstart_rate_us', array(
	      'sanitize_callback' => 'bizstart_text_sanitize'
	    ));

	    $wp_customize->add_control( new bizstart_theme_info_text( $wp_customize, 'bizstart_rate_us', array(
	          'settings'    => 'bizstart_rate_us',
	          'section'   => 'bizstart_implink_section',
	          'description' => sprintf(__( 'Please do rate our theme if you liked it %1$s', 'bizstart'), '<a class="implink" href="https://wordpress.org/support/theme/bizstart/reviews/?filter=5" target="_blank">'.esc_html__('Rate/Review','bizstart').'</a>' ),
	        )
	    ));

	    $wp_customize->add_setting( 'bizstart_setup_instruction', array(
	      'sanitize_callback' => 'bizstart_text_sanitize'
	    ));

	    $wp_customize->add_control( new bizstart_theme_info_text( $wp_customize, 'bizstart_setup_instruction', array(
	        'settings'    => 'bizstart_setup_instruction',
	        'section'   => 'bizstart_implink_section',
	        'description' => __( '<span class="customize-text_editor_desc">
	        		<h2 class="customize-title">'.esc_html__('Bizstart Pro Features','bizstart').'</h2>                
                    <ul class="admin-pro-feature-list">   
                        <li><span>'.esc_html__('3 Home Pages','bizstart').'</span></li>
                        <li><span>'.esc_html__('25+ Page Layout','bizstart').'</span></li>
                        <li><span>'.esc_html__('One Click Demo Import','bizstart').'</span></li>
                        <li><span>'.esc_html__('Unlimited theme colors ( Primary Colors)','bizstart').'</span></li>
                        <li><span>'.esc_html__('Unlimited sliders Inbuilt sliders','bizstart').'</span></li>
                        <li><span>'.esc_html__('Contact Form 7','bizstart').'</span></li>
                        <li><span>'.esc_html__('Advanced Typography','bizstart').'</span></li>
                        <li><span>'.esc_html__('500+ google fonts','bizstart').'</span></li>
                        <li><span>'.esc_html__('Background configuration','bizstart').'</span></li>
                        <li><span>'.esc_html__('Pricing Table','bizstart').'</span></li>
                        <li><span>'.esc_html__('Highly configurable home page','bizstart').'</span></li>
                        <li><span>'.esc_html__('Over 2500 icons','bizstart').'</span></li>
                        <li><span>'.esc_html__('Unlimited Teams with team detail','bizstart').'</span></li>
                        <li><span>'.esc_html__('Unlimited Services','bizstart').'</span></li>
                        <li><span>'.esc_html__('Unlimited projects','bizstart').'</span></li>
                        <li><span>'.esc_html__('Masonry projects layout','bizstart').'</span></li>
                        <li><span>'.esc_html__('Breadcrumbs Settings','bizstart').'</span></li>
                        <li><span>'.esc_html__('15+ Shortcodes','bizstart').'</span></li>
                        <li><span>'.esc_html__('Four different blog layouts','bizstart').'</span></li>
                        <li><span>'.esc_html__('Boxed Layout','bizstart').'</span></li>                        
                        <li><span>'.esc_html__('Responsive retina ready theme','bizstart').'</span></li>
                        <li><span>'.esc_html__('3 Page layouts (right sidebar, left sidebar, full width)','bizstart').'</span></li>
                        <li><span>'.esc_html__('Fully SEO optimized (schema)','bizstart').'</span></li>
                        <li><span>'.esc_html__('Fast loading','bizstart').'</span></li>
                        <li><span>'.esc_html__('Premium Priority Support','bizstart').'</span></li>
                        <li><span>'.esc_html__('A perfect theme to start your Business website of any kind !!!','bizstart').'</span></li>
                    </ul>                    
                    <a href="'.esc_url('http://freehtmldesigns.com/demo/bizstart-pro').'" class="implink" target="_blank">'.esc_html__('Pro Demo','bizstart').'</a>
                    <a href="'.esc_url('http://freehtmldesigns.com/bizstart-premium-wordpress-theme/').'" class="implink" target="_blank">'.esc_html__('Buy Now','bizstart').'</a>
                </span>', 'bizstart'),
	      )
	    ));
	

	
        
	}
	add_action( 'customize_register', 'bizstart_customize_register' );
	?>