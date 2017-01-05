@extends('layouts.backend')

@section('title', 'Page Title')

@section('content')

<h2>Upload Avatar</h2>



<img class="ui centered middle aligned tiny image rounded" src="{{(!empty(Auth::user()->avatar))? url('images/avatars/'.Auth::user()->avatar) : url('images/avatars/avatar_default.png') }}">
<span><button class="ui button orange" id="upload-avatar">Upload avatar</button></span>

<div class="ui modal small" id="avatar-modal">
  <i class="close icon"></i>
  <div class="header" >
    Update your avatar
  </div>

  <div class="content">
  	<div class="description">
	    <div class="ui segment short-segment">
			<form action="" id="avatar-form" method="post" enctype="multipart/form-data">
				<div id="upload-demo"></div>
		</div>
	</div>
  </div>
  <div class="actions">
    <div class="ui black deny button">
      Close
    </div>
	 <label class="ui button orange" for="upload">Upload Image</label>
   	 <input type="file" id="upload" class="upload-input" >

    <div class="ui positive button update-avatar" id="avatar-update">
      Update avatar
    </div>
     </form>
  </div>

</div>

@endsection

@section('scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.4.0/croppie.js"></script>
<script>

$(document).ready(function() {

	var croppedFile;

     $uploadCrop = $('#upload-demo').croppie({
        viewport: {
            width: 200,
            height: 200,
            type: 'square'
        },
        boundary: {
            width: 300,
            height: 300
        }
    });

    function isNotAnImage(file){
        var fileType = file["type"];
		var ValidImageTypes = ["image/gif", "image/jpeg", "image/png"];
		if ($.inArray(fileType, ValidImageTypes) < 0) {
			alert("File must be an image");
			resetUpload();
			return false;
		}
    }


    function readFile(input) {
        if (input.files && input.files[0]) {

        	var file = input.files[0];
        	if(isNotAnImage(file)){
        		return false;
        	}
            var reader = new FileReader();

            reader.onload = function (e) {

                $uploadCrop.croppie('bind', {
                    url: e.target.result
                });

                $('.upload-demo').addClass('ready');
            }
            reader.readAsDataURL(file);
        }
    }

    function resetUpload(){
    	$uploadCrop.croppie('bind', {
         url: "{{ (!empty(Auth::user()->avatar))? url('images/avatars/'.Auth::user()->avatar) : url('images/avatars/avatar_default.png') }}"
     	});
     	document.querySelector("#avatar-form").reset();
    }

    $('#upload-avatar').click(function(){
		$('#avatar-modal') .modal('show');
		resetUpload();
	});


	$('#avatar-modal').modal({onHidden:function(){
		resetUpload();
	}});


    $('#upload').on('change', function () { readFile(this); });

    $('#avatar-update').click(function () {
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'original'
        }).then(function (croppedImage) {
        	$.ajax({
				type: "POST",
				url: "{{ url('dashboard/avatar') }}",
				data: { endodedData:croppedImage },
				cache: false,
				contentType: "application/x-www-form-urlencoded",
				success: function (result) {
					location.reload();
				},
				error: function(error){
					console.log(error);
				}
			});
        });
    });

});
	</script>

@endsection
