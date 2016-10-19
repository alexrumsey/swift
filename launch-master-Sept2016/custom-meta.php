<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = '_launch_';

global $meta_boxes;

$meta_boxes = array();

// Page Meta
$meta_boxes[] = array(
	'id' => 'formatmeta',                  
	'title' => 'Post Formats Meta',
	'pages' => array('post'),
	'context' => 'normal',
	'priority' => 'high', 
	
	'fields' => array(
		array(
			'name' => 'Link URL',
			'desc' => 'When post format is link, this replaces the post permalink on index',
			'id' => $prefix . 'linkurl',
			'type' => 'url',
		),
		array(
			'name' => 'Video Embed',
			'desc' => 'When post format is vide, this replaces the content on index',
			'id' => $prefix . 'videoembed',
			'type' => 'textarea',
		),
		array(
			'name'    => __( 'Radio Example', 'rwmb' ),
			'id' => $prefix . 'radio',
			'type'    => 'radio',
			'desc'	  => 'Radio example',
			// Array of 'value' => 'Label' pairs for radio options.
			// Note: the 'value' is stored in meta field, not the 'Label'
			'options' => array(
				'option1' => __( 'Option1', 'rwmb' ),
				'option2' => __( 'Option2', 'rwmb' ),
				'option3' => __( 'Option3', 'rwmb' ),
				'option4' => __( 'Option4', 'rwmb' ),
			),
		),
	),
);


// Hook to 'admin_init' to make sure the meta box class is loaded before (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'your_prefix_register_meta_boxes' );

/**
 * Register meta boxes
 *
 * @return void
 */
function your_prefix_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}