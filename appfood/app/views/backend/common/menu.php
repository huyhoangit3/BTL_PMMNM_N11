<div class="collapse navbar-collapse" id="automation-collapse">
<ul class="nav navbar-nav navbar-left custom-navbar-nav">
	<li class="nav-item" id="menu-home">
		<a href="<?php echo CMS_BACKEND;?>" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >Trang chủ</a>
		<ul class="dropdown-menu">
			<li class="dropdown-item"><a href="<?php echo CMS_BACKEND.'/authentication/logout'.CMS_SUFFIX;?>" class="item">Đăng xuất</a></li> 
		</ul>
	</li>
	
	<li class="nav-item" id="menu-sanpham">
		<a href="<?php echo CMS_BACKEND.'/sanpham/item'.CMS_SUFFIX;?>" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sản phẩm</a>
		<ul class="dropdown-menu">
			<li class="dropdown-item"><a href="<?php echo CMS_BACKEND.'/sanpham/category'.CMS_SUFFIX;?>" class="item">Quản lý danh mục sản phẩm</a></li>
			<li class="dropdown-item"><a href="<?php echo CMS_BACKEND.'/sanpham/addcategory'.CMS_SUFFIX;?>" class="item">Thêm danh mục sản phẩm</a></li>
			<li class="dropdown-item"><a href="<?php echo CMS_BACKEND.'/sanpham/item'.CMS_SUFFIX;?>" class="item">Quản lý sản phẩm</a></li>
			<li class="dropdown-item"><a href="<?php echo CMS_BACKEND.'/sanpham/additem'.CMS_SUFFIX;?>" class="item">Thêm sản phẩm</a></li>
		</ul>
	</li>

	<li class="nav-item" id="menu-articles">
		<a href="<?php echo CMS_BACKEND.'/articles/item'.CMS_SUFFIX;?>" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >Bài Viết</a>
		<ul class="dropdown-menu"> 
			<li class="dropdown-item"><a href="<?php echo CMS_BACKEND.'/articles/category'.CMS_SUFFIX;?>" class="item">Quản lý danh mục bài viết</a></li>
			<li class="dropdown-item"><a href="<?php echo CMS_BACKEND.'/articles/addcategory'.CMS_SUFFIX;?>" class="item">Thêm danh mục bài viết</a></li>
			<li class="dropdown-item"><a href="<?php echo CMS_BACKEND.'/articles/item'.CMS_SUFFIX;?>" class="item">Quản lý bài viết</a></li>
			<li class="dropdown-item"><a href="<?php echo CMS_BACKEND.'/articles/additem'.CMS_SUFFIX;?>" class="item">Thêm bài viết</a></li>
		</ul>
	</li>

	
	<li class="nav-item" id="menu-caidat">
		<a href="<?php echo CMS_BACKEND.'/slide/index'.CMS_SUFFIX;?>" class="nav-link">Slide</a>
	</li>

	<li class="nav-item" id="menu-grouplink">
		<a href="<?php echo CMS_BACKEND.'/grouplink/item'.CMS_SUFFIX;?>" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >Banner</a>
		<ul class="dropdown-menu"> 
			<li class="dropdown-item"><a href="<?php echo CMS_BACKEND.'/grouplink/category'.CMS_SUFFIX;?>" class="item">Quản lý danh mục Banner</a></li>
			<li class="dropdown-item"><a href="<?php echo CMS_BACKEND.'/grouplink/addcategory'.CMS_SUFFIX;?>" class="item">Thêm danh mục Banner</a></li>
			<li class="dropdown-item"><a href="<?php echo CMS_BACKEND.'/grouplink/item'.CMS_SUFFIX;?>" class="item">Quản lý Banner</a></li>
			<li class="dropdown-item"><a href="<?php echo CMS_BACKEND.'/grouplink/additem'.CMS_SUFFIX;?>" class="item">Thêm Banner</a></li>
		</ul>
	</li>
	<?php if($this->auth['group'] == 'Người quản lý'){ ?>

	<li class="nav-item" id="menu-payment">
		<a href="<?php echo CMS_BACKEND.'/payment/index'.CMS_SUFFIX;?>" class="nav-link">Đơn hàng</a>
	</li>
	<li class="nav-item" id="menu-ykien">
		<a href="<?php echo CMS_BACKEND.'/ykien/index'.CMS_SUFFIX;?>" class="nav-link">Đánh giá</a>
	</li>

	
	<li class="nav-item" id="menu-lienhe">
		<a href="<?php echo CMS_BACKEND.'/contacts/index'.CMS_SUFFIX;?>" class="nav-link">Liên hệ</a>
	</li>
	<li class="nav-item" id="menu-member">
		<a href="<?php echo CMS_BACKEND.'/member/index'.CMS_SUFFIX;?>" class="nav-link" >Thành Viên</a>
	</li>
	<li class="nav-item" id="menu-system">
		<a href="<?php echo CMS_BACKEND.'/system/index'.CMS_SUFFIX;?>" class="nav-link" >Cấu hình</a>
	</li>
	<?php } ?>
	
</ul>
</div>