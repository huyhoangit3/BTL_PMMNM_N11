<div id="cms-tab">
	<p class="title">Hệ thống quản lý đơn hàng</p>
	<ul class="main">
		<li class="main"><a href="<?php echo CMS_BACKEND.'/payment/index'.CMS_SUFFIX;?>" class="main main-select">Quản lý đơn hàng</a></li>
		<!--<li class="main"><a href="<?php echo CMS_BACKEND.'/payment/add'.CMS_SUFFIX;?>" class="main">Thêm đơn hàng mới</a></li>-->
	</ul>
	<div class="cms-clear"></div>
</div><!-- #cms-tab -->

<div id="cms-container">
	<div id="cms-filter">
		<div class="left">
			<form class="frm-filter" method="get" action="<?php echo CMS_URL.CMS_BACKEND.'/payment/index'.CMS_SUFFIX;?>">
				<input type="text" name="keyword" class="keyword" value="<?php echo isset($keyword)?$keyword:'';?>" />
				<input type="submit" class="search" value="Tìm kiếm" />
			</form>
		</div><!-- .left -->
		<div class="right">
			<!--<input type="submit" class="button cms-publish-ajax" value="Xuất bản" name="payment" />
			<input type="submit" class="button cms-unpublish-ajax" value="Dừng xuất bản" name="payment" />
			<input type="submit" class="button cms-order-ajax" value="Sắp xếp" name="payment" />-->
			<input type="submit" class="button cms-delete-ajax" value="Xóa đơn hàng" name="payment" />
		</div><!-- .right -->
		<div class="cms-clear"></div>
	</div><!-- #cms-filter -->
	<div id="cms-table">
		<form id="frmView">
		<table cellspacing="0" cellpadding="0" class="data">
			<tr>
				<th>#</th>
				<th><input type="checkbox" id="check-all" /></th>
				<th class="left">
					<a class="cms-sort-ajax" href="<?php echo CMS_URL.CMS_BACKEND.'/session/sort/payment/fullname'.CMS_SUFFIX;?>">
						Tên khách hàng<?php echo cms_common_icon_sort('fullname', $sort);?>
					</a>
				</th>

				<th class="left">
					<a class="cms-sort-ajax" href="<?php echo CMS_URL.CMS_BACKEND.'/session/sort/payment/address'.CMS_SUFFIX;?>">
						Địa chỉ<?php echo cms_common_icon_sort('address', $sort);?>
							
					</a>
				</th>

				<th class="left">
					<a class="cms-sort-ajax" href="<?php echo CMS_URL.CMS_BACKEND.'/session/sort/payment/phone'.CMS_SUFFIX;?>">
						Số điện thoại<?php echo cms_common_icon_sort('phone', $sort);?>
						
					</a>
				</th>

				<th class="left">
					<a class="cms-sort-ajax" href="<?php echo CMS_URL.CMS_BACKEND.'/session/sort/payment/email'.CMS_SUFFIX;?>">
						Email<?php echo cms_common_icon_sort('email', $sort);?>
						
					</a>
				</th>

				<th>
					<a class="cms-sort-ajax" href="<?php echo CMS_URL.CMS_BACKEND.'/session/sort/payment/created'.CMS_SUFFIX;?>">
						Ngày tạo đơn hàng<?php echo cms_common_icon_sort('created', $sort);?>
							
					</a>
				</th>

				<th>
					<a class="cms-sort-ajax" href="<?php echo CMS_URL.CMS_BACKEND.'/session/sort/payment/publish'.CMS_SUFFIX;?>">
						Trạng thái TT<?php echo cms_common_icon_sort('publish', $sort);?>
							
					</a>
				</th>

				<th>Chi tiết đơn hàng</th>
				<th>TỔNG TIỀN</th>

				<th>
					<a class="cms-sort-ajax" href="<?php echo CMS_URL.CMS_BACKEND.'/session/sort/payment/id'.CMS_SUFFIX;?>">
						Mã đơn hàng<?php echo cms_common_icon_sort('id', $sort);?>
							
					</a>
				</th>

			</tr><?php $tongdoanhthu= 0; ?> <?php $month= 0; ?> <?php $tkthang = 0; ?><?php
					  $today = date("m");
					 
					?>
			<?php if(isset($full_data) && count($full_data)){ foreach($full_data as $key => $val){ ?>
			<tr <?php echo (($key + 1) == count($full_data))?'class="last"':'';?>>

				<td class="center first"><?php echo ($key+$per_page*$page+1);?></td>
				<td class="center">
					<input type="checkbox" name="checkbox[]" value="<?php echo $val['id'];?>" class="checkbox check-all" />
				</td>
				<td class="left title"><?php echo htmlspecialchars($val['fullname']);?></td>
				<td class="left"><?php echo helper_string_cutnchar(strip_tags($val['address']), 100);?></td>
				<td class="left"><?php echo helper_string_cutnchar(strip_tags($val['phone']), 100);?></td>
				<td class="left"><?php echo helper_string_cutnchar(strip_tags($val['email']), 100);?></td>
				<td class="center">
					<?php echo ($val['created'] != '0000-00-00 00:00:00')?gmdate('H:i d/m/Y', strtotime($val['created']) + 7*3600):'-';?>
						
				</td>

				<td class="center">
					<a class="cms-set-ajax" href="<?php echo CMS_URL.CMS_BACKEND.'/common/set/payment/publish/'.$val['id'].CMS_SUFFIX;?>">
						<img src="<?php echo ($val['publish'] == 0)?'template/backend/images/uncheck.png':'template/backend/images/check.png';?>" alt="Xuất bản" title="Xuất bản" />
					</a>
				</td>
				<td class="center">
					<a href="<?php echo CMS_URL.CMS_BACKEND.'/payment/edit/'.$val['id'].CMS_SUFFIX;?>"><img src="template/backend/images/edit.png" /></a>
				</td>
				<td class="center">


					<?php $donhang=json_decode($val['data'],true);?>
					<?php $tongtien= 0; ?>
					<?php foreach($donhang as $key =>$vals){ ?>
						<?php $tong = $vals['price']* $vals['number'];
						$tongtien+= $tong; ?>
						
					<?php } ?>

					<?php echo number_format($tongtien); ?>VND
					<?php $month = ($val['created'] != '0000-00-00 00:00:00')?gmdate('m', strtotime($val['created']) + 7*3600):'-'; ?>
					
					
				</td>
				<td class="center last"><?php echo $val['id'];?></td>
			</tr>

					<?php $tongdoanhthu += $tongtien; ?>

					

					<?php if($today === $month){ ?>

						<?php  $tkthang += $tongtien; ?>
					<?php } ?>
				
			<?php } ?>
			
			
				<div class="dieuchinh" style="display: flex; align-items: center;justify-content: space-between; padding: 0px 40px;
    						background: #309CDF;">
					<div class="thongketr">

							<div class="thongketd">TỔNG DOANH THU:</div>
							<div class="thongkeinput"><input type="text" value="<?php echo number_format($tongdoanhthu); ?>VND"></div>
					</div>
					<div class="thongketr">

							<div class="thongketd"> DOANH THU THÁNG <?php echo $today; ?>: </div>
							<div class="thongkeinput"><input type="text" value="<?php echo number_format($tkthang); ?>VND"></div>
					</div>	
				</div>


		<?} else{ ?>
			<tr class="last"><td class="center first" colspan="11">Không có dữ liệu đơn hàng.</td></tr>
			<?php } ?>
		</table>

		

		</form>
	</div><!-- #cms-table -->
	<?php if(isset($full_page) && !empty($full_page) && count($full_page)){ ?>
	<div id="cms-pagination">
		<?php echo helper_string_pagination_backend($full_page, $total_rows, 'Trang'); ?>
		<div class="cms-clear"></div>
	</div><!-- #cms-pagination -->
	<?php } ?>
	<div class="cms-clear"></div>
</div><!-- #cms-container -->
<style>
	.thongketr {}

.thongketr {
    display: flex;
    height: 50px;
    line-height: 50px;
    align-items: center;
    justify-content: flex-end;
    background: #309CDF;
}
.phanchiadiv {
    display: flex;
    justify-content: space-between;
    background: #309CDF;
    padding: 0px 30px;
}
.thongketd {
    color: #fff;
    font-weight: bold;
    font-size: 18px;
}


.thongkeinput input {
    height: 36px;
    width: 200px;
    background: #fff;
    padding-left: 8px;
    border: 3px solid #FFF;
    border-radius: 20px;
    color: red;
    font-weight: bold;
    font-size: 19px;
}

.thongkeinput {
    padding-left: 18px;
}
</style>