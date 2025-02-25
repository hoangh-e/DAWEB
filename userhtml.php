<!DOCTYPE html>
<html lang="vi">
    <?php
    require_once('lib_login_session.php');
    ?> 
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ADMIN</title>
    
        <link rel="stylesheet" href="css/home.css">
        <link rel="stylesheet" href="css/cart.css">
        <link rel="stylesheet" href="css/search.css">
        <link rel="stylesheet" href="css/sigup.css">
        <link rel="stylesheet" href="css/admin1.css">
        <link rel="stylesheet" href="css/page.css">
    
    </head>
    <body>
        <img src="img/loader.gif" class="loader" alt="">
    
        <div class="alert-box">
            <img src="img/error.png" class="alert-img" alt="">
            <p class="alert-msg"></p>
        </div>
        <img src="img/dark-logo.png" class="logo" alt="">
    
        <!--become seller element-->
        <!--apply form-->
        <div class="nav-space">
            <div class="nav-admin">
                <img src="img/user.png">
                 <?php
                    echo '<p class="add-product-title name-admin">Hello '. $_SESSION['current_username'] .'</p>';
                    echo '<button class="btn btn-new-product" id="new-product">Đăng xuất</button>';
                ?> 
                <script>
                    var logoutBtn = document.getElementById("new-product");
    
                    logoutBtn.addEventListener("click", function() {
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', 'unset_lib_login_session.php', true);
    
                        xhr.onload = function() {
                            //var response = JSON.parse(this.responseText);
                            if (this.responseText === 'ok') {
                                window.location.replace('index.php'); //phương thức location.replace thì trang web sẽ không back lại được
                            }
                        };
    
                        xhr.send();
                    });
                </script>
                
            </div>
            <p class="add-product-title nav-link" onclick="location.href='index.php'">trang chủ</p>
            <p class="add-product-title nav-link" onclick="location.href='userhtml.php'">quản lý user</p>
            <p class="add-product-title nav-link" onclick="location.href='order.php'">quản lý đơn hàng</p>
        </div>
        <div class="box">
            <select class="select select-role">
                <option value="">user</option>
                <option value="admin">admin</option>
                <option value="normal">normal</option>
            </select>
            <div class="search">
                <input type="text" placeholder="Tìm kiếm...">
                <button class="search-btn">&#9906; Tìm kiếm</button>                       
            </div>
        </div>
            <div class="small-container oder-page">
             </div>
            <ul class="box list_page"></ul>
        </div>
        <script type="module" src="js/user.js"></script>
</body>
</html>