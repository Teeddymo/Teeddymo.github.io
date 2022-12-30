<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="Dangky.css">
</head>
<body>
	<?php
        $conn = mysqli_connect("localhost","root","","qlbh");
        if (!$conn) {
            die('Khong the ket noi');
            exit();
        }
        mysqli_set_charset($conn,"utf8");
		if(isset($_POST['dangky'])){
			$Ho = mysqli_real_escape_string($conn, $_REQUEST['Ho']);
			$Ten = mysqli_real_escape_string($conn, $_REQUEST['Ten']);
			$Namsinh = mysqli_real_escape_string($conn, $_REQUEST['NamSinh']);
			$Phai = mysqli_real_escape_string($conn, $_REQUEST['Phai']);
			$SDT = mysqli_real_escape_string($conn, $_REQUEST['SDT']);
			$email = mysqli_real_escape_string($conn, $_REQUEST['Email']);
			$pass = mysqli_real_escape_string($conn, $_REQUEST['password']);
			$XacNhan = mysqli_real_escape_string($conn, $_REQUEST['Xacnhan']);
			$sql = "INSERT INTO customer (Ho, Ten, NamSinh, GioiTinh,SDT,Email,Pass,XacNhan) VALUES ('$Ho','$Ten','$NamSinh','$Phai','$SDT','$email','$pass','$XacNhan')";
			if (mysqli_query($conn,$sql)) {
				echo '<script language="javascript">alert("Ban dang ky thanh cong!"); window.location="trangchu.php";</script>';
			}
			else
			{
				echo '<script language="javascript">alert("Vui lòng kiem tra thong tin!"); window.location="Dangky.php";</script>';
			}
		}
	?>
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
				    		<input type="text" name="TimKiem" placeholder="Tìm kiếm...." class="timkiem"><i class="fa fa-search" aria-hidden="true"></i>
				    		<button type="submit"><a href="Login.php">Đăng nhập</a> </button>
				    		<button type="submit"><a href="Dangky.php">Đăng ký</a> </button>
				    	</form>
					</li>
		        </ul>  
		    </div>
		    <div class="main">
	        	<div class="khungnho">
					<div class="khungtieude">
						<div class="tieude">
							Đăng ký tài khoản
						</div>
					</div>
					<form class="frmDk" method="POST" action="Dangky.php" name="FrmDK">
					<label>Họ<span class="chuthich">*</span></label>
					<br>
					<br>
					<input type="text" name="Ho" value="" class="CD">
					<br>
					<br>
					<label>Tên<span class="chuthich">*</span></label>
					<br>
					<br>
					<input type="text" name="Ten" value="" class="CD">
					<br>
					<br>
					<label>Năm Sinh<span class="chuthich">*</span></label>
					<br>
					<br>
					<input type="text" name="NamSinh" value="" class="CD">
					<br>
					<br>
					<label>Giới tính<span class="chuthich">*</span></label>
					<br>
					<select class="CD_1" name="Phai">
						<option></option>
						<option>Nam</option>
						<option>Nữ</option>
						<option>Giới tính thứ N</option>
					</select>
					<br>
					<br>
					<hr>
					<br>
					<label>Số điện thoại<span class="chuthich">*</span></label>
					<br>
					<br>
					<input type="tel" name="SDT" value="" class="CD">
					<br>
					<br>
					<label>Email<span class="chuthich">*</span></label>
					<br>
					<br>
					<input type="email" name="Email" value="" class="CD">
					<br>
					<br>
					<label>Mật khẩu<span class="chuthich">*</span></label>
					<br>
					<br>
					<input type="password" name="password" value="" class="CD">
					<br>
					<br>
					<label>Xác nhận mật khẩu<span class="chuthich">*</span></label>
					<br>
					<br>
					<input type="password" name="Xacnhan" value="" class="CD">
					<br>
					<br>
					<button type="submit" class="btnDk" name="dangky">Tạo tài khoản</button>
					</form>
					<br>
					<br>
					<div class="tieudephu">
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

	</div>
	
</body>
</html>