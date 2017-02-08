@extends('layouts.backend')

@section('title', 'Avatar')

@section('content')
<div class="ui segment large">
  {!! Breadcrumbs::render('backend.avatar') !!}
</div><!--end of segment-->

<div class="ui segment teal padded">
<h2>Upload Avatar</h2>

<img class="ui centered middle aligned image avatar-sm" src="{{(!empty(Auth::user()->avatar))? url('images/avatars/'.Auth::user()->avatar) : url('images/avatars/avatar_default.png') }}">

<span><button class="ui button primary" id="upload-avatar"><i class="upload icon"></i> Upload avatar</button></span>

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
   <label class="ui button primary" for="upload">Upload Image</label>
     <input type="file" id="upload" class="upload-input" >
    <div class="ui positive button update-avatar" id="avatar-update">
      Update avatar
    </div>
     </form>
  </div>

</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ url('js/croppie.min.js') }}"></script>
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
  $('#avatar-modal').modal({
    onHidden : function(){
      resetUpload();
    }
  });
    $('#upload').on('change', function () { readFile(this); });
    $('#avatar-update').click(function () {
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size:{ width: 200, height: 200 }
        }).then(function (croppedImage) {
          $.ajax({
        type: "POST",
        url: "{{ url('dashboard/avatar') }}",
        data: { encodedData : croppedImage },
        cache: false,
      }).done(function(response){
        location.reload();
      }).fail(function(error){
        console.log(error);
      });
        });
    });
});
</script>

@endsection
