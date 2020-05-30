<?php

class Travel_Eye_Latest_News_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'travel-eye-latest-news',
			__( 'Travel Eye: Latest News Widget', 'travel-eye' ),
			array(
				'description' => __( 'Latest News Widget. Displays latest posts in grid.', 'travel-eye' ),
			),
			array(),
			array(

				'title' => array(
					'type' => 'text',
					'label' => __( 'Title', 'travel-eye' ),
				),
				'sub_title' => array(
					'type' => 'text',
					'label' => __( 'Sub Title', 'travel-eye' ),
				),

				'posts' => array(
					'type'  => 'posts',
					'label' => __( 'Posts', 'travel-eye' ),
				),
				'settings' => array(
					'type'   => 'section',
					'label'  => __( 'Settings', 'travel-eye' ),
					'hide' => true,
					'fields' => array(
					    'featured_image' => array(
							'type'    => 'select',
							'label'   => __( 'Image Size', 'travel-eye' ),
							'default' => 'medium',
							'options' => travel_eye_get_image_sizes_options(),
						),
						'excerpt_length' => array(
							'type'    => 'number',
							'label'   => __( 'Excerpt Length', 'travel-eye' ),
							'default' => 10
		   				 ),
						'more_text' => array(
							'type'    => 'text',
							'label'   => __( 'Read More Text', 'travel-eye' ),
							'default' => __( 'Read more','travel-eye' )
						),
						'disable_date' => array(
							'type'  => 'checkbox',
							'label' => __( 'Disable Date in Post', 'travel-eye' ),
		    			),
		    			'disable_comment' => array(
							'type'  => 'checkbox',
							'label' => __( 'Disable Comment in Post', 'travel-eye' ),
		    			),
		    			'disable_excerpt' => array(
							'type'  => 'checkbox',
							'label' => __( 'Disable Post Excerpt', 'travel-eye' ),
		    			),
		    			'disable_date' => array(
							'type'  => 'checkbox',
							'label' => __( 'Disable Date in Post', 'travel-eye' ),
		    			),
		    			'disable_more_text' => array(
							'type'  => 'checkbox',
							'label' => __( 'Disable Read More Text', 'travel-eye' ),
		    			),
	    			),
				),
			),
			plugin_dir_path( __FILE__ )
		);
	}

}

siteorigin_widget_register( 'travel-eye-latest-news', __FILE__, 'Travel_Eye_Latest_News_Widget' );
