<?php  
session_start();

require '../../config.php';
require '../libs/database.php';
$url = constant('BASE_URL');
if(isset($_SESSION['level'])){
  header("Location: ".$url."dashboard/".$_SESSION['level']."/pages/index.php");
    }
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

      <div class="x_content">
        <img class="mid_center  img-responsive" style="width:157px; height:137px" src="../../images/logo MA.png" alt="image">
        <h3 align="center">SIMPOPEL MA HASANAH PEKANBARU</h3>
      </div>
      <div class="clearfix"></div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form name="login" action="" method="post">
              <h1>Silahkan Login</h1>
              <div>
                <input type="text" class="form-control"  placeholder="Username" required="" name="username" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="password" />
              </div>
              <div>
                <button name="login" class="btn btn-default submit" type="submit">Log in</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div class="clearfix"></div>
                <br />
                <div>
                  <p>©2017 All Rights Reserved. </p>
                </div>
              </div>
            </form>
          </section>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </body>
</html>
<?php 
	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = md5($_POST['password']);
    $id = $_GET['id'];
    $sql = "SELECT * FROM tabeluser where username='$username' AND password='$password'";
    $result = mysqli_query($dbConnection, $sql);
    $row = mysqli_fetch_assoc($result);

		$_SESSION['id'] = $row['idUser'];
		$_SESSION['nama'] = $row['username'];
		$_SESSION['level'] = $row['hak'];
		
		if ($result){
				if ($row['hak'] == 'admin'){
					echo "<script>window.alert('Selamat Datang $row[username]');
					window.location='../admin/pages/index.php'</script>";
				}elseif($row['hak'] == 'piket'){
					echo "<script>window.alert('Selamat Datang $row[username].');
					window.location='../piket/views/pages/index.php'</script>";
				}elseif($row['hak'] == 'kepsek'){
          echo "<script>window.alert('Selamat Datang $row[username].');
          window.location='../kepsek/pages/index.php'</script>";
        }elseif($row['hak'] == 'kesiswaan'){
          echo "<script>window.alert('Selamat Datang $row[username].');
          window.location='../kesiswaan/pages/index.php'</script>";
        }else{
					echo "<script>window.alert('Maaf, Username Tidak Ada');
					window.location='login.php'</script>";
				}
		}
	} else {
		# code...
	}
 ?>