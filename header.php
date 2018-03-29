<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

<script>
	$(document).ready(function() 
		{
		 $(".account").click(function()
		  { 
		  	var X=$(this).attr('id'); 
		  	if(X==1) 
		  		{ 
		  			$(".submenu").hide();
		  			 $(this).attr('id', '0'); 
		  			} 
		  			else
		  			 { 
		  			 	$(".submenu").show(); 
		  			 	$(this).attr('id', '1');
		  			 	 } 
		  			 	}); 
		 $(".submenu").mouseup(function() 
		 	{ 
		 		return false 
		 	});
		 	 $(".account").mouseup(function()
		 	  { return false });
		 	   $(document).mouseup(function() 
		 	   	{ $(".submenu").hide(); 
		 	   	$(".account").attr('id', '');
		 	   	 });
		 	   	  });
</script>
<script>
if($(window).width()<768)
	{
		
		$("#btn1").click(function(){
			alert('hello');
		
		});
	}
</script>
</head>
<body>
<header>
	<div class="container-fluid">
		<div class="row">
            <div class="col-md-4 col-sm-4">
			   <div class="logo">
			       <img src="img/logo2.png" class="img-responsive" id="logoimg">
			   </div>
		    </div>
		<div class="col-md-8 col-sm-8 div1">
			<div class="search">
			    <!-- <div class="form-group has-feedback"> -->
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>  
            </div>
            </div>
        
			<!-- <div class="imgicon"> -->
		        <div class="dropdown1"> 
		            <a href="#" class="account">
		              <img src="img/dummy.png" id="user-img" class="profile-circle"> 
		            </a> 
		                <div class="submenu" style="display: none;">
		                    <ul class="root">  
		                       <li><a href="#" >Profile</a></li> 
		                       <li><a href="#">Chang password</a></li> 
		                       <li><a href="#">Sign Out</a></li>
		                    </ul>
		                </div>
			</div>
		</div>
	</div>
	<!-- <button id="btn1">Click Me!</button> -->
       </div>
</header>
</body>
</html>

