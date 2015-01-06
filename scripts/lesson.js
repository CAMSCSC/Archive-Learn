$( document ).ready
(	
	function()
	{
		$( document ).keypress
		(
			function( e )
			{
				if( ( ( e.which == 122 && e.ctrlKey ) || ( e.which == 26 ) ) && parent == top )
				{ // Ctrl + z
					parent.toggle_menu();
				}
			}
		);
		
		$( 'footer' ).click( function() {
			if( self == top )
			{
				location.href='http://learn.camscsc.org';
			}
			else
			{
				parent.toggle_menu();
			}
		});
	}
);