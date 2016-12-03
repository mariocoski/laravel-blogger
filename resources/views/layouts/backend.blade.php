<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="/semantic/semantic.css">
    <link href="/css/app.css" rel="stylesheet">

    <title>{{ config('app.name', 'Blogger') }} - @yield('title')</title>


</head>
    <body>
      @include('partials._nav_sidebar')
      <div class="pusher">
        @include('partials._nav_top')
        <div class="ui backend-grid">
		  <div class="backend-dashboard">
		    <div class="sidebar hidden-mobile hidden-tablet">
		    	<div class="ui vertical menu">
		    		<div class="item text-center">
						<div class="header">
							{{Auth::user()->getDisplayName()}}
						</div>
						<div class="ui center aligned">
							<a href="{{url('/profile')}}"><img class="avatar-sm" src="{{(!empty(Auth::user()->avatar))? url(Auth::user()->avatar) : url("images/avatar_default.png")}}"></a>
						</div>
						<div class="menu">
							<a class="item">{{Auth::user()->getRoleDisplayName()}}</a>
						</div>
					</div>
		    		@include('partials._nav_dashboard')
		        </div>
		    </div>
		    <div class="view">
		    	<div class="ui raised segments">
		    		<div class="ui segment">
		    			 <div class="ui breadcrumb">
						    <a class="section" href="{{url('/dashboard')}}">Dashboard</a>
						    <div class="divider"> / </div>
						    <div class="active section">Profile</div>
						  </div>
		  			</div>
		  			<div class="ui segment teal segment-padding">
		  				@yield('content')
		  			</div>
		  			<div class="ui segment secondary text-center">  @include('partials._credits_footer')</div>
		    	</div>
		    </div>

		  </div><!--end of container-->
		</div><!--end of grid stackable-->
        <!-- @include('partials._footer') -->
      </div><!--end of pusher-->
      <script src="/js/app.js"></script>
      <script src="/semantic/semantic.js"></script>
      <script src="/js/tinymce/tinymce.js"></script>
  <script type="text/javascript">
  // tinymce.init({
  //   selector: '#mytextarea'
  // });
   var editor_config = {
         path_absolute : '',
          // language : 'en_GB',
         // selector: "textarea",
         height: 500,
         theme: "modern",
         plugins: [
             "advlist autolink lists link image charmap print preview hr anchor pagebreak",
             "searchreplace wordcount visualblocks visualchars code fullscreen",
             "insertdatetime media nonbreaking save table contextmenu directionality",
             "emoticons template paste textcolor colorpicker textpattern"
         ],
         toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
         toolbar2: "print preview media | forecolor backcolor emoticons",
         image_advtab: true,
         image_class_list: [
             {title: 'None', value: ''},
             {title: 'Image Responsive', value: 'img-responsive'}
         ],
         templates: [
             {title: 'Test template 1', content: 'Test 1'},
             {title: 'Test template 2', content: 'Test 2'}
         ],
         // relative_urls: false,
         // remove_script_host : false,
         // convert_urls : true,
         // document_base_url: "http://localhost/github/filemanager/",
         file_browser_callback : function(field_name, url, type, win) {
                     // from http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript
                     var w = window,
                     d = document,
                     e = d.documentElement,
                     g = d.getElementsByTagName('body')[0],
                     x = w.innerWidth || e.clientWidth || g.clientWidth,
                     y = w.innerHeight|| e.clientHeight|| g.clientHeight;
                 // Url absolute
                 // var cmsURL = 'http://localhost/filemanager/show?&field_name='+field_name+'&lang='+tinymce.settings.language;
                 // var cmsURL = 'http://localhost/otherfolder/filemanager/show?&field_name='+field_name+'&lang='+tinymce.settings.language;
                 var cmsURL = editor_config.path_absolute+'?field_name='+field_name+'&lang='+tinymce.settings.language;

                 if(type == 'image') {
                     cmsURL = cmsURL + "&type=images";
                 }

                 tinymce.activeEditor.windowManager.open({
                     file : cmsURL,
                     title : 'Filemanager',
                     width : x * 0.8,
                     height : y * 0.8,
                     resizable : "yes",
                     close_previous : "no"
                 });

             }
     };
     editor_config.selector = "#article-content";
     // editor_config.path_absolute = "http://php-filemanager.rhcloud.com/examples/basic.html";
     editor_config.path_absolute = "http://blogger.dev/filemanager/show";
     tinymce.init(editor_config);
  </script>
     <!--  @include('partials._alerts') -->
      @yield('scripts')
    </body>
  </html>
