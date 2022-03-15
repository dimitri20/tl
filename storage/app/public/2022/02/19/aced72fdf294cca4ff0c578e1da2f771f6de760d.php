
<?php
/*
// Restrict who can access this script.
$permitted_ips = array('12.34.56.78', );
if (in_array($_SERVER['REMOTE_ADDR'], $permitted_ips) == false) {
    header('HTTP/1.0 403 Forbidden');
    die();
}
*/
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8" />
<title>List Active Plugins</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
<h1>List Active Plugins</h1>
<?php

$csv_output = true;  // Set to false for html style.

define('WP_USE_THEMES', false);

/** Loads the WordPress Environment and Template */
require( dirname( __FILE__ ) . '/wp-blog-header.php' );

// Check if get_plugins() function exists. This is required on the front end of the
// site, since it is in a file that is normally only loaded in the admin.
if ( ! function_exists( 'get_plugins' ) ) {
	require_once ABSPATH . 'wp-admin/includes/plugin.php';
}

$all_plugins = get_plugins();
$active_plugins = get_option('active_plugins');

if ( $csv_output ) { echo '<pre>'; }
foreach ( $active_plugins as $index => $plugin ) {
	if ( array_key_exists( $plugin, $all_plugins ) ) {
		//var_export( $all_plugins[ $plugin ] );
        if ( $csv_output ) {
            echo join( "\t", array( $all_plugins[ $plugin ][ 'Name' ], $all_plugins[ $plugin ][ 'Version' ], $all_plugins[ $plugin ][ 'Description' ] ) ), "\n";
        } else {
            echo '<h2>', $all_plugins[ $plugin ][ 'Name' ], ' ('. $all_plugins[ $plugin ][ 'Version' ] .')</h2>';
            echo '<p>', $all_plugins[ $plugin ][ 'Description' ], '</p>';
        }
    }
}
if ( $csv_output ) { echo '</pre>'; }
?>
</body>