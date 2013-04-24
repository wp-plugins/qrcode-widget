<?php 

/* @package QRCode Widget */

/*
Plugin Name: QRCode Widget
Description: This is a plugin to help you add a widget to sidebar or footer, help visitors can go back more easier. QRCode use Google API, so don't worry about speed.
Author: Anh Tuan
Version: 1.0
Author URI: http://tintoi.me
*/

class tintoi_qrcode extends WP_Widget
{
	function tintoi_qrcode(){
		$widget_ops = array('description' => 'Add a QR Code to your widget');
		$control_ops = array('width' => 400, 'height' => 300);
		parent::WP_Widget(false, $name='QR Code widget', $widget_ops, $control_ops);
	}

	function widget($args, $instance){
		$uri = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
		echo $before_widget;
		echo '<img src="http://chart.apis.google.com/chart?chs=220x220&cht=qr&chld=10|0&chl=' . $uri . '" alt="QR Code to this post">';
		echo $after_widget;
	}

	function update($new_instance, $old_instance){
		$instance = $old_instance;
		return $instance;
	}

	function form($instance){
		$instance = wp_parse_args( (array) $instance, array('title'=>'Title') );
		echo '<p>Done! Now go to home page to see the result</p>';
	}

}

function tintoi_qrcodeInit() {
	register_widget('tintoi_qrcode');
}

add_action('widgets_init', 'tintoi_qrcodeInit');
?>