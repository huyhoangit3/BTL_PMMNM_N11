<!-- Main Container -->
    <section class="main-container col2-left-layout">
      <div class="container">
        <div class="row">
          <div class="col-sm-9 col-sm-push-3">


            <article class="col-main">
              <div class="blog-wrapper" id="main">
                <div class="site-content" id="primary">
                  <div role="main" id="content">
                    <article class="blog_entry clearfix" id="post-29">

                      <!--blog_entry-header clearfix-->
                      <div class="entry-content">
                        <div class="featured-thumb"><img alt="<?php echo $item['title']; ?>" style="display: block; margin: 0 auto;"  src="<?php echo $item['image']; ?>">
                        </div>
                        <header class="blog_entry-header clearfix">
                          <div class="blog_entry-header-inner">
                            <h2 class="blog_entry-title"><?php echo $item['title']; ?></h2>
                          </div>
                          <!--blog_entry-header-inner-->
                        </header>
                        <div>
                          <ul class="post-meta">
                             <li><i class="fa fa-user"></i>Đăng bởi Admin. </li>
                           
                            <li><i class="fa fa-clock-o"></i><span class="day"><?php echo gmdate("m-d-Y", strtotime($item['created'])); ?></span>
                            </li>


                            <li><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $category['title']; ?></li>
                            </li>
                          </ul>
                          <?php if ($item['description']=''){ ?>
                          <blockquote><?php echo $item['description']; ?></blockquote>
                        <?php } ?>
                          <div class="dieuchinhpadding"><?php echo $item['content']; ?></div>
                        </div>
                        <style type="text/css">
                           .dieuchinhpadding  {
                                    padding: 0px 30px;
                                }
                        </style>
                      </div>
                    </article>
                    <div class="post_navigation row">
                        <!-- Upsell Product Slider -->
                        <div class="upsell-pro">
                          <div class="slider-items-products">
                            <div class="upsell-block">
                              <div class="home-block-inner">
                                <div class="block-title">
                                  <h2>SẢN PHẨM NỐI BẬT</h2>
                                </div>
                              </div>
                              <div id="upsell-products-slider" class="product-flexslider hidden-buttons">
                                <div class="slider-items slider-width-col4 products-grid block-content">
                                     <?php $giamgia = $this->db->select('*')->from('sanpham_item')->where(array('publish' => 1, 'highlight'=>1))->order_by('created desc')->get()->result_array(); ?>
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
                                              <div class="item-title" style="overflow: hidden;text-overflow: ellipsis;-webkit-line-clamp: 2;display: -webkit-box;-webkit-box-orient: vertical;"> <a title="<?php echo $val['title']; ?>" href="<?php echo helper_string_alias($val['title']).'-ap'.$val['id'].CMS_SUFFIX; ?>"><?php echo $val['title']; ?></a> </div>
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
                        <!-- End Upsell  Slider -->
                    </div>
                    
                  </div>
                </div>
              </div>
            </article>
            <!--    ///*///======    End article  ========= //*/// -->
          </div>
          <aside class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9">
            <div class="blog-banner"><img alt="blog image" src="template/frontend/images/banner-blog.png"></div>

            <div role="complementary" class="widget_wrapper13" id="secondary">
              <div class="popular-posts widget widget__sidebar wow bounceInUp animated" id="recent-posts-4">
                <h3 class="widget-title"><span>TIN TỨC NỔI BẬT</span></h3>
                <div class="widget-content">
                  <ul class="posts-list unstyled clearfix">
                    <?php $thuvienanh = $this->db->select('*')->from('articles_item')->where(array('publish' => 1, 'parentid' => 11))-> limit(4)->order_by('created desc')->get()->result_array(); ?>
                            <?php if(isset($thuvienanh) && count($thuvienanh)) { foreach ($thuvienanh as $number => $val) { ?>

                    <li>
                      <figure class="featured-thumb"> <a href="<?php echo helper_string_alias($val['title']).'-a'.$val['id'].CMS_SUFFIX; ?>"> <img width="70" height="70"
                            alt="<?php echo $val['title']; ?>" src="<?php echo helper_string_image(70, 70, $val['image']); ?>"> </a> </figure>
                      <!--featured-thumb-->
                      <h4><a title="<?php echo $val['title']; ?>" href="<?php echo helper_string_alias($val['title']).'-a'.$val['id'].CMS_SUFFIX; ?>" style="overflow: hidden;text-overflow: ellipsis;-webkit-line-clamp: 2;display: -webkit-box;-webkit-box-orient: vertical;"><?php echo $val['title']; ?></a></h4>
                      <div>
                          <ul class="post-meta">
                            
                           
                            <li><i class="fa fa-clock-o"></i><span class="day"><?php echo gmdate("m-d-Y", strtotime($val['created'])); ?></span>
                            </li>


                            
                          </ul>
                        
                        </div>
                    </li>
                   <?php }} ?>
                  </ul>
                </div>
                <!--widget-content-->
              </div>

              <div class="latest-blogs">
                <h6>NGĂN CHẶN VIRUS CORONA</h6>
                <h3>Làm thế nào để có thể bảo vệ mình khỏi CORONA?</h3>
                <p>Công ty Cổ phần Dược phẩm Pharmacity cung cấp sản phẩm điều trị bệnh, chăm sóc sức khỏe uy tín qua nhà thuốc online và hệ thống hiệu thuốc Pharmacity toàn quốc.Liên hệ chúng tôi ngay để được tư vấn. </p>
                <a href="lien-he.html">Liên Hệ Ngay</a>
              </div>


              <div class="popular-posts widget widget_categories wow bounceInUp animated" id="categories-2">
                <h3 class="widget-title"><span>DANH MỤC SẢN PHẨM</span></h3>
                <ul>


                    <?php $thuvienanh = $this->db->select('*')->from('sanpham_category')->where(array('publish' => 1, 'parentid' => 2))->order_by('created asc')->get()->result_array(); ?>
                            <?php if(isset($thuvienanh) && count($thuvienanh)) { foreach ($thuvienanh as $number => $val) { ?> 
                  <li><i class="fa fa-long-arrow-right" aria-hidden="true"></i> <a href="<?php echo helper_string_alias($val['title']).'-cp'.$val['id'].CMS_SUFFIX; ?>"><?php echo $val['title']; ?></a></li>
                  <?php }} ?>
                </ul>
              </div>
              <!-- Banner Ad Block -->
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
              

            </div>
          </aside>
        </div>
      </div>
    </section>
    <!-- Main Container End -->