
<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <link rel="stylesheet" type="text/css" href="semantic/semantic.min.css">
  <script>
      window.Laravel = <?php echo json_encode([
          'csrfToken' => csrf_token(),
      ]); ?>
  </script>
  <title>@yield('title')</title>
</head>
<body>
  @yield('content')
  <script src="js/app.js"></script>
  <script src="semantic/semantic.min.js"></script>
</body>
</html>
