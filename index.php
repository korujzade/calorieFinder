<html>
	<head>
		<title> Calorie Finder </title>

	  	<meta charset="utf-8" />
	  	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	  	<meta name="viewport" content="width=device-width, initial-scale=1" />

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>    
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>

		<style>
			html, body {
			height:100%;
			}

			.container {
			 background-image:url("background.jpg");
			width:100%;
			height:100%;
			 background-size:cover;
			 background-position:center;
			 padding-top:100px;
			}

			.center {
			 text-align:center;
			}

			.white {
			color:white;
			}

			p {
			 padding-top:15px;
			 padding-bottom:15px;
			}

			button {
			 margin-top:20px;
			 margin-bottom:20px;
			}

			.alert {
			 margin-top:20px;
			display:none;
			}

		</style>

	</head>

	<body>

		<div class="container">

		<div class="row">

		<div class="col-md-6 col-md-offset-3 center">

		<h1 class="center white">Calorie Finder</h1>

		<p class="lead center white">Enter your food below to get a information for the calorie.</p>


		<form>
			<div class="form-group">
				<input type="text" class="form-control" name="food" id="food" placeholder="Eg.Apple, Nuts, Banana..." />
			</div>

			<button id="findMyCalorie" class="btn btn-success btn-lg">Find The Calorie</button>
		</form>

		<div id="success" class="alert alert-success">Success!</div>

		<div id="fail" class="alert alert-danger">Could not find data for that food. Please try again.</div>
		<div id="noFood" class="alert alert-danger">Please enter a food!</div>
		
		<div  style="margin: 20px; display:none"id="dvloader"><img src="loading.gif" /></div>

		<script type="text/javascript" src="jquery.js"></script>

		<script>
			$("#findMyCalorie").click(function(event) {

		 		event.preventDefault();

		 		$(".alert").hide();

		 		if ($("#food").val()!="") 
		 		{
		 			$("#dvloader").show();
		 			var food = $("#food").val();

		 			$.ajax({
		 				url: "result.php",
		 				method: "POST",
		 				data: {
		 					name: food
		 				},
		 				error: function(error) {
		 						//var res = $.parseJSON(result);
                        		$("#fail").html("Something happened wrong. Please try again").fadeIn();
                        		$("#dvloader").hide();
                        },
                        success: function(result) {
                        		var res = $.parseJSON(result);	
                        		$("#success").html(res.message.calorie + " kcal in " + res.message.value).fadeIn();
                        		$("#dvloader").hide();
                        }	
                    });	
		  		} 
		 		else 
		 		{
		   		  $("#noFood").fadeIn();
		 		}
		 	});
		</script>
	</body>
</html>




 
