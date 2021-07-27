		<div id="content" class="site-content">

            <div id="primary" class="content-area project-wrap">
                <main id="main" class="site-main" role="main" style="margin-top: 30px;">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-9 main-content">
                                <div class="bred-wrap">
                                    <ul id="breadcrumbs" class="breadcrumb">
                                        <li class="item-home"><a class="bread-link bread-home" href="<?php echo CMS_URL; ?>" title="Trang chủ">Trang chủ</a>
                                        </li>
                                        <li class="separator separator-home"> » </li>
                                        <li class="item-current item-cat"><span class="bread-current bread-cat">Bạn đang tìm kiếm: <?php echo $keyword; ?></span>
                                        </li>
                                    </ul>
                                </div>
                                <header class="page-sub">
                                    <h1></h1>
                                </header>
                                <!-- .page-header -->
								<?php if(isset($list) && count($list)) { foreach($list as $key => $value) {?>
                                <div class="list-cat-new">
                                    <div class="img-cat-new">
                                        <a href="<?php echo $value['slug'].'-a'.$value['id'].CMS_SUFFIX; ?>" title="<?php echo $value['title']; ?>">
                                            <img src="<?php echo helper_string_image(215, 142, $value['image']); ?>" class="attachment-img370x370 size-img370x370 wp-post-image" alt="<?php echo $value['title']; ?>" /> </a>
                                    </div>

                                    <div class="title-cat-new">
                                        <a href="<?php echo $value['slug'].'-a'.$value['id'].CMS_SUFFIX; ?>" title="<?php echo $value['title']; ?>">
                                            <h2><?php echo $value['title']; ?></h2>
                                        </a>
                                    </div>

                                    <div class="Author_time">
                                        Cập nhật:<?php $time = ($value['updated'] != '0000-00-00 00:00:00')?$value['updated']:$value['created']; ?>
                                        <?php echo gmdate('H:i', strtotime($time) + 7*3600)?> ngày <?php echo gmdate('d/m/Y', strtotime($time) + 7*3600)?> </div>

                                    <div class="list_box_new" align="justify">
                                        <?php echo helper_string_cutnchar(strip_tags($value['content']), 70); ?></div>

                                    <div class="viewmore grid-more">
                                        <a href="<?php echo $value['slug'].'-a'.$value['id'].CMS_SUFFIX; ?>">Đọc thêm <i class="fa fa-angle-right"></i></a>
                                    </div>

                                </div>
                                <?php } } ?>  
                             
                                <div class="pagi-wrap">
                                     <div class="text-right paging">
									<?php if(isset($pagination) && !empty($pagination) && count($pagination)){ ?>
										<div id="cms-pagination">
											<?php echo helper_string_pagination_frontend($pagination, $total_rows, 'Trang'); ?>
											<div class="cms-clear"></div>
										</div>
									<?php } ?>
									</div>
                                </div>
                                <!-- .pagination -->
                            </div>

                            <?php $this->load->view('frontend/left');?>

                        </div>
                    </div>
                </main>
                <!-- #main -->
            </div>
            <!-- #primary -->


        </div>
        <!-- #content -->
		