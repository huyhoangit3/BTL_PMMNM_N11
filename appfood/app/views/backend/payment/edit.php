<div id="cms-tab">	<p class="title">Hệ thống quản lý đơn hàng</p>	<ul class="main">		<li class="main"><a href="<?php echo CMS_BACKEND.'/payment/index'.CMS_SUFFIX;?>" class="main">Quản lý đơn hàng</a></li>	</ul>	<div class="cms-clear"></div></div><!-- #cms-tab --><div id="cms-container">	<div id="cms-form">		<?php		$data['post_data'] = isset($post_data)?$post_data:NULL;		$data['button_action'] = '<input type="submit" name="add" value="Thay đổi thông tin đơn hàng" class="button" />';		$this->load->view('backend/payment/_form', $data);		?>		<div class="cms-clear"></div>	</div><!-- #cms-form -->	<div class="cms-clear"></div></div><!-- #cms-container -->