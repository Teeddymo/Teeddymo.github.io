<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $conn = mysqli_connect("localhost","root","","qlbh");
    if (!$conn) {
        die('Khong the ket noi he quan tri : ');
        exit();
    }
    if (!mysqli_select_db($conn,"qlbh")) {
        die('Khong the ket noi voi CSDL : ' . mysqli_error($conn));
        exit();
    }
    mysqli_set_charset($conn,"uft8");
    $sql = "select * from tblproduct";
    $kq = mysqli_query($conn,$sql);
    if(mysqli_num_rows(mysqli_query($conn,$sql)) <> 0)
    {
        echo "<table width = '1030' height = '25' border='0'>";
        echo "<tr>";
        echo "<td align='center'><h2><b>Danh sach san pham</b></h2></td>";
        echo "</tr>";
        echo "</table>";
        echo "<table>";
        echo "<tr>";
        echo "<td width='44' height='23' align='center'>STT</td>";
        echo "<td width='120' align='center'>Ma san pham</td>";
        echo "<td width='250' align='center'>Ten san pham</td>";
        echo "<td width='170' align='center'>Gia hien tai</td>";
        echo "<td width='170' align='center'>Gia ban dau</td>";
        echo "<td width='250' align='center'>Hinh anh</td>";
        echo "</tr>";
        $stt = 1;
        while($row = mysqli_fetch_row($kq))
        {
            echo "<tr>";
            echo "<td height='23' align='center'>".$stt."</td>";
            echo "<td align='center'>".$row[2]."</td>";
            echo "<td align='center'>".$row[1]."</td>";
            echo "<td align='center'>".$row[4]."</td>";
            echo "<td align='center'>".$row[5]."</td>";
            echo "<td align='center'><img src='".$row[3]."' alt='' style='width: 100px;
            height: 120px'></td>";
            echo "</tr>";
            $stt++;
        }
        echo "<tr>";
        echo "<td colspan='6' align ='center'><button type='submit'><a href='ThemSP.php'>Them</a></button><button type='submit'><a href='XoaSP.php'>Xoa</a></button><button type='submit'><a href='SuaSP.php'>Sua</a></button></td>";
        echo "</tr>";
        echo "</table>";
        echo "<table width='1030' height='20' border='0'>";
        echo "<tr>";
        echo "<td align='right'>Tong san pham: " . mysqli_num_rows(mysqli_query($conn,$sql))."</td>";
        echo "</tr>";
        echo "</table>";
    }
    ?>
    <img src="" alt="">
</body>
</html>