<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="ThemSP.php" method="POST">
        Ma san pham
        <br>
        <input type="text" name="code" id="code">
        <br>
        Ten san pham
        <br>
        <input type="text" name="name" id="name">
        <br>
        Gia hien tai
        <br>
        <input type="text" name="price" id="price">
        <br>
        Gia ban dau 
        <br>
        <input type="text" name="price-del" id="price-del">
        <br>
        Hinh anh 
        <br>
        <input type="text" name="image" id="img">
        <br>
        <button type="submit" name="btnThem">Them</button>
    </form>
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
        if(isset($_POST["btnThem"]))
        {
            $MaSP = $_POST["code"];
            $TenSP = $_POST["name"];
            $GiaHT = $_POST["price"];
            $GiaBD = $_POST["price-del"];
            $HinhAnh = $_POST["image"];
            $sql = "INSERT INTO 'tblproduct' ('name','code','image','price','price-del') values ('$TenSP','$MaSP','$HinhAnh','$GiaHT','$GiaBD');";
            if(mysqli_query($conn,$sql))
            {
                echo '<script language="javascript">alert("Them thanh cong!"); window.location="index.php";</script>';
            }
            else{
                echo '<script language="javascript">alert("Them khong thanh cong!"); window.location="ThemSP.php";</script>';
            }
        }
    ?>
</body>
</html>