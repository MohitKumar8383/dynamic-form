<style type="text/css">
	.deletebtn{
		margin-top: 22px;
	}
</style>
<section>
  <div class="container">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Custom Form Field</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="card mb-4">
          <div class="card-body">
            <form action="{{url('admin/storecustomformfield')}}" id="form" method="post" enctype="multipart/form-data">
            	@csrf
                    <div class="mb-3">
                      <label for="lable" class="form-label">Lable</label>
                      <input type="text" placeholder="Enter Lable" class="form-control" id="lable"  name="label" value="{{old('lable')}}" >
                      <span class="text-danger label_error">
                      	@if($errors->has('label'))
                    			{{$errors->first('label')}}
                      	@endif
                      </span>
                    </div>

                    <div class="mb-3">
                      <label for="lable" class="form-label">Name</label>
                      <input type="text" placeholder="Enter Name" class="form-control" id="name"  name="name">
                      <span class="text-danger name_error" value="{{old('name')}}">
                      		@if($errors->has('name'))
	                    			{{$errors->first('name')}}
	                      	@endif
                      </span>
                    </div>

                    <div class="mb-3">
                      <label for="type" class="form-label">Type</label>
                      <select id="type" class="form-control select2" name="type">
												<option value="">Select Type</option>
												<option value="text">Text</option>
												<option value="file">File</option>
												<option value="radio">Radio</option>
												<option value="checkbox">Check Box</option>
												<option value="dropdown">Dropdown</option>
												<option value="color">Color</option>
												<option value="date">Date</option>
												<option value="email">Email</option>
												<option value="number">Number</option>
												<option value="textarea">Textarea</option>
												<option value="password">Password</option>
											</select>
                      <span class="text-danger type_error">
                      	@if($errors->has('type'))
                    			{{$errors->first('type')}}
                      	@endif
                      </span>
                    </div>
                    <div class="allow-file-type-main">
	                    <div class="mb-3">
	                      <label for="is_it_multiple" class="form-label">Is It Multiple Image</label>
	                      	<div class="d-flex gap-2">
	                      		<div>
	                      			<input class="form-check-input" type="radio" name="is_it_multiple_image" value="1" id="is_id_multiple_image_yes">
	                      			<label class="form-check-label" for="is_id_multiple_image_yes">Yes</label>
	                      		</div>
	                      		<div>
	                      			<input type="radio" name="is_it_multiple_image" value="0" class="form-check-input" id="is_id_multiple_image_no">
	                      			<label class="form-check-label" for="is_id_multiple_image_no">No</label>
	                      		</div>
	                      	</div>
	                      <span class="text-danger is_it_multiple_image_error">
		                      @if($errors->has('is_it_multiple_image'))
	                    			{{$errors->first('is_it_multiple_image')}}
	                      	@endif
                      	</span>
	                    </div>

	                    <div class="mb-3">
	                      <label for="allow_file_type" class="form-label">Allow file type</label>
	                      <select name="file_allow_type[]" class="form-control select2" id="allow_file_type" multiple>
								<option value="">Select File Allow Type</option>
								<option value="image/png, image/jpeg, image/jpg, image/gif, image/webp">Images</option>
								<option value="application/pdf">PDF</option>
								<option value=".doc, .docx, .xls, .xlsx">Documents</option>
								<option value="video/mp4, video/*">Videos</option>
								<option value=".zip, .rar, .7z, .tar, .gz">Compressed Files</option>
							</select>
	                      <span class="text-danger allow_file_type_error">
	                      		@if($errors->has('allow_file_type'))
		                    			{{$errors->first('allow_file_type')}}
		                      	@endif
	                      </span>
	                    </div>

                    </div>
					<div class="mb-3 placeholder-div">
                      <label for="placeholder" class="form-label">Placeholder</label>
                      <input type="text" placeholder="Enter Placeholder" class="form-control" id="placeholder"  name="placeholder">
                      <span class="text-danger placeholder_error">
                      	@if($errors->has('placeholder'))
		                    	{{$errors->first('placeholder')}}
		                    @endif
		                  </span>
                    </div>

					<div class="mb-3 options">
						<div class="d-flex justify-content-between">
                     		<label for="placeholder" class="form-label">Enter options for <span class="optionname"></span></label>
		                    <button type="button" class="append-option-btn btn btn-primary">+</button>
						</div>

                      <div class="append-option">
												<div class="option-div option1 d-flex gap-2">
													<div class="w-50">
														<label>Option Name</label>
														<input type="text" class="form-control optionlable" name="option[0][lable]">
													</div>
													<div class="w-50">
														<label>Option value</label>
														<input type="text" class="form-control optionvalue" name="option[0][value]">
													</div>
													<div class="">
														<button class="btn btn-danger deletebtn" type="button" onclick="deleteoption(1)">Delete</button>
													</div>
												</div>
						</div>
					</div>

					<div class="mb-3 default_value">
                      <label for="lable" class="form-label">Default Value</label>
                      <input type="text" placeholder="Enter Default Value" class="form-control" id="default_value"  name="default_value">
                      <span class="text-danger default_value_error">
                      		@if($errors->has('default_value'))
			                    	{{$errors->first('default_value')}}
			                    @endif
                      </span>
                    </div>

                    <div class="mb-3">
	                      <label class="form-label">Is Required</label>
	                      	<div class="d-flex gap-2">
	                      		<div>
	                      			<input class="form-check-input" type="radio" name="is_required" value="1" id="is_required_yes">
	                      			<label class="form-check-label" for="is_required_yes">Yes</label>
	                      		</div>
	                      		<div>
	                      			<input type="radio" name="is_required" value="0" class="form-check-input" id="is_required_no">
	                      			<label class="form-check-label" for="is_required_no">No</label>
	                      		</div>
	                      	</div>
	                      <span class="text-danger is_required_error">
	                      	@if($errors->has('is_required'))
			                    	{{$errors->first('is_required')}}
			                    @endif
			                  </span>
	                    </div>



	                    <div class="mb-3">
	                      <label  class="form-label">Show In Table</label>
	                      	<div class="d-flex gap-2">
	                      		<div>
	                      			<input class="form-check-input" type="radio" name="show_in_table" value="1" id="show_in_table_yes">
	                      			<label class="form-check-label" for="show_in_table_yes">Yes</label>
	                      		</div>
	                      		<div>
	                      			<input type="radio" name="show_in_table" value="0" class="form-check-input" id="show_in_table_no">
	                      			<label class="form-check-label" for="show_in_table_no">No</label>
	                      		</div>
	                      	</div>
	                      <span class="text-danger show_in_table_error">
	                      		@if($errors->has('show_in_table'))
				                    	{{$errors->first('show_in_table')}}
				                    @endif
	                      </span>
	                    </div>



	                    <div class="mb-3">
	                      <label  class="form-label">Use In Filter</label>
	                      	<div class="d-flex gap-2">
	                      		<div>
	                      			<input class="form-check-input" type="radio" name="use_in_filter" value="1" id="use_in_filter_yes">
	                      			<label class="form-check-label" for="use_in_filter_yes">Yes</label>
	                      		</div>
	                      		<div>
	                      			<input type="radio" name="use_in_filter" value="0" class="form-check-input" id="use_in_filter_no">
	                      			<label class="form-check-label" for="use_in_filter_no">No</label>
	                      		</div>
	                      	</div>
	                      <span class="text-danger use_in_filter_error">
	                      		@if($errors->has('use_in_filter'))
				                    	{{$errors->first('use_in_filter')}}
				                    @endif
	                      </span>
	                    </div>

	                    <div class="mb-3">
	                      <label for="order" class="form-label">Order</label>
	                      <input type="text" placeholder="Enter Order" class="form-control" id="order"  name="order">
	                      <span class="text-danger order_error">
	                      		@if($errors->has('order'))
				                    	{{$errors->first('order')}}
				                    @endif
	                      </span>
	                    </div>

	                    <div class="mb-3">
	                      <label for="tooltip" class="form-label">Tooltip</label>
	                      <textarea  placeholder="Enter Tooltip" class="form-control" id="tooltip"  name="tooltip"></textarea>
	                      <span class="text-danger order_error">
	                      	  @if($errors->has('tooltip'))
				                    	{{$errors->first('tooltip')}}
				                    @endif
	                      </span>
	                    </div>

	                    <div class="length-value-div">
							<div class="min-max-length-main mb-3 d-flex gap-2">
								<div class="w-50 min_length_div">
									<label for="min_length" class="form-label">Min length</label>
				                      <input type="text" placeholder="Enter Min length" class="form-control" id="min_length"  name="min_length">
				                      <span class="text-danger min_length_error">
				                      	@if($errors->has('min_length'))
						                    	{{$errors->first('min_length')}}
						                    @endif
				                      </span>
								</div>

								<div class="w-50  max_length_div">
									<label for="max_length" class="form-label">Max Length</label>
				                      <input type="text" placeholder="Enter Max Length" class="form-control" id="max_length"  name="max_length">
				                      <span class="text-danger max_length_error">
				                      	@if($errors->has('max_length'))
						                    	{{$errors->first('max_length')}}
						                    @endif
				                      </span>
								</div>
							</div>

							<div class="min-max-value-main mb-3 d-flex gap-2">
								<div class="w-50 min_value_div">
									<label for="min_value" class="form-label">Min Value</label>
									<input type="text" placeholder="Enter Min Value" class="form-control" id="min_value"  name="min_value">
				                    <span class="text-danger min_value_error">
				                    	 @if($errors->has('max_length'))
						                    	{{$errors->first('max_length')}}
						                    @endif
				                    </span>
								</div>

								<div class="w-50 max_value_div">
									<label for="max_value" class="form-label">Max Value</label>
									<input type="text" placeholder="Enter Max Value" class="form-control" id="max_value"  name="max_value">
				                    <span class="text-danger max_value_error">
				                    	@if($errors->has('max_value'))
						                    	{{$errors->first('max_value')}}
						                    @endif
				                    </span>
								</div>
							</div>

						</div>


                    <button type="button" class="btn btn-primary submit">Submit</button>
                  


            </form>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</section>
<script type="text/javascript">
	function createslug(text){
		    let slug = text
		        .toLowerCase()
		        .replace(/\s{2,}/g, ' ')
		        .replace(/ /g, '_')
		        .replace(/[^\w-]+/g, '')
		        .replace(/--+/g, '_')
		        .replace(/^-+|-+$/g, '')
		        .trim();
		    return slug;
		}

		document.querySelector("input[name='name']").addEventListener('keyup',function(){
			let name = createslug(this.value);
			document.querySelector("input[name='name']").value = name;
		})

		document.querySelector("input[name='label']").addEventListener('keyup',function(){
			let name = createslug(this.value);
			document.querySelector("input[name='name']").value = name;

		})
		function setOptionsName(){
			document.querySelectorAll('.option-div').forEach(function(el, index) {
				el.className = '';
				el.classList.add("option-div");
				el.classList.add("d-flex");
				el.classList.add("gap-2");
				el.classList.add("option"+index);
				const input = el.querySelector('.optionlable');
			    if(input){
			    	input.setAttribute('name', 'option[' + index + '][lable]');
			    }
			    const inputvalue = el.querySelector('.optionvalue');
			    if(inputvalue){
			    	inputvalue.setAttribute('name', 'option[' + index + '][value]');
			    }

			    const deletebtn = el.querySelector('.deletebtn');
			    if(deletebtn){
			    	deletebtn.setAttribute('onclick', 'deleteoption(' + index + ')');
			    }
			})
		}

		function deleteoption(row){
			var checkrow = document.getElementsByClassName('option'+row)[0];
			if(checkrow){
				checkrow.remove();
				setOptionsName()
			}
		}

		document.getElementsByClassName('append-option-btn')[0].addEventListener("click",function(){
			var html = '<div class="option-div d-flex gap-2">';
					html += '<div class="w-50">';
						html += '<label>Option Name</label>';
						html += '<input type="text" class="form-control optionlable" name="option[0][lable]">';
					html += '</div>';
					html += '<div class="w-50">';
						html += '<label>Option value</label>';
						html += '<input type="text" class="form-control optionvalue" name="option[0][value]">';
						html += '</div>';
						html += '<div class="">';
								html += '<button class="btn btn-danger deletebtn" type="button" onclick="deleteoption(1)">Delete</button>';
							html += '</div>';
					html += '</div>';
					document.getElementsByClassName('append-option')[0].insertAdjacentHTML('beforeend', html);

			setOptionsName();
		})



		$("select[name='type']").on("change",function(){
			if (['radio', 'checkbox', 'dropdown'].includes(this.value)) {
				document.getElementsByClassName('options')[0].style.display = 'block';
			}else{
				document.getElementsByClassName('options')[0].style.display = 'none';
			}

			if (['text', 'email', 'number', 'textarea'].includes(this.value)) {
				document.getElementsByClassName('placeholder-div')[0].style.display = 'block';
			}else{
				document.getElementsByClassName('placeholder-div')[0].style.display = 'none';
			}
			if (['file'].includes(this.value)) {
				document.getElementsByClassName('default_value')[0].style.display = 'none';
				document.getElementsByClassName('allow-file-type-main')[0].style.display = 'block';
				document.getElementsByClassName('length-value-div')[0].style.display = 'none';
				$("#allow_file_type").select2();
			}else{
				document.getElementsByClassName('allow-file-type-main')[0].style.display = 'none';
				document.getElementsByClassName('default_value')[0].style.display = 'block';
				if (['text','date','number','password','textarea'].includes(this.value)) {
					document.getElementsByClassName('length-value-div')[0].style.display = 'block';
				}else{
					document.getElementsByClassName('length-value-div')[0].style.display = 'none';
				}
			}
		})
		document.getElementsByClassName('submit')[0].addEventListener("click",function () {
			var send = true;
			var name = document.getElementsByName("name")[0].value;
			if(name == ""){
				document.getElementsByClassName('name_error')[0].innerHTML = 'Name is required';
				send = false;
			}else{
				document.getElementsByClassName('name_error')[0].innerHTML = '';
			}
			var label = document.getElementsByName("label")[0].value;
			if(label == ""){
				document.getElementsByClassName('label_error')[0].innerHTML = 'Label is required';
				send = false;
			}else{
				document.getElementsByClassName('label_error')[0].innerHTML = '';
			}
			var type = document.getElementsByName("type")[0].value;
			if(type == ""){
				document.getElementsByClassName('type_error')[0].innerHTML = "Type is required";
				send = false;
			}else{
				
				document.getElementsByClassName('type_error')[0].innerHTML = "";
			}
			var is_required = document.querySelector("input[name=is_required]:checked");
			if(is_required){
				document.getElementsByClassName('is_required_error')[0].innerHTML = "";
			}else{
				document.getElementsByClassName('is_required_error')[0].innerHTML = "This is required field";
				send = false;
			}

			var show_in_table = document.querySelector("input[name=show_in_table]:checked");
			if(show_in_table){
				document.getElementsByClassName('show_in_table_error')[0].innerHTML = "";
			}else{
				document.getElementsByClassName('show_in_table_error')[0].innerHTML = "This is required field";
				send = false;
			}

			var use_in_filter = document.querySelector("input[name=use_in_filter]:checked");
			if(use_in_filter){
				document.getElementsByClassName('use_in_filter_error')[0].innerHTML = "";
			}else{
				document.getElementsByClassName('use_in_filter_error')[0].innerHTML = "This is required field";
				send = false;
			}

			if(send == true){
				document.getElementById("form").submit();
			}

		})
	</script>