<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = 'frontend/home/index';
//$route['default_controller'] = CMS_BACKEND.'/home/index';
$route[CMS_BACKEND] = CMS_BACKEND.'/home/index';

// frontend
$route['admin$'] = 'frontend/home/admin';
$route['login$'] = 'frontend/home/login';
// $route['about$'] = 'frontend/home/about';
// $route['novasol-curcumin$'] = 'frontend/home/nova';
$route['san-pham$'] = 'frontend/home/sanpham';
// $route['trai-nghiem-nguoi-dung$'] = 'frontend/home/trainghiem';
// $route['loc-du-an$'] = 'frontend/home/locduan';
// $route['fb-callback$'] = 'frontend/home/fbcallback';
$route['lien-he$'] = 'frontend/contact/index';
// $route['([a-zA-Z0-9/-]+)-t(\d+)$'] = 'frontend/home/trainghiem_item/$2';
// $route['bai-viet-moi-dang-p(\d+)$'] = 'frontend/home/newpost/$1';
// $route['active/([a-zA-Z0-9/-/.]+)$'] = 'frontend/active/index/$1';
// $route['activekey/([a-zA-Z0-9/-/.]+)$'] = 'frontend/active/key/$1';
// $route['activemes/([a-zA-Z0-9/-/.]+)$'] = 'frontend/active/mes/$1';
// $route['bai-viet-moi-dang$'] = 'frontend/home/newpost/1';
$route['([a-zA-Z0-9/-]+)-c(\d+)-p(\d+)$'] = 'frontend/articles/category/$2/$3';
$route['([a-zA-Z0-9/-]+)-c(\d+)$'] = 'frontend/articles/category/$2';
$route['([a-zA-Z0-9/-]+)-a(\d+)$'] = 'frontend/articles/item/$2';
// $route['chu-de/([a-zA-Z0-9/-]+)-p(\d+)$'] = 'frontend/articles/tags/$1/$2';
// $route['chu-de/([a-zA-Z0-9/-]+)$'] = 'frontend/articles/tags/$1';
// $route['chu-de-p(\d+)$'] = 'frontend/articles/tags_detail/$1';
// $route['chu-de$'] = 'frontend/articles/tags_detail/';
$route['([a-zA-Z0-9/-]+)-cp(\d+)-p(\d+)$'] = 'frontend/sanpham/category/$2/$3';
$route['([a-zA-Z0-9/-]+)-cp(\d+)$'] = 'frontend/sanpham/category/$2';
$route['([a-zA-Z0-9/-]+)-ap(\d+)$'] = 'frontend/sanpham/item/$2';

$route['gio-hang$'] = 'frontend/sanpham/cart';
$route['dat-hang$'] = 'frontend/sanpham/payment';
$route['404_override'] = '';

/* End of file routes.php */
/* Location: ./application/config/routes.php */