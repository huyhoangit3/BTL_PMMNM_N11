<div class="container-fluid">
      <div class="row">
        <!-- Slider -->
        <div class="home-slider5">
          <div id="thmg-slideshow" class="thmg-slideshow">
            <div id='rev_slider_4_wrapper' class='rev_slider_wrapper fullwidthbanner-container'>
              <div id='rev_slider_4' class='rev_slider fullwidthabanner'>
                <ul>

                <?php $slide = $this->db->select('*')->from('slide')->where(array('publish' => 1))->order_by('order asc')->get()->result_array(); ?>
                <?php if(isset($slide) && count($slide)) { foreach($slide as $key => $value) { ?>
                  <li data-transition='random' data-slotamount='7' data-masterspeed='1000'
                    data-thumb='<?php echo $value['image']; ?>'><img src='<?php echo $value['image']; ?>' data-bgfit='cover'
                      data-bgrepeat='no-repeat' alt="banner" />

                    <div class="container">
                      <div class="content_slideshow">
                        <div class="row">
                          <div class="col-lg-3 col-sm-3 col-md-3">&nbsp;</div>
                          <div class="col-lg-9 col-sm-9 col-md-9">
                            <div class="info">
                              <div class='tp-caption ExtraLargeTitle sft  tp-resizeme ' data-endspeed='500'
                                data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none'
                                data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1'
                                style='z-index:2; white-space:nowrap;'><span><?php echo $value['fullname']; ?></span> </div>
                              <div class='tp-caption LargeTitle sfl  tp-resizeme ' data-endspeed='500' data-speed='500'
                                data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none'
                                data-elementdelay='0.1' data-endelementdelay='0.1'
                                style='z-index:3; white-space:nowrap;'>
                                <span
                                  style="font-weight:normal; display:block"><?php echo $value['notes']; ?></span>  </div>
                             
                              <div class='tp-caption sfb  tp-resizeme ' data-endspeed='500' data-speed='500'
                                data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none'
                                data-elementdelay='0.1' data-endelementdelay='0.1'
                                style='z-index:4; white-space:nowrap;'><a href='<?php echo $value['address']; ?>' class="buy-btn">XEM THÊM</a> </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>

                <?php }} ?>



                </ul>
                <div class="tp-bannertimer"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section-element container">
      <div class="row">
         <?php $banner = $this->db->select('*')->from('grouplink_item')->where(array('publish' => 1, 'parentid'=> 6))->limit(1)->order_by('order asc')->get()->result_array(); ?>
        <?php if(isset($banner) && count($banner)) { foreach($banner as $key => $value) {  ?>
        <div class="large-6">
          <div class="wpb_wrapper">
            <div class="banner">
              <div class="banner-content">
                <h4><?php echo $value['title']; ?></h4>
                <h5><?php echo $value['notes']; ?></h5>
                <a href="<?php echo $value['url']; ?>" class="readmore-link">Xem Thêm <i class="fa fa-chevron-circle-right"></i></a>
              </div>
              <div class="banner-img">
                <a href="<?php echo $value['url']; ?>"><img src="<?php echo $value['image']; ?>" alt="<?php echo $value['title']; ?>"></a>
              </div>

            </div>
          </div>
        </div>
      <?php }} ?>

        <div class="nasa-col large-6 columns desktop-padding-left-5  vc_">
          <div class="wpb_wrapper">

             <?php $banner = $this->db->select('*')->from('grouplink_item')->where(array('publish' => 1, 'parentid'=> 12))->limit(2)->order_by('order asc')->get()->result_array(); ?>
        <?php if(isset($banner) && count($banner)) { foreach($banner as $key => $value) {  ?>
            <div class="large-6">
              <div class="wpb_wrapper">

                <div class="banner">
                  <div class="banner-content1">
                    
                    <h3><?php echo $value['title']; ?></h3>
                    <p><?php echo $value['notes']; ?></p>
                  </div>
                  <div class="banner-img">
                    <a href="<?php echo $value['url']; ?>"><img src="<?php echo $value['image']; ?>" alt="<?php echo $value['title']; ?>"></a>
                  </div>



                </div>
              </div>
            </div>
          <?php }} ?>
           
          </div>

            <?php $banner = $this->db->select('*')->from('grouplink_item')->where(array('publish' => 1, 'parentid'=> 8))->limit(1)->order_by('order asc')->get()->result_array(); ?>
        <?php if(isset($banner) && count($banner)) { foreach($banner as $key => $value) {  ?>
          <div class="row margin-top-5">
            <div class="large-12">
              <div class="wpb_wrapper">
                <div class="banner">
                  <div class="banner-content">

                    <h4><?php echo $value['title']; ?></h4>
                    <h5><?php echo $value['notes']; ?></h5>
                     <a href="<?php echo $value['url']; ?>" class="readmore-link">Xem Thêm <i class="fa fa-chevron-circle-right"></i></a>
                  </div>
                  <div class="banner-img">
                    <a href="<?php echo $value['url']; ?>"><img src="<?php echo $value['image']; ?>" alt="<?php echo $value['title']; ?>"></a>
                  </div>

                </div>
              </div>
            </div>
          </div>
        <?php }} ?>
        </div>

      </div>
    </div>



    <div class="container">
      <div class="content-page">

        <!-- featured category -->
        <div class="category-product">
          <div class="navbar nav-menu">
            <div class="navbar-collapse">
              <h1 style ="padding-top: 10px;">SẢN PHẨM</h1>
              <ul class="nav navbar-nav">
                <li class="active"><a data-toggle="tab" href="#tab-1">Sản Phẩm Nổi Bật</a></li>
                <li class=" "><a data-toggle="tab" href="#tab-2">Sản Phẩm Mới Nhất</a></li>
               
              </ul>
            </div>
            <!-- /.navbar-collapse -->

          </div>
          <div class="product-bestseller">
            <div class="product-bestseller-content">
              <div class="product-bestseller-list">
                <div class="tab-container">
                  <!-- tab product -->
                  <div class="tab-panel active" id="tab-1">
                    <div class="category-products">
                      <ul class="products-grid">
                        
                        <?php $tintuc = $this->db->select('*')->from('sanpham_item')->where(array('publish' => 1, 'highlight' => 1))->limit(4)->order_by('created desc')->get()->result_array(); ?>
                                <?php if(isset($tintuc) && count($tintuc)) { foreach ($tintuc as $number => $val) {  ?>
                        <li class="item col-lg-3 col-md-3 col-sm-3 col-xs-6">
                          <div class="item-inner">
                            <div class="item-img">
                              <div class="item-img-info"> 
                                <a class="product-image" href="<?php echo helper_string_alias($val['title']).'-ap'.$val['id'].CMS_SUFFIX; ?>"> <img
                                    alt="<?php echo $val['title']; ?>" src="<?php echo helper_string_image(247, 247, $val['image']); ?>"> </a>
                                    <?php if($val['highlight']==1){ ?>
                                    <div class="sale-label sale-top-right">
                                    <?php echo "Nổi Bật";
                                      ?></div>
                                      <?php }else echo ''; ?>

                                <div class="box-hover">
                                  <ul class="add-to-links">
                                    <li><a class="link-quickview" href="<?php echo helper_string_alias($val['title']).'-ap'.$val['id'].CMS_SUFFIX; ?>">
                                     
                                    </a> </li>
                                    
                                  </ul>
                                </div>
                              </div>
                            </div>
                            <div class="item-info">
                              <div class="info-inner">
                                <div class="item-title" style="overflow: hidden;text-overflow: ellipsis;-webkit-line-clamp: 2;display: -webkit-box;-webkit-box-orient: vertical;"> <a href="<?php echo helper_string_alias($val['title']).'-ap'.$val['id'].CMS_SUFFIX; ?>"> 
                                  <?php echo $val['title']; ?>
                                </a> </div>

                                 <?php $dm_tintuc = $this->db->select('*')->from('sanpham_category')->where(array('publish' => 1, 'id' => $val['parentid']))->order_by('created desc')->get()->result_array(); ?>
                                <?php if(isset($dm_tintuc) && count($dm_tintuc)) { foreach ($dm_tintuc as $number => $vals) {  ?>
                                <div class="brand"><?php echo $vals['title']; ?></div>
                               <?php }} ?>
                                <div class="item-content">
                                  <div class="item-price">
                                    <div class="price-box"> 
                                     <span class="regular-price"> 
                                        <span class="price"><?php echo helper_string_money($val['price']); ?></span>
                                        <span class="old-price"><span class="price"><?php echo helper_string_money($val['price_market']); ?></span></span> 
                                      </span> 
                                        </div>
                                  </div>
                                   <div class="action">
                                          <a href="<?php echo CMS_URL; ?>frontend/sanpham/addtocart/<?php echo $val['id'].CMS_SUFFIX; ?>?redirect=<?=base64_encode(CMS_URL.'gio-hang.html')?>"> <button class="button btn-cart" type="button" title=""
                                                  data-original-title="Add to Cart"><i class="fa fa-shopping-basket"></i></button></a>
                                        </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- End  Item inner-->
                        </li>

                      <?php }} ?>
                      </ul>
                    </div>
                  </div>

                  <!-- tab product -->
                  <div class="tab-panel " id="tab-2">
                    <div class="category-products">
                      <ul class="products-grid">
                         <?php $tintuc = $this->db->select('*')->from('sanpham_item')->where(array('publish' => 1))->limit(4)->order_by('created desc')->get()->result_array(); ?>
                                <?php if(isset($tintuc) && count($tintuc)) { foreach ($tintuc as $number => $val) {  ?>
                       <li class="item col-lg-3 col-md-3 col-sm-3 col-xs-6">
                          <div class="item-inner">
                            <div class="item-img">
                              <div class="item-img-info">
                               <a class="product-image" href="<?php echo helper_string_alias($val['title']).'-ap'.$val['id'].CMS_SUFFIX; ?>"> <img
                                    alt="<?php echo $val['title']; ?>" src="<?php echo helper_string_image(247, 247, $val['image']); ?>"> </a>
                                    <?php if($val['price_market'] !=0 ){ ?>
                                    <div class="new-label new-top-left">
                            <?php 

                            $ptg=(($val['price_market']-$val['price'])/($val['price_market']));  ?>
                             <?php $pt= $ptg*100;  ?>
                            <?php  echo (int)$pt;
                             ?>%

                          </div> 
                        <?php }else ?>
                                <div class="box-hover">
                                  <ul class="add-to-links">
                                    <li><a class="link-quickview" href="<?php echo helper_string_alias($val['title']).'-ap'.$val['id'].CMS_SUFFIX; ?>">
                                     
                                    </a> </li>
                                    
                                  </ul>
                                </div>
                              </div>
                            </div>
                            <div class="item-info">
                              <div class="info-inner">
                                <div class="item-title" style="overflow: hidden;text-overflow: ellipsis;-webkit-line-clamp: 2;display: -webkit-box;-webkit-box-orient: vertical;"> <a href="<?php echo helper_string_alias($val['title']).'-ap'.$val['id'].CMS_SUFFIX; ?>"> 
                                  <?php echo $val['title']; ?>
                                </a> </div>

                                 <?php $dm_tintuc = $this->db->select('*')->from('sanpham_category')->where(array('publish' => 1, 'id' => $val['parentid']))->order_by('created desc')->get()->result_array(); ?>
                                <?php if(isset($dm_tintuc) && count($dm_tintuc)) { foreach ($dm_tintuc as $number => $vals) {  ?>
                                <div class="brand"><?php echo $vals['title']; ?></div>
                               <?php }} ?>
                                <div class="item-content">
                                  <div class="item-price">
                                    <div class="price-box"> 
                                      <span class="regular-price"> 
                                        <span class="price"><?php echo helper_string_money($val['price']); ?></span>
                                        <span class="old-price"><span class="price">
                                          
                                          <?php if($val['price_market']==0){ ?>
                                            <?php echo ''; ?>
                                          <?php }else{ ?>
                                          <?php echo helper_string_money($val['price_market']); ?>
                                        <?php } ?>
                                            
                                          </span>
                                        </span> 
                                      </span>  </div>
                                  </div>
                                   <div class="action">
                              <a href="<?php echo CMS_URL; ?>frontend/sanpham/addtocart/<?php echo $val['id'].CMS_SUFFIX; ?>?redirect=<?=base64_encode(CMS_URL.'gio-hang.html')?>"> <button class="button btn-cart" type="button" title=""
                                      data-original-title="Add to Cart"><i class="fa fa-shopping-basket"></i></button></a>
                            </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- End  Item inner-->
                        </li>

                        <?php }} ?>

                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <div class="container">
      <div class="wide-banner">
        <div class="row">
           <?php $banner = $this->db->select('*')->from('grouplink_item')->where(array('publish' => 1, 'parentid'=> 13))->limit(2)->order_by('order asc')->get()->result_array(); ?>
        <?php if(isset($banner) && count($banner)) { foreach($banner as $key => $value) {  ?>
          <div class="figure banner-with-effects effect-sadie1 banner-width  with-button">
            <img src="<?php echo $value['image']; ?>"
              alt="<?php echo $value['title']; ?>" title="<?php echo $value['title']; ?>">

          </div>
         <?php }} ?>
        </div>
      </div>
    </div>




    <section class="deals-block">
      <div class="container">
        <div class="row">
          <div class="col-lg-9">
            <h2>SẢN PHẨM SIÊU SALE</h2>
            <div class="hot-deal">

              <ul class="products-grid">
                <?php $tintuc = $this->db->select('*')->from('sanpham_item')->where(array('publish' => 1, 'parentid'=>67))->limit(1)->order_by('created desc')->get()->result_array(); ?>
                <?php if(isset($tintuc) && count($tintuc)) { foreach ($tintuc as $number => $val) {  ?>

                <li class="right-space two-height item">
                  <div class="item-inner">
                    <div class="item-info">
                      <div class="info-inner">
                        <div class="item-title"> 
                          <a href="<?php echo helper_string_alias($val['title']).'-ap'.$val['id'].CMS_SUFFIX; ?>" title="<?php echo $val['title']; ?>"style="overflow: hidden;text-overflow: ellipsis;-webkit-line-clamp: 3;display: -webkit-box;-webkit-box-orient: vertical;">
                           <?php echo $val['title']; ?>
                          </a> 
                        </div>

                         <?php $dm_tintuc = $this->db->select('*')->from('sanpham_category')->where(array('publish' => 1, 'id'=>$val['parentid']))->limit(1)->order_by('created desc')->get()->result_array(); ?>
                          <?php if(isset($dm_tintuc) && count($dm_tintuc)) { foreach ($dm_tintuc as $number => $dm_val) {  ?>
                        <div class="brand">
                           <a href="<?php echo helper_string_alias($dm_val['title']).'-cp'.$dm_val['id'].CMS_SUFFIX; ?>" style="color: #fff;font-weight: bold;font-size: 13px;"> <?php echo $dm_val['title']; ?></a>
                        </div>
                      <?php }} ?>
                        <div class="item-content">
                          <div class="item-price">
                            <div class="price-box"> 
                              <span class="regular-price"> 
                                <span class="price">
                                  <?php echo helper_string_money($val['price']); ?>
                                </span>
                              </span> 
                              <span class="old-price">
                                <span class="price">
                                <?php echo helper_string_money($val['price_market']); ?>
                                </span>
                              </span>
                            </div>
                          </div>
                          <div class="box-timer">
                            <div class="countbox_1 timer-grid"></div>
                          </div>
                          <a href="<?php echo CMS_URL; ?>frontend/sanpham/addtocart/<?php echo $val['id'].CMS_SUFFIX; ?>?redirect=<?=base64_encode(CMS_URL.'gio-hang.html')?>"><button onclick="" class="button btn-cart" title="Add to Cart" type="button">Mua Ngay</button></a>
                          <div class="offer-text"> Số lượng có hạn ! Nhanh tay mua ngay kẻo hết hàng nha! </div>
                        </div>
                      </div>
                    </div>
                    <div class="item-img">
                      <div class="item-img-info"> <a href="#" title="Retis lapen casen" class="product-image"> <img
                            src="<?php echo $val['image']; ?>"> </a>
                        <div class="hot-label hot-top-left">
                          
                           <?php 
                            $ptg=(($val['price_market']-$val['price'])/($val['price_market']));  ?>
                             <?php $pt= $ptg*100;  ?>
                            <?php  echo (int)$pt;
                             ?>%

                        </div>
                        <div class="box-hover">
                          <ul class="add-to-links">
                            <li><a class="link-quickview" href="<?php echo helper_string_alias($dm_val['title']).'-cp'.$dm_val['id'].CMS_SUFFIX; ?>"></a> </li>
                            
                          </ul>
                        </div>

                      </div>
                    </div>

                  </div>
                </li>
              <?php }} ?>


              </ul>
            </div>
          </div>
          <div class="col-lg-3">
             <h2>REVIEWS</h2>
            <div class="testimonials" style="padding-top: 0px">
              <div class="ts-testimonial-widget">
                <div class="slider-items-products">
                  <div id="testimonials-slider" class="product-flexslider hidden-buttons home-testimonials">
                    <div class="slider-items slider-width-col4 fadeInUp owl-carousel owl-theme"
                      style="opacity: 1; display: block;">
                      <?php $banner = $this->db->select('*')->from('ykien')->where(array('publish' => 1, ))->get()->result_array(); ?>
                      <?php if(isset($banner) && count($banner)) { foreach($banner as $key => $value) {  ?>

                      <div class="owl-item">
                        <div class="holder">
                          <p style="min-height: 182px"><?php echo $value['notes']; ?></p>
                          <div class="testimonial-arrow-down"></div>
                          <div class="thumb">
                            <div class="customer-img"> <img src="<?php echo $value['image']; ?>" alt="<?php echo $value['fullname']; ?>"> </div>
                            <div class="customer-bio"> <strong class="name"><?php echo $value['fullname']; ?></strong> <span>
                              <?php echo $value['address']; ?>
                            </span> </div>
                          </div>
                        </div>
                      </div>

                    <?php }} ?>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>



    <div class="container">
      <div class="bestsell-pro">
        <div>
          <div class="slider-items-products">
            <div class="bestsell-block">
              <div class="block-title">
                <h2>ĐANG GIẢM GIÁ</h2>
              </div>
              <div id="bestsell-slider" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col4 products-grid block-content">
                

                  <?php $giamgia = $this->db->select('*')->from('sanpham_item')->where(array('publish' => 1))->order_by('created desc')->get()->result_array(); ?>
                  <?php if(isset($giamgia) && count($giamgia)) { foreach ($giamgia as $number => $val) {  if($val['price_market'] !=0 ){ ?>
                  <div class="item">
                    <div class="item-inner">
                      <div class="item-img">
                        <div class="item-img-info"> <a class="product-image" title="<?php echo $val['title']; ?>"
                            href="<?php echo helper_string_alias($val['title']).'-ap'.$val['id'].CMS_SUFFIX; ?>"> <img alt="<?php echo $val['title']; ?>" src="<?php echo helper_string_image(247, 247, $val['image']); ?>"> </a>
                          <div class="new-label new-top-left">
                            <?php 

                            $ptg=(($val['price_market']-$val['price'])/($val['price_market']));  ?>
                             <?php $pt= $ptg*100;  ?>
                            <?php  echo (int)$pt;
                             ?>%

                          </div>
                          <div class="box-hover">
                            <ul class="add-to-links">
                              <li><a class="link-quickview" href="<?php echo helper_string_alias($val['title']).'-ap'.$val['id'].CMS_SUFFIX; ?>"></a> </li>
                             
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title" style="height: 60px;overflow: hidden;text-overflow: ellipsis;-webkit-line-clamp: 2;display: -webkit-box;-webkit-box-orient: vertical;"> <a title="<?php echo $val['title']; ?>" href="<?php echo helper_string_alias($val['title']).'-ap'.$val['id'].CMS_SUFFIX; ?>"><?php echo $val['title']; ?></a> </div>
                          <?php $dm_tintuc = $this->db->select('*')->from('sanpham_category')->where(array('publish' => 1, 'id' => $val['parentid']))->order_by('created desc')->get()->result_array(); ?>
                                <?php if(isset($dm_tintuc) && count($dm_tintuc)) { foreach ($dm_tintuc as $number => $vals) {  ?>
                                <div class="brand" ><?php echo $vals['title']; ?></div>
                               <?php }} ?>
                          
                          <div class="item-content">
                            <div class="item-price">
                              <div class="price-box"> 
                                <span class="regular-price"> <span class="price"><?php echo helper_string_money($val['price']); ?></span>
                                </span> 

                                <span class="old-price"><span class="price">
                                       
                                          <?php echo helper_string_money($val['price_market']); ?>
                                    
                                          </span>
                                        </span> 
                                       
                              </div>
                            </div>
                            <div class="action">
                              <a href="<?php echo CMS_URL; ?>frontend/sanpham/addtocart/<?php echo $val['id'].CMS_SUFFIX; ?>?redirect=<?=base64_encode(CMS_URL.'gio-hang.html')?>"> <button class="button btn-cart" type="button" title=""
                                      data-original-title="Add to Cart"><i class="fa fa-shopping-basket"></i></button></a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                 <?php }}} ?>


                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <!-- Latest Blog -->


    <section class="home-articles spacer-medium">
      <div class="block-title container">
            <h2>THÔNG TIN Y TẾ </h2>
          </div>
      <div class="container css-grid--columns-2">
        <div class="column-left">

            <?php $banner = $this->db->select('*')->from('articles_item')->where(array('publish' => 1, 'highlight'=> 1))->order_by('order asc')->get()->result_array(); ?>
            <?php if(isset($banner) && count($banner)) { foreach($banner as $key => $value) { if($key<2) {?>
          <div class="article-home " style="margin-bottom: 15px">
            <div class="article-home__image parallax-parent">
              <img src="<?php  echo helper_string_image(278,278, $value['image']); ?>" class="parallax-child--second" alt="article image">
            </div>
            <div class="article-home__content">
              <div class="inside">
                <p class="date"><i class="fa fa-calendar" aria-hidden="true" style="color: #e72c59;font-size: 16px;margin-right: 5px;vertical-align: middle;"></i><?php echo gmdate('d-m-Y', strtotime($value['created'])); ?></p>
                <h4 class="title"><?php  echo $value['title']; ?></h4>
                <a href="<?php echo helper_string_alias($value['title']).'-a'.$value['id'].CMS_SUFFIX; ?>" class="link">Xem Thêm <i class="fa fa-chevron-circle-right"></i></a>
              </div>
            </div>
          </div>
        <?php }}} ?>

        </div>

        <div class="column-right">



          <?php if(isset($banner) && count($banner)) { foreach($banner as $key => $value) { if($key>1 && $key<3) {?>

          <div class="article-home">
            <div class="article-home__image parallax-parent">
             <a href="<?php echo helper_string_alias($value['title']).'-a'.$value['id'].CMS_SUFFIX; ?>" class="link"> <img src="<?php  echo helper_string_image(555,555, $value['image']); ?>" class="parallax-child--second" alt="article image"></a>
            </div>
            <div class="article-home__content">
              <div class="inside">
                <p class="date"><i class="fa fa-calendar" aria-hidden="true" style="color: #e72c59;font-size: 16px;margin-right: 5px;vertical-align: middle;"></i><?php echo gmdate('d-m-Y', strtotime($value['created'])); ?></p>
                <a href="<?php echo helper_string_alias($value['title']).'-a'.$value['id'].CMS_SUFFIX; ?>" class="link">
                <h4 class="title"><?php  echo $value['title']; ?></h4></a>
                <a href="<?php echo helper_string_alias($value['title']).'-a'.$value['id'].CMS_SUFFIX; ?>" class="link">Xem Thêm <i class="fa fa-chevron-circle-right"></i></a>
              </div>
            </div>
          </div>

        <?php }}} ?>

        </div>

      </div>

    </section>
<style>
  .block-title.container {
    text-align: center;
    padding-bottom: 29px;
}

.block-title.container h2 {
    font-size: 35px;
    font-weight: bold;
}
</style>
    <!-- End Latest Blog -->

