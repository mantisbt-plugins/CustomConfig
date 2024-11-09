<?php

$file1 = htmlspecialchars( gpc_get_string( 'data_1' ) );
$file2 = htmlspecialchars( gpc_get_string( 'data_2' ) );
$file3 = htmlspecialchars( gpc_get_string( 'data_3' ) );

$file1 = trim( $file1);
$file2 = trim( $file2);
$file3 = trim( $file3);

if ( strtoupper( substr( $file1, 0, 5 ) ) <> '<?PHP' ){
	file_put_contents("config/config_inc.php",  htmlspecialchars_decode( $file1 ));
}

if ( strtoupper( substr( $file2, 0, 5 ) ) <> '<?PHP' ){
	file_put_contents("config/custom_strings_inc.php",  htmlspecialchars_decode( $file2 ));
}

if ( strtoupper( substr( $file3, 0, 5 ) ) <> '<?PHP' ){
	file_put_contents("config/custom_functions_inc.php",  htmlspecialchars_decode( $file3 ));
}

print_header_redirect( 'plugin.php?page=CustomConfig/manage_CustomConfig_page' );