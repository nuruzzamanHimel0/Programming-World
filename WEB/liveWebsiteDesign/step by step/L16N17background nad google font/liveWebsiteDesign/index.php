 <!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<script language="javascript" type="text/javascript">
    function clearText(field)
    {
        if (field.defaultValue == field.value) field.value = '';
        else if (field.value == '') field.value = field.defaultValue;
    }
    </script>
	
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
    <link href="style.css" type="text/css" rel="stylesheet">
	<script src="js/ajax.googleapis.js" type="text/javascript"></script>
	<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>
	
	<script type="text/javascript">
	$(window).load(function() {
		$('#slider').nivoSlider({
			effect:'random',
			slices:10,
			animSpeed:2000,
			pauseTime:8000,
			startSlide:0, //Set starting Slide (0 index)
			directionNav:false,
			directionNavHide:false, //Only show on hover
			controlNav:false, //1,2,3...
			controlNavThumbs:false, //Use thumbnails for Control Nav
			pauseOnHover:true, //Stop animation while hovering
			manualAdvance:false, //Force manual transitions
			captionOpacity:0.8, //Universal caption opacity
			beforeChange: function(){},
			afterChange: function(){},
			slideshowEnd: function(){} //Triggers after all slides have been shown
		});
	});
	</script>
</head>

<body>
	<div class="headerSection template clear">
    	<div class="logo"> 
        	<img src="image/demo.jpg" alt="logo image" >
            <h2> Wensite Title</h2>
            <p> Our website description</p>
        </div>
        <div class="social">
        	<img src="social/facebook.png" alt="FB" >
            <img src="social/linkIn.png" alt="FB" >
            <img src="social/google-plus-flat.png" alt="FB" >
            <img src="social/twitter.png" alt="FB" >
         </div>
    </div>
    <div class="nevigationSection template clear"> 
    	<ul>
        	<li><a id="active" href="index.php"> Home</a></li>
            <li><a href="about.php"> About</a></li>
            <li><a href="contuct.php"> Content</a></li>
          
        </ul>
     </div>
     <div class="sliderSection template clear">
     	 <div id="slider">
            <a href="#"><img src="image/slideshow/01.jpg" alt="nature 1"  /></a>
            <a href="#"><img src="image/slideshow/02.jpg" alt="nature 2" /></a>
            <a href="#"><img src="image/slideshow/03.jpg" alt="nature 3" /></a>
            <a href="#"><img src="image/slideshow/04.jpg" alt="nature 4"  /></a>
        </div>
     </div>
     
    <div class="contentSection template clear"> 
    	<div class="mainContent clear">
         	<div class="samePost clear">
            	<h2> Our post title here</h2>
                <img src="image/pic1.jpg" alt="post image">	
                <p>
        This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. 
                 </p>
                 <div class="readMore clear"><a href="post.php"> Read More</a> </div>
            
            </div>
            <div class="samePost clear">
            	<h2> Our post title here</h2>
                <img src="image/nature.jpg" alt="post image">	
                <p>
        This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. 
                 </p>
                 <div class="readMore clear"><a href="post.php"> Read More</a> </div>
            
            </div>
            <div class="samePost clear">
            	<h2> Our post title here</h2>
                <img src="image/pic2.jpg" alt="post image">	
                <p>
        This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. 
                 </p>
                 <div class="readMore clear"><a href="post.php"> Read More</a> </div>
            
            </div>
            <div class="samePost clear">
            	<h2> Our post title here</h2>
                <img src="image/popular.gif" alt="post image">	
                <p>
        This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. 
                 </p>
                 <div class="readMore clear"><a href="post.php"> Read More</a> </div>
            
            </div>
        
        </div>
        
        <div class="slidebar clear">
        	<div class="sameSidebar clear"> 
            	<h2> Latest Article Collection</h2>
              	<ul>
                    <li><a href="#">Post title ONE will go here</a></li>
                    <li><a href="#"> Post title TWO will go here</a></li>
                    <li><a href="#"> Post title THREE will go here</a></li>
                    <li><a href="#"> Post title FOUR will go here</a></li>
                    <li><a href="#">Post title FIVE will go here</a></li>
                    <li><a href="#"> Post title SIX will go here</a></li>
                    <li><a href="#"> Post title SEVEN will go here</a></li>
                    <li><a href="#"> Post title EIGHT will go here</a></li>
                </ul>
            </div>
            <div class="sameSidebar clear"> 
            	<h2> Sidebar Header One</h2>
                <p>
            This section will go slidebar. This section will go slidebar. This section will go slidebar. This section will go slidebar. This section will go slidebar.
            </p>
             <p>
            This section will go slidebar. This section will go slidebar. This section will go slidebar. This section will go slidebar. This section will go slidebar.
            </p>
            </div>
            <div class="sameSidebar clear"> 
            	<h2> Sidebar Header One</h2>
                <p>
            This section will go slidebar. This section will go slidebar. This section will go slidebar. This section will go slidebar. This section will go slidebar.
            </p>
             <p>
            This section will go slidebar. This section will go slidebar. This section will go slidebar. This section will go slidebar. This section will go slidebar.
            </p>
            </div>
        	
           
        </div>
        
        <div class="footerSection template clear">
        	<div class="footerMenu clear">
            <ul>
            	<li><a href="#"> Home</a></li>
                <li><a href="#"> About</a></li>
                <li><a href="#"> Content</a></li>
                <li><a href="#"> Privacy</a></li>
             </ul>
            </div>
            <p>@ Copyright Nuruzzaman Himel Ltd </p>
        
        </div>
        
    </div>

</body>
</html>