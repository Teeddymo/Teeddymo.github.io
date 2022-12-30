<?php
session_start();
require_once("config.php");


//code for Cart
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	//code for adding product in cart
	case "add":
		if(!empty($_POST["quantity"])) {
			$pid=$_GET["pid"];
			$result=mysqli_query($con,"SELECT * FROM tblproduct WHERE id='$pid'");
	        
			while($productByCode=mysqli_fetch_array($result)){
			$itemArray = array($productByCode["code"]=>array('name'=>$productByCode["name"], 'code'=>$productByCode["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode["price"], 'image'=>$productByCode["image"]));
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			}  else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	}
	break;

	// code for removing product from cart
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	// code for if cart is empty
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Trang chu</title>
	<link rel="stylesheet" href="index.css">
	
	<!-- font awesome 5.13.1 -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" />

</head>
<body>
	<script>
		window.alert("Chào mừng bạn đến với web bán đồng hồ WatchTime !!!");
	</script>
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
		    <div class="khung_callmess">
		    	<a href=""><img src="images/9.png"></a>
		    	<a href=""><img src="images/10.png"></a>
		    	<a href=""><img src="images/11.png"></a>
		    </div>
		    <div class="main">
		    	<div class="loantruyen">
		    		<img src="images/thuonghieu.png" class="loantruyen_1">
		    		<img src="images/loantruyen.png" class="loantruyen_2">
		    	</div>
		    	<div class="soluoc">
		    		<div class="tuade">
		    			<i >ĐỒNG HỒ WATCHTINE</i>
		    		</div>
		    		<br>
		    		<p>WatchTime ra đời với một tinh thần thay đổi ngành đồng hồ Việt Nam và mục tiêu cao cả: tư vấn lựa chọn và phân phối Đồng Hồ Chính Hãng ở mức giá hợp lý và vừa phải nhất cho khách hàng, ngoài ra cũng tiên phong trong cuộc chiến bài trừ đồng hồ Fake khỏi thị trường Việt Nam</p>
		    		<br>
		    		<br>
		    		<div class="separator"><b><i>VÌ SAO KHÁCH HÀNG TIN TƯỞNG VÀ LỰA CHỌN WATCH TIME</i></b></div>
		    	</div>
		    	<div class="khung_CCDV">
		    		<div class="CCDV">
		    			<span>CAM KẾT CHÍNH HÃNG 100%</span><div><img src="images/icon_1.jpg"></div>
		    			<p>Hệ thống Watchtime luôn tự hào là đại lý phân phối chính thức của các thương hiệu đồng hồ nổi tiếng Nhật Bản và Thụy Sỹ: Casio, Orient, Seiko, Citizen, Ogival, Olympia,…với đầy đủ giấy chứng nhận ủy quyền của hãng.</p>
		    			<br>
		    			<br>
		    			<span>BẢO HÀNH CHUẨN QUỐC TẾ</span><div><img src="images/icon_2.jpg"></div>
		    			<br>
		    			<p>Với trang thiết bị hiện đại được nhập khẩu trực tiếp từ Thụy Sỹ, phòng
		    			bảo hành đạt chuẩn quốc tế cùng đội ngũ chuyên viên kỹ thuật lành nghề, Watchtime tự hào là nơi cung cấp dịch vụ bảo dưỡng – sửa chữa tốt nhất và được nhiều khách hàng tin tưởng lựa chọn nhất Việt Nam.</p>
					</div>
		    		<div class="CCDV">
		    			<span>DỊCH VỤ HẬU MÃI TRỌN ĐỜI</span><div><img src="images/icon_3.jpg"></div>
		    			<br>
		    			<p>Watchtime luôn có những chính sách ưu đãi tốt nhất dành cho những quý khách hàng đã mua hàng tại Watchtime : thay pin, lau dầu, chăm sóc đồng hồ miễn phí trọn đời (trừ CASIO). Giảm giá 50% khi thay thế linh phụ kiện, thẻ VIP chiết khấu ưu đãi cho lần mua sau.</p>
		    			<br>
		    			<br>
		    			<span>THANH TOÁN - ĐỔI TRẢ DỄ DÀNG</span><div><img src="images/icon_4.jpg"></div>
		    			<br>
		    			<p>Quý khách cảm thấy không yên tâm khi mua hàng Online? Bạn sợ sản phẩm thực tế không được như quảng cáo. Vậy thì hình thức thanh toán COD : nhận hàng rồi mới trả tiền của Watchtime giúp bạn hoàn toàn yên tâm khi mua hàng.
						Ngoài ra, quý khách hoàn toàn có thể đổi trả dễ dàng trong vòng 30 ngày nếu như kích thước không phù hợp, màu sắc không như ý hay người mà bạn tặng quà chưa hài lòng.</p>
		    		</div>
		    	</div>
		    	<div class="bangchu">
		    		<div class="TD">
			    		<div class="AB"></div>
			    		<div class="AC">
			    			<div class="text_1">CÁC HÃNG ĐỒNG HỒ BẠN CÓ THỂ TÌM THẤY TẠI WATCHTIME</div>
			    		</div>
		    		</div>
		    	</div>
		    	<div class="NhaPhanPhoi">
		    		<p>Watchtime tự hào là đơn vị phân phối 22 hãng đồng hồ trên thế giới với đầy đủ giấy tờ ủy quyền của hãng</p>
		    		<div class="logo">
		    			<marquee direction="left" loop="INFINITE" behavior="alternate">
		    				<div>
		    					<a href=""><img src="images/logo_1.jpg"></a>
		    					<a href=""><img src="images/logo_2.jpg"></a>
		    					<a href=""><img src="images/logo_3.jpg"></a>
		    					<a href=""><img src="images/logo_4.jpg"></a>
		    					<a href=""><img src="images/logo_5.jpg"></a>
		    					<a href=""><img src="images/logo_6.jpg"></a>
		    					<a href=""><img src="images/logo_7.jpg"></a>
		    				</div>
		    			</marquee>
		    		</div>
		    	</div>
		    	<div class="bangchu_1">
		    		<div class="TD">
			    		<div class="AB"></div>
			    		<div class="AC">
			    			<div class="text_1">MẪU ĐỒNG HỒ HOT NHẤT TẠI WATCHTIME</div>
			    		</div>
		    		</div>
		    	</div>
		    	<div class="khungsanpham">
                    	<div class="khung">
                            <?php
                            $product= mysqli_query($con,"SELECT * FROM tblproduct ORDER BY id ASC");
                            if (!empty($product)) { 
                                while ($row=mysqli_fetch_array($product)) {
                                
                            ?>
                                <div class="product-item">
                                    <form method="post" action="index.php?action=add&pid=<?php echo $row["id"]; ?>">
									<div class="khunganh">
										<div class="slide_1">
											<span class="giamgia"><b>OFF 10%</b></span>
											<span class="banchay"><b>Bán chạy</b></span>
										</div>
                                    	<div class="slide_2"><a href="<?php echo $row["lk"]; ?>"><img src="<?php echo $row["image"]; ?>" class="picture_product"></a></div>
									</div>
                                    <div class="sanpham"><a href=""><?php echo $row["name"]; ?></a></div>
									<div class="gia">
										<del><?php echo $row["price-del"]."VND"; ?></del>
										<br>
                                    	<b><?php echo $row["price"]."VND"; ?></b>
									</div>
                                    <div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Thêm vào giỏ hàng" class="btnAddAction" /></div>
                                    </div>
                                    </form>
                                </div>
                            <?php
                                }
                            }  else {
                            echo "No Records.";
                            }
                            ?>
                        </div>
				</div>
				<div class="bangchu_2">
					<div class="TD">
						<div class="AB"></div>
						<div class="AC">
						<div class="text_1">ĐỒNG HỒ MỚI NHẤT</div>
						</div>
					</div>
				</div>
				<div class="khungsanpham_1">
					<div class="khung">
						<div class="khunganh">
							<div class="slide_2">
								<a href="sanpham9.html"><img src="img_sanpham/9.jpg" class="picture_product"></a>
							</div>
						</div>
						<div class="sanpham">
							<a href=""><b>Mathey Tissot EDMOND QUARTZ H1886QPI</b></a>
						</div>
						<div class="gia">
							<del>-</del>
							<br>
							<b>12.076.000 VND</b>
						</div>
					</div>
					<div class="khung">
						<div class="khunganh">
							
							<div class="slide_2">
								<a href="sanpham10.html"><img src="img_sanpham/10.jpg" class="picture_product"></a>
							</div>
						</div>
						<div class="sanpham">
							<a href=""><b>Mathey Tissot EVASION D152AI-WOMEN</b></a>
						</div>
						<div class="gia">
							<del>-</del>
							<br>
							<b>7.236.000 VND</b>
						</div>
					</div>
					<div class="khung">
						<div class="khunganh">
							
							<div class="slide_2">
								<a href="sanpham11.html"><img src="img_sanpham/11.jpg" class="picture_product"></a>
							</div>
						</div>
						<div class="sanpham">
							<a href=""><b>Mathey Tissot Max D2111BI2-WOMEN</b></a>
						</div>
						<div class="gia">
							<del>-</del>
							<br>
							<b>6.268.000 VND</b>
						</div>
					</div>
					<div class="khung">
						<div class="khunganh">
							
							<div class="slide_2">
								<a href="sanpham12.html"><img src="img_sanpham/12.jpg" class="picture_product"></a>
							</div>
						</div>
						<div class="sanpham">
							<a href=""><b>Mathey Tissot ROLLY VINTAGE AUTOMATIC H900ATBU</b></a>
						</div>
						<div class="gia">
							<del>-</del>
							<br>
							<b>16.916.000 VND</b>
						</div>
					</div>
					<div class="khung">
						<div class="khunganh">
							
							<div class="slide_2">
								<a href="sanpham13.html"><img src="img_sanpham/13.jpg" class="picture_product"></a>
							</div>
						</div>
						<div class="sanpham">
							<a href=""><b>Mathey Tissot Elisir H680BBR-MEN</b></a>
						</div>
						<div class="gia">
							<del>-</del>
							<br>
							<b>9.172.000 VND</b>
						</div>
					</div>
					<div class="khung">
						<div class="khunganh">
							
							<div class="slide_2">
								<a href="sanpham14.html"><img src="img_sanpham/14.jpg" class="picture_product"></a>
							</div>
						</div>
						<div class="sanpham">
							<a href=""><b>Mathey Tissot Fiore D1089AI</b></a>
						</div>
						<div class="gia">
							<del>-</del>
							<br>
							<b>7.236.000 VND</b>
						</div>
					</div>
					<div class="khung">
						<div class="khunganh">
							
							<div class="slide_2">
								<a href="sanpham15.html"><img src="img_sanpham/15.jpg" class="picture_product"></a>
							</div>
						</div>
						<div class="sanpham">
							<a href=""><b>Mathey Tissot Max H2111ABU</b></a>
						</div>
						<div class="gia">
							<del>-</del>
							<br>
							<b>6.752.000 VND</b>
						</div>
					</div>
					<div class="khung">
						<div class="khunganh">
							<div class="slide_2">
								<a href="sanpham16.html"><img src="img_sanpham/16.jpg"></a>
							</div>
						</div>
						<div class="sanpham">
							<a href=""><b>
						Mathey Tissot SMART AUTOMATIC H6940ATS</b></a>
						</div>
						<div class="gia">
							<del>-</del>
							<br>
							<b>16.916.000 VND</b>
						</div>
					</div>
				</div>
			</div>
				<div class="khungtieudecuoi">
					<div class="khungchuatin">
						<div class="khunganh_1">
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