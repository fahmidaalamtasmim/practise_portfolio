<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Gymove - Fitness Bootstrap Admin Dashboard</title>
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="/web dev 2205/Form Verification/dashboard_asset/images/favicon.png">
  <link href="/web dev 2205/Form Verification/dashboard_asset/css/style.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body class="h-100">
  <div class="authincation h-100">
    <div class="container h-100">
      <div class="row justify-content-center h-100 align-items-center">
        <div class="col-md-6">
          <div class="authincation-content">
            <div class="row no-gutters">
              <div class="col-xl-12">
                <div class="auth-form">
                  <div class="text-center mb-3">
                    <a href="index.html"><img src="/web dev 2205/Form Verification/dashboard_asset/images/logo-full.png" alt=""></a>
                  </div>
                  <h4 class="text-center mb-4 text-white">Sign in your account</h4>
                  <form action="register_post.php" method="POST">
                    <div class="form-group">
                      <label class="mb-1 text-white"><strong>Name</strong></label>
                      <input type="text" name="name" class="form-control" placeholder="name" value="<?= (isset($_SESSION['name_value']) ? $_SESSION['name_value'] : '') ?>">
                      <?php
                      if (isset($_SESSION['name'])) {

                      ?>
                        <strong class="text-danger">
                          <?= $_SESSION['name'] ?>
                        </strong>

                      <?php
                      }
                      ?>

                    </div>
                    <div class="form-group">
                      <label class="mb-1 text-white"><strong>Email</strong></label>
                      <input type="email" name="email" class="form-control" placeholder="hello@example.com" value="<?= (isset($_SESSION['email_value']) ? $_SESSION['email_value'] : '') ?>">
                      <?php
                      if (isset($_SESSION['email'])) {
                      ?>
                        <strong class="text-danger"><?= $_SESSION['email'] ?></strong>
                      <?php
                      }
                      ?>
                    </div>
                    <div class="form-group">
                      <label class="mb-1 text-white"><strong>Password</strong></label>
                      <input type="password" name="password" class="form-control" value="Password">
                      <?php
                      if (isset($_SESSION['password'])) {
                      ?>
                        <strong class="text-danger"><?= $_SESSION['password'] ?></strong>
                      <?php
                      }
                      ?>

                    </div>
                  
                    <div class="text-center">
                      <button type="submit" class="btn bg-white text-primary btn-block">Sign Me Up</button>
                    </div>
                  </form>
                  <div class="new-account mt-3">
                    <p class="text-white">Already have an account? <a class="text-white" href="login.php">Sign in</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!--**********************************
        Scripts
    ***********************************-->
  <!-- Required vendors -->
  <script src="/web dev 2205/Form Verification/dashboard_asset/vendor/global/global.min.js"></script>
  <script src="/web dev 2205/Form Verification/dashboard_asset/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
  <script src="/web dev 2205/Form Verification/dashboard_asset/js/custom.min.js"></script>
  <script src="/web dev 2205/Form Verification/dashboard_asset/js/deznav-init.js"></script>


  <!-- sweet alert installation link -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>





<!-- javascript code starts  -->
<script type="text/javascript">
  function showpass() {
    var pass = document.getElementById("pass");
    if (pass.type == 'password') {
      pass.type = 'text';
    } else {
      pass.type = 'password'
    }
  }
</script>
<!-- javascript code ends  -->





<!-- condition -->
<?php
if (isset($_SESSION['success'])) { ?>
  <script>
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: '<?= $_SESSION['success'] ?>',
      showConfirmButton: false,
      timer: 1500
    })
  </script>
<?php }
unset($_SESSION['success']) ?>



<!-- session destroy -->
<?php
unset($_SESSION['name']);
unset($_SESSION['email']);
unset($_SESSION['password']);
?>

</body>

</html>

<!-- works start from here -->

<!-- <div class="container">
    <div class="row">
      <div class="col-lg-8 m-auto">
        <div class="card mt-5">

          <div class="card-header bg-primary">
            <h3 class="text-white">Register Form</h3>
            
          </div>

          <div class="card-body">
            <form action="register_post.php" method="POST">
              
              <div class="mb-3">
                <label for="" class="form-label">Your Name</label>
                <input type="text" name="name" class="form-control" value="< ?= (isset($_SESSION['name_value']) ? $_SESSION['name_value'] : '') ?>" >
                < ?php
                if (isset($_SESSION['name'])) {
                 
                ?>
                  <strong class="text-danger">< ?= $_SESSION['name'] ?></strong>
                 
                < ?php
                }
                ?>
               
              </div>
              
              <div class="mb-3">
                <label for="" class="form-label">Your Email</label>
                <input type="text" name="email" class="form-control" value="< ?= (isset($_SESSION['email_value']) ? $_SESSION['email_value'] : '') ?>"  >
                < ?php
                if (isset($_SESSION['email'])) {
                ?>
                  <strong class="text-danger">< ?= $_SESSION['email'] ?></strong>
                < ?php
                }
                ?>
                
              </div>
              
              <div class="mb-3 pass-field">
                <label for="" class="form-label">Your Password</label>
                <input type="password" name="password" class="form-control" id="pass">
                
                <i class="fa fa-eye" onmouseover="showpass()"></i>
                < ?php
                if (isset($_SESSION['password'])) {
                ?>
                  <strong class="text-danger">< ?= $_SESSION['password'] ?></strong>
                < ?php
                }
                ?>
              </div>
              
              <div class="mb-3">
                <button type="submit" class="btn btn-primary">Resister</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div> -->


<!-- works ends here -->






