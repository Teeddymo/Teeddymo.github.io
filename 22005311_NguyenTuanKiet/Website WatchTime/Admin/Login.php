<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.
	0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="Dangnhap.css">
	<title>Đăng nhập</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" />
	<!-- font awesome 5.13.1 -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" />
</head>
<body>
	<?php
		$conn = mysqli_connect("localhost","root","");
		if (!$conn) {
			die('Khong the ket noi he quan tri : ');
			exit();
		}
		if (!mysqli_select_db($conn,"qlbh")) {
			die('Khong the ket noi voi CSDL : ' . mysqli_error($conn));
			exit();
		}
		mysqli_set_charset($conn,"uft8");
		header('Content-Type: text/html; charset = utf-8');
		if (isset($_POST["btnDN"])) {
			$User = $_POST["txtUsername"];
			$Pass = $_POST["txtMatKhau"];
			if (!$User || !$Pass) {
				echo '<script language="javascript">alert("Vui lòng nhập đầy đủ!"); window.location="Login.php";</script>';
				exit();
			}
			$query = mysqli_query($conn,"select Username , Pass , ChucVu from Admin where Username='$User'");
			if (mysqli_num_rows($query) == 0) {
				echo '<script language="javascript">alert("email không tồn tại!"); window.location="Login.php";</script>';
				exit();
			}
			$row = mysqli_fetch_array($query);
			if ($Pass != $row['Pass']) {
				echo '<script language="javascript">alert("Nhập mật khẩu sai!"); window.location="Login.php";</script>';
				exit();
			}
			$_SESSION['Username'] = $User;
			echo '<script language="javascript">alert("Chào mừng '.$row['Ten'].' vào lam viec !"); window.location="index.php";</script> ';
			die();
		}
		mysqli_close($conn);
	?>
				<div class="khungnho">
					<div class="khungtieude">
						<form name="FrmDK" method="POST" class="FrmDK" action="Login.php?do=login">
							<div class="tieude">
								<b>ĐĂNG NHẬP<b>
							</div>
							<br>
							<br>
							<label>Username</label>
							<br>
							<br>
							<input type="text" name="txtUsername" class="CD">
							<br>
							<br>
							<div class="form-group">
								<label for="ipnPassword">Password</label>
								<br>
								<br>
								<div class="input-group mb-3">
									<input type="password" class="control_pass" id="ipnPassword" name="txtMatKhau" />
									<div class="input-group-append">
										<button class="btn btn-outline-secondary" type="button" id="btnPassword">
											<span class="fas fa-eye"></span>
										</button>
									</div>
								</div>
							</div>
							<script src="eyes_show.js"></script>
							<br>
							<br>
							<input type="submit" name="btnDN" value="Đăng nhập" class="btnDN">
							<a href="ResetPass.php" class="Resetpass">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bạn quên mật khẩu?</a>
						</form>
					</div>
				</div>
			
</body>
</html>