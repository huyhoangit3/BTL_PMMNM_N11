<form method="post" action=""><div class="panel-main" style="width: 900px !important; margin: 0px auto; float: none;">	<div class="block">		<div class="main-title"><p>Thông tin địa điểm</p></div>		<div class="main-container">			<table cellspacing="0" cellpadding="0" class="form">				<?php				$error = validation_errors();				echo isset($error)?'<tr><td colspan="2"><ul class="cms-error">'.$error.'</ul></td></tr>':'';				?>				<tr>					<td class="label"><label for="txtTitle">Địa điểm</label></td>					<td class="content" style="padding: 0px 0px 10px 0px;">						<input type="text" name="data[title]" class="text" id="txtTitle" value="<?php echo (isset($post_data['title'])?$post_data['title']:'');?>" />					</td>				</tr>				<tr>					<td class="label"><label for="txtImage">Hình ảnh</label></td>					<td class="content" style="padding: 0px 0px 10px 0px;">						<input type="text" name="data[image]" class="text" id="txtImage" value="<?php echo (isset($post_data['image'])?$post_data['image']:'');?>" />						<input type="button" value="Chọn ảnh" class="button" onclick="browseKCFinder('txtImage', 'image')"/>					</td>				</tr>				<tr>					<td class="label"><label for="txtDescription">Mô tả</label></td>					<td class="content" style="padding: 0px 0px 10px 0px;"><textarea name="data[description]" class="textarea wysiwygEditor" id="txtDescription"><?php echo (isset($post_data['description'])?htmlspecialchars($post_data['description']):'');?></textarea></td>				</tr>				<tr>					<td class="label"><label for="txtTitle">Thao tác</label></td>					<td class="content">						<?php echo isset($button_action)?$button_action:'';?>						<input type="reset" value="Thực hiện lại" class="button" />					</td>				</tr>			</table>		</div><!-- .main-container -->		<div class="cms-clear"></div>	</div><!-- .block -->	<div class="cms-clear"></div></div><!-- .panel-main --><div class="panel-info">	<div class="cms-clear"></div></div><!-- .panel-info --></form>