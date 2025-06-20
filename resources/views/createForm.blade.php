<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Flexy Free Bootstrap Admin Template by WrapPixel</title>
  <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/logos/favicon.png')}}" />
  <link rel="stylesheet" href="{{asset('assets/css/styles.min.css')}}" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden text-bg-light min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-6">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="./assets/images/logos/logo.svg" alt="">
                </a>
                <p class="text-center">Contact Us</p>
               

                <form action="" id="myform" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                    	<label class="form-label" for="name">Name</label>
                    	<input type="text" id="name" name="name" class="form-control" placeholder="Enter Name" value="Mohit">
		                <small class="text-danger name_error"></small>
                    </div>
                    <div class="mb-3">
                    	<label class="form-label" for="email">Email</label>
                    	<input type="text" id="email" name="email" class="form-control" placeholder="Enter Email" value="Mohit">
		                <small class="text-danger email_error"></small>
                    </div>
                    <div class="mb-3">
                    	<label class="form-label" for="phone">Phone</label>
                    	<input type="text" id="phone" name="phone" class="form-control" placeholder="Enter Phone" value="Mohit">
		                <small class="text-danger phone_error"></small>
                    </div>
                    <div class="mb-3">
                    	<label class="form-label" for="gender">Gender</label>
                    	<div class="form-check">
				            <input class="form-check-input" checked name="gender" type="radio" value="male" id="gender_male">
				            <label class="form-check-label" for="gender_male">Male</label>
				        </div>
				        <div class="form-check">
				            <input class="form-check-input" name="gender" type="radio" value="female" id="gender_female">
				            <label class="form-check-label" for="gender_female">Female</label>
				        </div>
		                <small class="text-danger gender_error"></small>
                    </div>
                    <div class="mb-3">
                    	<label class="form-label" for="profile_image">Profile Image</label>
                    	<input type="file" id="profile_image" name="profile_image" class="form-control">
		                <small class="text-danger profile_image_error"></small>
                    </div>
                    <div class="mb-3">
                    	<label class="form-label" for="additional_file">Additional File</label>
                    	<input type="file" id="additional_file" name="additional_file" class="form-control">
		                <small class="text-danger additional_file_error"></small>
                    </div>

                    @if(isset($formfields) && !empty($formfields))
			          @foreach($formfields as $key => $value)
			          <?php 
			            $extradata = json_decode($value->fields); 
			          ?>
		                  <div class="mb-3">
		                    <label class="form-label" for="{{$value->name}}" title="{{$extradata->tooltip}}">{{$value->label}}</label>
		                    @if($value->type == 'radio')
				              @if(isset($extradata->option) && !empty($extradata->option))
				                @foreach($extradata->option as $pkey => $pvalue)
				                  <div class="form-check">
				                    <input class="form-check-input {{$value->name}}" name="custom_fields[{{$value->name}}]" type="{{$value->type}}" value="{{$pvalue->value}}" id="{{$value->name}}_{{$pvalue->value}}" {{($extradata->default_value == $pvalue->value)? 'checked': ''}}>

				                    <label class="form-check-label" for="{{$value->name}}_{{$pvalue->value}}">{{$pvalue->lable}}</label>
				                  </div>
				                @endforeach
				              @endif

				              @elseif($value->type == 'dropdown')
				              <select class="form-control {{$value->name}}" name="custom_fields[{{$value->name}}]" id="{{$value->name}}">
				                    <option>Select {{$value->label}}</option>
				                @if(isset($extradata->option) && !empty($extradata->option))
				                  @foreach($extradata->option as $pkey => $pvalue)
				                    <option value="{{$pvalue->value}}"  {{($extradata->default_value == $pvalue->value)? 'selected': ''}}>{{$pvalue->lable}}</option>
				                  @endforeach
				                @endif
				              </select> 

				              @elseif($value->type == 'textarea')
					              <textarea name="custom_fields[{{$value->name}}]"  id="{{$value->name}}" class="form-control {{$value->name}}" 
					                @if (!empty($extradata->min_length))
					                    minlength="{{ $extradata->min_length }}"
					                @endif
					                @if(!empty($extradata->max_length))
					                    maxlength="{{ $extradata->max_length }}"
					                @endif
					                @if(!empty($extradata->min_value))
					                    min="{{ $extradata->min_value }}"
					                @endif
					                @if(!empty($extradata->max_value))
					                    max="{{ $extradata->max_value }}"
					                @endif
					                {{($value->is_required) ? 'required' : ''}}
					               >{{$extradata->default_value}}</textarea>
					          @elseif($value->type == 'text' || $value->type == 'password' || $value->type == 'color' || $value->type == 'date' || $value->type == 'email' || $value->type == 'number')
						              <input name="custom_fields[{{$value->name}}]" type="{{$value->type}}" {{($value->is_required) ? 'required' : ''}} class="form-control {{$value->name}}" id="{{$value->name}}" placeholder="{{$extradata->placeholder}}" value="{{$extradata->default_value}}" 
						                @if (!empty($extradata->min_length))
						                    minlength="{{ $extradata->min_length }}"
						                @endif
						                @if(!empty($extradata->max_length))
						                    maxlength="{{ $extradata->max_length }}"
						                @endif
						                @if(!empty($extradata->min_value))
						                    min="{{ $extradata->min_value }}"
						                @endif
						                @if(!empty($extradata->max_value))
						                    max="{{ $extradata->max_value }}"
						                @endif
						              >

						       @elseif($value->type == 'file')
					              @php
					                  $accept_types = isset($extradata->file_allow_type) ? implode(', ', $extradata->file_allow_type) : '*';
					              @endphp
					              <input  type="{{$value->type}}" {{($value->is_required) ? 'required' : ''}} class="form-control {{$value->name}}" id="{{$value->name}}" placeholder="{{$extradata->placeholder}}"
					              
					              @if(!empty($extradata->is_it_multiple_image) && $extradata->is_it_multiple_image == true)
					                  name="custom_fields[{{$value->name}}][]"
					                  multiple
					              @else
					                  name="custom_fields[{{$value->name}}]"
					              @endif
					              accept="{{ $accept_types }}"
					              >

					           @elseif($value->type == 'checkbox')
					              @if(isset($extradata->option) && !empty($extradata->option))
					                @foreach($extradata->option as $pkey => $pvalue)
					                  <div class="form-check">
					                    <input class="form-check-input {{$value->name}}" name="custom_fields[{{$value->name}}][]" type="{{$value->type}}" value="{{$pvalue->value}}" id="{{$value->name}}_{{$pvalue->value}}" {{($extradata->default_value == $pvalue->value)? 'checked': ''}}>
					                    <label class="form-check-label" for="{{$value->name}}_{{$pvalue->value}}">{{$pvalue->lable}}</label>
					                  </div>
					                @endforeach
					              @endif
				            @endif
		                    <small class="text-danger {{$value->name}}_error"></small>
		                  </div>
	                  @endforeach
	        		@endif
                  <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2 submit">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <!-- solar icons -->
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>

  <script type="text/javascript">
  	$('#myform').on('submit', function (e) {
  		e.preventDefault();
  		var send = true;
		<?php 
			foreach($formfields as $jskey => $jsvalue){
			    $extradata = json_decode($jsvalue->fields);
			    if($extradata->is_required){
			    	?>
			    		var value = $("."+"{{$jsvalue->name}}").val();
			    		if(value == ""){
			    			send = false;
			    			$("."+"{{$jsvalue->name}}"+"_error").html("{{$jsvalue->label}}" + " is required");
			    		}else{
			    			$("."+"{{$jsvalue->name}}"+"_error").html("");
			    		}
			    	<?php
			    }
			}
		 ?>
  		var name = $("input[name='name']").val();
  		if(name == ""){
  			send = false;
  			$(".name_error").html("Name is required!");
  		}else{
  			$(".name_error").html("");
  		}
  		
  		var email = $("input[name='email']").val();
  		if(email == ""){
  			send = false;
  			$(".email_error").html("Email is required!");
  		}else{
  			$(".email_error").html("");
  		}
  		var phone = $("input[name='phone']").val();
  		if(phone == ""){
  			send = false;
  			$(".phone_error").html("Phone is required!");
  		}else{
  			$(".phone_error").html("");
  		}

  		var gender = $("input[name='gender']:checked").val();
  		if(gender){
  			$(".gender_error").html("");
  		}else{
  			send = false;
  			$(".gender_error").html("Gender is required!");
  		}

  		var profile_image = $("input[name='profile_image']").val();
  		if(profile_image == ""){
  			send = false;
  			$(".profile_image_error").html("Profile Image is required!");
  		}else{
  			$(".profile_image_error").html("");
  		}
  		var additional_file = $("input[name='additional_file']").val();
  		if(additional_file == ""){
  			send = false;
  			$(".additional_file_error").html("Additional File is required!");
  		}else{
  			$(".additional_file_error").html("");
  		}

  		if(send == true){
  			let formData = new FormData(this);
  			 $.ajax({
		      url: '{{ route("save-contact") }}',
		      type: 'POST',
		      data: formData,
		      contentType: false,
		      processData: false,
		      headers: {
		        'X-CSRF-TOKEN': '{{ csrf_token() }}'
		      },
		      success: function (response) {
		        console.log("Form submitted successfully");
		        console.log(response);
		      },
		      error: function (xhr) {
		        console.log("Error occurred:");
		        console.log(xhr.responseText);
		      }
		    });
  		}

  		// 

  	})
  </script>
</body>

</html>