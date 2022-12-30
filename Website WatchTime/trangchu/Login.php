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
			$email = $_POST["txtEmail"];
			$Pass = $_POST["txtMatKhau"];
			if (!$email || !$Pass) {
				echo '<script language="javascript">alert("Vui lòng nhập đầy đủ!"); window.location="Login.php";</script>';
				exit();
			}
			$query = mysqli_query($conn,"select Email , Pass , Ten from customer where Email='$email'");
			if (mysqli_num_rows($query) == 0) {
				echo '<script language="javascript">alert("email không tồn tại!"); window.location="Login.php";</script>';
				exit();
			}
			$row = mysqli_fetch_array($query);
			if ($Pass != $row['Pass']) {
				echo '<script language="javascript">alert("Nhập mật khẩu sai!"); window.location="Login.php";</script>';
				exit();
			}
			$_SESSION['Email'] = $email;
			echo '<script language="javascript">alert("Chào mừng '.$row['Ten'].' vào shop WatchTime !"); window.location="trangchu.php";</script> ';
			die();
		}
		mysqli_close($conn);
	?>
	<div class="khungchinh">
	        <div class="khungchinh">
	        <div class="khung_menu">
		        <ul>
				    <li><a href="trangchu.php">Trang chủ</a></li>
				    <li class="menu">
				    	<a class="menu-btn">Đồng hồ nam<i class="fa fa-caret-down icon"></i></a>
				    	<div class="menu-content">
				    		<a href="sanpham7.html" class="vien">Orient nam</a>
				    		<a href="sanpham8.html">Olympia nam</a>
				    		<a href="sanpham9.html">Ogival nam</a>
				    		<a href="sanpham10.html">Casio nam</a>
				    		<a href="sanpham11.html">SeiKo nam</a>
				    		<a href="sanpham12.html">Citizen nam</a>
				    		<a href="#">Mathey Tissot nam</a>
				    	</div>
				    </li>
				    <li class="menu">
				    	<a class="menu-btn">Đồng hồ nữ<i class="fa fa-caret-down icon"></i></a>
				    	<div class="menu-content">
				    		<a href="sanpham1.html" class="vien">Orient nữ</a>
				    		<a href="sanpham2.html">Olympia nữ</a>
				    		<a href="sanpham3.html">Ogival nữ</a>
				    		<a href="sanpham4.html">Casio nữ</a>
				    		<a href="sanpham5.html">SeiKo nữ</a>
				    		<a href="sanpham6.html">Citizen nữ</a>
				    		<a href="#">Mathey Tissot nữ</a>
				    	</div>
				    </li>
				    <li class="menu">
				    	<a class="menu-btn">Dịch vụ<i class="fa fa-caret-down icon"></i></a>
				    	<div class="menu-content">
			    		<a href="baoduong.html">Bảo dưỡng</a>
			    		<a href="suachua.html">Sửa chữa</a>
			    		<a href="thaypin.html">Thay pin</a>
			    	</div>				    
			    	</li>
				    <li><a href="cuahang.html">Cửa hàng</a></li>
				    <li><a href="gioithieu.html">Giới thiệu</a></li>
				    <li>
				    	<form class="frmCC">
				    		<button type="submit"><a href="Login.php">Đăng nhập</a> </button>
				    		<button type="submit"><a href="Dangky.php">Đăng ký</a> </button>
				    	</form>
					</li>
		        </ul>  
		    </div>
			<div class="main">
				<div class="khungnho">
					<div class="khungtieude">
						<form name="FrmDK" method="POST" class="FrmDK" action="Login.php?do=login">
							<div class="tieude">
								<b>ĐĂNG NHẬP<b>
							</div>
							<br>
							<br>
							<label>Email</label>
							<br>
							<br>
							<input type="email" name="txtEmail" class="CD">
							<br>
							<br>
							<div class="form-group">
								<label for="ipnPassword">Mật Khẩu</label>
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
						<div class="tieudephu">
							<br>
							<hr>
							<p class="cauhoi">
								Bạn đã có tài khoản chưa?
							</p>
							<br>
							<p><a href="dangky.html">Tạo tài khoản</a>&nbsp;có nhiều lợi ích: thanh toán nhanh hơn, giữ nhiều hơn một địa chỉ, theo dõi đơn đặt hàng và hơn thế nữa.</p>
							<br>
							<div class="hoatanh">
								<div class="layer1">
									<img src="images/Google.png" alt="" class="hinh">
								</div>
								<div class="layer2"><a href=""></a></div>
							
							</div>
							<div class="hoatanh">
								<div class="layer1">
									<img src="images/Facebook.png" alt="" class="hinh">
								</div>
								<div class="layer2"><a href="https://vi-vn.facebook.com/"></a></div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="khungtieudecuoi">
						<div class="khungchuatin">
							<div class="khunganh">
								<img src="images/1.png">
							</div>
							<div class="khungcuoi">
								<div class="taocot">
									<div class="khunghethong">
										<p class="font-chinh">HỆ THỐNG SHOWROOM ĐỒNG HỒ CỦA WATCHTIME</p>
										<br>
										<div class="khungdiachi">
											<div>
												<span class="font-phu_1">Hà Nội</span>
												<p class="font-phu_2">Showroom 1</p>
												<br>
												<span class="font-phu_1">TP HỒ CHÍ MINH</span>
												<p class="font-phu_2">Showroom 3</p>
												<br>
												<span class="font-phu_1">DỊCH VỤ SỬA CHỮA, BẢO HÀNH</span>
											</div>
											<div class="font-chu">
												<br>
												<span >235 Bạch Mai-Hai Bà Trưng-Hà Nội</span>
												<br>
												<a href="">024 66 55 22 03</a> - <a href="">0974 099 090</a>
												<br>
												<br>
												<span>58 Nguyễn Cư Trinh, Q.1 TP HCM</span>
												<br>
												<a href="">0986 686 909</a>
												<br>
												<br>
												<span>Số 235 Bạch Mai-Hai Bà Trưng-Hà Nội</span>
												<br>
												<br>
												<a href="">024 66 55 22 03</a> - <a href="">0974 099 090</a>
											</div>
										</div>
									</div>
									<div class="khunggioithieu">
										<p class="font-chinh">&nbsp;&nbsp;&nbsp;VỀ CHÚNG TÔI</p>
										<br>
										<div>
											<a href="">&nbsp;&nbsp;&nbsp;&nbsp;Giới thiệu WatchTime</a>
											<br>
											<a href="">&nbsp;&nbsp;&nbsp;&nbsp;Hệ thống cửa hàng</a>
										</div>
										<a href="">&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/2.png"></a>
										<br>
										<a href="">&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/3.png"></a>
									</div>
									<div class="khungchinhsach">
										<p class="font-chinh">&nbsp;&nbsp;&nbsp;CHÍNH SÁCH</p>
										<br>
										<a href="">&nbsp;&nbsp;&nbsp;&nbsp;Hướng dẫn mua hàng</a>
										<br>
										<a href="">&nbsp;&nbsp;&nbsp;&nbsp;Phương thức thanh toán</a>
										<br>
										<a href="">&nbsp;&nbsp;&nbsp;&nbsp;Phương thức vẫn chuyển</a>
										<br>
										<a href="">&nbsp;&nbsp;&nbsp;&nbsp;Chính sách bảo hành</a>
										<br>
										<a href="">&nbsp;&nbsp;&nbsp;&nbsp;Chính sách đổi trả và hoàn tiền</a>
										<br>
										<a href="">&nbsp;&nbsp;&nbsp;&nbsp;Chính sách bảo mật thông tin</a>
										<br>
										<a href="">&nbsp;&nbsp;&nbsp;&nbsp;Chính sách khách hàng thân thiện</a>
									</div>
									<div class="lk_web">
										<a href=""><img src="images/4.png"></a>
										<a href=""><img src="images/5.png"></a>
										<a href=""><img src="images/6.png"></a>
										<br>
										<a href=""><img src="images/7.png"></a>
										<a href=""><img src="images/8.png"></a>
									</div>
								</div>
							</div>
						</div>
    		</div>
</body>
</html>