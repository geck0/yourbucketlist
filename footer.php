    
    <footer class="container">
    <div class="column2">
        	<p>
        	    	<ul type="none"> 
        				<li><a href="about.html" class="">About</a></li> 
        				<li><a href="http://yourbucketlistblog.tumblr.com/" class="">Blog</a></li> 
        			</ul>
        			</p>
        	    </div><!-- end #column1 -->
        	
        	    <div class="column2">
        	    	<p>
        	    	<ul type="none"> 
        				<li><a href="http://www.facebook.com/urbucketlist" class="">Facebook</a></li> 
        				<li><a href="http://twitter.com/#!/yourbucketlst" class="">Twitter</a></li> 
        			</ul> 
        			</p>
        	    </div><!-- end #column2 -->
        	    <div class="column3">
        	    	<p>
        	    	<ul type="none"> 
        				<li><a href="feedback.html" class="">Feedback</a></li> 
        				<li><a href="contact.html" class="">Contact</a></li> 
        			</ul>
        			</p>
        	    </div><!-- end #column3 -->
        	    <div class="column4">
        	    	<p>
        	    	<ul type="none"> 
        				<li><a href="press.html" class="">Press</a></li> 
        				<li><a href="careers.html" class="">Careers</a></li>
        			</ul>
        			</p>        
        		</div><!-- end #column4 -->
      <div class="copyright">
      	<p>&copy;yourbucketli.st  2011</p>
      	</div>
    </footer> <!-- /footer -->
    
	<section id="scripts">
		   <div id="fb-root"></div>
			<script>
			  window.fbAsyncInit = function() {
			    // init
			    FB.init({
			      appId      : '268724529838969',
			      status     : true, 
			      cookie     : true,
			      oauth 	 : true,
			      xfbml      : true
			    });
			    
			    // check if user is logged in
			    FB.getLoginStatus(function(response) {
			    
		         // if logged in, get lists
		         if (response.authResponse) {
		         
		            FB.api('/me', function(response) {
		               
		               var myname = response.name,
		                   myemail = response.email,
		                   mypicture = response.picture;
		                   
		                   console.log(mypicture);
		               
		               
		               document.cookie = "name="+myname+";expires=15/02/2012 00:00:00";
		               document.cookie = "email="+myemail+";expires=15/02/2012 00:00:00";
		               
		               var html = '<span>' + myname + '\'s List</span>' +
		                   '<img src="' + mypicture + '" />';
		
		               $('.nav').append(html);
		               
		               var href = location.href;
		               
		               if (href.indexOf("mylist") == -1) {
		               
		                  window.location = "mylist.php";
		               
		               }
		               
		            });
		            
		         // if not logged in, show login button
		         } else {
		            
		            document.getElementById('login_button').style.display = 'block';
		            document.getElementById('login_tag').style.display = 'block';
		         }
		         
		      });
		       
		      FB.Event.subscribe('auth.login',
		          function(response) {
		              FB.api('/me', function(response) {
		               var myname = response.name;
		                              
		               var html = '<span>'+myname+'\'s List</span>';
		
		               $('.nav').append(html);
		               
		            });
		                            
		          }
		      );
			    
			  };
			(function(d){
		     var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
		     js = d.createElement('script'); js.id = id; js.async = true;
		     js.src = "//connect.facebook.net/en_US/all.js";
		     d.getElementsByTagName('head')[0].appendChild(js);
		   }(document));
			</script>
	
		
		
		
		<!-- Change UA-XXXXX-X to be your site's ID 
		<script>
		  window._gaq = [['_setAccount','UA-23292973-1'],['_trackPageview'],['_trackPageLoadTime']];
		  Modernizr.load({
		    load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
		  });
		</script> -->
		
		<!--[if lt IE 7 ]><script defer src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
		    <script defer>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})});</script><![endif]-->
		
	</section>
  </body>
</html>
