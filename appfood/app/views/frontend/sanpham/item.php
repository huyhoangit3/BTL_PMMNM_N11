
    <!-- Main Container -->
    <section class="main-container col1-layout">
      <div class="container">
        <div class="row">

          <!-- Breadcrumbs -->
          <div class="breadcrumbs">
            <ul>
              <li class="home"> <a href="\" title="Go to Home Page">TRANG CHỦ</a> <span>/</span> </li>
              <li class="category1599"> <a href="<?php echo helper_string_alias($category['title']).'-cp'.$category['id'].CMS_SUFFIX; ?>" title="<?php echo $category['title']; ?>"><?php echo $category['title']; ?></a> <span>/ </span> </li>
             
              <li class="category1601"> <strong><?php echo $item['title']; ?></strong> </li>
            </ul>
          </div>
          <!-- Breadcrumbs End -->

          <div class="col-sm-12 col-xs-12">



            <article class="col-main">
              <div class="product-view">
                <div class="product-essential">
                  <form action="#" method="post" id="product_addtocart_form">
                    <input name="form_key" value="6UbXroakyQlbfQzK" type="hidden">
                    <div class="product-img-box col-lg-5 col-sm-5 col-xs-12">
                        <?php if($item['price_market'] !=0 ){  ?>
                      <div class="new-label new-top-left"> 
                        
                            <?php 

                                $ptg=(($item['price_market']-$item['price'])/($item['price_market']));  ?>
                                 <?php $pt= $ptg*100;  ?>
                                <?php  echo (int)$pt;
                                 ?>%
                            
                        </div> <?php }else '';  ?>
                      <div class="product-image">
                        <div class="product-full"> 
                            <img id="product-zoom" src="<?php echo helper_string_image(470,470, $item['image']); ?>"
                            data-zoom-image="<?php echo helper_string_image(470,470, $item['image']); ?>" alt="product-image" /> 
                        </div>

                        <div class="more-views">
                          <div class="slider-items-products">
                            <div id="gallery_01" class="product-flexslider hidden-buttons product-img-thumb">
                              <div class="slider-items slider-width-col4 block-content">

                                <div class="more-views-items"> 
                                    <a href="#" data-image="<?php echo helper_string_image(470,470, $item['image']); ?>"
                                    data-zoom-image="<?php echo helper_string_image(470,470, $item['image']); ?>"> 
                                    <img id="product-zoom0"
                                      src="<?php echo helper_string_image(470,470, $item['image']); ?>" alt="product-image" /> 
                                    </a>
                                </div>
                                <?php $gallery = json_decode($item['gallery']) ; ?>
                                 <?php if(isset($gallery)&&count($gallery)>1){ foreach ($gallery as $key => $gal) {?>
                                <div class="more-views-items"> 
                                    <a href="#" data-image="<?php echo $gal; ?>"
                                    data-zoom-image="<?php echo $gal; ?>"> 
                                        <img id="product-zoom<?php echo $key+1; ?>" src="<?php echo $gal; ?>" alt="product-image" /> 
                                    </a>
                                </div>
                            <?php }} ?>
                               
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- end: more-images -->
                    </div>
                    <div class="product-shop col-lg- col-sm-7 col-xs-12">
                      <div class="brand"><?php echo $category['title']; ?></div>
                      <div class="product-name">
                        <h1><?php echo $item['title']; ?></h1>
                      </div>
                      <div class="ratings"style="padding: 0px 0px 5px 0px;">
                        
                        <style>
                            p.rating-links {
                                    padding-top: 20px;
                                    font-size: 16px;
                                    line-height: 28px;
                                }
                        </style>    
                      </div>
                      <p class="rating-links"> 
                            <?php echo $item['description']; ?>
                         </p>
                      <div class="price-block">
                        <div class="price-box">
                          
                          <p class="special-price"> <span class="price-label">Special Price</span> <span
                              id="product-price-48" class="price"> <?php echo helper_string_money($item['price']); ?> </span> </p>
                          <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price">
                            <?php if($item['price_market'] !=0){ ?>
                              <?php echo helper_string_money($item['price_market']); ?> 
                          <?php }else ''; ?>
                          </span> </p>

                        </div>
                      </div>
                      <div class="add-to-box">
                        <div class="add-to-cart">
                          <div class="pull-left">
                            <div class="custom pull-left">
                              <button
                                onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;"
                                class="reduced items-count" type="button"><i class="fa fa-minus">&nbsp;</i></button>
                              <input type="text" class="input-text qty" title="Qty" value="1" maxlength="12" id="qty"
                                name="qty">
                              <button
                                onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;"
                                class="increase items-count" type="button"><i class="fa fa-plus">&nbsp;</i></button>
                            </div>
                          </div>
                          <a href="<?php echo CMS_URL; ?>frontend/sanpham/addtocart/<?php echo $item['id'].CMS_SUFFIX; ?>?redirect=<?=base64_encode(CMS_URL.'gio-hang.html')?>"><button onClick="productAddToCartForm.submit(this)" class="button btn-cart"
                            title="Add to Cart" type="button">Thêm Vào Giỏ Hàng</button></a>
                        </div>

                      </div>

                      <ul class="shipping-pro">
                        <li>Miễn phí Vận chuyển toàn quốc.</li>
                        <li>Trả hàng trong 30 ngày. </li>
                        <li>Giảm giá cho khách hàng quay lại mua hàng.</li>
                      </ul>
                    </div>
                  </form>
                </div>
                <div class="product-collateral">
                  <div class="add_info">
                    <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                      <li class="active"> <a href="#product_tabs_description" data-toggle="tab"> CHI TIẾT SẢN PHẨM.
                        </a> </li>
                     <!--  <li><a href="#product_tabs_tags" data-toggle="tab">Tags</a></li> -->
                      <!-- <li> <a href="#reviews_tabs" data-toggle="tab">Reviews</a> </li>
                      <li> <a href="#product_tabs_custom" data-toggle="tab">Custom Tab</a> </li>
                      <li> <a href="#product_tabs_custom1" data-toggle="tab">Custom Tab1</a> </li> -->
                    </ul>
                    <div id="productTabContent" class="tab-content">


                      <div class="tab-pane fade in active" id="product_tabs_description">
                        <div class="std">
                          <?php echo $item['content']; ?>
                        </div>
                      </div>

                      

                    </div>
                  </div>
                </div>

                <!-- Related Slider -->
                <div class="related-pro">
                  <div class="slider-items-products">
                    <div class="related-block">
                      <div class="home-block-inner">
                        <div class="block-title">
                          <h2>SẢN PHẨM CÙNG DANH MỤC</h2>
                        </div>
                      </div>
                      <div id="related-products-slider" class="product-flexslider hidden-buttons">
                        <div class="slider-items slider-width-col4 products-grid block-content">
                         

                         <?php $cungdm = $this->db->select('*')->from('sanpham_item')->where(array('publish' => 1, 'parentid'=>$category['id']))->order_by('created desc')->get()->result_array(); ?>
                        <?php if(isset($cungdm) && count($cungdm)) { foreach ($cungdm as $number => $val) {  if($val['price_market'] !=0 ){ ?>
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




                <!-- End related products Slider -->

                <!-- Upsell Product Slider -->
                <div class="upsell-pro">
                  <div class="slider-items-products">
                    <div class="upsell-block">
                      <div class="home-block-inner">
                        <div class="block-title">
                          <h2>SẢN PHẨM NỔI BẬT</h2>
                        </div>
                      </div>
                      <div id="upsell-products-slider" class="product-flexslider hidden-buttons">
                        <div class="slider-items slider-width-col4 products-grid block-content">


                          <?php $giamgia = $this->db->select('*')->from('sanpham_item')->where(array('publish' => 1, 'highlight' => 1))->order_by('created desc')->get()->result_array(); ?>
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
            </article>
            <!--    ///*///======    End article  ========= //*/// -->
          </div>





        </div>
      </div>
    </section>
    <!-- Main Container End -->