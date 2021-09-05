n<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends MY_Controller {

	public function index(){
		$data['data']['meta_title'] = 'Liên hệ - '.$this->system['meta_title'];
		$data['data']['meta_keywords'] = $this->system['meta_keywords'];
		$data['data']['meta_description'] = 'Liên hệ - '.$this->system['meta_description'];
		$data['data']['canonical'] = CMS_URL.'lien-he'.CMS_SUFFIX;
		$data['data']['sidebar'] = 1;
		$data['data']['google_authorship'] = $this->system['google_authorship'];

		
		if($this->input->post('sent')){
			$post_data = $this->input->post('data'); 
			$data['post_data'] = $post_data;
			$this->form_validation->set_rules('data[fullname]', 'Tên đầy đủ', 'trim|required');
			$this->form_validation->set_rules('data[phone]', 'Số điện thoại', 'trim|required');
			$this->form_validation->set_rules('data[address]', 'Địa chỉ', 'trim');
			$this->form_validation->set_rules('data[email]', 'Email', 'trim|valid_email|required');
			$this->form_validation->set_rules('data[notes]', 'Nội dung liên hệ', 'trim');
			
			$this->form_validation->set_error_delimiters('<li>', '</li>');
			if($this->form_validation->run() == TRUE){
				$post_data['publish'] = 1;
				$post_data['created'] = gmdate('Y-m-d H:i:s', time() + 7*3600);
				$this->db->insert('contacts', $post_data);
				require APPPATH.'third_party/PHPMailer/class.phpmailer.php'; 
				require APPPATH.'third_party/PHPMailer/class.smtp.php';

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
									<h1 style="font-family:tahoma;color:#ffffff;font-size:24px">
									Thông tin liên hệ khách hàng: 
									</h1> 
								</td>
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
							<td height="18" valign="top" style="border-bottom:20px #ffffff solid">
								<p style="font-family:tahoma;font-size:14px;font-weight:700;color:#363636;line-height:1.5em">Tên khách hàng: '.$post_data['fullname'].'</p>
								<p style="font-family:tahoma;font-size:14px;font-weight:700;color:#363636;line-height:1.5em">Số điện thoại: '.$post_data['phone'].'</p>
								<p style="font-family:tahoma;font-size:14px;font-weight:700;color:#363636;line-height:1.5em">Email: '.$post_data['email'].'</p>
								<p style="font-family:tahoma;font-size:14px;font-weight:700;color:#363636;line-height:1.5em">Địa chỉ: '.$post_data['address'].'</p>
								
								<p style="font-family:tahoma;font-size:14px;font-weight:700;color:#363636;line-height:1.5em">Nội dung liên hệ: '.$post_data['notes'].'</p>
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

				$mail->AddCC('dotrongnam2307200@gmail.com', 'Mr Nam');
				$mail->AddCC(''.$this->system['email'].'', 'HAUI');
				$mail->CharSet = "utf-8";
				$mail->setFrom(''.$this->system['email'].'', 'HAUI');
				// $mail->AddAddress($post_data['email'], $post_data['fullname']);
				//$mail->AddReplyTo('depraiketao@gmail.com','日本はいいね');
				$mail->WordWrap = 50; // set word wrap
				$mail->IsHTML(true); // send as HTML
				$mail->Subject = '[HAUI] Liên hệ khách hàng '.$post_data['fullname'];
				$mail->Body = $email_body;
				$mail->AltBody = ""; //Text Body
				$mail->SMTPDebug = 0;
				$mail->Send();

				//END XÁC NHẬN
				die('<script type="text/javascript">alert(\'Cảm ơn bạn đã gửi thông tin cho chúng tôi!\');location.href=\''.CMS_URL.'\';</script>');
			}
		} 
		
		$data['template'] = 'frontend/contact/index';
		$this->load->view('frontend/layouts/category', $data);
	}
	
	

}