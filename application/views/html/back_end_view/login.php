<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSS-->
  <link rel="stylesheet" type="text/css" href="<?= base_url('public_html/back_end/css/main.css'); ?>">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Admin Login | asconstruction | Azad Kamboj </title>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
  <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
</head>

<body>
  <section class="material-half-bg">
    <div class="cover"></div>
  </section>
  <section class="login-content">
    <div class="logo">
      <h1>Asconstruction</h1>
    </div>

    <?php include_once('message.php'); ?>
    </div>
    <div class="login-box">



      <form class="login-form" action="<?= base_url('backend_controller/login'); ?>" method="POST">
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
        <div class="form-group">
          <label class="control-label">USERNAME</label>
          <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
          <input class="form-control" type="text" name="username" placeholder="Please Enter Username" required="required" autofocus="autofocus" />
        </div>
        <div class="form-group">
          <label class="control-label">PASSWORD</label>
          <input class="form-control" type="password" placeholder="Password" name="password" placeholder="Please Enter Password" required="required" />
        </div>

        <div class="form-group btn-container">
          <button class="btn btn-primary btn-block" name="sign_in"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
        </div>
      </form>
    </div>
  </section>
</body>
<script src="<?= base_url('public_html/back_end/js/jquery-2.1.4.min.js'); ?>"></script>
<script src="<?= base_url('public_html/back_end/js/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('public_html/back_end/js/plugins/pace.min.js'); ?>"></script>
<script src="<?= base_url('public_html/back_end/js/main.js'); ?>"></script>

</html>