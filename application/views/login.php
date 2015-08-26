<html>
<head>
	<meta charset="UTF-8">
	<title>Welcome</title>
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
        <span class="navbar-brand">Welcome!</span>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div><!--/.container -->
  </nav>
  <div class="main-container">
    <div class="container">
      <?php 
      if ($this->session->flashdata('success'))
      {
        ?>
        <div class="alert alert-success">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Nice!</strong>
          <?php 
          foreach($this->session->flashdata('success') as $s){
            echo $s;
          }
          ?>
        </div>
        <?php
      }
      if ($this->session->flashdata('errors'))
      {
        ?>
        <div class="alert alert-danger">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Error!</strong>
          <?php 
          foreach($this->session->flashdata('errors') as $error){
            echo $error;
          }
          ?>
        </div>
        <?php
      }
      ?>
    </div>
    <div class="container">
      <div class="col-md-6">
        <h3>Register</h3>
        <form class='form-horizontal' roll='form' action='/users/register_action' method='post'>
          <div class="form-group">
            <label>Name: </label>
            <input type="text" class="form-control" name="name" required>
          </div>
          <div class="form-group">
            <label>Alias: </label>
            <input type="text" class="form-control" name="alias" required>
          </div>
          <div class="form-group">
            <label>Email Address: </label>
            <input type="email" class="form-control" name="email" required>
          </div>
          <div class="form-group">
            <label>Password: </label>
            <input type="password" class="form-control" name="password" required>
          </div>
          <p>*Password should be at least 8 characters.</p>
          <div class="form-group">
            <label>Password Confirmation: </label>
            <input type="password" class="form-control" name="passwordconf" required>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-lg btn-primary">Register</button>
          </div>
        </form>
      </div>
      <div class="col-md-6">
        <h3>Login</h3>
        <form class="form-horizontal" roll='form' action='/users/signin_action' method='post'>
          <div class="form-group">
            <label>Email Address: </label>
            <input type="email" class="form-control" name="email" required>
          </div>
          <div class="form-group">
            <label>Password: </label>
            <input type="password" class="form-control" name="password" required>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-lg btn-primary">Sign In</button>
          </div>
        </form>
      </div>
    </div> <!-- /container -->
  </div>
</body>
</html>