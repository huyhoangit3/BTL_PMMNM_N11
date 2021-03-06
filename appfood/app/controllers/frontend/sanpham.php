<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sanpham extends MY_Controller{

	public function category($parentid = 0, $page = 1)
	{
		if(!isset($_SESSION['sort'])) {
	      	$_SESSION['sort'] = 'id_desc';
	   	}
	   	if(isset($_POST['sort'])){
	   		$_SESSION['sort'] = $_POST['sort'];
	   		header('Location: '.CMS_URL.trim($_SERVER['REQUEST_URI'],'/'));
	   	}

		$parentid = (int)$parentid;
		$page = (int)$page;
		$category = $this->db->from('sanpham_category')->where(array('id' => $parentid, 'publish' => 1))->get()->row_array();

		if(!isset($category) || count($category) == 0) die($this->lib_common->js_redirect(CMS_URL));
		$config['use_page_numbers'] = TRUE;
		if($category['rgt'] - $category['lft'] > 1){
			$children = $this->lib_nestedset->children('sanpham_category', array('lft >=' => $category['lft'], 'rgt <=' => $category['rgt']));
			$config['total_rows'] = $this->db->from('sanpham_item')->where(array('publish' => 1))->where_in('parentid', $children)->count_all_results();
		}
		else{
			$config['total_rows'] = $this->db->from('sanpham_item')->where(array('parentid' => $parentid, 'publish' => 1))->count_all_results();
		}
		$alias = $this->lib_string->alias($category['title']);
		$config['base_url'] = $alias.'-cp'.$category['id'].'-';
		$config['per_page'] = 9;
		$total = ceil($config['total_rows']/$config['per_page']);
		$page = ($page <= 0)?1:$page;
		$page = ($page >= $total)?$total:$page;
		$config['cms_cur_page'] = $page;
		if($total > 0){
			$page = $page - 1;
			$this->pagination->initialize($config);
			if($category['rgt'] - $category['lft'] > 1){
				$data['data']['list'] = $this->db->from('sanpham_item')->where(array('publish' => 1))->where_in('parentid', $children)->limit($config['per_page'], $page * $config['per_page'])->order_by(str_replace('_', ' ', $_SESSION['sort']))->get()->result_array();
			}
			else{
				$data['data']['list'] = $this->db->from('sanpham_item')->where(array('parentid' => $parentid, 'publish' => 1))->limit($config['per_page'], $page * $config['per_page'])->order_by(str_replace('_', ' ', $_SESSION['sort']))->get()->result_array();
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
		$data['data']['canonical'] = CMS_URL.(($page == 0)?$alias.'-cp'.$category['id']:$alias.'-sp'.$category['id'].'-p'.($page+1)).CMS_SUFFIX;
		$data['data']['rel_prev'] = ($page > 0)?CMS_URL.$alias.'-cp'.$category['id'].'-p'.($page).CMS_SUFFIX:'';
		$data['data']['rel_next'] = ($page < ($total - 1))?CMS_URL.$alias.'-c'.$category['id'].'-p'.($page+2).CMS_SUFFIX:'';
		$data['data']['children'] = ($category['rgt'] - $category['lft'] > 1)?$this->db->select('id, title')->from('sanpham_category')->where(array('parentid' => $parentid, 'publish' => 1))->get()->result_array():NULL;
		$data['template'] = 'frontend/sanpham/category';
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
	

	public function item($id = 0)
	{
		
		$id = (int)$id;
		$item = $this->db->from('sanpham_item')->where(array('id' => $id, 'publish' => 1))->get()->row_array();
		if(!isset($item) || count($item) == 0) die($this->lib_common->js_redirect(CMS_URL));
		$category = $this->db->from('sanpham_category')->where(array('id' => $item['parentid'], 'publish' => 1))->get()->row_array();
		if(!isset($category) || count($category) == 0) die($this->lib_common->js_redirect(CMS_URL));
		$user = $this->db->select('username, fullname, author')->from('user')->where(array('id' => $item['userid_created']))->get()->row_array();
		if(!isset($user) || count($user) == 0) die($this->lib_common->js_redirect(CMS_URL));
		$view_sanpham_item = $this->session->userdata('view_sanpham_item_'.$item['id']);
		$item['title'] = html_entity_decode($item['title'], ENT_QUOTES, 'UTF-8');
		$item['description'] = html_entity_decode($item['description'], ENT_QUOTES, 'UTF-8');
		$item['content'] = html_entity_decode($item['content'], ENT_QUOTES, 'UTF-8');
		$alias = $this->lib_string->alias($item['title']);
		if(!empty($item['image'])){
			$temp = substr($item['image'], 0, 7);
			if(in_array($temp, array('http://', 'https:/')) == TRUE){
				$ext = end(explode('.', $item['image']));
				$contents=$this->GetImageFromUrl($item['image']);
				$savefile = fopen('upload/crawler/'.$alias.'-a'.$item['id'].'.'.$ext, 'w');
				fwrite($savefile, $contents);
				fclose($savefile);
				$file = $alias.'-a'.$item['id'].'.'.$ext;
				//file_put_contents('crawler/'.$file, file_get_contents($item['image']));
				$this->db->where(array('id' => $item['id']))->update('sanpham_item', array('image' => 'upload/crawler/'.$file));
			}
		}
		
		
		$data['data']['item'] = $item;
		$data['data']['category'] = $category;
		$data['data']['meta_title'] = (!empty($item['meta_title'])?$item['meta_title']:$item['title']);
		$data['data']['meta_keywords'] = $item['meta_keyword'];
		$data['data']['meta_description'] = (!empty($item['meta_description'])?$item['meta_description']:$this->lib_string->cutnchar(strip_tags($item['description']), 200));
		$data['data']['image'] = $item['image'];
		$data['data']['canonical'] = CMS_URL.$alias.'-a'.$item['id'].CMS_SUFFIX;
		$data['data']['children'] = ($category['rgt'] - $category['lft'] > 1)?$this->db->select('id, title')->from('sanpham_category')->where(array('parentid' => $category['id'], 'publish' => 1))->get()->result_array():NULL;
		$data['data']['same'] = $this->db->select('id, title, image')->from('sanpham_item')->where(array('id !=' => $item['id'], 'parentid' => $category['id'], 'publish' => 1))->limit(10, 0)->order_by('id desc')->get()->result_array();
		$data['data']['user'] = $user;
		$data['data']['google_authorship'] = $user['author'];
		$data['template'] = 'frontend/sanpham/item';
		$this->load->view('frontend/layouts/detail', $data);
	}


	public function addtocart($itemid = NULL){
		$itemid = (int)$itemid;
		$products_item = $this->db->from('sanpham_item')->where(array('id' => $itemid))->get()->row_array();
		if(!isset($products_item)){
			$this->session->set_flashdata('message_error_flash', 'D??? li???u kh??ng t???n t???i.');
			header('Location: '.base64_decode($this->input->get('redirect')));
			die;
		}
		$item = array(
			'id' => $products_item['id'],
			'title' => $products_item['title'],
			'price' => $products_item['price'],
			'number' => 1,
		);
		if(!isset($_COOKIE['cms_cookie_cart_'.CMS_CODE])){
			$cart = array();
			$cart[] = $item;
			setcookie('cms_cookie_cart_'.CMS_CODE, json_encode($cart), time()+(7*24*3600), '/');
			$this->session->set_flashdata('message_successful_flash', 'Th??m s???n ph???m '.$products_item['title'].' th??nh c??ng.');
			header('Location: '.base64_decode($this->input->get('redirect')));
			die;
		}
		else{
			$cart = json_decode($_COOKIE['cms_cookie_cart_'.CMS_CODE], true);
			if(isset($cart)){
				foreach($cart as $key => $val){
					if($val['id'] == $item['id']){
						$cart[$key]['number'] = $cart[$key]['number'] + 1;
						setcookie('cms_cookie_cart_'.CMS_CODE, json_encode($cart), time()+(7*24*3600), '/');
						$this->session->set_flashdata('message_successful_flash', 'C???p nh???t s??? l?????ng s???n ph???m '.$products_item['title'].' th??nh c??ng. S??? l?????ng hi???n t???i l??: '.$cart[$key]['number']);
						header('Location: '.base64_decode($this->input->get('redirect')));
						die;
					}
				}
				$cart[] = $item;
				setcookie('cms_cookie_cart_'.CMS_CODE, json_encode($cart), time()+(7*24*3600), '/');
				$this->session->set_flashdata('message_successful_flash', 'Th??m s???n ph???m '.$products_item['title'].' th??nh c??ng.');
				header('Location: '.base64_decode($this->input->get('redirect')));
				die;
			}
		}
	}
	public function cart(){
		$data['data']['meta_title'] = 'Gi??? h??ng';
		$data['data']['meta_keywords'] = $this->system['meta_keywords'];
		$data['data']['meta_description'] = $this->system['meta_description'];
		$data['data']['menu_active'] = NULL;
		$data['data']['full_data'] = NULL;

		if(isset($_COOKIE['cms_cookie_cart_'.CMS_CODE])){
			$cart = json_decode($_COOKIE['cms_cookie_cart_'.CMS_CODE], true);
			if(count($cart)==0) {
				die('<script type="text/javascript">alert(\'Ch??a c?? s???n ph???m trong gi??? h??ng c???a b???n!\');location.href=\''.CMS_URL.'\';</script>');
			}
			if($this->input->post('btnNumber')){
				$number = $this->input->post('number');
				if(isset($number) && isset($cart)){
					foreach($number as $keyNumber => $valNumber){
						foreach($cart as $keyCart => $valCart){
							if($keyNumber == $valCart['id']){
								$cart[$keyCart]['number'] = preg_replace('/[^0-9]+/i', '', $valNumber);
							}
						}
					}
					setcookie('cms_cookie_cart_'.CMS_CODE, json_encode($cart), time()+(7*24*3600), '/');
					$this->session->set_flashdata('message_successful_flash', 'C???p nh???t s??? l?????ng th??nh c??ng.');
					header('Location: '.CMS_URL.'frontend/sanpham/cart'.CMS_SUFFIX);
					die;
				}
			}
			$data['data']['full_data'] = $cart;
			// Giao di???n
		$data['template'] = 'frontend/sanpham/cart';
		$this->load->view('frontend/layouts/category', $data);

		}else{
			die('<script type="text/javascript">alert(\'Ch??a c?? s???n ph???m trong gi??? h??ng c???a b???n!\');location.href=\''.CMS_URL.'\';</script>');
		}

	}
	public function payment(){
		$data['data']['meta_title'] = 'Thanh to??n';
		$data['data']['meta_keywords'] = $this->system['meta_keywords'];
		$data['data']['meta_description'] = $this->system['meta_description'];
		$data['data']['menu_active'] = NULL;
		$data['data']['full_data'] = NULL;
		if(isset($_COOKIE['cms_cookie_cart_'.CMS_CODE])){
			$cart = json_decode($_COOKIE['cms_cookie_cart_'.CMS_CODE], true);

			if($this->input->post('btnNumber')){
				$number = $this->input->post('number');
				if(isset($number) && isset($cart)){
					foreach($number as $keyNumber => $valNumber){
						foreach($cart as $keyCart => $valCart){
							if($keyNumber == $valCart['id']){
								$cart[$keyCart]['number'] = preg_replace('/[^0-9]+/i', '', $valNumber);
							}
						}
					}
					setcookie('cms_cookie_cart_'.CMS_CODE, json_encode($cart), time()+(7*24*3600), '/');
					$this->session->set_flashdata('message_successful_flash', 'C???p nh???t s??? l?????ng th??nh c??ng.');
					header('Location: '.CMS_URL.'frontend/sanpham/cart'.CMS_SUFFIX);
					die;
				}
			}

			$data['data']['full_data'] = $cart;
			if($this->input->post('submit')){
				$data['data']['post_data'] = $this->input->post('data');
				$this->form_validation->set_rules('data[fullname]', 'H??? t??n', 'trim|required');
				$this->form_validation->set_rules('data[phone]', '??i???n tho???i', 'trim|required|regex_match[/^[0-9]{10}$/]');
				$this->form_validation->set_rules('data[email]', 'Email', 'trim|required|valid_email');
				$this->form_validation->set_rules('data[address]', '?????a ch???', 'trim|required');
				if($this->form_validation->run() == TRUE){
					$data['data']['post_data']['created'] = gmdate('Y-m-d H:i:s', time() + 7*3600);
					$data['data']['post_data']['online'] = 0;
					$data['data']['post_data']['cod'] = 1;
					$data['data']['post_data']['data'] = $_COOKIE['cms_cookie_cart_'.CMS_CODE];
					$this->db->insert('payment', $data['data']['post_data']);
					setcookie('cms_cookie_cart_'.CMS_CODE, json_encode($cart), time()-(7*24*3600), '/');
					$donhang=$this->db->from('payment')->where(array('phone'=>$data['data']['post_data']['phone']))->order_by('id desc')->get()->row_array();

					$total = 0;
					$chitietdon='';
					$full_data=json_decode($donhang['data'],true);
					if(isset($full_data) && count($full_data)){
						foreach($full_data as $key => $val){
							$total_temp = 0;
							$total_temp = $val['price'] * $val['number'];
							$total = $total + $total_temp;
							$product_cart = $this->db->from('sanpham_item')->where(array('id'=>$val['id']))->get()->row_array();

							$chitietdon.='<tr>
								<td style="font-family:tahoma;font-size:14px">'.htmlspecialchars($val['title']).'</td>
								<td style="font-family:tahoma;font-size:14px;text-align:left">'.$val['number'].'</td>
								<td style="font-family:tahoma;font-size:14px;text-align:left">'.number_format($total_temp,0,'.','.').'</td>	

							</tr>';
					} }
					///X??C NH???N


					$email_body='<div id=":zv" class="ii gt adP adO">
					<div id=":1k2" class="a3s aXjCH m15e266d50c22d048">
					<div>
					<div class="adM"> </div>
					<table width="100%" border="0" cellspacing="0" cellpadding="0" style="line-height:1.5em">
					<tbody>
					<tr>
					<td bgcolor="#00918c" style="border-top:#007773 2px solid">
					<table width="700" border="0" cellspacing="0" cellpadding="0" align="center" style="border-top:#00918c 10px solid;border-bottom:#00918c 10px solid">
						<tbody>
							<tr>
								<td>
									<h1 style="font-family:tahoma;color:#ffffff;font-size:24px">X??c nh???n th??ng tin ????n h??ng s??? #SINHVIEN_HAUI'.$donhang['id'].'</h1> </td>
							</tr>
						</tbody>
					</table>
					</td>
					</tr>
					<tr>
					<td bgcolor="#efefef">
					<table width="700" border="0" cellspacing="0" cellpadding="3" align="center" style="border-bottom:20px solid #ffffff;background:#fff;padding:15px">
						<tbody>
							<tr>
								<td height="18" valign="top"></td>
							</tr>
							<tr>
								<td height="18" valign="top" style="border-bottom:20px #ffffff solid">
									<p style="font-family:tahoma;font-size:14px;font-weight:700;color:#363636;line-height:1.5em">K??nh ch??o '.$data['data']['post_data']['fullname'].' !</p>
									<p style="font-family:tahoma;font-size:14px;font-weight:700;color:#363636;line-height:1.5em">C???m ??n qu?? kh??ch ???? g???i th??ng tin cho SINHVIEN_HAUI. Sau ????y l?? th??ng tin c???a qu?? kh??ch:</p>
								</td>
							</tr>
							<tr>
								<td valign="top">
									<h1 style="font-family:tahoma;margin:0;color:#000000;font-size:20px;border-top:1px solid #efefef;padding-bottom:15px;padding-top:15px">Th??ng tin chi ti???t s??? #SINHVIEN_HAUI'.$donhang['id'].'</h1> </td>
							</tr>
							<tr>
								<td>
									<table width="700" border="1" cellspacing="0" cellpadding="5" align="center" style="border:1px solid #efefef;border-collapse:collapse">
										<thead>
											<tr style="background:#00918c">
												<td style="text-align:center;font-family:tahoma;font-size:14px;color:#fff">S???n ph???m</td>
												<td style="text-align:center;font-family:tahoma;font-size:14px;color:#fff">S??? l?????ng</td>
												<td style="text-align:center;font-family:tahoma;font-size:14px;color:#fff">T???ng t???m</td>
											</tr>
										</thead>
										<tbody>
											'.$chitietdon.'
											<tr>
												<td style="font-family:tahoma;font-size:14px">T???ng c???ng</td>
												<td style="font-family:tahoma;font-size:14px;text-align:left"></td>
												<td style="font-family:tahoma;font-size:14px;text-align:left">'.number_format($total,0,'.','.').'</td>
											</tr>
										</tbody>
									</table>
									<p></p>
								</td>
							</tr>
							<tr>
								<td height="18" valign="top" style="border-bottom:20px #ffffff solid">
									<p style="font-family:tahoma;font-size:14px;font-weight:700;color:#363636;line-height:1.5em">?????a ch???: '.$data['data']['post_data']['address'].'</p>
									<p style="font-family:tahoma;font-size:14px;font-weight:700;color:#363636;line-height:1.5em">S??? ??i???n tho???i: '.$data['data']['post_data']['phone'].'</p>
									<p style="font-family:tahoma;font-size:14px;font-weight:700;color:#363636;line-height:1.5em">Email: '.$data['data']['post_data']['email'].'</p>
									<p style="font-family:tahoma;font-size:14px;font-weight:700;color:#363636;line-height:1.5em">Ghi ch??: '.$data['data']['post_data']['notes'].'</p>
								</td>
							</tr>
						</tbody>
					</table>
					</td>
					</tr>
					</tbody>
					</table>
					<table cellspacing="0" cellpadding="0" border="0" width="100%">
					<tbody>
					<tr>
					<td bgcolor="#2d2b2b">
					<table cellspacing="0" cellpadding="0" border="0" align="center" width="700" style="border-bottom:#2d2b2b 10px solid">
						<tbody>
							<tr>
								<td height="50" colspan="5">
									<p style="font-family:tahoma;font-size:14px;color:#b8b8b8"> M???i th???c m???c c???n h??? tr??? Qu?? kh??ch vui l??ng li??n h??? b??? ph???n h??? tr??? c???a ch??ng t??i: <a href="mailto:'.$this->system['email'].'" target="_blank">'.$this->system['email'].'</a></p>
								</td>
							</tr>
							<tr>
								<td height="50" colspan="5">
									<p style="font-family:tahoma;font-size:13px;color:#b8b8b8;padding-top:5px;font-style:italic"> Th??ng b??o email n??y ???????c g???i t??? ?????ng x??c nh???n ????n h??ng v?? kh??ng ph???i email spam</p>
								</td>
							</tr>
						</tbody>
					</table>
					</td>
					</tr>
					</tbody>
					</table>
					</div>
					</div>
					<div class="yj6qo"></div>
					</div>';
					// Send the e-mail by phpmailer
					require APPPATH.'third_party/PHPMailer/class.phpmailer.php';
					require APPPATH.'third_party/PHPMailer/class.smtp.php';
					$mail = new PHPMailer();
					$mail->IsSMTP(); // set mailer to use SMTP
					$mail->Host = "smtp.gmail.com"; // specify main and backup server
					$mail->Port = 465; // set the port to use
					$mail->SMTPAuth = true; // turn on SMTP authentication
					$mail->SMTPSecure = 'ssl';
					//$mail->Username = "no.reply.email.192@gmail.com"; // your SMTP username or your gmail username
					//$mail->Password = "yutfsjdzqbjfoolo"; // your SMTP password or your gmail password
					$mail->Username = "no.reply.email.192@gmail.com"; // your SMTP username or your gmail username
					$mail->Password = "yutfsjdzqbjfoolo"; // your SMTP password or your gmail password
					$mail->FromName = 'no-reply'; // Name to indicate where the email came from when the recepient received
					//End Setting
					$mail->AddCC('dotrongnam2307200@gmail.com', 'Mr Viet');
					$mail->AddCC(''.$this->system['email'].'', ''.$this->system['meta_title'].'');
					$mail->CharSet = "utf-8";
					$mail->From = $data['data']['post_data']['email'];
					$mail->AddAddress($data['data']['post_data']['email']);
					//$mail->AddReplyTo('depraiketao@gmail.com','??????????????????');
					$mail->WordWrap = 50; // set word wrap
					$mail->IsHTML(true); // send as HTML
					$mail->Subject = '['.$this->system['meta_title'].'] Th??ng tin b??o gi?? s??? #SINHVIEN_HAUI'.$donhang['id'];
					$mail->Body = $email_body;
					$mail->AltBody = ""; //Text Body
					$mail->SMTPDebug = 0;
					$mail->Send();

					//END X??C NH???N
					die('<script type="text/javascript">alert(\'?????t h??ng th??nh c??ng. C???m ??n b???n, ch??ng t??i s??? li??n h??? l???i v???i b???n trong th???i gian s???m nh???t!\');location.href=\''.CMS_URL.'\';</script>');
				}
			}
			if($this->input->post('submit_online')){
				$data['data']['post_data'] = $this->input->post('data');
				$this->form_validation->set_rules('data[fullname]', 'H??? t??n', 'trim|required');
				$this->form_validation->set_rules('data[phone]', '??i???n tho???i', 'trim|required');
				$this->form_validation->set_rules('data[email]', 'Email', 'trim|required');
				$this->form_validation->set_rules('data[address]', '?????a ch???', 'trim|required');
				if($this->form_validation->run() == TRUE){
					$data['data']['post_data']['created'] = gmdate('Y-m-d H:i:s', time() + 7*3600);
					$data['data']['post_data']['online'] = 1;
					$data['data']['post_data']['cod'] = 0;
					$data['data']['post_data']['data'] = $_COOKIE['cms_cookie_cart_'.CMS_CODE];
					$this->db->insert('payment', $data['data']['post_data']);
					setcookie('cms_cookie_cart_'.CMS_CODE, json_encode($cart), time()-(7*24*3600), '/');
					die('<script type="text/javascript">alert(\'?????t h??ng th??nh c??ng. C???m ??n b???n, ch??ng t??i s??? li??n h??? l???i v???i b???n trong th???i gian s???m nh???t!\');location.href=\''.CMS_URL.'\';</script>');
				}
			}
		}
		else{
			die('<script type="text/javascript">alert(\'Ch??a c?? s???n ph???m trong gi??? h??ng c???a b???n!\');location.href=\''.CMS_URL.'\';</script>');
		}
		$data['template'] = 'frontend/sanpham/payment';
		$this->load->view('frontend/layouts/category', $data);

	}
	public function removetocart($itemid = 0){
		$itemid = (int)$itemid;
		$products_item = $this->db->from('sanpham_item')->where(array('id' => $itemid))->get()->row_array();
		if(!isset($products_item)){
			$this->session->set_flashdata('message_error_flash', 'D??? li???u kh??ng t???n t???i.');
			header('Location: '.base64_decode($this->input->get('redirect')));
			die;
		}


		if(!isset($_COOKIE['cms_cookie_cart_'.CMS_CODE])){
			$this->session->set_flashdata('message_error_flash', 'Kh??ng c?? s???n ph???m trong gi??? h??ng.');
			header('Location: '.base64_decode($this->input->get('redirect')));
			die;
		}
		else{
			$cart = json_decode($_COOKIE['cms_cookie_cart_'.CMS_CODE], true);
			if(isset($cart)){
				foreach($cart as $key => $val){
					if($val['id'] == $itemid){
						unset($cart[$key]);
						$cart = array_values($cart);
						setcookie('cms_cookie_cart_'.CMS_CODE, json_encode($cart), time()+(7*24*3600), '/');
						$this->session->set_flashdata('message_successful_flash', 'X??a s???n ph???m kh???i gi??? h??ng th??nh c??ng.');
						header('Location: '.base64_decode($this->input->get('redirect')));
						die;
					}
				}
			}
		}
	}
}
