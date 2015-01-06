var sections = 6;
var delay = 400;
var state = 'false';
var menu = false;
var menu_initialized = false;
var initialized = false;
var button_color = false;
var content_color = false;
var lesson_info = false;

$( document ).ready
(	
	function()
	{
	
		button_color = $( '.menuitem' ).css( 'background-color' );
		content_color = $( '#content' ).css( 'background-color' );
		
		$( document ).keypress
		(
			function( e )
			{
				if( ( e.which == 122 && e.ctrlKey ) || ( e.which == 26 ) )
				{ // Ctrl + z
					toggle_menu();
				}
			}
		);
		
		$( '#0' ).click( function() {
			if( state != 0 && state != 'false' )
			{
				clear(true);
			}
			else
			{
				clear(false);
			}
			change( 0, '#000000' );
			if( state == 0 )
			{
				get_lessons( 0, 'Home', true );
			}
		});
		
		$( '#1' ).click( function() {
			if( state != 1 && state != 'false' )
			{
				clear(true);
			}
			else
			{
				clear(false);
			}
			change( 1, '#004700' );
			if( state == 1 )
			{
				get_lessons( 1, 'Web', false );
			}
		});
		
		$( '#2' ).click( function() {
			if( state != 2 && state != 'false' )
			{
				clear(true);
			}
			else
			{
				clear(false);
			}
			change( 2, '#002E4C' );
			if( state == 2 )
			{
				get_lessons( 2, 'Forensics', false );
			}
		});
		
		$( '#3' ).click( function() {
			if( state != 3 && state != 'false' )
			{
				clear(true);
			}
			else
			{
				clear(false);
			}
			change( 3, '#330000' );
			if( state == 3 )
			{
				get_lessons( 3, 'Hardware', false );
			}
		});
		
		$( '#4' ).click( function() {
			if( state != 4 && state != 'false' )
			{
				clear(true);
			}
			else
			{
				clear(false);
			}
			change( 4, '#660066' );
			if( state == 4 )
			{
				get_lessons( 4, 'Software', false );
			}
		});
	
		$( '#5' ).click( function() {
			if( state != 5 && state != 'false' )
			{
				clear(true);
			}
			else
			{
				clear(false);
			}
			change( 5, '#996633' );
			if( state == 5 )
			{
				get_lessons( 5, 'Other', false );
			}
		});
		
		initialize();
	}
);

function clear( instant )
{
	if( !instant && ( $( 'object' ).length > 0 || $( '#frame' ).length > 0 ) )
	{
		$( '#content' ).hide( { effect: "fade", duration: 1000, queue: false, complete: function() {
			$( '#content' ).empty();
			$( '#content' ).show();
		}});
	}
	else
	{
		$( '#content' ).empty();
		$( '#content' ).css( 'background-color', content_color );
	}
}

function open_lesson( link )
{
	clear(true);
	$( '#content' ).html( '<object id="obj" data="' + link + '"/>' );
}

function open_info( id, title )
{
	var formData = new FormData();    
	formData.append( 'id', id );
	
	$.ajax({
		type: 'POST',
		url: 'ajax.php?m=get_info',
		data: formData,
		processData: false, 
		contentType: false,
		success: function( xml )
		{
			var data = $( xml ).find( 'data' ).text();
			var location = $( xml ).find( 'location' ).text();
			infobox = $( '<div>' ).attr( 'id', 'info' + id ).appendTo( $( '#lesson' + id ) );
			infobox.hide();
			data = $( '<span>' ).html( data ).appendTo( infobox );
			lesson = $( '<a>' ).text( 'View ' + title ).appendTo( infobox );
			infobox.slideDown( 1000 );
			
			lesson.click
			(
				function(e)
				{
					e.preventDefault();
					open_lesson( location );
				}
			);	
		}
		
	});
}

function get_lessons( category, heading, home )
{
	var formData = new FormData();    
	formData.append( 'category', category );
	
	$.ajax({
		type: 'POST',
		url: 'ajax.php?m=get_lessons',
		data: formData,
		processData: false, 
		contentType: false,
		success: function( xml )
		{
			var frame = $( '<div>' ).attr( 'id', 'frame' ).appendTo( $( '#content' ) );
			$( '<h1>' ).text( heading ).appendTo( frame );
			
			if( home )
			{
				$( '<p>' ).css( 'text-align', 'center' ).text( 'Welcome to Learn. New to this site? Click on "Introduction to Learn" below to get an overview.' ).appendTo( frame );
			}
			
			if( $( xml ).find( 'fail' ).text() == 'true' )
			{
				$( '<p>' ).css( 'text-align', 'center' ).text( 'No lessons currently available.' ).appendTo( frame );
			}
			else
			{
				$( xml ).find( 'lesson' ).each
				(
					function() {
						var id = $( this ).find( 'id' ).text();
						var title = $( this ).find( 'title' ).text();
						
						lessonbox = $( '<div>' ).attr( { 'class': 'lessonbox', 'id': 'lesson' + id } ).appendTo( frame );
						
						t = $( '<h3>' ).text( title ).appendTo( lessonbox );
						
						lessonbox.click
						(
							function()
							{
								if( $( '#info' + id ).length )
								{
									$( '#info' + id ).slideUp( 1000, function() {
										$( '#info' + id ).remove();
									});

								}
								else
								{
									open_info( id, title );
								}
							}
						);					
					}
				);
			}
			frame.show( 'fade', 1000 );
		}
	});
}

function init_menu()
{
	if( !menu_initialized )
	{
		for( i=0; i < sections; i++ )
		{
			var selector = '#' + i;
			if( i == 0 )
			{
				$( selector ).show( "drop", { direction: "left" }, 1000 );
			}
			else
			{
				$( selector ).delay( delay * i ).show( "drop", { direction: "left" }, 1000 );
			}
		}
	}
	menu_initialized = true;
}

function opacity( id )
{
	for( i=0; i < sections; i++ )
	{
		var selector = '#' + i;
		if( i != id )
		{
			$( selector ).animate( { opacity: 0.5, marginLeft: '-10' }, 1000 );
		}
	}
}

function change( id, color )
{
	if( state == 'false' || state != id )
	{
		if( state != id && state != 'false' )
		{
			$( '#' + state ).animate( { opacity: 0.5, marginLeft: '-10', backgroundColor: button_color }, 1000 );
		}
		$( '#' + id ).animate( { backgroundColor: color, marginLeft: '0', opacity: 1 }, 1000 );
		$( '#content' ).animate( { backgroundColor: color}, { duration: 1000, queue: false } );
		opacity( id );
		state = id;
	}
	else
	{
		for( i=0; i < sections; i++ )
		{
			var selector = '#' + i;
			$( selector ).animate( { opacity: 1, marginLeft: '0', backgroundColor: button_color }, 1000 );
		}
		$( '#content' ).animate( { backgroundColor: content_color }, { duration: 1000, queue: false } );
		state = 'false'
	}
}

function toggle_menu()
{
	if( !menu )
	{
		$( '#content' ).animate( { left: 230 } );
		init_menu();
		menu = true;
	}
	else
	{
		$( '#content' ).animate( { left: 0 } );
		menu = false;
	}
}

function initialize()
{
	if( !initialized )
	{
		$.ajax({
			type: 'GET',
			url: 'ajax.php?m=get_law',
			success: function( message )
			{
				$( '<p>' ).attr( 'id', 'i1' ).text( message ).appendTo( '#content' );
				$( '<p>' ).attr( 'id', 'i3' ).text( "New to this site? Click the Home tab." ).appendTo( '#content' );
				
				$( '#i1' ).show( "fade", 2000, function() {
					if( !menu )
					{
						toggle_menu();
					}
					$( '#i3' ).show( "fade", 2000 );
				});
			}
		});
	}
	initialized = true;
}