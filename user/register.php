<?php require_once('../config.php') ?>
<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
<?php require_once('../inc/header.php') ?>

<body class="hold-transition login-page">
  <script>
    start_loader()
  </script>
  <style>
    body {
      background-image: url("<?php echo validate_image($_settings->info('cover')) ?>");
      background-size: cover;
      background-repeat: no-repeat;
    }

    .login-title {
      text-shadow: 1px 1px black
    }
  </style>
  <h1 class="text-center text-light py-5 login-title"><b><?php echo $_settings->info('name') ?></b></h1>
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="./" class="h1"><b>Register as User</b></a>
      </div>
      <div class="card-body pb-0">
        <div class="container-fluid">
          <div id="msg"></div>
          <form action="" id="manage-user">
            <input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id'] : '' ?>">
            <div class="form-group col-12">
              <label for="name">First Name</label>
              <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo isset($meta['firstname']) ? $meta['firstname'] : '' ?>" required>
            </div>
            <div class="form-group col-12">
              <label for="name">Last Name</label>
              <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo isset($meta['lastname']) ? $meta['lastname'] : '' ?>" required>
            </div>
            <div class="form-group col-12">
              <label for="username">Username</label>
              <input type="text" name="username" id="username" class="form-control" value="<?php echo isset($meta['username']) ? $meta['username'] : '' ?>" required autocomplete="off">
            </div>
            <div class="form-group col-12">
              <label for="password">Password</label>
              <input type="password" name="password" id="password" class="form-control" value="" autocomplete="off" <?php echo isset($meta['id']) ? "" : 'required' ?>>
              <?php if (isset($_GET['id'])) : ?>
                <small><i>Leave this blank if you dont want to change the password.</i></small>
              <?php endif; ?>
            </div>
            <div class="form-group col-12 ">
              <label for="" class="control-label">Avatar</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input rounded-circle" id="customFile" name="img" onchange="displayImg(this,$(this))">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
            </div>
            <div class="form-group col-12 d-flex justify-content-center">
              <img src="<?php echo validate_image(isset($meta['avatar']) ? $meta['avatar'] : '') ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
            </div>
          </form>
        </div>
      </div>
      <div class="card-footer text-center">
        <div class="col-md-12 col-12 d-flex flex-column justify-content-center align-items-center">
          <div class="row">
            <button class="btn  btn-primary mr-2" form="manage-user">Register</button>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->
  <style>
    img#cimg {
      height: 15vh;
      width: 15vh;
      object-fit: cover;
      border-radius: 100% 100%;
    }
  </style>
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <script>
    function displayImg(input, _this) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#cimg').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }
    $('#manage-user').submit(function(e) {
      e.preventDefault();
      var _this = $(this)
      start_loader()
      $.ajax({
        url: _base_url_ + 'classes/Users.php?f=save',
        data: new FormData($(this)[0]),
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST',
        success: function(resp) {
          if (resp == 1) {
            alert("User created successfully");
            location.href = '<?php echo base_url?>user/login.php';
          } else {
            $('#msg').html('<div class="alert alert-danger">Username already exist</div>')
            $("html, body").animate({
              scrollTop: 0
            }, "fast");
          }
          end_loader()
        }
      })
    })
  </script>
  <script>
    $(document).ready(function() {
      end_loader();
    })
  </script>
</body>

</html>