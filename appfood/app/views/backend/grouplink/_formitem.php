<form method="post" action=""><div class="panel-main">	<div class="block">		<div class="main-title"><p>Thông tin banner</p></div>		<div class="main-container">			<table cellspacing="0" cellpadding="0" class="form">				<?php				$error = validation_errors();				echo isset($error)?'<tr><td colspan="2"><ul class="cms-error">'.$error.'</ul></td></tr>':'';				?>				<tr>					<td class="label"><label for="txtTitle">Từ khóa</label></td>					<td class="content" style="padding: 0px 0px 10px 0px;">						<input type="text" name="data[title]" class="text" id="txtTitle" value="<?php echo (isset($post_data['title'])?$post_data['title']:'');?>" />					</td>				</tr>				<tr>					<td class="label"><label for="txtParentid">Chọn vị trí</label></td>					<td class="content" style="padding: 0px 0px 10px 0px;">						<?php echo form_dropdown('data[parentid]', (isset($show_data['parentid'])?$show_data['parentid']:NULL), (isset($post_data['parentid'])?(int)$post_data['parentid']:0),' id="txtParentid" class="select"');?>					</td>				</tr>						<tr>					<td class="label"><label for="txtUrl">Đường dẫn</label></td>					<td class="content" style="padding: 0px 0px 10px 0px;">						<input type="text" name="data[url]" class="text" id="txtUrl" value="<?php echo (isset($post_data['url'])?$post_data['url']:'');?>" />					</td>				</tr>				<tr>					<td class="label"><label for="txtNotes">Mô tả</label></td>					<td class="content" style="padding: 0px 0px 10px 0px;"><textarea name="data[notes]" class="textarea" id="txtNotes" style="height: 168px;"><?php echo (isset($post_data['notes'])?$post_data['notes']:'');?></textarea></td>				</tr>				<tr>					<td class="label"><label for="txtTitle">Thao tác</label></td>					<td class="content">						<?php echo isset($button_action)?$button_action:'';?>						<input type="reset" value="Thực hiện lại" class="button" style="background: red" />					</td>				</tr>			</table>		</div><!-- .main-container -->		<div class="cms-clear"></div>	</div><!-- .block -->	<div class="cms-clear"></div></div><!-- .panel-main --><div class="panel-info">	<div class="block">		<div class="main-title"><p>Tùy chọn</p></div>		<div class="main-container">			<table cellspacing="0" cellpadding="0" class="form">				<tr>					<td class="label label-option"><label for="" style="width: 90px;">Xuất bản</label></td>					<td class="content" style="padding: 0px 0px 0px 0px;">						<input type="radio" name="data[publish]" value="1" class="radio" id="rbPublish_1" <?php echo ((isset($post_data['publish']) && $post_data['publish'] == 1)?'checked':'');?>/><label for="rbPublish_1">Có</label>						<input type="radio" name="data[publish]" value="0" class="radio" id="rbPublish_0" <?php echo ((isset($post_data['publish']) && $post_data['publish'] == 0)?'checked':'');?>/><label for="rbPublish_0">Không</label>											</td>				</tr>							</table>		</div>	</div><!-- .block -->		<div class="block">		<div class="main-title"><p>Chọn ảnh banner</p></div>		<div class="main-container">			<table cellspacing="0" cellpadding="0" class="form">								<tr>					<td class="content" style="padding: 0px 0px 10px 0px;font-size:14px;"><input style="font-size:14px;" type="hidden" name="data[image]" class="text iframe-btn" id="image" value="<?php echo (isset($post_data['image'])?$post_data['image']:'');?>" />					</td>				</tr>				<tr>					<td style="width: 20%;float: right;"><a href="#" class="btn btn-danger delete_media" id="image" data-toggle="tooltip" data-title="remove" type="button"><i class="fa fa-trash"></i></a></td>					<td style="width: 20%;float: right;"><a href="<?=CMS_URL?>template/plugins/filemanager/dialog.php?type=1&field_id=image" class="btn btn-success iframe-btn" data-toggle="tooltip" data-title="select_image" type="button"><i class="fa fa-folder-open"></i></a></td>				</tr>				<tr>					<td><div id="image_preview" class="thumbnail" style="margin-top: 10px; display: none">                        <img src="" class="img-responsive">                    </div></td>				</tr>							</table>		</div>		<div class="cms-clear"></div>	</div><!-- .block -->		<div class="cms-clear"></div></div><!-- .panel-info --></form>