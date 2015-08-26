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
      <div class="row">
        <h3><?php echo $book['title']; ?></h3>
        <h4><?php echo $book['author_name']; ?></h4>
      </div>
      <div class="col-md-6">
        <h3>Reviews:</h3>
        <?php 
        foreach($reviews as $review){
          echo "<p>Rating: ";
          for ($i = 0; $i < $review['rating']; $i++)
                         {
                             echo "<img src='/assets/star.png' height='25' width='25'>";
                         }
                         $star = 5 - $review['rating'];
                         for ($i = 0; $i < $star; $i++)
                         {
                             echo "<img src='/assets/blank.png' height='25' width='25'>";
                         }
          echo "</p>";
          echo "<p><a href='/main/show_user/" . $review['user_id'] . "'>" . $review['name'] . "</a> says: ";
          echo $review['review'] . "</p>";
          echo "<p>Posted on: " . $review['created_at'] . "</p>";
          if($this->session->userdata('current_user_id') == $review['user_id']){
            echo "<p><a href='/main/delete_review/{$review['review_id']}/{$book['id']}'>" . "Delete this Review" . "</a></p>";  
          }
          echo "<br>";
        }
         ?>
      </div>
      <div class="col-md-6">
        <h3>Add a review:</h3>
          <form class='form-horizontal' roll='form' action='/main/add_review_to_book/<?php echo $book['id']; ?>' method='post'>
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
              </select> stars.
            </div>
          <div class="form-group">
            <button type="submit" class="btn btn-lg btn-primary">Submit Review</button>
          </div>
        </form>
       </div>
      </div>
    </div> <!-- /container -->
  </div>
</body>
</html>