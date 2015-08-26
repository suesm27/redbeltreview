<html>
<head>
	<meta charset="UTF-8">
	<title>Books Home</title>
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
        <span class="navbar-brand">Welcome, <?php echo $this->session->userdata['name']; ?>!</span>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/main/add">Add Book and Review</a></li>
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
      <div class="col-md-6">
        <h3>Recent Book Reviews:</h3>
        <?php 
        foreach($top_reviews as $review){
          echo "<h3><a href='/main/show_book/" . $review['book_id'] . "'>" . $review['book_title'] . "</a></h3>";
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
          echo "<p><a href='/main/show_user/" . $review['user_id'] . "'>" . $review['user_name'] . "</a> says: ";
          echo $review['review'] . "</p>";
          echo "<p>Posted on: " . $review['created_at'] . "</p>";
        }
         ?>
      </div>
      <div class="col-md-6">
        <h3>Other Books with Reviews:</h3>
        <div class="container" id="scrollbox">
        <?php 
        foreach($all_books as $book){
          echo "<h3><a href='/main/show_book/" . $book['id'] . "'>" . $book['title'] . "</a></h3>";
        }
         ?>
       </div>
      </div>
    </div> <!-- /container -->
  </div>
</body>
</html>