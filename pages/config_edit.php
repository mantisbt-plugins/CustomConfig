<?php

# authenticate
auth_reauthenticate();
access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );

# Read results
form_security_validate( 'plugin_CustomConfig_config_update' );
$f_userid		= gpc_get_int( 'allowed_user',0 );
$f_update_files	= gpc_get_int( 'update_files',OFF);

# update results
plugin_config_set( 'allowed_user', $f_userid );
plugin_config_set( 'update_files', $f_update_files );
form_security_purge( 'plugin_CustomConfig_config_update' );

# redirect
print_header_redirect( plugin_page( 'config', true ) );
