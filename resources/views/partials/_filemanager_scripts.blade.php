

<script src="{{url('js/tinymce/tinymce.js')}}"></script>
  <script type="text/javascript">

     // File Picker modification for FCK Editor v2.0 - www.fckeditor.net
     // by: Pete Forde <pete@unspace.ca> @ Unspace Interactive
     var urlobj;
     var pathAbsolute = window.Blogger.url + "/";
     var oWindow;

     function BrowseServer(obj)
     {
          urlobj = obj;
          OpenServerBrowser(
          pathAbsolute + 'filemanager/show',
          screen.width * 0.7,
          screen.height * 0.7 ) ;
     }

     function OpenServerBrowser( url, width, height )
     {
          var iLeft = (screen.width - width) / 2 ;
          var iTop = (screen.height - height) / 2 ;
          var sOptions = "toolbar=no,status=no,resizable=yes,dependent=yes" ;
          sOptions += ",width=" + width ;
          sOptions += ",height=" + height ;
          sOptions += ",left=" + iLeft ;
          sOptions += ",top=" + iTop ;
          oWindow = window.open( url, "BrowseWindow", sOptions ) ;


     }

     function SetUrl( url, width, height, alt )
     {

         document.getElementById('article-image-preview').src = url;
            url = url.replace(pathAbsolute+"filemanager/userfiles/", "");
           document.getElementById("article-image-path").value = url ;

     }


     $('#article-pick-image').click(function(){
      BrowseServer('article-image-path');
      return false;
     });




   var editor_config = {
         path_absolute : pathAbsolute,
          //language : 'en_GB',
         // selector: "textarea",
         height: 500,
         theme: "modern",
         relative_urls : false,
        remove_script_host : true,
        convert_urls : false,
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
     editor_config.path_absolute = window.Blogger.url +"/filemanager/show";
     tinymce.init(editor_config);


  </script>
