<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sitemap extends MY_Controller {

	public function index(){
		header("Content-type: text/xml");
		echo '<?xml version="1.0" encoding="UTF-8" ?>';

		echo '<urlset xmlns="http://www.google.com/schemas/sitemap/0.84" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.google.com/schemas/sitemap/0.84 http://www.google.com/schemas/sitemap/0.84/sitemap.xsd">

		    <url>
		        <loc>'.CMS_URL.'</loc>
		        <priority>1.00</priority>
		    </url>';
		$baiviet = $this->db->from('articles_item')->order_by('id desc')->get()->result_array();
		foreach ($baiviet as $key => $value) {
		echo '<url>
		        <loc>'.CMS_URL.helper_string_alias($value['title']).'-a'.$value['id'].'.html'.'</loc>
		        <changefreq>monthly</changefreq>
		        <priority>0.5</priority>
		    </url>';
		}
		$danhmuc = $this->db->from('articles_category')->where(array('publish'=>1,'id >'=>1))->order_by('id desc')->get()->result_array();
		foreach ($danhmuc as $key => $value) {
		echo '<url>
		        <loc>'.CMS_URL.helper_string_alias($value['title']).'-c'.$value['id'].'.html'.'</loc>
		        <changefreq>monthly</changefreq>
		        <priority>1.00</priority>
		    </url>';
		}
		echo '</urlset>';
		
	}
}