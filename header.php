<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Yourbucketli.st - Kick your bucket list</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

  </head>

  <body>
    <nav role="navigation" class="topbar">
      <div class="fill">
        <div class="container">
          <img align="left" width="80" hight="105" src="images/logoicon.png">
            <a class="brand" href="/">Your Bucket List</a>
            <ul class="nav">
          
            </ul>
          <div class="pull-right btn info">BETA!</div>
        </div>
      </div>
    </nav> <!-- /navigation -->

   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
   <script>window.jQuery||document.write('<script src="js/jquery-1.6.4.min.js"><\/script>');</script>
   
   <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=true"></script>
   <script src="http://code.google.com/apis/gears/gears_init.js"></script>
       
   <script defer src="js/plugins.js"></script>
   <script defer src="js/script.js"></script>
   <script defer src="js/bootstrap/bootstrap-modal.js"></script>
   
   <script defer src="js/form_submit.js"></script>
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
   
   
   <!-- /accordian  -->
   <script type="text/javascript">
   jQuery(document).ready(function() {
     jQuery(".content").hide();
     //toggle the componenet with class msg_body
     jQuery(".heading").click(function()
     {
       jQuery(this).next(".content").slideToggle(100);
     });
   });
   </script>
   <!-- /accordian  -->
   
   <!-- kiss metrics -->
   <script type="text/javascript">
     var _kmq = _kmq || [];
     function _kms(u){
       setTimeout(function(){
         var s = document.createElement('script'); var f = document.getElementsByTagName('script')[0]; s.type = 'text/javascript'; s.async = true;
         s.src = u; f.parentNode.insertBefore(s, f);
       }, 1);
     }
     _kms('//i.kissmetrics.com/i.js');_kms('//doug1izaerwt3.cloudfront.net/4f0f29789d36ec9d3e57dcea122fd3a797a25cc5.1.js');
   </script>
      <!-- /kiss metrics -->
   
   
   