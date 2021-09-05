<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {



	public function index()
	{
		

		if(isset($_GET['s'])&&count($_GET['s']))
		{
			$keyword = $_GET['s'];
			$page=0;


			if(isset($_GET['p'])&&count($_GET['p']))
			{
				$page = $_GET['p']; $page = isset($page)?(int)$page:0;
			}

			// câu lệnh tìm kiếm
			$query_sql = 'SELECT * FROM '.CMS_PREFIX.'sanpham_item WHERE (`title` LIKE ? OR `description` LIKE ? OR `content` LIKE ?)';

			$query_param = array('%'.$keyword.'%', '%'.$keyword.'%', '%'.$keyword.'%');
			$config['total_rows'] = $this->db->query($query_sql, $query_param)->num_rows();//thực hiện câu lệnh truy vấn và trả về số dòng của kết quả

			 $config['base_url'] = CMS_URL.'?s='.urlencode($keyword).'&p=';//Hàm này thuận tiện khi mã hóa một chuỗi được sử dụng trong phần truy vấn của URL,
			$config['per_page'] = 9;
			$total = ceil($config['total_rows']/$config['per_page']);//Trả về giá trị số nguyên cao nhất tiếp theo bằng cách làm tròn lên num nếu cần.
			// kiểm tra số page có thể tồn tại
			$page = ($page <= 0)?1:$page;
			$page = ($page >= $total)?$total:$page;
			$config['cms_cur_page'] = $page;
			
			if($total > 0){
				
				$page = $page - 1;
				$this->pagination->initialize($config); 
				$query_sql = 'SELECT * FROM '.CMS_PREFIX.'sanpham_item WHERE (`title` LIKE ? OR `description` LIKE ? OR `content` LIKE ?) LIMIT '.($page * $config['per_page']).', '.$config['per_page'];
				
				$query_param = array('%'.$keyword.'%', '%'.$keyword.'%', '%'.$keyword.'%');
				$data['data']['list'] = $this->db->query($query_sql, $query_param)->result_array();
				$data['data']['pagination'] = $this->pagination->create_links();
				$data['data']['total_rows'] = $config['total_rows'];
				$data['data']['per_page'] = $config['per_page'];
				$data['data']['page'] = $page;
			}
			$data['data']['keyword']=$keyword;
			$data['data']['meta_title'] = 'Tìm kiếm từ khóa '.$keyword.(($page > 0)?' - trang '.($page+1):'');
			$data['data']['meta_keywords'] = $keyword;
			$data['data']['meta_description'] = 'Tổng hợp bài viết cho từ khóa '.$keyword.', những bài viết hay cho từ khóa '.$keyword.' dành cho bạn.';
			$data['data']['canonical'] =($page > 0)?CMS_URL.'?s='.$keyword.'&p='.($page):CMS_URL.'?s='.$keyword;
			$data['data']['rel_prev'] = ($page > 0)?CMS_URL.'?s='.$keyword.'&p='.($page+1):'';
			$data['data']['rel_next'] = ($page < ($total - 1))?CMS_URL.'?s='.$keyword.'&p='.($page+2):'';
			$data['template'] = 'frontend/sanpham/search';
			$this->load->view('frontend/layouts/category', $data);
		}

		else
		{

			$data['data']['meta_title'] = $this->system['meta_title'];
			$data['data']['meta_keywords'] = $this->system['meta_keywords'];
			$data['data']['meta_description'] = $this->system['meta_description'];
			$data['data']['canonical'] = CMS_URL;
			$data['data']['google_authorship'] = $this->system['google_authorship'];	
			$data['template'] = 'frontend/home/index';
			$this->load->view('frontend/layouts/home', $data);
				

			
		
		}
	}
	
}