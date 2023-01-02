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
<HTML>
<HEAD>
<TITLE>GIỎ HÀNG</TITLE>
<link href="style.css" type="shoppingcart/css" rel="stylesheet" />
<link rel="stylesheet" href="index.css">
</HEAD>
<BODY>
<div class="khungchinh">
	    <div class="khung_menu">
		    <ul>
			    <li><a href="trangchu.php">Trang chủ</a></li>
			    <li class="menu">
			    	<a class="menu-btn">Đồng hồ nam</a>
			    	<div class="menu-content">
			    		<a href="sanpham7.html">Orient nam</a>
			    		<a href="sanpham8.html">Olympia nam</a>
			    		<a href="sanpham9.html">Ogival nam</a>
			    		<a href="sanpham10.html">Casio nam</a>
			    		<a href="sanpham11.html">SeiKo nam</a>
			    		<a href="sanpham12.html">Citizen nam</a>
			    		<a href="#">Mathey Tissot nam</a>
			    	</div>
			    </li>
			    <li class="menu">
			    	<a class="menu-btn">Đồng hồ nữ</a>
			    	<div class="menu-content">
			    		<a href="sanpham1.html">Orient nữ</a>
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
	        <!-- Cart ---->
			<div id="shopping-cart">
			<div class="txt-heading" style="font-size: 21px;">Shopping Cart</div>

			<a class="empty" href="index.php?action=empty" style="text-decoration: none;">Empty Cart</a>
			<?php
			if(isset($_SESSION["cart_item"])){
				$total_quantity = 0;
				$total_price = 0;
			?>	
			<table class="tbl-cart" cellpadding="10" cellspacing="1">
				<tbody>
					<tr>
						<th style="text-align:left;">Tên sản phẩm</th>
						<th style="text-align:left;">Mã sản phẩm</th>
						<th style="text-align:right;" width="10%">Số lượng</th>
						<th style="text-align:right;" width="10%">Đơn giá</th>
						<th style="text-align:right;" width="10%">Gía tiền</th>
						<th style="text-align:center;" width="5%">Remove</th>
					</tr>	
					<?php		
						foreach ($_SESSION["cart_item"] as $item){
							$item_price = $item["quantity"]*$item["price"];
							?>
									<tr>
									<td><a href="" style="text-decoration: none;"><img src="<?php echo $item["image"]; ?>" class="product-images" /><?php echo $item["name"]; ?></a></td>
									<td><?php echo $item["code"]; ?></td>
									<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
									<td  style="text-align:right;"><?php echo $item["price"]."VND"; ?></td>
									<td  style="text-align:right;"><?php echo  number_format($item_price,2)."VND"; ?></td>
									<td style="text-align:center;"><a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
									</tr>
									<?php
									$total_quantity += $item["quantity"];
									$total_price += ($item["price"]*$item["quantity"]);
							}
							?>

					<tr>
					<td colspan="2" align="right">Tổng số tiền:</td>
					<td align="right"><?php echo $total_quantity; ?></td>
					<td align="right" colspan="2"><strong><?php echo number_format($total_price, 2)."VND"; ?></strong></td>
					<td></td>
					</tr>
				</tbody>
			</table>		
			<?php
			} else {
			?>
			<div class="no-records">Your Cart is Empty</div>
			<?php 
			}
			?>
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








</BODY>
</HTML>