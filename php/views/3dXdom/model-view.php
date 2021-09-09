<html>

<head>
    <title>My first X3DOM page</title>
    <script type='text/javascript' src='http://www.x3dom.org/download/x3dom.js'> </script>
    <link rel='stylesheet' type='text/css' href='http://www.x3dom.org/download/x3dom.css'>
    </link>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <style>
    body {
        width:100%
    }

    </style>
</head>

<body>
    
<nav class="navbar navbar-light bg-transparent position-absolute" style="z-index:1;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="../../../assets/logo.png" alt=""   class="d-inline-block align-text-top">
    </a>
  </div>
</nav>

    <x3d width='100%' height='100%' style="z-index:0;" showStat="true">
        <scene>
            <navigationInfo type='"walk"' id="navType"></navigationInfo>
            <inline url="../../../test-models\3xDom\naos.x3d"> </inline>
        </scene>
    </x3d>

</body>

</html>