<?php
auth_reauthenticate();
access_ensure_global_level( 90 );
$t_curuser	= auth_get_current_user_id();
if ( $t_curuser <> plugin_config_get( 'allowed_user' ) ){
	return;
}
layout_page_header( plugin_lang_get( 'title' ) );
layout_page_begin();
print_manage_menu();

$file1 = 'config/config_inc.php';
$file2 = 'config/custom_strings_inc.php';
$file3 = 'config/custom_functions_inc.php';

$data1 = file_get_contents( $file1 );
$data2 = file_get_contents( $file2 );
$data3 = file_get_contents( $file3 );

$count = preg_split('/\n|\r/',$data1);
$lines1 = count($count)+1; 
$count = preg_split('/\n|\r/',$data2);
$lines2 = count($count)+1;
$count = preg_split('/\n|\r/',$data3);
$lines3 = count($count)+1;  

?>
<div class="col-md-12 col-xs-12">
<div class="space-10"></div>
<div class="form-container" > 

<div class="widget-box widget-color-blue2">
<div class="widget-header widget-header-small">
	<h4 class="widget-title lighter">
		<i class="ace-icon fa fa-text-width"></i>
		<?php echo  plugin_lang_get( 'title' ).': ' . plugin_lang_get( 'description' )?>
	</h4>
</div>
<div class="widget-body">
<div class="widget-main no-padding">
<div class="table-responsive"> 

<table class="table table-bordered table-condensed table-striped"> 
<form action="<?php echo plugin_page( 'update_CustomConfig' ) ?>" method="post">
<tr>
<td>
<center>
config_inc.php
</center
</td>
<td>
<center>
custom_strings_inc.php
</center
</td>
<td>
<center>
custom_functions_inc.php
</center
</td>
</tr>
<tr >
<td class="category" >
<textarea name="data_1" rows="<?php echo $lines1 ?>" cols="70"> <?php  echo htmlspecialchars($data1) ?></textarea>
</td>
<td class="category" >
<textarea name="data_2" rows="<?php echo $lines2 ?>" cols="70"> <?php  echo htmlspecialchars($data2) ?></textarea>
</td>
<td class="category" >
<textarea name="data_3" rows="<?php echo $lines3 ?>" cols="70"> <?php  echo htmlspecialchars($data3) ?></textarea>
</td>
</tr>
<?php
if ( ON == plugin_config_get( 'update_files' ) ) {
?>
	<tr>
	<td colspan="3">
	<center>
	<input type="submit" class="btn btn-primary btn-white btn-round" value="<?php echo plugin_lang_get( 'update' ) ?>" />
	</center>
	</td>
	</tr>
<?php
}
?>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
<?php
layout_page_end();