<!DOCTYPE html>
<html lang="vi">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<base href="<?php echo CMS_URL;?>" />
	<link href="<?=$this->system['icon']?>" rel="shortcut icon" type="image/x-icon" />
	<link rel="icon" type="image/png" href="<?=$this->system['icon']?>" />
	<meta name="robots" content="noodp,index,follow" />
	<meta name="revisit-after" content="1 days" />
	<meta http-equiv="content-language" content="vi" />
	<title><?php echo isset($data['meta_title'])?$data['meta_title']:'';?></title>
	<meta name="title" content="<?php echo isset($data['meta_title'])?$data['meta_title']:'';?>" />
	<meta name="keywords" content="<?php echo isset($data['meta_keywords'])?$data['meta_keywords']:'';?>" />
	<meta name="description" content="<?php echo isset($data['meta_description'])?$data['meta_description']:'';?>" />
	<link rel="canonical" href="<?php echo isset($data['canonical'])?$data['canonical']:'';?>"/>
	<?php echo (isset($data['rel_prev']) && !empty($data['rel_prev']))?'<link rel="prev" href="'.$data['rel_prev'].'" />':'';?>
	<?php echo (isset($data['rel_next']) && !empty($data['rel_next']))?'<link rel="next" href="'.$data['rel_next'].'" />':'';?>
	<meta itemprop="description" content="<?php echo isset($data['meta_description'])?$data['meta_description']:'';?>" />
	<meta itemprop="url" href="<?php echo isset($data['canonical'])?$data['canonical']:'';?>" />
	<meta itemprop="image" content="<?php echo isset($data['image'])?$data['image']:'';?>" />
	<meta property="og:image" content="<?php echo isset($data['image'])?$data['image']:'';?>" />
	<?php echo (isset($data['google_authorship']) && !empty($data['google_authorship']))?'<link rel="author" href="'.$data['google_authorship'].'"/>':'';?>

		 <!-- CSS Style -->
		  <link rel="stylesheet" type="text/css" href="template/frontend/css/bootstrap.min.css">
		  <link rel="stylesheet" type="text/css" href="template/frontend/css/font-awesome.min.css" media="all">
		  <link rel="stylesheet" type="text/css" href="template/frontend/css/simple-line-icons.css" media="all">
		  <link rel="stylesheet" type="text/css" href="template/frontend/css/owl.carousel.css">
		  <link rel="stylesheet" type="text/css" href="template/frontend/css/owl.theme.css">
		  <link rel="stylesheet" type="text/css" href="template/frontend/css/jquery.bxslider.css">
		  <link rel="stylesheet" type="text/css" href="template/frontend/css/jquery.mobile-menu.css">
		  <link rel="stylesheet" type="text/css" href="template/frontend/css/style.css?<?php echo time(); ?>" media="all">
		  <link rel="stylesheet" type="text/css" href="template/frontend/css/revslider.css">
		  <!-- Google Fonts -->
		  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800'
		    rel='stylesheet' type='text/css'>
		  <link href='https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700' rel='stylesheet' type='text/css'>
		  <link href="https://fonts.googleapis.com/css?family=Kaushan+Script&amp;subset=latin-ext" rel="stylesheet">
		  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700&amp;display=swap"
		    rel="stylesheet">

</head>
<body class="cms-index-index cms-home-page home">
<!--HEADER-->
<?php echo $this -> system['code_header']; ?>
<?php $this->load->view('frontend/header');?>

<?php $data = isset($data)?$data:NULL; $this->load->view($template, $data);?>

<?php $this->load->view('frontend/footer');?>
  
</body>
</html>
