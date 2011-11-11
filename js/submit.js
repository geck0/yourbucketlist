(function ($) {

	$(document).ready(function () {
	
		var list = [],
			email = getCookie("email"),
			name = getCookie("name");
		
		submitHandler();
		
		function submitHandler () {
			$('#addItemButton').click(function () {
				var postString = '';
			
				addToList();
				createAndPostString();
				
			});
		}
		
		function addToList () {
			var listItem = '';
		
			listItem = $('#listInput').val();
			
			if (listItem != null) {
				$('<div><h2>' + listItem + '</h2></div>').insertBefore($('#bucketList > div:first'));
			} else {
				return false;
			}
		
		}
		
		function createAndPostString () {
			var postString = '';
			
			list = $('#bucketList > div > h2').map(function() { return this.innerHTML; });
			
			for (var i = 0, j = list.length; i < j; i++) {
				postString += '&input' + i + '=' + list[i];	
			}
			
			postString.slice(1);
			postString += '&email=' + email + '&name=' + name;
			
			$.ajax({  
				type: "POST",  
				url: "createlist.php",  
				data: postString,  
				success: function() {  
					
				}  
			});
		
		}
		
		function getCookie ( cookieName ) {
			var results = document.cookie.match ( '(^|;) ?' + cookieName + '=([^;]*)(;|$)' );
			
			if ( results ) {
				return ( unescape ( results[2] ) );
			} else {
				return null;
			}
		}
	
	});

})(jQuery);