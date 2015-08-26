<html>
<head>
	<meta charset="UTF-8">
	<title>Add Book and Review</title>
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
        <span class="navbar-brand"></span>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/main">Home</a></li>
          <li><a href="/users/logoff">Logout</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div><!--/.container -->
  </nav>
  <div class="main-container">
    <div class="container">
      <?php 
      if ($this->session->userdata('success'))
      {
        ?>
        <div class="alert alert-success">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Nice!</strong>
          <?php 
          foreach($this->session->userdata('success') as $s){
            echo $s;
          }
          ?>
        </div>
        <?php
        $this->session->unset_userdata('success');
      }
      if ($this->session->userdata('errors'))
      {
        ?>
        <div class="alert alert-danger">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Error!</strong>
          <?php 
          foreach($this->session->userdata('errors') as $error){
            echo $error;
          }
          ?>
        </div>
        <?php
        $this->session->unset_userdata('errors');
      }
      ?>
    </div>
    <div class="container">
        <h3>All a New Book Title and a Review: </h3>
        <form class='form-horizontal' roll='form' action='/main/add_new_book_and_review' method='post'>
          <div class="form-group">
            <label>Book Title: </label>
            <input type="text" class="form-control" name="book_title" required>
          </div>
          <div class="form-group">
            <label>Author: </label>
            <div>
              Choose from the list: <select class="form-control" name="author" required>
                                      <option disabled selected> Select an author </option>
                                        <?php 
                                          foreach($authors as $a){
                                            echo "<option value='" . $a['id'] . "'>" . $a['name'] . "</option>";
                                          }
                                         ?>
                                    </select>
              Or add a new author: <input type="text" class="form-control" name="new_author">
            </div>
          </div>
          <div class="form-group">
            <label>Review: </label>
            <textarea class="form-control" rows="5" name="review"></textarea>
          </div>
          <div class="form-group">
              <label>Rating: </label>
              <select class="form-control" name="rating" value="" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
              <span>stars.</span>
            </div>
          <div class="form-group">
            <button type="submit" class="btn btn-lg btn-primary">Add Book and Review</button>
          </div>
        </form>
    </div> <!-- /container -->
  </div>
</body>
</html>