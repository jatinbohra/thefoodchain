<!DOCTYPE html>
<html>
<head>
	<title>table</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Include Editor style. -->

 <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/froala-editor@3.0.0-beta.0/css/froala_editor.css">

<!--   <meta http-equiv="X-UA-Compatible" content="ie-edge"> -->
  <?php  include("Links.php"); ?>
   <script src="require.js"></script>
  <script>
    require.config({
      packages: [{
        name: 'froala-editor',
        main: 'js/froala_editor.min'
      }],
      paths: {
        // Change this to your server if you do not wish to use our CDN.
        'froala-editor': 'https://cdn.jsdelivr.net/npm/froala-editor@3.0.0-beta.0'
      }
    });
  </script>

  <style>
    body {
      text-align: center;
    }
    div#editor {
      width: 81%;
      margin: auto;
      text-align: left;
    }
    .ss {
      background-color: red;
    }
  </style>
</head>

<body>
  <div id="editor">
    <div id='edit' style='margin-top:30px;'>
    </div>
  </div>

  <script>
    require([
      'froala-editor',
      'froala-editor/js/plugins/align.min'
    ], function(FroalaEditor) {
      new FroalaEditor('#edit')
    });
  </script>

</head>

<body>
<!-- <div class="container">
	<div class="jumbotron">
		<div class="card">
			  <div class="card-header">
				    bootstrap 4
				</div>
				   <div class="card-body">
				    <h5 class="card-title">Display database contents</h5>
				    <table class="table table-dark table-hover table-bordered">
						  <thead>
						    <tr>
						      <th scope="col">ID</th>
						      <th scope="col">Slide_Name</th>
						      <th scope="col">Slide_Path</th>
						      <th class="text-right">Actions</th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						      <th>1</th>
						      <td>Mark</td>
						      <td>Otto</td>
						      
						      <TD class="text-right">
						      	<button type="button" class="btn btn-info badge-pill" style="width: 80px">EDIT</button>
						      	<button type="button" class="btn btn-danger badge-pill" style="width: 80px">DELETE</button>
						      </TD>
						    </tr>
						  </tbody>
						</table>
			 </div>
		</div>
	</div>
</div> -->
</body>
</html>
