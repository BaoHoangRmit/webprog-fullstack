<?php
    session_start();

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
      
    } else {
      header('location: login-page.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Account</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

  <link rel="stylesheet" href="css/myaccount.css">
  <link rel="stylesheet" href="css/layout/layout.css">
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

  <?php 
      include_once 'layout/header.php';
  ?>

  <main class="vh-70" style="background-color: #f4f5f7;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-lg-6 mb-4 mb-lg-0">
          <div class="card mb-3 rounded-0">
            <div class="row g-0">
              <div class="col-md-4 gradient-custom text-center text-black d-flex justify-content-between flex-column align-items-center">
                <img src="<?php echo $_SESSION['current_user']['img'];?>" alt="Avatar"
                  class="img-fluid my-5" style="width: 140px;" />
                <button type="button" class="btn btn-outline-dark rounded-0 btn-sm mb-5">
                  Change Avatar
                </button>
              </div>
              <div class="col-md-8">
                <div class="card-body p-4">
                  <h6><?php echo $_SESSION['current_user']['username'];?></h6>
                  <hr class="mt-0 mb-4">
                  <div class="row pt-1">
                    <?php 
                      if ($_SESSION['current_user']['role'] != 'shipper') {
                        echo "<div class='col-6 mb-3'>";
                        echo "<h6>Name</h6>";
                        echo "<p class='text-muted'>" . $_SESSION['current_user']['name'] . "</p>";
                        echo "</div>";
                      }
                    ?>
                    <div class="col-6 mb-3">
                      <h6>Role</h6>
                      <p class="text-muted"><?php echo $_SESSION['current_user']['role'];?></p>
                    </div>
                    <?php 
                      if ($_SESSION['current_user']['role'] != 'shipper') {
                        echo "<div class='col-6 mb-3'>";
                        echo "<h6>Address</h6>";
                        echo "<p class='text-muted'>" . $_SESSION['current_user']['address'] . "</p>";
                        echo "</div>";
                      }
                    ?>
                    <?php 
                      if ($_SESSION['current_user']['role'] == 'shipper') {
                        echo "<div class='col-6 mb-3'>";
                        echo "<h6>Distribution Hub</h6>";
                        echo "<p class='text-muted'>" . $_SESSION['current_user']['hub'] . "</p>";
                        echo "</div>";
                      }
                    ?>
                    <div class="col-6 mb-3">
                      <button type="button" class="btn btn-outline-dark rounded-0 btn-sm mb-5">Logout</button>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php
      include_once 'layout/footer.html';
  ?>

</body>

</html>