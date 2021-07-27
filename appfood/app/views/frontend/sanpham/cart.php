<link rel='stylesheet' id='flatsome-icons-css' href='template/frontend/css_cart/fl-icons6de8.css?ver=3.3' type='text/css' media='all' />
<link rel='stylesheet' id='flatsome-main-css' href='template/frontend/css_cart/flatsome822f.css?ver=3.6.2' type='text/css' media='all' />
<link rel='stylesheet' id='flatsome-shop-css' href='template/frontend/css_cart/flatsome-shop822f.css?ver=3.6.2' type='text/css' media='all' />
<link rel='stylesheet' id='flatsome-style-css' href='template/frontend/css_cart/style822f.css?ver=3.6.2' type='text/css' media='all' />
    <!-- Main Container -->
    <section class="main-container col1-layout">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-xs-12">
            <article class="col-main">
              <div class="cart">
                <div class="page-title">
                  <h2>Giỏ Hàng</h2>
                </div>
                 <div class="cart-container container page-wrapper page-checkout table-responsive">
                  <div class="woocommerce">
                      <div class="woocommerce-notices-wrapper"></div>
                      <div class="woocommerce row row-large row-divided">
                          <div class="col large-7 pb-0 ">


                              <form class="woocommerce-cart-form" action=""
                                  method="post">
                                  <div class="cart-wrapper sm-touch-scroll">


                                      <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents"
                                          cellspacing="0">
                                          <thead>
                                              <tr>
                                                  <th class="product-name" colspan="3">Sản phẩm</th>
                                                  <th class="product-price">Giá</th>
                                                  <th class="product-quantity" style="text-align: center;">SL</th>
                                                  <th class="product-subtotal">Tổng</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                          <?php
                                              $total = 0;
                                              if(isset($full_data) && count($full_data)){
                                              foreach($full_data as $key => $val){
                                                  $total_temp = 0;
                                                  $total_temp = $val['price'] * $val['number'];
                                                  $total = $total + $total_temp;
                                                  $product_cart = $this->db->from('sanpham_item')->where(array('id'=>$val['id']))->get()->row_array();  
                                          ?>
                                              <tr class="woocommerce-cart-form__cart-item cart_item">

                                                  <td class="product-remove">
                                                      <a href="<?php echo CMS_URL.'frontend/sanpham/removetocart/'.$val['id'].CMS_SUFFIX.'?redirect='.base64_encode('https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); ?>"
                                                          class="remove" aria-label="Xóa sản phẩm này"
                                                          data-product_id="1519"
                                                          data-product_sku="AC-1135VN-7-16">&times;</a> </td>

                                                  <td class="product-thumbnail">
                                                      <a href="<?php echo helper_string_alias($val['title']).'-ap'.$val['id'].CMS_SUFFIX; ?>">
                                                          <img
                                                              width="600" height="600"
                                                              src="<?php echo helper_string_image(300,300,$product_cart['image']); ?>"
                                                              class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                              alt=""
                                                              sizes="(max-width: 600px) 100vw, 600px" /></a> </td>

                                                  <td class="product-name" data-title="Sản phẩm">
                                                      <a
                                                          href="<?php echo helper_string_alias($val['title']).'-ap'.$val['id'].CMS_SUFFIX; ?>"><?php echo $product_cart['title']; ?></a>
                                                      <p class="show-for-small mobile-product-price">
                                                          <span class="mobile-product-price__qty <?php echo 'item2-'.$val['id']; ?>"><?php echo $val['number']." x"; ?> </span>
                                                          <span class="woocommerce-Price-amount amount"><?php echo helper_string_money($product_cart['price']); ?><span
                                                                  class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                      </p>
                                                  </td>

                                                  <td class="product-price" data-title="Giá">
                                                      <span class="woocommerce-Price-amount amount"><?php echo helper_string_money($product_cart['price']); ?></span>
                                                  </td>

                                                  <td class="product-quantity" data-title="Số lượng">
                                                      <div class="quantity buttons_added">
                                                          <input type="button" value="-" class="minus button is-form" onclick="DownPrice(<?php echo $val['id']; ?>,<?php echo $product_cart['price']; ?>)">
                                                              <label class="screen-reader-text"
                                                                  for="quantity_5faa3c545a4b5">Số lượng</label>
                                                              <input type="number" id="quantity_5faa3c545a4b5"
                                                                  class="input-text qty text <?php echo 'item1-'.$val['id']; ?>" step="1" min="0" max="9999"
                                                                  name="number[<?php echo $val['id']; ?>]" value="<?php echo $val['number']; ?>"
                                                                  title="SL" size="4" pattern="[0-9]*" inputmode="numeric"
                                                                  aria-labelledby="Bình nóng lạnh Ariston 30L ANDRIS LUX 30 số lượng" />
                                                          <input type="button" value="+" class="plus button is-form" onclick="UpPrice(<?php echo $val['id']; ?>,<?php echo $product_cart['price']; ?>)">
                                                      </div>
                                                  </td>

                                                  <td class="product-subtotal" data-title="Tổng">
                                                      <span class="woocommerce-Price-amount amount <?php echo 'item-'.$val['id']; ?>"><?php echo helper_string_money($total_temp); ?></span>
                                                  </td>
                                              </tr>
                                          <?php }} ?>

                                              <tr>
                                                  <td colspan="6" class="actions clear">

                                                      <div class="continue-shopping pull-left text-left">
                                                          <a class="button-continue-shopping button primary is-outline"
                                                              href="tat-ca-san-pham-cp2.html">
                                                              &#8592; Tiếp tục xem sản phẩm </a>
                                                      </div>

                                                      <input type="submit" class="button primary mt-0 pull-left small"
                                                          name="btnNumber" value="Cập nhật giỏ hàng" style="height:44px">

                                                      <input type="hidden" id="woocommerce-cart-nonce"
                                                          name="woocommerce-cart-nonce" value="cea387b536" /><input
                                                          type="hidden" name="_wp_http_referer" value="/?page_id=62" />
                                                  </td>
                                              </tr>

                                          </tbody>
                                      </table>
                                  </div>
                              </form>
                          </div>

                          <div class="cart-collaterals large-5 col pb-0">

                              <div class="cart-sidebar col-inner ">
                                  <div class="cart_totals ">

                                      <table cellspacing="0">
                                          <thead>
                                              <tr>
                                                  <th class="product-name" colspan="2" style="border-width:3px;">Cộng giỏ
                                                      hàng</th>
                                              </tr>
                                          </thead>
                                      </table>

                                      <h2>Cộng giỏ hàng</h2>

                                      <table cellspacing="0" class="shop_table shop_table_responsive">


                                          <tr class="order-total">
                                              <th>Tổng</th>
                                              <td data-title="Tổng"><strong>
                                                  <span class="woocommerce-Price-amount amount tong" ><?php echo number_format($total,0,'.','.') ; ?><span
                                                              class="woocommerce-Price-currencySymbol">&#8363;</span></span></strong>
                                              </td>
                                          </tr>


                                      </table>

                                      <div class="wc-proceed-to-checkout">

                                          <a href="dat-hang.html"
                                              class="checkout-button button alt wc-forward">
                                              Tiến hành thanh toán</a>
                                      </div>


                                  </div>
                                  <div class="cart-sidebar-content relative"></div>
                              </div>
                          </div>
                      </div>

                      <div class="cart-footer-content after-cart-content relative"></div>
                  </div>
                </div>

                <!--cart-collaterals-->
                <div class="crosssel">
                  <div class="new_title">
                    <h2>BẠN CŨNG CÓ THỂ THÍCH</h2>
                  </div>
                  <div class="category-products">
                    <ul class="products-grid">

                    	<?php $tintuc = $this->db->select('*')->from('sanpham_item')->where(array('publish' => 1, 'highlight'=>1))->limit(4)->order_by('created desc')->get()->result_array(); ?>
                                <?php if(isset($tintuc) && count($tintuc)) { foreach ($tintuc as $number => $val) {  ?>
                      <li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                       <div class="item-inner">
                            <div class="item-img">
                              <div class="item-img-info"> <a class="product-image" href="<?php echo helper_string_alias($val['title']).'-ap'.$val['id'].CMS_SUFFIX; ?>"> <img
                                    alt="<?php echo $val['title']; ?>" src="<?php echo helper_string_image(247, 247, $val['image']); ?>"> </a>

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
                                      data-original-title="Add to Cart" style="margin-bottom: 0px !important;"><i class="fa fa-shopping-basket"></i></button></a>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                      </li>
                      <?php }} ?>
                    </ul>
                  </div>
                </div>
              </div>
            </article>
            <!--	///*///======    End article  ========= //*/// -->
          </div>

        </div>
      </div>
    </section>
    <!-- Main Container End -->

<script type="text/javascript">
    var tong = <?php echo $total; ?>;
    $("body").removeClass("home");
    $("body").removeClass("ot-menu-show-home");
    function UpPrice(id,price){
        var sl = parseInt($(`.item1-${id}`).val())+1;
        $(`.item1-${id}`).val(sl)
        $(`.item-${id}`).html(number_format(price*sl));
        $(`.item2-${id}`).html(sl+" x");
        $('.tong').html(number_format(tong+=price));
    }
    function DownPrice(id,price){
        var a = $(`.item1-${id}`).val()-1;
        if(a>0){
            $(`.item1-${id}`).val(a);
            $(`.item-${id}`).html(number_format(price*(a)));
            $(`.item2-${id}`).html(a+" x");
            $('.tong').html(number_format(tong-=price));
        }
        if(a==0){
            $(`.item1-${id}`).val(1);
        }
    }
    function number_format(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")+'₫'
    }
</script>