<link rel='stylesheet' id='flatsome-icons-css' href='template/frontend/css_cart/fl-icons6de8.css?ver=3.3' type='text/css' media='all' />
<link rel='stylesheet' id='flatsome-main-css' href='template/frontend/css_cart/flatsome822f.css?ver=3.6.2' type='text/css' media='all' />
<link rel='stylesheet' id='flatsome-shop-css' href='template/frontend/css_cart/flatsome-shop822f.css?ver=3.6.2' type='text/css' media='all' />
<link rel='stylesheet' id='flatsome-style-css' href='template/frontend/css_cart/style822f.css?ver=3.6.2' type='text/css' media='all' />


<main  class="">
  
    <div class="cart-container container page-wrapper page-checkout">
         <div class="page-title" style="padding-bottom: 40px">
                  <h2>Thanh Toán</h2>
                </div>
        <div class="woocommerce" id="thanhtoan_off">
            <div class="woocommerce-notices-wrapper"></div>
            <div class="woocommerce-notices-wrapper"></div>

            <form name="checkout" method="post" class="checkout woocommerce-checkout "
                action="" enctype="multipart/form-data">
                

                <div class="row pt-0 ">
                    <div class="large-7 col  ">


                        <div id="customer_details">
                            <div class="clear">
                                <div class="woocommerce-billing-fields">

                                    <h3>Thông tin thanh toán</h3>



                                    <div class="woocommerce-billing-fields__field-wrapper">
                                        <p class="form-row form-row-wide validate-required"
                                            id="billing_first_name_field" data-priority="10"><label
                                                for="billing_first_name" class="">Tên&nbsp;<abbr
                                                    class="required" title="bắt buộc">*</abbr></label><span
                                                class="woocommerce-input-wrapper"><input type="text"
                                                    class="input-text " name="data[fullname]"
                                                    id="billing_first_name" placeholder="" value=""
                                                    autocomplete="given-name" required /></span></p>
                                        
                                        <p class="form-row address-field form-row-wide validate-required"
                                            id="billing_address_1_field" data-priority="50"><label
                                                for="billing_address_1" class="">Địa chỉ&nbsp;<abbr
                                                    class="required" title="bắt buộc">*</abbr></label><span
                                                class="woocommerce-input-wrapper"><input type="text"
                                                    class="input-text " name="data[address]"
                                                    id="billing_address_1" placeholder="" value=""
                                                    autocomplete="address-line1" required /></span></p>
                                        
                                        
                                        <p class="form-row form-row-wide validate-required validate-phone"
                                            id="billing_phone_field" data-priority="100"><label
                                                for="billing_phone" class="">Số điện thoại&nbsp;<abbr
                                                    class="required" title="bắt buộc">*</abbr></label><span
                                                class="woocommerce-input-wrapper"><input type="text"
                                                    class="input-text " name="data[phone]" id="billing_phone"
                                                    placeholder="" value="" autocomplete="tel" required /></span></p>

                                        <p class="form-row form-row-wide validate-required validate-email"
                                            id="billing_email_field" data-priority="110"><label
                                                for="billing_email" class="">Địa chỉ email&nbsp;</label><span
                                                class="woocommerce-input-wrapper"><input type="text"
                                                    class="input-text " name="data[email]" id="billing_email"
                                                    placeholder="" value=""
                                                    autocomplete="email username" required /></span></p>
                                    </div>

                                </div>

                            </div>
                            <div class="clear">
                                <div class="woocommerce-shipping-fields">
                                </div>
                                <div class="woocommerce-additional-fields">



                                

                                    <div class="woocommerce-additional-fields__field-wrapper">
                                        <p class="form-row notes" id="order_comments_field" data-priority="">
                                            <label for="order_comments" class="">Ghi chú đơn hàng&nbsp;<span
                                                    class="optional">(tuỳ chọn)</span></label><span
                                                class="woocommerce-input-wrapper"><textarea
                                                    name="data[notes]" class="input-text "
                                                    id="order_comments"
                                                    placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn."
                                                    rows="2" cols="5"></textarea></span></p>
                                    </div>


                                </div>
                            </div>
                        </div>


                    </div><!-- large-7 -->

                    <div class="large-5 col">

                        <div class="col-inner has-border">
                            <div class="checkout-sidebar sm-touch-scroll">
                                <h3 id="order_review_heading">Đơn hàng của bạn</h3>

                                <div id="order_review" class="woocommerce-checkout-review-order">
                                    <table class="shop_table woocommerce-checkout-review-order-table">
                                        <thead>
                                            <tr>
                                                <th class="product-name">Sản phẩm</th>
                                                <th class="product-total">Tạm tính</th>
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
                                                //$product_cart = get_item('*', $val['id'], 'products_item');
                                                $product_cart = $this->db->from('sanpham_item')->where(array('id'=>$val['id']))->get()->row_array();    
                                        ?>
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    <?php echo $val['title']; ?>&nbsp; <strong
                                                        class="product-quantity">&times;&nbsp;<?php echo $val['number']; ?></strong> </td>
                                                <td class="product-total">
                                                    <span
                                                        class="woocommerce-Price-amount amount"><?php echo helper_string_money($total_temp); ?></span>
                                                </td>
                                            </tr>
                                        <?php }} ?>
                                        </tbody>
                                        <tfoot>

                                            <tr class="order-total">
                                                <th>Tổng</th>
                                                <td><strong><span
                                                            class="woocommerce-Price-amount amount"><?php echo helper_string_money($total); ?></span></strong>
                                                </td>
                                            </tr>


                                        </tfoot>
                                    </table>
                                    <div id="payment" class="woocommerce-checkout-payment">
                                        
                                        <div class="form-row place-order">
                                            <noscript>
                                                Trình duyệt của bạn không hỗ trợ JavaScript, hoặc nó bị vô hiệu
                                                hóa, hãy đảm bảo bạn nhấp vào <em>Cập nhật giỏ hàng</em> trước
                                                khi bạn thanh toán. Bạn có thể phải trả nhiều hơn số tiền đã nói
                                                ở trên, nếu bạn không làm như vậy. <br /><button type="submit"
                                                    class="button alt" name="woocommerce_checkout_update_totals"
                                                    value="Cập nhật tổng">Cập nhật tổng</button>
                                            </noscript>

                                            <div class="woocommerce-terms-and-conditions-wrapper">

                                            </div>


                                            <input type="submit" class="button alt"
                                                name="submit" id="place_order"
                                                value="Đặt hàng" data-value="Đặt hàng">

                                            <input type="hidden" id="woocommerce-process-checkout-nonce"
                                                name="woocommerce-process-checkout-nonce"
                                                value="a3663a9615" /><input type="hidden"
                                                name="_wp_http_referer" value="/?page_id=61" />
                                        </div>
                                    </div>
                                </div>
                                <div class="woocommerce-privacy-policy-text">
                                    <p>Your personal data will be used to process your order, support your
                                        experience throughout this website, and for other purposes described in
                                        our <a class="woocommerce-privacy-policy-link"
                                            target="_blank">chính sách riêng tư</a>.</p>
                                </div>
                            </div>
                        </div>

                    </div><!-- large-5 -->

                </div><!-- row -->
            </form>

        </div>
    </div>


</main><!-- #main -->

<script type="text/javascript">
    $("body").removeClass("home");
    $("body").removeClass("ot-menu-show-home");
</script>
<style>
    p label {
    text-align: left !important;
    text-transform: uppercase;
    font-size: 17px;
}
</style>