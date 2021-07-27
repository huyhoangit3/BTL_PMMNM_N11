<div id="page">

    <!-- Header -->
    <header>
        <div class="header-container">
            <div class="container">
                <div class="row">

                    <div class="div-slide">

                        <div class="container chiso" style=" display: flex; align-items: center; height: 40px; line-height: 40px; ">
                            <b><h4 style="color: #fff; width: 120px ;background: #e72c59; margin: 0; padding: 5px; text-align: center;font-weight: bold;">Tin COVID:</h4></b>
                            <marquee behavior="scroll" direction="left" onmouseover="this.stop();" vspace="50px" onmouseout="this.start(); " height="30px" style="line-height: 29px">

                                <ul style="display: flex; align-items:center">


                                     <?php $tinhot= $this->db->select('*')->from('articles_item')->where(array('publish' => 1, 'parentid' => 10))->order_by('order asc')->get()->result_array(); ?>
                                    <?php if(isset($tinhot) && count($tinhot)) { foreach ($tinhot as $key=> $tinhots) { ?>
                                    <li style="list-style: none; padding-right: 40px;"><span class="noidungbiendong text-green"><b> <a  style="color: #000"><?php echo $tinhots['title']; ?>&emsp;&emsp;</a></b></span>
                                    </li>

                                <?php }} ?>
                                  

                                </ul>
                            </marquee>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 logo-block">
                    <!-- Header Logo -->
                    <div class="logo"> <a title="LOGO" href="\"><img alt="LOGO" src="<?php echo $this ->system['logo']; ?>"> </a> </div>
                    <!-- End Header Logo -->
                </div>
                <div class="col-lg-7 col-md-6 col-sm-6 col-xs-3 hidden-xs category-search-form">
                    <div class="contact-row">
                        <div class="phone inline">
                            <i class="fa fa-phone"></i>Hotline:
                            <a href="tel:<?php echo $this ->system['hotline']; ?>">
                                <?php echo $this ->system['hotline']; ?></a>
                        </div>
                        <div class="contact inline">
                            <i class="fa fa-envelope" style="margin-top: -4px; margin-left: 30px;"></i> Email:
                            <a href="mailto:<?php echo $this ->system['email']; ?>"> <span class="le-color"><?php echo $this ->system['email']; ?></span>
                            </a>
                        </div>
                    </div>
                    <div class="search-box">
                        <form action="<?php echo CMS_URL; ?>" method="get">
                            <!-- Autocomplete End code -->
                            <input id="search" type="search" name="s" placeholder="Nhập sản phẩm tìm kiếm..." class="searchbox" maxlength="128">

                            <button type="submit" title="Search" class="search-btn-bg" id="submit-button"></button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12 card_wishlist_area">
                    <div class="mm-toggle-wrap">
                        <div class="mm-toggle"><i class="fa fa-align-justify"></i><span class="mm-label">Menu</span> </div>
                    </div>
                    <div class="top-cart-contain">
                        <!-- Top Cart -->
                        <div class="mini-cart">
                            <div class="basket dropdown-toggle">
                               
                                       

                                <a href="gio-hang.html"><span style="position: absolute; font-size: 22px;line-height: 24px;">Giỏ <br>Hàng</span>
                                          <?php if(isset($_COOKIE['cms_cookie_cart_'.CMS_CODE])) { 
                                        $cart = json_decode($_COOKIE['cms_cookie_cart_'.CMS_CODE], true); }?>
                                             <?php if(isset($cart)){$cart=count($cart);}else{$cart=0;}?>  
                                        <span class="cart_count"> 
                                          

                                             <?php echo $cart; ?>
                                        </span>
                                          
                                        </a>
                                
                            </div>
                           
                        </div>
                        <!-- Top Cart -->
                        <div id="ajaxconfig_info" style="display:none">
                            <a href="#/"></a>
                            <input value="" type="hidden">
                            <input id="enable_module" value="1" type="hidden">
                            <input class="effect_to_cart" value="1" type="hidden">
                            <input class="title_shopping_cart" value="Go to shopping cart" type="hidden">
                        </div>
                    </div>
                    <!-- thm wishlist -->
                </div>
            </div>
        </div>
        <nav class="hidden-xs">
            <div class="nav-container">
                <div class="col-md-3 col-xs-12 col-sm-3">
                    <div class="mega-container visible-lg visible-md visible-sm">
                        <div class="navleft-container">
                            <div class="mega-menu-title">
                                <h3><i class="fa fa-heartbeat"></i> DANH MỤC SẢN PHẨM</h3>
                            </div>
                            <div class="mega-menu-category">
                                <ul class="nav">
                                    <?php $category_sp= $this->db->select('*')->from('sanpham_category')->where(array('publish' => 1, 'parentid' => 2))->order_by('order asc')->get()->result_array(); ?>
                                    <?php if(isset($category_sp) && count($category_sp)) { foreach ($category_sp as $key=> $categories_sp) { ?>

                                    <li class="dropdown">
                                        <a href="<?php echo helper_string_alias($categories_sp['title']).'-cp'.$categories_sp['id'].CMS_SUFFIX; ?>" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                            <?php echo $categories_sp['title']; ?>
                                        </a>

                                        <div class="dropdown-menu wrap-popup column1">
                                            <div class="popup">
                                                <ul class="nav">
                                                     <li>
                                                    <a href="<?php echo helper_string_alias($categories_sp['title']).'-cp'.$categories_sp['id'].CMS_SUFFIX; ?>">
                                                        Tất Cả Sản Phẩm
                                                    </a>
                                                    </li>
                                                   <?php $collection_sp_1= $this->db->select('*')->from('sanpham_category')->where(array('publish' => 1, 'parentid' => $categories_sp['id']))->order_by('order asc')->get()->result_array(); ?>

                                                    <?php if(isset($collection_sp_1) && count($collection_sp_1)) { foreach ($collection_sp_1 as $key=> $collection_sp_1s) { ?>
                                                    
                                                    <li>
                                                        <a href="<?php echo helper_string_alias($collection_sp_1s['title']).'-cp'.$collection_sp_1s['id'].CMS_SUFFIX; ?>">
                                                            <?php echo $collection_sp_1s[ 'title']; ?>
                                                        </a>
                                                    </li>
                                                    <?php }} ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                  <?php }} ?>
                                   
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- features box -->
                <div class="our-features-box hidden-xs">
                    <div class="features-block">
                        <div class="col-lg-9 col-md-9 col-xs-12 col-sm-9 offer-block">
                            <?php $category=$this->db->select('*')->from('articles_category')->where(array('publish' => 1, 'parentid' => 1))->order_by('order asc')->get()->result_array(); ?>
                            <?php if(isset($category) && count($category)) { foreach ($category as $key=> $category_category) { ?>
                            <a href="<?php echo helper_string_alias($category_category['title']).'-c'.$category_category['id'].CMS_SUFFIX; ?>">
                                <?php echo $category_category[ 'title']; ?>
                            </a>
                            <?php }} ?>
                            <a href="lien-he.html">Liên hệ</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <!-- end header -->
