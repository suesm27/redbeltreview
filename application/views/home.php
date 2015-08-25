<html>
<head>
	<meta charset="UTF-8">
	<title>Home Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 <style></style>
 <link rel="stylesheet" type="text/css" href="/assets/style.css">
</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <span class="navbar-brand">SS|DB</span>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="/"><span class="glyphicon glyphicon-home"> Home</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/users/signin"><span class="glyphicon glyphicon-log-in"> Login</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div><!--/.container -->
  </nav>
  <div class="main-container">
    <div class="container">
      <div class="jumbotron">
        <h1>Welcome to our User Dashboard</h1>
        <p>This was built using CodeIgniter MVC, MySQL, and Apache.</p>
        <p>
          <a class="btn btn-lg btn-primary" href="/users/register" role="button">Get Started</a>
        </p>
      </div>
    </div> <!-- /container -->
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h3>Manage Users</h3>
          <p>Using this application, you'll be able to add, remove, and edit users for the application.</p>
        </div>
        <div class="col-md-4">
          <h3>Leave messages</h3>
          <p>Users will be able to leave a message to another user using this application.</p>
        </div>
        <div class="col-md-4">
          <h3>Edit User Information</h3>
          <p>Admins will be able to edit another user's information (email address, first name, last name, etc).</p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>