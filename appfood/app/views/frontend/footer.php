
    <!-- Footer -->
    <footer class="footer">

      <div class="newsletter-wrap">
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
              <div class="newsletter">
                
                  <div>
                    <h4><span> KẾT NỐI VỚI CHÚNG TÔI </span></h4>

                    <a href="lien-he.html"><button class="subscribe" title="Subscribe"><span>Liên Hệ Ngay</span></button></a>
                      
                  </div>
               
                
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--newsletter-->

      <div class="footer-middle">
        <div class="container">
          <div class="row">
            <div class="col-md-3 col-sm-6">
              <div class="footer-column pull-left">
                <h4>VỀ CHÚNG TÔI</h4>
                <ul class="links">
                  <li><a href="\"><img src="<?php echo $this ->system['logo']; ?>" alt="LOGO"></a></li>
                  <div class="contacts-info">
                      <address><i class="add-icon"><?php echo $this ->system['diachi']; ?></i><br>
                      </address>
                      <div class="phone-footer"><i class="phone-icon"></i><?php echo $this ->system['hotline']; ?></div>
                      <div class="email-footer"><i class="email-icon"></i><a
                          href="mailto:<?php echo $this ->system['email']; ?>"><?php echo $this ->system['email']; ?></a></div>
                    </div>
                  
                </ul>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="footer-column pull-left">
                <h4>DANH MỤC SẢN PHẨM</h4>
                <ul class="links">
                  <?php $category_sp= $this->db->select('*')->from('sanpham_category')->where(array('publish' => 1, 'parentid' => 2)) ->limit(8)->order_by('order asc')->get()->result_array(); ?>
                                    <?php if(isset($category_sp) && count($category_sp)) { foreach ($category_sp as $key=> $categories_sp) { ?>
                  <li><a href="<?php echo helper_string_alias($categories_sp['title']).'-cp'.$categories_sp['id'].CMS_SUFFIX; ?>" title="<?php echo $categories_sp['title']; ?>"><?php echo $categories_sp['title']; ?></a></li>
                 <?php }} ?>
                </ul>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="footer-column pull-left">
                <h4>THÔNG TIN HỖ TRỢ</h4>
                <ul class="links">
                   <li><a href="contact_us.html" title="Contact Us">Giới thiệu</a></li>
                    <?php $category=$this->db->select('*')->from('articles_item')->where(array('publish' => 1, 'parentid' => 18))->order_by('order asc')->get()->result_array(); ?>
                  <?php if(isset($category) && count($category)) { foreach ($category as $key=> $category_category) { ?>
                  
                 
                  <li><a href="<?php echo helper_string_alias($category_category['title']).'-a'.$category_category['id'].CMS_SUFFIX; ?>" title="<?php echo $category_category['title']; ?>"><?php echo $category_category['title']; ?></a></li>

                <?php }} ?>
                  <li><a href="lien-he.html" title="Lien he">Liên Hệ</a></li>
                </ul>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <h4>Contact Us</h4>
              <div class="contacts-info">
               
                <div class="phone-footer"> <?php echo $this ->system['facebook']; ?></div>
               
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-top">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-4">
              <div class="social">
                <ul>
                  <li class="fb"><a href="#"></a></li>
                 
                  <li class="googleplus"><a href="#"></a></li>
                 
                  <li class="youtube"><a href="#"></a></li>
                </ul>
              </div>
            </div>
            <div class="col-sm-4 col-xs-12 coppyright">
              &copy; Bản quyền Thuộc về Sinh Viên CNTT HAUI
            </div>
            <div class="col-xs-12 col-sm-4">
              <div class="payment-accept"> <img src="template/frontend/images/payment-1.png" alt=""> <img src="template/frontend/images/payment-2.png"
                  alt=""> <img src="template/frontend/images/payment-3.png" alt=""> <img src="template/frontend/images/payment-4.png" alt=""> </div>
            </div>
          </div>
        </div>
      </div>

    </footer>
    <!-- End Footer -->
  </div>
  <!-- mobile menu -->
  <div id="mobile-menu">
    <ul>
      <li>
        <div class="mm-search">
          <form id="search1" name="search">
            <div class="input-group">
              <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> </button>
              </div>
              <input type="search" class="form-control simple" placeholder="Search ..." name="s">
            </div>
          </form>
        </div>
      </li>


      <li> <a href="\">TRANG CHỦ</a>
        
      </li>
 <?php $category_sp= $this->db->select('*')->from('sanpham_category')->where(array('publish' => 1, 'parentid' => 2))->order_by('order asc')->get()->result_array(); ?>
                                    <?php if(isset($category_sp) && count($category_sp)) { foreach ($category_sp as $key=> $categories_sp) { ?>


      <li> <a href="<?php echo helper_string_alias($categories_sp['title']).'-cp'.$categories_sp['id'].CMS_SUFFIX; ?>"><?php echo $categories_sp['title']; ?></a>

         <?php $category_sp1= $this->db->select('*')->from('sanpham_category')->where(array('publish' => 1, 'parentid' => $categories_sp['id']))->order_by('order asc')->get()->result_array(); ?>
                                   
        <ul>
           <?php if(isset($category_sp1) && count($category_sp1)) { foreach ($category_sp1 as $key=> $categories_sp1) { ?>
          <li>
      <li> <a href="<?php echo helper_string_alias($categories_sp1['title']).'-cp'.$categories_sp1['id'].CMS_SUFFIX; ?>"><?php echo $categories_sp1['title']; ?></a> </li>
          <?php }} else ''; ?>
        </ul>
      </li>
     <?php }} ?>

    </ul>
    <div class="top-links">
      <ul class="links">
        <?php $category=$this->db->select('*')->from('articles_category')->where(array('publish' => 1, 'parentid' => 1))->order_by('order asc')->get()->result_array(); ?>
                            <?php if(isset($category) && count($category)) { foreach ($category as $key=> $category_category) { ?>
        <li><a  href="<?php echo helper_string_alias($category_category['title']).'-c'.$category_category['id'].CMS_SUFFIX; ?>"><?php echo $category_category['title']; ?></a> </li>
        <?php }} ?>
        <li class="last"><a href="lien-he.html"><span>Liên Hệ</span></a> </li>
      </ul>
    </div>
  </div>
  <!-- JavaScript -->

  <script src="template/frontend/js/jquery-3.2.1.min.js"></script>
  <script src="template/frontend/js/bootstrap.min.js"></script>
  <script src="template/frontend/js/revslider.js"></script>
  <script src="template/frontend/js/common.js"></script>
  <script src="template/frontend/js/owl.carousel.min.js"></script>
  <script src="template/frontend/js/jquery.mobile-menu.min.js"></script>
  <script type="text/javascript" src="template/frontend/js/cloud-zoom.js"></script>
  <!-- <script src="template/frontend/js/countdown.js"></script> -->
  <script>
    jQuery(document).ready(function () {
      jQuery('#rev_slider_4').show().revolution({
        dottedOverlay: 'none',
        delay: 5000,
        startwidth: 1170,
        startheight: 510,

        hideThumbs: 200,
        thumbWidth: 200,
        thumbHeight: 50,
        thumbAmount: 2,

        navigationType: 'thumb',
        navigationArrows: 'solo',
        navigationStyle: 'round',

        touchenabled: 'on',
        onHoverStop: 'on',

        swipe_velocity: 0.7,
        swipe_min_touches: 1,
        swipe_max_touches: 1,
        drag_block_vertical: false,

        spinner: 'spinner0',
        keyboardNavigation: 'off',

        navigationHAlign: 'center',
        navigationVAlign: 'bottom',
        navigationHOffset: 0,
        navigationVOffset: 20,

        soloArrowLeftHalign: 'left',
        soloArrowLeftValign: 'center',
        soloArrowLeftHOffset: 20,
        soloArrowLeftVOffset: 0,

        soloArrowRightHalign: 'right',
        soloArrowRightValign: 'center',
        soloArrowRightHOffset: 20,
        soloArrowRightVOffset: 0,

        shadow: 0,
        fullWidth: 'on',
        fullScreen: 'off',

        stopLoop: 'off',
        stopAfterLoops: -1,
        stopAtSlide: -1,

        shuffle: 'off',

        autoHeight: 'off',
        forceFullWidth: 'on',
        fullScreenAlignForce: 'off',
        minFullScreenHeight: 0,
        hideNavDelayOnMobile: 1500,

        hideThumbsOnMobile: 'off',
        hideBulletsOnMobile: 'off',
        hideArrowsOnMobile: 'off',
        hideThumbsUnderResolution: 0,

        hideSliderAtLimit: 0,
        hideCaptionAtLimit: 0,
        hideAllCaptionAtLilmit: 0,
        startWithSlide: 0,
        fullScreenOffsetContainer: ''
      });
    });
  </script>
  <!-- Hot Deals Timer 1-->
  <script>
    var dthen1 = new Date("12/25/17 11:59:00 PM");
    start = "08/04/15 03:02:11 AM";
    start_date = Date.parse(start);
    var dnow1 = new Date(start_date);
    if (CountStepper > 0)
      ddiff = new Date((dnow1) - (dthen1));
    else
      ddiff = new Date((dthen1) - (dnow1));
    gsecs1 = Math.floor(ddiff.valueOf() / 1000);

    var iid1 = "countbox_1";
    CountBack_slider(gsecs1, "countbox_1", 1);
  </script>

  <script>
jQuery(window).scroll(function () {
    var threshold = 20;
 if (jQuery(window).scrollTop() >= 20)
     jQuery('#sidebar').addClass('fixed');
 else
     jQuery('#sidebar').removeClass('fixed');
});
</script>