<!DOCTYPE html>
<html>
<head>

  <title>Registraion</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
 <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/jquery.validate.js"></script>
 <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/jquery.validate.min.js"></script>
 <script type="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/additional-methods.js"></script>
 <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/additional-methods.min.js"></script>

  <style type="text/css">

  	.error
  	{
  		color:red;

  	}

  	.check
  	{
  		margin-top:2%;
  	}
  	.check:hover
  	{
  		cursor: pointer;

  	}

</style>

</head>

<?php

if ($message = $this->session->flashdata('users'))
{
	?>
       <h5 style="color:red;"> <?php echo $message; ?></h5>

<?php
}

?>

	<body style="margin-left:5%;">

	<a href="<?php echo site_url('admin/tours'); ?>" class="btn btn-primary" style="margin-top:1%;margin-bottom:1%; ">Back</a>



		<form action=""  method="post" id="validate_form" >

		<div id="form_level1" class="level">
			<h3>Tours / Add Tour</h3>


		<i class="fa fa-file-text-o next"  id="next1"  style="font-size:36px;margin-left:15%;margin-top:-15%;"></i>

		<div class="row">
				<div class="form-group col-md-3">
					<label for="title">Title:</label>
					<input type="text" name="title" class="form-control input-md " id="title" autocomplete="off"
						placeholder="Maximum 60 Characters Allowed" >
				</div>
		</div>

		<div class="row">

			<div class="form-group">

			   <div class="col col-md-3">

				<label for="countries">Country:</label>
				<select class="form-control input-md" id="countries" name="country">
					<option value="">Select Country</option>

<?php

foreach ($countries as $country)
{
	?>
 				<option value="<?php echo $country['id']; ?>"><?php echo ucwords($country['name']); ?></option>

 <?php
}

?>
				</select>
			</div>


			<div class="col col-md-3">

	  			<label for="city">City:</label>
   				<select name="city" id="city" class="form-control input-md city">
    				<option value="">Select City</option>
   				</select>
  		   </div>

  		  <div class="col col-md-3">

	  		<label for="language">Language:</label>
   			<select name="language" id="language" class="form-control input-md lang">
    			<option value="">Select Language</option>

   			</select>
  	 	 </div>

  		</div>
  	 </div>
  	 <br>
  	  <div class="row">
  	 		  <div class="col col-md-3 city_check">

  	 		  	 <input type="checkbox" name="new_city" id="new_city">
  	 		  	 <label for="new_city"><b style="color:#E926AF;">My City Is Not Listed.</b></label>

  	 		  </div>

  	 		    <div class="col col-md-3">

  	 		  	 <input type="text" name="add_city" id="add_city" style="display:none;" placeholder="Enter City Name" class="form-control input-md" >

  	 		  </div>
  	  </div>

  	  <br>
  	   <div class="row">

  	 		  <div class="col col-md-3">

  	 		  	 <input type="checkbox" name="new_language" id="new_language" class="lang">
  	 		  	  <label for="new_language"><b style="color:#E926AF;">I want to Submit My Tour in Another Language.</b></label>

  	 		  </div>

  	 		  <div class="col col-md-3">

  	 		  	 <input type="text" name="add_language" style="display:none;" id="add_language"  placeholder="Enter New Language" class="form-control input-md">

  	 		  </div>
  	  </div>
</div>
		
		
		<div id="form_level2" class="level" name="frm3" style="display:none;">
			<i class="fa fa-file-text-o next"  id="next2"  style="font-size:36px;margin-left:15%;margin-top:-15%;"></i>Next

			<h3>How Many Checkpoints Do You Have?</h3>

			<select id="checkpoints">
				<option>Select Number</option>
				<option>1</option>
				<option>2</option>
				<option>3</option>

			</select>

			<div id="show_check">

			</div>



		</div>

		<br>

		<div id="form_level3" class="level"  >
					<i class="fa fa-file-text-o next"  id="next3"  style="font-size:36px;margin-left:15%;margin-top:-15%;"></i>Next
			<input type="text" name="">level 3
		</div>
</form>
	</body>
</html>

<script type="text/javascript">


	$(document).ready(function($)
	{

		// Form Hide Show On Different Levels
		
		$('#form_level2').show();

		$('#form_level1').hide();
		$('#form_level3').hide();


	///////////////////////   DIV:LEVEL-1 STARTS HERE  ////////////////////////////////////////////////
	

	//------------------ FILL SELECT BOXES OF COUNTRY-CITY-LANGUAGE  ------------------------------------
	
	
		$('#countries').change(function(event) {

			var country_id  = $(this).val();

			$.ajax({
				url: '<?php echo site_url('admin/tours/fill'); ?>',
				type: 'POST',
				data:
				{
					country_id: country_id
				},
				success:function(html)
				{
					 $('#city').html(html);

				}
			})


		});

		$('#city').change(function(event) {

			var city_id  = $(this).val();

			$.ajax({
				url: '<?php echo site_url('admin/tours/fill'); ?>',
				type: 'POST',
				data:
				{
					city_id: city_id
				},
				success:function(html)
				{
					 $('#language').html(html);
				}
			})


		});

// ---------------- END: FILL SELECT BOXES OF COUNTRY-CITY-LANGUAGE ---------------------------------


// ----------------- Put Textbox as per Checked Value to add new Language and City -----------------------
	

		$('#new_city').click(function()
		{
	  		if($(this).is(':checked'))
	  		{
	  			$('#add_city').show();
	  			$("#city").find('option').attr("selected",false) ;
	  			$('.city').attr('disabled', 'disabled');
	  		}
	  		else
	  		{
	  			$('.city').removeAttr('disabled');
	  			$('#add_city').hide();
	  		}
		})

		$('#new_language').click(function()
		{
	  		if($(this).is(':checked'))
	  		{
	  			$('#add_language').show();

	  		}
	  		else
	  		{
	  			$('#add_language').hide();
	  		}
		})

	});

// ----------------END: Put Textbox as per Checked Value to add new Language and City ------------------------------

// -------------------First Div Button Click starts Here  --------------------------------------------------


		 $('#next1').click(function(event)
		 {
		 	event.preventDefault();

//--------------------------------- Jquery Validations------------------------------------------

		$("#validate_form").validate({


			rules:
			{
				title:
				{
				    required:true,
				    maxlength:60
				}
		
			},
			messages:
			{
				title:
				{
				    required:"Tour Title Is Required.",
				    maxlength:"<h6><b>Please Enter Less than or Equal to 60 Characters.</b></h6>"
				}
			},

			submitHandler: function(form) { 


		 	var title 	  = $('#title').val();
			var countries = $('#countries').val();


			var city = '';
			var lang = '';

///City..............................................................

			if($.isNumeric($('.city').val()))
			{

				city = $('.city').val();

			}
			else
			{
				city = $('#add_city').val();
			}

			// if(city=='')
			// {
			// 	alert("Please Fill Your City");
			// 	return false;
			// }

///Language..............................................................

			if($.isNumeric($('.lang').val()))
			{
				lang  = $('.lang').val();
			}
			else
			{
				lang = $('#new_language').val();
			}

			if(lang=='')
			{
				alert("Please Fill Your Language");
				return false;
			}

//Pass Data To Controller------------------------------------------------

			var dataString = title+city+lang+countries;

			$.ajax({
				url: '<?php echo site_url('admin/tours/add'); ?>',
				type: 'POST',
				data: dataString,
				// {
				// 	title 		: title,
				// 	city  		: city,
				// 	lang  		: lang,
				// 	countries	:countries

				// },
				success:function(data)
				{	
					alert('12');
						console.log(data);
						$('#form_level1').hide();
		 				$('#form_level3').hide();
		 				$('#form_level2').show();
				}
			});
			return false;

		}
	});
		

	});


	// ------------------------First Div Button Click Ends Here  ---------------------------------------------
	
	///////////////////////////////  DIV:LEVEL-1 ENDS HERE  //////////////////////////////////////////////////



	/////////////////////////// DIV:LEVEL-2 STARTS HERE  ////////////////////////////////////////////////////


	//----------------------- Display Checkpoints As per Dropdown Value Selected ------------------------------
	
		$('#checkpoints').change(function(event)
		{

			var counts = $(this).val();

			$('#show_check').empty();

			for (var i = 0; i <= counts-1; i++)
			 {

				$('#show_check').append("<div class='checkpoint ' id='checkpoint'><i class='glyphicon glyphicon-plus-sign check'></i>Checkpoints <input type='checkbox' ><div class='details'></div><br></div>");
			 }
		});

	//----------------------- END: Display Checkpoints As per Dropdown Value Selected ----------------------------

    //----------------------- Per Check-box plus Sign- View More ------------------------------------------------


			$(document).on('click', '.check', function(event) 
			{
				event.preventDefault();
				$(this).append("<br><input type='text'>");

				
			});

	//----------------------- END : Per Check-box plus Sign- View More --------------------------------------------------------


	
		//  $('#next2').click(function(event)
		//  {
		//  	$('#form_level1').hide();
		//  	$('#form_level2').hide();
		//  	$('#form_level3').show();

		// });

	/////////////////////////// DIV:LEVEL-2 ENDS HERE  ////////////////////////////////////////////////////


	
</script>




