 <!-- Main Container -->
  <section class="main-container col2-left-layout">
    <div class="container">
      <div class="row">

          
   
        <div class="col-sm-9 col-sm-push-3">
          <article class="col-main">
            <div class="page-title">
              <h2>LIÊN HỆ</h2>
            </div>
            <div class="static-contain">
              <fieldset class="group-select">
                <form action="" method="post">
                                      
                <ul>
                  <li id="billing-new-address-form">
                    <fieldset>
                      <input type="hidden" name="billing[address_id]" value="" id="billing:address_id">
                      <ul>
                        <li>
                          <div class="customer-name">
                            <div class="input-box name-firstname">
                              <label for="billing:firstname"> HỌ VÀ TÊN</label>
                              <br>
                              <input type="text" name="data[fullname]" class="input-text form-control" value="<?php echo isset($post_data['fullname'])?htmlspecialchars($post_data['fullname']):'';?>" placeholder="Nhập họ tên của bạn(*)" required />
                            </div>
                            <div class="input-box name-lastname">
                             <label for="billing:lastname"> EMAIL  </label>
                              <br>
                             <input type="text" name="data[email]" class="input-text form-control input-text" value="<?php echo isset($post_data['email'])?htmlspecialchars($post_data['email']):'';?>" placeholder="Địa chỉ Email(*)" required style="width: 96%;" />
                            </div>
                          </div>
                        </li>
                        <li>
                             <label for="billing:email">ĐIỆN THOẠI </label>
                            <br>
                           <input type="text" name="data[phone]" class="form-control input-text" value="<?php echo isset($post_data['phone'])?htmlspecialchars($post_data['phone']):'';?>" placeholder="Số điện thoại(*)" required />
                          
                        </li>
                        <li>
                        <label for="billing:street1">ĐỊA CHỈ </label>
                          <br>
                         <input type="text" name="data[address]" class="form-control input-text" value="<?php echo isset($post_data['address'])?htmlspecialchars($post_data['address']):'';?>" placeholder="Địa chỉ của bạn(*)" required />
                        </li>
                        
                        <li class="">
                           <label for="comment">NỘI DUNG <em class="required">*</em></label>
                          <br>
                          <div style="float:none" class="">
                            <textarea name="data[notes]" id="message" class="form-control input-text" cols="30" rows="10" placeholder="Nội dung"><?php echo isset($post_data['content'])?htmlspecialchars($post_data['content']):'';?></textarea>
                          </div>
                        </li>
                      </ul>
                    </fieldset>
                  </li>
                  <p class="require"><em class="required">* </em>Hãy chắc chắn rằng những thông tin ở trên là đúng</p>
                 
                  <div class="buttons-set">
                     
                      <input type="submit" name="sent" class="form-group" value="Gửi thông tin" />
                  </div>
                </ul>
              </form>
              </fieldset>
            </div>
          </article>
          <!--  ///*///======    End article  ========= //*/// --> 
        </div>
        <aside class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9">
            <div class="side-banner"><img src="template/frontend/images/side-banner.jpg" alt="banner"></div>
            <div class="block block-company">
              <div class="block-title">DANH MỤC SẢN PHẨM </div>
              <div class="block-content">
                <ol id="recently-viewed-items">
                   <?php $category_sp= $this->db->select('*')->from('sanpham_category')->where(array('publish' => 1, 'parentid' => 2)) ->limit(8)->order_by('order asc')->get()->result_array(); ?>
                                    <?php if(isset($category_sp) && count($category_sp)) { foreach ($category_sp as $key=> $categories_sp) { ?>
                  <li><a href="<?php echo helper_string_alias($categories_sp['title']).'-cp'.$categories_sp['id'].CMS_SUFFIX; ?>" title="<?php echo $categories_sp['title']; ?>"><?php echo $categories_sp['title']; ?></a></li>
                 <?php }} ?>
                </ol>
              </div>
            </div>
          </aside>
      </div>
    </div>
  </section>
  <!-- Main Container End -->