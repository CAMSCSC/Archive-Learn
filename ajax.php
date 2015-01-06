<?php

include( 'config.php' );
include( 'functions.php' );

if( !isset( $_GET['m'] ) || !is_string( $_GET['m'] ) )
{
	exit();
}

switch( $_GET['m'] )
{
	case 'get_lessons':
		if( !isset( $_POST['category'] ) )
		{
			exit();
		}
		output_xml
		(
			get_lessons
			(
				$_POST['category']
			)
		);
		
	case 'get_info':
		if( !isset( $_POST['id'] ) )
		{
			exit();
		}
		output_xml
		(
			get_info
			(
				$_POST['id']
			)
		);
		
	case 'get_law':
		get_law();
}

?>