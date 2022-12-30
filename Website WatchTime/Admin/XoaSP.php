<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="XoaSP.php" method="POST">
        Ma san pham
        <br>
        <input type="delete" name="txtCode" id="">
        <br>
        <button type="submit" class="btnXoa">Xoa</button>
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
        if(isset($_POST["btnXoa"]))
        {
            $MaSP = $_POST["txtCode"];
            $sql = "DELETE FROM `tblproduct` WHERE `code` = '$MaSP' ";
            $kq = mysqli_query($conn,$sql);
            if($kq)
            {
                echo '<script language="javascript">alert("Xoa thanh cong!"); window.location="index.php";</script>';
            }
            else{
                echo '<script language="javascript">alert("Xoa khong thanh cong!"); window.location="ThemSP.php";</script>';
            }
        }
        else{}
    ?>
</body>
</html>