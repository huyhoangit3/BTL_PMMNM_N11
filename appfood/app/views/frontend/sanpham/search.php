 <!-- Main Container -->
    <section class="main-container col2-left-layout">
      <div class="container">
        <div class="row">
          <div class="col-sm-9 col-sm-push-3">
            <!-- Breadcrumbs -->
            <div class="breadcrumbs">
              <ul>
                <li class="home"> <a href="\" title="Go to Home Page">TRANG CHỦ</a> <span>/</span> </li>
               
                <li class="category1601"> <strong>Tìm Kiếm</strong> </li>
              </ul>
            </div>
            <!-- Breadcrumbs End -->
            <div>
              <h2 class="page-heading" style="text-transform:initial;"> <span class="page-heading-title">Kết quả của tìm kiếm: <?php echo $keyword; ?></span> </h2>
            </div>
            <div class="category-description std">
              <div class="slider-items-products">
                <div id="category-desc-slider" class="product-flexslider hidden-buttons">
                  <div class="slider-items slider-width-col1 owl-carousel owl-theme">

                     <?php $banner = $this->db->select('*')->from('grouplink_item')->where(array('publish' => 1, 'parentid'=> 14))->order_by('order asc')->get()->result_array(); ?>
                    <?php if(isset($banner) && count($banner)) { foreach($banner as $key => $value) {  ?>
                      <!-- Item -->
                    <div class="item"> <a ><img src="<?php echo $value['image']; ?>" alt="<?php echo $value['title']; ?>"></a>
                      <div class="cat-img-title cat-bg cat-box">
                        
                        <h2 class="cat-heading"><?php echo $value['title']; ?></h2>
                        <p><?php echo $value['notes']; ?> </p>
                      </div>
                    </div>
                    <!-- End Item -->
                  <?php }} ?>
                 
                  </div>
                </div>
              </div>
            </div>
            <article class="col-main">
              <div class="toolbar">
                <div class="display-product-option">
                  
                  <div class="pages">
                    <label style="color: #333e48; font-size: 18px;font-weight: 600;line-height: normal;margin: 0;padding: 10px 0px 0px 0px;position: relative;font-family: 'IBM Plex Sans', sans-serif;text-transform: uppercase;letter-spacing: 0.5px">HIỂN THỊ : <?php echo count($list); ?> SẢN PHẨM Ở TRANG NÀY</label>

                  </div>

                  <div class="product-option-right">

                    
                    
                  </div>
                </div>
              </div>
              <div class="category-products">
                <ul class="products-grid">


                  <?php if(isset($list)&&count($list)){ foreach ($list as $key => $value) {?>

                  <li class="item col-lg-4 col-md-4 col-sm-4 col-xs-6">
                    <div class="item-inner">
                      <div class="item-img">
                        <div class="item-img-info"> <a class="product-image" title="Retis lapen casen"
                            href="<?php echo helper_string_alias($value['title']).'-ap'.$value['id'].CMS_SUFFIX; ?>"> <img alt="Retis lapen casen" src="<?php echo helper_string_image(248,248,$value['image']); ?>">
                          </a>
                         <?php  if($value['price_market'] >0){?>

                          <?php 

                            $ptg=(($value['price_market']-$value['price'])/($value['price_market']));  ?>
                          <?php    if($ptg>0){ ?>
                          <div class="sale-label sale-top-right">
                             
                             <?php $pt= $ptg*100;  ?>
                             -
                            <?php  echo (int)$pt;
                             ?>%

                          </div>
                        <?php } else ''; ?>
                        <?php } else ''; ?>
                          <div class="box-hover">
                            <ul class="add-to-links">
                              <li><a class="link-quickview" href="<?php echo helper_string_alias($value['title']).'-ap'.$value['id'].CMS_SUFFIX; ?>"></a> </li>
                              
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <a title="<?php echo $value['title']; ?>" href="<?php echo helper_string_alias($value['title']).'-ap'.$value['id'].CMS_SUFFIX; ?>" style="overflow: hidden;text-overflow: ellipsis;-webkit-line-clamp: 2;display: -webkit-box;-webkit-box-orient: vertical;">
                            <?php echo $value['title']; ?></a> </div>

                                <?php $dm = $this->db->select('*')->from('sanpham_category')->where(array('publish' => 1, 'id'=> $value['parentid']))->order_by('order asc')->get()->result_array(); ?>
                        <?php if(isset($dm) && count($dm)) { foreach($dm as $key => $val) {  ?>
                          <div class="brand"><?php echo $val['title']; ?></div>
                            <?php   }} ?>
                          
                          <div class="item-content">
                            <div class="item-price">
                              <div class="price-box"> 

                                <span class="regular-price"> <span class="price"><?php echo helper_string_money($value['price']); ?></span>
                                </span> 

                                <span class="old-price"><span class="price"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                  <?php if($value['price_market']> 0 ){ ?>
                                  <?php echo helper_string_money($value['price_market']); ?>
                                    <?php } else ''; ?>
                                  </font></font></span></span>

                              </div>
                            </div>
                             <div class="action">
                                          <a href="<?php echo CMS_URL; ?>frontend/sanpham/addtocart/<?php echo $value['id'].CMS_SUFFIX; ?>?redirect=<?=base64_encode(CMS_URL.'gio-hang.html')?>"> <button class="button btn-cart" type="button" title=""
                                                  data-original-title="Add to Cart"><i class="fa fa-shopping-basket"></i></button></a>
                                        </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
           
                  <?php }} ?>
                



                </ul>
              </div>
              <div class="toolbar">
                <div class="display-product-option">
                  
                  <div class="pages" style="
    margin: 0 auto;
    text-align: center;
    display: block;>">

                    <?php if(isset($pagination) && !empty($pagination) && count($pagination)){ ?>
                    <ul class="pagination">
                      

                      <?php echo helper_string_pagination_frontend($pagination, $total_rows, 'Trang'); ?>
                     
                    </ul>
                  <?php } ?>
                  </div>

                 
                </div>
              </div>

              <br>
              <div class="featured-pro-block">
                <div class="slider-items-products">
                  <div class="new-arrivals-block inner-page">
                    <div class="block-title">
                      <h2>DANH MỤC HÀNG ĐẦU</h2>
                    </div>
                    <div id="new-arrivals-slider" class="product-flexslider hidden-buttons">
                      <div class="home-block-inner"> </div>
                      <div class="slider-items slider-width-col4 products-grid block-content">

                         <?php $top_category = $this->db->select('*')->from('sanpham_category')->where(array('publish' => 1, 'parentid'=> 2))->order_by('order asc')->get()->result_array(); ?>
                        <?php if(isset($top_category) && count($top_category)) { foreach($top_category as $key => $value) {  ?>
                        <div class="item">
                          <div class="cat-img"><img alt=" <?php echo $value['title']; ?>" src="<?php echo $value['image']; ?>"></div>
                          <div class="categories-list">
                            <strong> <?php echo $value['title']; ?></strong>
                            <ul>

                              <?php $top_category_con = $this->db->select('*')->from('sanpham_category')->where(array('publish' => 1, 'parentid'=> $value['id']))->order_by('order asc')->get()->result_array(); ?>
                              <?php if(isset($top_category_con) && count($top_category_con)) { foreach($top_category_con as $key => $values) {  ?>
                              <li><a href="#"><?php echo $values['title']; ?></a></li>
                             <?php }} ?> 

                            </ul>
                          </div>
                        </div>
                     <?php }} ?>  


                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </article>
            <!--    ///*///======    End article  ========= //*/// -->
          </div>
          <aside class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9">
              <?php $banner = $this->db->select('*')->from('grouplink_item')->where(array('publish' => 1, 'parentid'=> 15))-> limit(1)->order_by('order asc')->get()->result_array(); ?>
                    <?php if(isset($banner) && count($banner)) { foreach($banner as $key => $value) {  ?>
            <div class="side-banner"><img src="<?php echo $value['image']; ?>" alt="banner"></div>
          <?php }} ?>
            <div class="popular-posts widget widget_categories wow bounceInUp animated" id="categories-2">
                <h3 class="widget-title"><span>DANH MỤC SẢN PHẨM</span></h3>
                <ul>


                    <?php $thuvienanh = $this->db->select('*')->from('sanpham_category')->where(array('publish' => 1, 'parentid' => 2))->order_by('created asc')->get()->result_array(); ?>
                            <?php if(isset($thuvienanh) && count($thuvienanh)) { foreach ($thuvienanh as $number => $val) { ?> 
                  <li><i class="fa fa-long-arrow-right" aria-hidden="true"></i> <a href="<?php echo helper_string_alias($val['title']).'-cp'.$val['id'].CMS_SUFFIX; ?>"><?php echo $val['title']; ?></a></li>
                  <?php }} ?>
                </ul>
              </div>
            <div class="block block-cart">
              <div class="block-title ">SẢN PHẨM NỔI BẬT </div>
              <div class="block-content">
                
                <ul>
                   <?php $banner = $this->db->select('*')->from('sanpham_item')->where(array('publish' => 1, 'highlight'=> 1))-> limit(6)->order_by('order asc')->get()->result_array(); ?>
                    <?php if(isset($banner) && count($banner)) { foreach($banner as $key => $value) {  ?>

                  <li class="item"> 
                    <a href="<?php echo helper_string_alias($value['title']).'-ap'.$value['id'].CMS_SUFFIX; ?>" title="<?php echo $value['title']; ?>"
                      class="product-image"><img src="<?php echo $value['image']; ?>"
                        alt="<?php echo $value['title']; ?>">
                      </a>

                    <div class="product-details">
                      <div class="access"> 
                      </div>
                     
                      <p class="product-name"> 
                        <a href="<?php echo helper_string_alias($value['title']).'-ap'.$value['id'].CMS_SUFFIX; ?>" style="overflow: hidden;text-overflow: ellipsis;-webkit-line-clamp: 2;display: -webkit-box;-webkit-box-orient: vertical;"><?php echo $value['title']; ?></a> </p>
                       <span class="price"><?php echo helper_string_money($value['price']); ?></span>
                    </div>
                  </li>

                  <?php }} ?>
                </ul>
              </div>
            </div>

             <div class="ad-spots widget widget__sidebar bounceInUp animated">
               
                <div class="widget-content">
                  <div class="featured-add-box">

                    <?php $banner = $this->db->select('*')->from('grouplink_item')->where(array('publish' => 1, 'id'=> 43))-> limit(1)->order_by('order asc')->get()->result_array(); ?>
                    <?php if(isset($banner) && count($banner)) { foreach($banner as $key => $value) {  ?>
                    <div class="featured-add-inner">  <img src="<?php echo $value['image']; ?>"
                          alt="f-img">
                     
                     <div class="banner-content">
                        
                        <div class="banner-text1">Hot <span>Sale</span> </div>
                        <p>Xem Ngay Những Sản Phẩm DEAL SỐC</p>
                        <a href="#" class="view-bnt banner-text">XEM NGAY<i class="fa fa-chevron-circle-right"></i></a>
                      </div>
                    </div>
                <?php }} ?>
                  </div>
                </div>
              </div>
                                          
          </aside>
        </div>
      </div>
    </section>
    <!-- Main Container End -->