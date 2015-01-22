<?php defined('ABSPATH') or die("No direct access allowed");
/*
* Plugin Name:   Canada Post Tracking Shortcode
* Plugin URI:	 
* Description:   Generate a parcel-tracking URL using <strong>[cp_tracker_link]</strong> shortcode
* Version:       1.0
* Author:        Vinny Alves
* Author URI:    http://www.usestrict.net
*
* License:       GNU General Public License, v2 (or newer)
* License URI:  http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*
* This program is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation; either version 2 of the License, or
* (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* Copyright (C) 2015 www.usestrict.net, released under the GNU General Public License.
*/

class usc_cp_tracking_shortcode {
	
	const VERSION = '1.0';
	
	public $domain = __CLASS__; 
	
	public function __construct()
	{
		add_shortcode( 'cp_tracker_link', array( &$this, 'parse_shortcode' ) );
		add_filter( 'woocommerce_new_order_note_data', array( &$this, 'parse_note' ), 10, 2 );
	}
	
	
	public function parse_note( $comm_params, $note_params )
	{
		if ( has_shortcode( $comm_params['comment_content'], 'cp_tracker_link' ) )
			$comm_params['comment_content'] = do_shortcode( $comm_params['comment_content'] );
		
		return $comm_params;
	}
	
	
	public function parse_shortcode( $atts, $content='' )
	{
		$atts = shortcode_atts( array( 'tc'     => '', 
									   'lang'   => 'en',
									   'target' => ''
		 ), $atts, 'cp_tracker_link' );
		
		if ( ! $atts['tc'] )
			return __e( 'Canada Post Tracking Link Error: Please provide the Tracking Code', $this->domain );
		
		$target = $atts['target'] ? sprintf( 'target="%s"', $atts['target'] ) : '' ; 
		
		return sprintf('<a href="http://www.canadapost.ca/cpotools/apps/track/'.
					   'personal/findByTrackNumber?trackingNumber=%s&LOCALE=%s" %s>%s</a>', 
				$atts['tc'], $atts['lang'], $target, $atts['tc'] );
		
	}
}


new usc_cp_tracking_shortcode();

/* End of file canada-post-tracking-shortcode.php */
/* Location: canada-post-tracking-shortcode/canada-post-tracking-shortcode.php */
