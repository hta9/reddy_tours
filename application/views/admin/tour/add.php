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

<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>

 <!-- <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script> -->
 <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/jquery.validate.js"></script>
 <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/jquery.validate.min.js"></script>
 <script type="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/additional-methods.js"></script>
 <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/additional-methods.min.js"></script>

<script type="text/javascript">
	var autocomplete;


function initAutocomplete() 
{

 var input = document.getElementsByClassName('location');
for (i = 0; i < input.length; i++) {
                 autocomplete = new google.maps.places.Autocomplete(input[i]);
             }
         }

</script>
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


	<i class="fa fa-file-text-o next"  id="next1"  style="font-size:36px;"></i>

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
		
<!-- .............................................................................................. -->

<div id="form_level2" class="level">

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

	<div id="checkpoint_bunch"  class="bunch check"  style="opacity:0" >
		<h2><i class='glyphicon glyphicon-plus-sign '></i>
		 Checkpoints	
		<input type='checkbox' disabled="true" >
	 	</h2><br><br>
			  
			  <label for="name">Name:</label> 
			 <input type='text' id="name"  class="form-control input-sm name">
			 <br>
			 <br>
			  <label for="name">Location:</label> 
			<input type='text' id="location" class="form-control input-sm location"><br>

	</div>
	<input type='text' id="location" class="form-control input-sm location"><br>
			
 
</div>
<!-- ........................................................................................... -->
	<br>

<div id="form_level3" class="level"  >
	
	<i class="fa fa-file-text-o next"  id="next3"  
		style="font-size:36px;margin-left:15%;margin-top:-15%;"></i>
		Next

	<div class="form-group" style="margin-top:3%;">
		<label for="description">Description</label>
		<textarea class="form-control" rows="5" id="description" name="description" style="width:30%;"></textarea>
	</div>

	<div class="row">

		<div class="col-md-3">
			<div class="form-group">
				<label for="price">Price</label>
				<input type="text"  class="form-control input-md price" name="price" id="price">
			</div>
		</div>

		<div class="col-md-3">
			<div class="form-group">
			   <input type="checkbox" class="input-group price" id="null_price" name="price">I Have No Clue.
			</div>
		</div>
	</div>

	<div class="form-group">

		<h2><b>Age Restrictions and Accessibility</b></h2>

			When Your Tour Is Suitable For All, Select All Icons
			<br>

<div class="row">

	<div class="col-md-3">
		<h3>Age Restriction</h3>

		<input type="radio" id="6" class="age" value="6" name="age"><label for="6">+6</label>
		<input type="radio" id="9" class="age" value="9" name="age"><label for="9">+9</label>
		&nbsp;
		<input type="radio" id="12" class="age" value="12" name="age"><label for="12">+12</label>
		<input type="radio" id="16" class="age" value="16" name="age"><label for="16">+16</label>
		<input type="radio" id="18" class="age" value="18" name="age"><label for="18">+18</label>
	</div>
			
	<div class="col-md-3">
		<h3>Accessibility</h3>
		<input type="checkbox" class="accessibility" id="wheelchair" value="wheelchair" name="accessibility[]">
		<label for="wheelchair">WheelChair</label>

		<input type="checkbox" class="accessibility" id="babystoller"  value="babystoller"  name="accessibility[]">
		<label for="babystoller">Babystoller</label>

		<input type="checkbox" class="accessibility" id="dogs"  value="dogs"  name="accessibility[]">
		<label for="dogs">Dogs</label>

	</div>

	</div>
 </div>
</div>

	<div id="congratulations" style="display:none;">
		
		<h1><b>CONGRATULATIONS!</b></h1>

		<h3>
			<b>Your Tour Is Under Review…</b>
		</h3>

		<h5>You Will Hear Back From Us Within 48H</h5>

	</div>

  </form>

 </body>
</html>

<script type="text/javascript">


	$(document).ready(function($)
	{

		// Form Hide Show On Different Levels
		// $('.bunch').hide();
		$('#form_level2').show();
		$('#form_level3').hide();
		$('#form_level1').hide();

	///////////////////////   DIV:LEVEL-1 STARTS HERE  ////////////////////////////////////

	//------------------ FILL SELECT BOXES OF COUNTRY-CITY-LANGUAGE  ----------------------
	
	
		$('#countries').change(function(event) 
		{
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


		$('#city').change(function(event)
		 {

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

// ---------------- END: FILL SELECT BOXES OF COUNTRY-CITY-LANGUAGE -----------------------


// ----------- Put Textbox as per Checked Value to add new Language and City -------------
	

		$('#new_city').click(function()
		{
	  		if($(this).is(':checked'))
	  		{
	  			$('#add_city').show();
	  			
	  			
	  			$("#city").val([]);
	  			$('.city').attr('disabled', 'disabled');
			
	  		}
	  		else
	  		{
	  			$('#city option[value="sel"]').attr("selected",true);
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

// -------END: Put Textbox as per Checked Value to add new Language and City -------

// ------------- First Div Button Click starts Here  -------------------------------


		 $('#next1').click(function(event)
		 {
		 	event.preventDefault();

//--------------------------------- Jquery Validations------------------------------


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


			$.ajax({
				url: '<?php echo site_url('admin/tours/add'); ?>',
				type: 'POST',
				data: 
				{
					title 		: title,
					city  		: city,
					lang  		: lang,
					countries	:countries

				},
				success:function(data)
				{	
					// alert('12');
						console.log(data);
						 $('#form_level1').hide();
		 			 	 $('#form_level3').show();
		 			// 	 $('#form_level2').show();
				}
			});

	});

	// -----------First Div Button Click Ends Here  -----------------------------------
	
	//////////// DIV:LEVEL-1 ENDS HERE  //////////////////////////////////////////////////


	//////////// DIV:LEVEL-2 STARTS HERE ////////////////////////////////////////////////


	//---------- Display Checkpoints As per Dropdown Value Selected ------------------
	
		$('#checkpoints').change(function(event)
		{

			var counts = $(this).val();

			$('#show_check').empty();

			for (var i = 0; i <= counts-1; i++)
			 {

				$('#show_check').append($('.bunch').html());
				
			 }
});
			  
	
</script>
 

 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClQ_Y_F3mJtS_6rpylRvn-8cREsaae29E&libraries=places&callback=initAutocomplete"
 async defer></script>
	

<script type="text/javascript">
	//-------------END: Display Checkpoints As per Dropdown Value Selected --------------------

    //-----------Per Check-box plus Sign- View More -------------------------------------------

   //  		$(document).on('click', '.check', function(event) 
			// {
			// 	event.preventDefault();
			// 	//alert('1');
			// 	$(this).closest('span').show();
				
			// });
			



	//------------ END : Per Check-box plus Sign- View More ---------------------
	
	 //----------- Auto Check-Checkbox -------------------------------------------


	//------------ END : Auto Check-Checkbox -------------------------------------


	
		 $('#next2').click(function(event)
		 {
		 	event.preventDefault();

		 	$('#form_level1').hide();
		 	$('#form_level2').hide();
		 	$('#form_level3').show();


		});

	/////////////////////////// DIV:LEVEL-2 ENDS HERE  ///////////////////////////////////


	////////////////////////// DIV:LEVEL-3 STARTS HERE  //////////////////////////////////

		$('#null_price').click(function()
		{
	  		if($(this).is(':checked'))
	  		{	
	  			$('#price').val("");
	  			$('#price').attr('disabled', 'disabled');
	  		}
	  		else
	  		{
	  			$('#price').removeAttr('disabled');
	  			
	  		}
		})

		$('#next3').click(function(event) 
		{		

				var description    = $('#description').val();		
				var age            = $(".age:checked").val();
				var price          = $('.price').val();
				var accessibility  = [];

				$(".accessibility:checked").each(function()
				{
   					 accessibility.push($(this).val());
				});


				var acc = accessibility.toString();

			$.ajax({
				url: '<?php echo site_url('admin/tours/add3'); ?>',
				type: 'POST',
	
				data: 
				{
					description 		: description,
					accessibility  		: acc,
					age  				: age,
					price				: price

				},
				success:function(data)
				{	
					$('#congratulations').show();

				}
			});
		});


	///////////////////////// DIV:LEVEL-3 ENDS HERE  /////////////////////////////////////////////
	
</script>



