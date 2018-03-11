<?php
	require('db_conn.php');
?>
<html>
	<head>
		<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-115094610-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-115094610-1');
    </script>
    
    <!--Responsive-->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

		<link rel="icon" type="image/png" href="favicon.ico"/>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <script src="jquery.js"></script>		
		<script src="bootstrap/js/bootstrap.min.js"></script>

		<!--google font-->
		<link href="https://fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet">
		<style>
			body{
				margin: 0px;
				padding: 0px;
			}

			#search-wrapper{
				display: inline-block;
				padding-left: 4%;
				padding-right: 4%;
				margin: 0px;
			}
			#search{
				width: 100%;
				border:1px solid grey;
				overflow:hidden;
				padding: 0px;
			}
			#search input{
				border:0;
			}

			.live-item{
				
				padding: 5px;
				color: blue;
				background-color: white;	
			}
			.live-item:hover{
				background-color: lightblue;
				cursor:pointer;
			}
			#search-wrapper form{
				margin:0px;
				padding: 0px;
			}
			#livesearch{
				border: 1px solid grey;
				padding: 0px;
				display: none;
				position: absolute;
				width: 100%;
				z-index: 1;
			}

			.live-select{
				background-color:lightblue; 
			}
			
			#courseguru{
      	font-family: 'Berkshire Swash', cursive;
      	color: #cc0066;
			}

		</style>

		<script>
			
			$(document).ready(function(){
				var resultBox=0; //0-closed 1-open
				var itemIndex=0;
				var boxLength;
				var itemValue;
				$("#search input").keyup(function(event){
					//console.log("key pressed");
					//check if keycode is not ESC(27) / RIGHT(37) / UP(38) / LEFT(39) / BOTTOM(40)
					if(event.keyCode == 27){
						$("#livesearch").hide();
					}
					else if(event.keyCode == 40 && resultBox){
						console.log("down key pressed " + itemIndex +" "+ boxLength);
						$(".live-item").removeClass("live-select");
						var item = $("#livesearch .live-item").eq(itemIndex);
						$(item).addClass("live-select");
						itemValue = $(item).text();
						$("#searh-input").val(itemValue);
						itemIndex = (+itemIndex + 1)%boxLength;
						//console.log(itemIndex);
					}
					else{
						var q = $(this).val();
						if(q){
							$.ajax({
		            url: 'livesearch.php',
		            type: 'post',
		            data: {query:q},
		            dataType: 'json',
		            success: function(data){
		            	boxLength = data.length;

		            	//console.log(data);            	
		            	$("#livesearch").empty();
		            	//check that the returned obj is not empty
		            	if(!$.isEmptyObject(data)){
		            		//console.log(data);
		            		$("#livesearch").show();
										resultBox = 1;
		            		//loop to print all obj values to #livesearch
		            		$.each(data, function(index, value) {
										  $("#livesearch").append('<div class="live-item">'+data[index]+'</div>');
										});
										//close #livesearch when clicked anywhere else
									  $(document).click(function(event){
									  	//console.log("closing");
									  	event.stopPropagation();
									  	$("#livesearch").hide();
									  });
									  itemIndex = 0;
										
		            	}
		            	else{
		            		$("#livesearch").hide();
		            		resultBox=0;
		            	}
			          }                  	                  
	      			});
						}
						else{
							$("#livesearch").empty();
							$("#livesearch").hide();
							resultBox=0;
						}										
					}

				});

				$("#livesearch").on('click','.live-item',function(){					
					var choice = $(this).text();
					$("#searh-input").val(choice);
					$("#search-form").submit();
				});
			});			
		</script>
	</head>
	<body>
		<!-- Navigation -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="#">Course Guru</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNav">
		    <ul class="navbar-nav ml-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">About Us</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Login</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#" data-toggle="modal" data-target="#registerModal">Register</a>
		      </li>
		      
		    </ul>
		  </div>
		</nav>
		
<div id="loginModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Login Page</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					
				</div>
				<div class="modal-body">
					<ul class="nav nav-tabs">
		
						<li><a data-toggle="tab" href="#studentLogin"><h2>Student/</h2></a></li>
						<li><a data-toggle="tab" href="#classLogin"><h2>Classes<h2></a></li>
					</ul>
		
		<div class="tab-content">
			
			<div id="studentLogin" class="tab-pane fade">
				<label> Email </label>
				<input type="email" name="email" id="email" class="form-control" placeholder="Enter your Email" />
				<br />
			
				<label> Password </label>
				<input type="password" name="password" id="password" class="form-control" placeholder="Enter your Password"  />
				<br />
				<button type="button" name="login_button" id="login_button" class="btn btn-warning">Login</button>
			</div>
			
			
			
			<div id="classLogin" class="tab-pane fade">
				<label> Email Id: </label>
				<input type="email" name="email"  class="form-control" placeholder="Enter your Email" />
				<br />
			
				<label> Password </label>
				<input type="password" name="password"  class="form-control" placeholder="Enter your Password"  />
				<br />
				<button type="button" name="login_button"  class="btn btn-warning">Login</button>
			</div>
					
				</div>
			</div>
		</div>
	</div>
</div>

<div id="registerModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Registration Page</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					
				</div>
				<div class="modal-body">
					<ul class="nav nav-tabs">
		
			<li><a data-toggle="tab" href="#student"><h2>Student/</h2></a></li>
			<li><a data-toggle="tab" href="#classes"><h2>Classes<h2></a></li>
		</ul>
		
		<div class="tab-content">
			
			<div id="student" class="tab-pane fade">
				<label> Email: </label>
				<input type="email" name="email" class="form-control" placeholder="Enter your Email" />
				<br />
			
				<label> Password: </label>
				<input type="password" name="password" class="form-control" placeholder="Enter your Password"  />
				<br />
				
				<label> Confirm Password: </label>
				<input type="password" name="cpassword" class="form-control" placeholder="Confirm Password"  />
				<br />
				<button type="button" name="login_button" id="login_button" class="btn btn-warning">Register</button>
			</div>
			
			
			
			<div id="classes" class="tab-pane fade">
				<label> Email Id: </label>
				<input type="email" name="email"  class="form-control" placeholder="Enter your Email" />
				<br />
			
				<label> Password: </label>
				<input type="password" name="password"  class="form-control" placeholder="Enter your Password"  />
				<br />
				
				<label> Confirm Password:</label>
				<input type="password" name="cpassword"  class="form-control" placeholder="Enter your Password"  />
				<br />
				<button type="button" name="login_button" class="btn btn-warning">Register</button>
			</div>
						
				</div>
			</div>
		</div>
	</div>
	</div>

		<br>
		<br>
		<br>
		<br>
		<br>
		<div class="container-fluid">
			<div class="row">
			  <h2 id="courseguru" class="text-center col">Course Guru</h2>
			</div>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6" id="search-wrapper">
					<form id="search-form" method="POST" action="search.php" style="position:relative">
					  <div class="input-group" id="search">
					    <input id="searh-input" type="text" name="query" class="form-control" placeholder="Search for a course" autocomplete="off" autofocus="autofocus">
					  </div>
					  <div id="livesearch"></div>
					  <br>
					  <div class="row">
						  <div class="col-md-4"></div>
						  <div class="col-md-4" align="center">
						  	<input type="submit" class="btn btn-primary" value="Guru Search">
						  </div>
					  </div>			
					</form>
				</div>
			</div>
		</div>

	</body>
</html>