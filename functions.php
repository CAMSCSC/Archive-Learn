<?php

if( !defined( 'INITIALIZED' ) )
{ // No direct call, needs config
	exit();
}

// General

function output_xml( $xml )
{
	header( 'Content-Type: text/xml' );
	exit( $xml->asXML() );
}

function get_lessons( $category )
{
	$database = Database::getConnection();
	
	$result = $database->query
	(
		"SELECT
			lessons.title,
			lessons.id
		FROM
			lessons
		WHERE
			lessons.category = '" . $database->real_escape_string( $category ) . "'
			AND lessons.hidden != 1
		ORDER BY
			lessons.title ASC"
	);

	if( !$result )
	{
		die( 'MySQL: Syntax error' );
	}

	$answer = array();
	
	$xml = new SimpleXMLElement( '<reply></reply>' );
	
	if( mysqli_num_rows( $result ) > 0 )
	{
		while( $answer = mysqli_fetch_assoc( $result ) )
		{
			$xml_lesson = $xml->addChild( 'lesson' );
			$xml_lesson->addChild( 'id', $answer['id'] );
			$xml_lesson->addChild( 'title', $answer['title'] );
		}
	}
	else
	{
		$xml->addChild( 'fail', 'true' );
	}

	return $xml;
}

function get_info( $id )
{
	$database = Database::getConnection();
	
	$result = $database->query
	(
		"SELECT
			*
		FROM
			lessons
		WHERE
			lessons.hidden != 1
			AND lessons.id = '" . $database->real_escape_string( $id ) . "'"
	);
	
	if( !$result )
	{
		die( 'MySQL: Syntax error' );
	}
	
	if( mysqli_num_rows( $result ) != 1 )
	{
		exit();
	}
	
	$answer = array();
	
	$xml_lesson = new SimpleXMLElement( '<reply></reply>' );
	
	while( $answer = mysqli_fetch_assoc( $result ) )
	{
		$xml_lesson->addChild( 'data', $answer['data'] );
		$xml_lesson->addChild( 'location', $answer['location'] );
	}
	
	return $xml_lesson;
}

function get_law()
{
	$f_contents = file("laws.txt");
	$line = $f_contents[array_rand($f_contents)];
	$data = $line;
	echo $data;
}

/*

// Get dem lessonz
function get_lessons( $category )
{
	$database = Database::getConnection();
	
	$result = $database->query
	(
		"SELECT
			*
		FROM
			lessons
		WHERE
			lessons.category = '" . $database->real_escape_string( $category ) . "'
			AND lessons.hidden != 1
		ORDER BY
			lessons.title ASC"
	);

	if( !$result )
	{
		die( 'MySQL: Syntax error' );
	}

	$answer = array();
	
	$xml = new SimpleXMLElement( '<reply></reply>' );

	while( $answer = mysqli_fetch_assoc( $result ) )
	{
		$xml_lesson = $xml->addChild( 'lesson' );
		$xml_lesson->addChild( 'id', $answer['id'] );
		$xml_lesson->addChild( 'title', $answer['title'] );
		$xml_lesson->addChild( 'data', $answer['data'] );
		$xml_lesson->addChild( 'location', $answer['location'] );
	}

	return $xml;
}


*/

?>