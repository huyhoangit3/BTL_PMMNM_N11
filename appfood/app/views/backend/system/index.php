<div id="cms-tab">	<p class="title">Cấu hình hệ thống</p>		<div class="cms-clear"></div></div><!-- #cms-tab --><div id="cms-container">	<div id="cms-form">		<form method="post" action="">		<div class="panel-main" style="width: 900px !important; margin: 0px auto; float: none;">			<div class="block">				<div class="main-title"><p>Cấu hình hệ thống</p></div>				<div class="main-container">					<table cellspacing="0" cellpadding="0" class="form">						<?php						$error = validation_errors();						echo isset($error)?'<tr><td colspan="2"><ul class="cms-error">'.$error.'</ul></td></tr>':'';						?>						<?php if(isset($field) && count($field)){ foreach($field as $key => $val){ ?>						<?php $keyword = ucfirst(str_replace('', '', $val['keyword'])); ?>						<?php if($val['type'] == 'text'){ ?>						<tr>							<td class="label"><label for="txt<?php echo $keyword;?>"><?php echo $val['title'];?></label></td>							<td class="content" style="padding: 0px 0px 10px 0px;">								<input type="text" name="data[<?php echo $val['keyword'];?>]" class="text" id="txt<?php echo $keyword;?>" value="<?php echo (isset($post_data[$val['keyword']])?$post_data[$val['keyword']]:htmlspecialchars($val['value']));?>" style="width:500px;" />							</td>						</tr>						<?php } else if($val['type'] == 'textarea'){ ?>						<tr>							<td class="label"><label for="txt<?php echo $keyword;?>"><?php echo $val['title'];?></label></td>							<td class="content" style="padding: 0px 0px 10px 0px;">								<textarea name="data[<?php echo $val['keyword'];?>]" class="textarea" id="txt<?php echo $keyword;?>" style="<?php echo ((in_array($val['keyword'], array('meta_description')) == TRUE)?'height:48px;width:500px;':'height:168px;width:700px;')?>"><?php echo (isset($post_data[$val['keyword']])?$post_data[$val['keyword']]:htmlspecialchars($val['value']));?></textarea>							</td>						</tr>						<?php } else if($val['type'] == 'editor'){ ?>						<tr>							<td class="label"><label for="txt<?php echo $keyword;?>"><?php echo $val['title'];?></label></td>							<td class="content" style="padding: 0px 0px 10px 0px;">								<textarea name="data[<?php echo $val['keyword'];?>]" class="textarea wysiwygEditor" id="txt<?php echo $keyword;?>" style="height: 68px;"><?php echo (isset($post_data[$val['keyword']])?$post_data[$val['keyword']]:$val['value']);?></textarea>							</td>						</tr>						<?php } else if($val['type'] == 'image'){ ?>						<tr>							<td class="label"><label for="txt<?php echo $keyword;?>"><?php echo $val['title'];?></label></td>							<td class="content" style="padding: 0px 0px 10px 0px;">								<input type="text" name="data[<?php echo $val['keyword'];?>]" class="text" id="txt<?php echo $keyword;?>" value="<?php echo (isset($post_data[$val['keyword']])?$post_data[$val['keyword']]:htmlspecialchars($val['value']));?>" style="width:500px;" />								<input type="button" value="Chọn ảnh" class="button" onclick="browseKCFinder('txt<?php echo $keyword;?>', 'image')"/>							</td>						</tr>						<?php } ?>						<?php } } ?>						<tr>							<td class="label"></td>							<td class="content" style="padding: 10px 0px 10px 0px;">								<input type="submit" name="add" value="Thay đổi cấu hình" class="button" />								<input type="reset" value="Thực hiện lại" class="button" />							</td>						</tr>					</table>				</div><!-- .main-container -->				<div class="cms-clear"></div>			</div><!-- .block -->			<div class="cms-clear"></div>		</div><!-- .panel-main -->		<div class="panel-info">			<div class="cms-clear"></div>		</div><!-- .panel-info -->		</form>		<div class="cms-clear"></div>	</div><!-- #cms-form -->	<div class="cms-clear"></div></div><!-- #cms-container -->