<?php
require_once('lib_login_session.php');

if(isset($_REQUEST['dathang'])) {
  $servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "laptrinhweb2";

    // Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}
  $taikhoan = $_SESSION['current_username'];
  $currentDateTime = date("Y-m-d"); // lấy ngày giờ hiện tại theo định dạng Y-m-d H:i:s (năm-tháng-ngày giờ:phút:giây)
  $pay = $_GET['pay'];
  $sdt = $_GET['sdt'];
  $loc_id = $_GET['select-loc'];
  
  $query1 = sprintf("INSERT INTO `donhang` (`tentaikhoan` ,`date`,`payment`,`id_dc`,`trangthai` , `sdt`) VALUES ('$taikhoan','$currentDateTime','$pay','$loc_id','waiting','$sdt')");
  mysqli_query($conn,$query1);
  $newid_dh = mysqli_insert_id($conn);
   
  $sql = "SELECT * FROM cart,sanpham WHERE cart.masp = sanpham.MaSP and taikhoan = '$taikhoan'";
  $result = mysqli_query($conn, $sql);

    
   while ($row = mysqli_fetch_assoc($result)) {
    $idsp = $row['id'];
    $sl = $row['soluong'];
    $querry = "INSERT INTO `sl_sp_dh` (`id_dh`,`id_sp`,`soluong`) VALUES ('$newid_dh','$idsp','$sl')";
    $kq = $conn->query($querry);
    }
    if ($kq === TRUE) {
        $del = sprintf("DELETE FROM cart WHERE `cart`.`taikhoan` = '%s'", $taikhoan);
        mysqli_query($conn, $del);
        echo $pay;
        header("Location: historycart.php");
        die();
      } else {
        echo "Error: " . $querry . "<br>" . $conn->error;
      }
      mysqli_close($conn);
}

if(isset($_REQUEST['huydon'])) {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "laptrinhweb2";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  // Check if the id parameter is set
  if(isset($_GET['id_sp'])) {
    
      $id_sp = $_GET['id_sp'];
      $id_dh = $_GET['id_dh'];
      $taikhoan = $_SESSION['current_username'];

      $sql = "DELETE FROM sl_sp_dh WHERE id_sp = $id_sp and id_dh = $id_dh";
      
      mysqli_query($conn, $sql);
      // Lấy danh sách các sản phẩm còn lại
      
  }
}

?>