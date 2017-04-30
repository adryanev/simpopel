<?php  
session_start();
require '../../libs/config.php';

?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login Simpopel</title>

    <!-- Bootstrap -->
    <link href="../assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../assets/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../assets/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../assets/custom.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div>
        <img class="mid_center logo_login" src="../../images/logo_ma.png">

      </div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="" method="post">
              <h1>Silahkan Login</h1>
              <div>
                <input type="text" class="form-control"  placeholder="Username" required="" name="username" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="password" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Log in</a>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1>SIMPOPEL MA HASANAH PEKANBARU</h1>
                  <p>©2017 All Rights Reserved. </p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
              <input type="submit" name="login"
              value="login" class="btn btn-default submit">
                <!-- <a class="btn btn-default submit" href="index.html">Submit</a> -->
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
<?php 
	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = sha1($_POST['password']);
		$login =$login = mysqli_query("SELECT * FROM tb_users 
					where username='$userlogin' AND password='$passlgoin'");
		$cek = mysqli_num_rows($login);
		$r = mysqli_fetch_assoc($login);
		$_SESSION[id] = $r['id_user'];
		$_SESSION[nama] = $r['nama_lengkap'];
		$_SESSION[level] = $r['level'];
		
		if ($cek >= 1){
				if ($r['level'] == 'admin'){
					echo "<script>window.alert('Selamat Datang Admin $r[nama_lengkap]');
					window.location='$config[site]admin.page'</script>";
				}elseif($r['level'] == 'user'){
					echo "<script>window.alert('Selamat Datang $r[nama_lengkap].');
					window.location='$config[site]user.page'</script>";
				}else{
					echo "<script>window.alert('Maaf, Username atau Password Anda Salah..');
					window.location='$config[site]login'</script>";
				}
		
			echo "<script>window.alert('Maaf, Username atau Password Anda Salah..');
				window.location='login'</script>";
		}
	} else {
		# code...
	}
	
 ?>