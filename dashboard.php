<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">My Blog Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Post</button>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Logout</a>
        </li>
    </ul>
</div>
</nav>
</header>
<div class="container">
      <h1>Blog Post Form</h1>
      <form  method="post" action="./database/blog.php">
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
<section>
  <div class="container my-4">
    <h1 class="mb-4">Blog Posts</h1>
    <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Blogs</button>
        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">My Blogs</button>
      </div>
    </nav>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="row">
          <?php
          session_start();
          require ('./database/DbConnection.php');
          $newObj = new DBConnection();
          $conn = $newObj->getConnection();

          $sql= "SELECT * from posts";
          $result = $conn->query($sql);
          if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
              echo'<div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <img class="card-img-top" src="https://via.placeholder.com/300x200" alt="">
                <div class="card-body">
                  <h4 class="card-title">'.$row["title"].'</h4>
                  <p class="card-text">'.$row["description"].'</p>
                </div>
              </div>
            </div>';
            }
          }
          ?>
          
          <!-- <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <img class="card-img-top" src="https://via.placeholder.com/300x200" alt="">
              <div class="card-body">
                <h4 class="card-title">Blog Post 2</h4>
                <p class="card-text">Suspendisse lobortis leo vitae nunc auctor, eu laoreet nisi aliquam. </p>
              </div>
              <div class="card-footer">
                <a href="#" class="btn btn-primary">Read More</a>
              </div>
            </div>
          </div> -->
          <!-- Add more blog cards here -->
        </div>
    </div>
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
      <div class="row">
      <?php
          $newObj = new DBConnection();
          $conn = $newObj->getConnection();
          $id = $_SESSION['id'];
          $sql= "SELECT * from posts where user_id=$id";
          $result = $conn->query($sql);
          if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
              echo'<div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <img class="card-img-top" src="https://via.placeholder.com/300x200" alt="">
                <div class="card-body">
                  <h4 class="card-title">'.$row["title"].'</h4>
                  <p class="card-text">'.$row["description"].'</p>
                </div>
              </div>
            </div>';
            }
          }else{
            echo'<h1>There is no data</h1>';
          }
          ?>
      </div>
    </div>

</div>
  
  </div>
</section>

<!-- <div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">...</div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">qsdqsdqsd</div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">3333</div>
</div> -->

</body>
</html>