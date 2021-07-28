<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feed extends MY_Controller {

	public function index(){
		header("Content-type: text/xml");
		echo '<?xml version="1.0" encoding="UTF-8" ?>';
		echo '<rss version="2.0"><channel>';
		echo "<title>".$this->system['meta_title']."</title>
		<link>".CMS_URL."</link>
		<description>".$this->system['meta_description']."</description>
		<language>vi-vn</language>";
		$baiviet = $this->db->from('articles_item')->order_by('id desc')->get()->result_array();
		foreach ($baiviet as $key => $value) {
		echo '<item>
			  <title>'.$value['title'].'</title>
			  <link>'.CMS_URL.helper_string_alias($value['title']).'-c'.$value['id'].'.html'.'</link>
			  <description>'.$value['description'].'</description>
		  </item>';
		}
		echo '</channel></rss>';
		
	}
}