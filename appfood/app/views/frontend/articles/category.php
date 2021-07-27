<!-- Main Container -->
    <section class="main-container col2-left-layout">
      <div class="container">
        <div class="row">
          <div class="col-sm-9 col-sm-push-3">
            <div class="breadcrumbs">
              <ul>
                <li class="home"> <a href="\" title="Go to Home Page">TRANG CHỦ</a> <span>/</span> </li>
               
                <li class="category1601"> <strong><?php echo $category['title']; ?>  </strong> </li>
              </ul>
            </div>
            <!-- Breadcrumbs End -->
            <div>
              <h2 class="page-heading"> <span class="page-heading-title"><?php echo $category['title']; ?>  </span> </h2>
            </div>


            <article class="col-main">

              <div class="blog-wrapper" id="main">
                <div class="site-content" id="primary">
                  <div role="main" id="content">
                     <?php if(isset($list) && count($list)) { foreach($list as $key => $items) { ?>
                    <article class="blog_entry clearfix wow bounceInUp animated" id="post-29">
                      <div class="entry-content">
                        <div class="featured-thumb"><a href="<?php echo helper_string_alias($items['title']).'-a'.$items['id'].CMS_SUFFIX; ?>">
                            <img alt="blog-img3" style="display: block; margin: 0 auto;"
                              src="<?php echo $items['image']; ?>"></a></div>
                        <header class="blog_entry-header clearfix">
                          <div class="blog_entry-header-inner">
                            <h2 class="blog_entry-title"> <a rel="bookmark" href="<?php echo helper_string_alias($items['title']).'-a'.$items['id'].CMS_SUFFIX; ?>">
                                <?php echo $items['title']; ?>
                            </a> </h2>
                          </div>
                          <!--blog_entry-header-inner-->
                        </header>
                        <div>
                          <ul class="post-meta">
                            <li><i class="fa fa-user"></i>Đăng bởi Admin. </li>
                           
                            <li><i class="fa fa-clock-o"></i><span class="day"><?php echo gmdate("m-d-Y", strtotime($items['created'])); ?></span>
                            </li>


                            <li><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $category['title']; ?></li>
                          </ul>
                          <p><?php echo $items['description']; ?> </p>
                        </div>
                        <p> <a class="btn" href="<?php echo helper_string_alias($items['title']).'-a'.$items['id'].CMS_SUFFIX; ?>">Xem Thêm</a> </p>
                      </div>

                    </article>
                    <?php }} ?>


                                        
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