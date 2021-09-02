<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Articles extends MY_Controller{

	public function category($parentid = 0, $page = 1){

		//cép kiểu dữ liệu của 2 biến về int
		$parentid = (int)$parentid;
		$page = (int)$page;


		// sử dụng câu lệnh để truy vấn đến danh mục bài viết và bài viết
		$category = $this->db->from('articles_category')->where(array('id' => $parentid, 'publish' => 1))->get()->row_array();
		$items = $this->db->from('articles_item')->where(array('parentid' => $category['id'], 'publish' => 1))->get()->result_array();
		if(count($items)==1){
			header("Location:".CMS_URL.helper_string_alias($items[0]['title']).'-a'.$items[0]['id'].CMS_SUFFIX);die;
			}
		if(!isset($category) || count($category) == 0) die($this->lib_common->js_redirect(CMS_URL));
		$config['use_page_numbers'] = TRUE;
		if($category['rgt'] - $category['lft'] > 1){
			$children = $this->lib_nestedset->children('articles_category', array('lft >=' => $category['lft'], 'rgt <=' => $category['rgt']));
			$config['total_rows'] = $this->db->from('articles_item')->where(array('publish' => 1))->where_in('parentid', $children)->count_all_results();
		}
		else{
			$config['total_rows'] = $this->db->from('articles_item')->where(array('parentid' => $parentid, 'publish' => 1))->count_all_results();
		}
		$alias = $this->lib_string->alias($category['title']);
		$config['base_url'] = $alias.'-c'.$category['id'].'-';
		$config['per_page'] = 10;
		$total = ceil($config['total_rows']/$config['per_page']);
		$page = ($page <= 0)?1:$page;
		$page = ($page >= $total)?$total:$page;
		$config['cms_cur_page'] = $page;
		if($total > 0){
			$page = $page - 1;
			$this->pagination->initialize($config);
			if($category['rgt'] - $category['lft'] > 1){
				$data['data']['list'] = $this->db->from('articles_item')->where(array('publish' => 1))->where_in('parentid', $children)->limit($config['per_page'], $page * $config['per_page'])->order_by('created desc')->get()->result_array();
			}
			else{
				$data['data']['list'] = $this->db->from('articles_item')->where(array('parentid' => $parentid, 'publish' => 1))->limit($config['per_page'], $page * $config['per_page'])->order_by('created desc')->get()->result_array();
			}
			$data['data']['pagination'] = $this->pagination->create_links();
			$data['data']['total_rows'] = $config['total_rows'];
			$data['data']['per_page'] = $config['per_page'];
			$data['data']['page'] = $page;
		}
		$data['data']['category'] = $category;
		$data['data']['meta_title'] = (!empty($category['meta_title'])?$category['meta_title']:$category['title']).(($page > 0)?' - trang '.($page+1):'');
		$data['data']['meta_keywords'] = $category['meta_keyword'];
		$data['data']['meta_description'] = (!empty($category['meta_description'])?$category['meta_description']:$this->lib_string->cutnchar(strip_tags($category['description']), 200)).(($page > 0)?' - trang '.($page+1):'');
		$data['data']['canonical'] = CMS_URL.(($page == 0)?$alias.'-c'.$category['id']:$alias.'-c'.$category['id'].'-p'.($page+1)).CMS_SUFFIX;
		$data['data']['rel_prev'] = ($page > 0)?CMS_URL.$alias.'-c'.$category['id'].'-p'.($page).CMS_SUFFIX:'';
		$data['data']['rel_next'] = ($page < ($total - 1))?CMS_URL.$alias.'-c'.$category['id'].'-p'.($page+2).CMS_SUFFIX:'';
		$data['data']['children'] = ($category['rgt'] - $category['lft'] > 1)?$this->db->select('id, title')->from('articles_category')->where(array('parentid' => $parentid, 'publish' => 1))->get()->result_array():NULL;

		$data['template'] = 'frontend/articles/category';
		$this->load->view('frontend/layouts/category', $data);
		
	}
	public function GetImageFromUrl($link)

		{

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_POST, 0);

		curl_setopt($ch,CURLOPT_URL,$link);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$result=curl_exec($ch);

		curl_close($ch);

		return $result;

		}
	
	public function item($id = 0){
		$id = (int)$id;
		$item = $this->db->from('articles_item')->where(array('id' => $id))->get()->row_array();
		//$item = $this->db->from('articles_item')->where(array('id' => $id, 'publish' => 1))->get()->row_array();
		if(!isset($item) || count($item) == 0) die($this->lib_common->js_redirect(CMS_URL));
		//$category = $this->db->from('articles_category')->where(array('id' => $item['parentid'], 'publish' => 1))->get()->row_array();
		$category = $this->db->from('articles_category')->where(array('id' => $item['parentid']))->get()->row_array();
		if(!isset($category) || count($category) == 0) die($this->lib_common->js_redirect(CMS_URL));
		$user = $this->db->select('username, fullname, author')->from('user')->where(array('id' => $item['userid_created']))->get()->row_array();
		if(!isset($user) || count($user) == 0) die($this->lib_common->js_redirect(CMS_URL));
		$view_articles_item = $this->session->userdata('view_articles_item_'.$item['id']);
		$item['title'] = html_entity_decode($item['title'], ENT_QUOTES, 'UTF-8');
		$item['description'] = html_entity_decode($item['description'], ENT_QUOTES, 'UTF-8');
		$item['content'] = html_entity_decode($item['content'], ENT_QUOTES, 'UTF-8');
		$alias = $this->lib_string->alias($item['title']);
		
		if(isset($view_articles_item) || empty($view_articles_item)){
			$this->session->set_userdata('view_articles_item_'.$item['id'], 'ok');
			$rand = rand(3, 5);
			$value = rand(3, 5);
			if($rand == 5){
				$this->db->set('rate_value', 'rate_value + '.$value, FALSE)->set('rate_total', 'rate_total + 1', FALSE)->where(array('id' => $id))->update('articles_item');
				$item['rate_value'] = $item['rate_value'] + $value;
				$item['rate_total'] = $item['rate_total'] + 1;
			}
			$this->db->set('viewed', 'viewed + 1', FALSE)->where(array('id' => $item['id']))->update('articles_item');
			$item['viewed']++;
		}
		if(!empty($item['tags'])){
			$tags = $this->lib_tags->tags($item['tags']);
			if(isset($tags) && count($tags)){
				$field = '';
				$query_param = NULL;
				$count = count($tags);
				foreach($tags as $key => $val){
					if($count == $key+1){
						$field = $field.'`tags` LIKE ?';
					}
					else{
						$field = $field.'`tags` LIKE ? OR ';
					}
					$query_param[] = '%'.$val.'%';
				}
				$query_sql = 'SELECT * FROM '.CMS_PREFIX.'articles_item WHERE ('.$field.') AND `id` != '.$item['id'].' LIMIT 0, 10';
				$data['data']['related'] = $this->db->query($query_sql, $query_param)->result_array();
			}
		}
		$data['data']['item'] = $item;
		$data['data']['category'] = $category;
		$data['data']['meta_title'] = (!empty($item['meta_title'])?$item['meta_title']:$item['title']);
		$data['data']['meta_keywords'] = $item['meta_keyword'];
		$data['data']['meta_description'] = (!empty($item['meta_description'])?$item['meta_description']:$this->lib_string->cutnchar(strip_tags($item['description']), 200));
		$data['data']['image'] = $item['image'];
		$data['data']['canonical'] = CMS_URL.$alias.'-a'.$item['id'].CMS_SUFFIX;
		$data['data']['children'] = ($category['rgt'] - $category['lft'] > 1)?$this->db->select('id, title')->from('articles_category')->where(array('parentid' => $category['id'], 'publish' => 1))->get()->result_array():NULL;
		$data['data']['same'] = $this->db->select('*')->from('articles_item')->where(array('id !=' => $item['id'], 'parentid' => $category['id'], 'publish' => 1))->limit(10, 0)->order_by('id desc')->get()->result_array();
		$data['data']['user'] = $user;
		$data['data']['google_authorship'] = $user['author'];

		$data['template'] = 'frontend/articles/item';
		$this->load->view('frontend/layouts/detail', $data);
		
	}



	
}