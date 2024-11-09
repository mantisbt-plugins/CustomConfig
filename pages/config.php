<?php

auth_reauthenticate();
access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );
layout_page_header( plugin_lang_get( 'title' ) );
layout_page_begin( 'config_page.php' );
print_manage_menu();

?>
<br/>
<div class="col-md-12 col-xs-12">
<div class="space-10"></div>
<div class="form-container" > 
<br>
<form action="<?php echo plugin_page( 'config_edit' ) ?>" method="post">

<div class="widget-box widget-color-blue2">
<div class="widget-header widget-header-small">
	<h4 class="widget-title lighter">
		<i class="ace-icon fa fa-text-width"></i>
		<?php echo plugin_lang_get( 'title') . ': ' . plugin_lang_get( 'config' )?>
	</h4>
</div>
<div class="widget-body">
<div class="widget-main no-padding">
<div class="table-responsive"> 
<table class="table table-bordered table-condensed table-striped"> 


	<?php

	echo form_security_field( 'plugin_CustomConfig_config_update' );

	?>

<tr >
	<td class="category" >
	<?php echo plugin_lang_get( 'update_files' )?>
	</td>
	<td >
	<label><input type="radio" name='update_files' value="1" <?php echo( ON == plugin_config_get( 'update_files' ) ) ? 'checked="checked" ' : ''?>/>
	<?php echo plugin_lang_get( 'Yes' )?></label>
	<label><input type="radio" name='update_files' value="0" <?php echo( OFF == plugin_config_get( 'update_files' ) )? 'checked="checked" ' : ''?>/>
	<?php echo plugin_lang_get( 'No' )?></label>
	</td>
</tr> 

<tr >
	<td class="category">
	<?php echo plugin_lang_get( 'user' ) ?>
	</td>
	<td >
		<select id="allowed_user" name="allowed_user" <?php echo helper_get_tab_index() ?>	class="autofocus input-sm">
			<?php  print_user_option_list( plugin_config_get( 'allowed_user'  ), 0, 90 ) ?>
		</select>
	</td>
</tr>

<div class="widget-toolbox padding-8 clearfix">
	<input type="submit" class="btn btn-primary btn-white btn-round" value="<?php echo lang_get( 'change_configuration' )?>" >
</div>
	</table>
</div>
</div>
</form>
</div>
</div>
<?php

layout_page_end();