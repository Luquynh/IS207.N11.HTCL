<!-- head-->
<?php 
        require_once "./mvc/views/client/include/head.php";
?>
<!--/head-->

<body>
    <!-- header-->
    <?php 
        require_once "./mvc/views/client/include/header.php";
    ?>
	<!--/header-->
    <!--Infor user -->
    <div class="main">
        <div class="infor-container">
            <div class="infor-tab">
                <div class="infor-tab--header">
                    <div class="infor-tab--header__acc-logo" >
                        <?php echo $data['avt'];?>
                    </div>
                    <div class="infor-tab--header__user">
                        <p class="infor-tab--header__name">
                            <?php echo $data["info"][0]["tenkh"]?>
                        </p>
                        <p class="infor-tab--header__email">
                        <?php echo $data["info"][0]["email"]?>
                        </p>
                    </div>
    
                </div>
    
                <div class="infor-tab-content">
                    <ul class="infor-tab-content__list">
                        <li class="infor-tab-content__item infor-active">Thông tin tài khoản</li>
                        <li class="infor-tab-content__item">Lịch sử đơn hàng</li>
                        <a href="logout" class="link">
                            <li class="infor-tab-content__item item-center"><i class="ti-shift-right infor-icon"></i>Đăng xuất</li>
                        </a>
                    </ul>
                </div>
            </div>
            <div class="infor-content">
                <h2 class="infor-content--header">Thông tin tài khoản</h2>
                <table class="infor-content-infor">
                    <tr class="row-infor">
                        <td class="col-infor wd-30">
                            <strong>Họ tên:</strong>
                        </td>
                        <td class="col-infor">
                            <?php echo $data["info"][0]["tenkh"]?>
                        </td>
                    </tr>
    
                    <tr class="row-infor">
                        <td class="col-infor wd-30">
                            <strong>Email:</strong>
                        </td>
                        <td class="col-infor">
                            <?php echo $data["info"][0]["email"]?>
                        </td>
                    </tr>
    
                    <tr class="row-infor">
                        <td class="col-infor wd-30">
                            <strong>Số điện thoại:</strong>
                        </td>
                        <td class="col-infor">
                            <?php echo $data["info"][0]["sodt"]?>
                        </td>
                    </tr>
    
                    <tr class="row-infor">
                        <td class="col-infor wd-30">
                            <strong>Giới tính:</strong>
                        </td>
                        <td class="col-infor">
                            <?php if($data["info"][0]["gioitinh"] == 0){
                                echo 'Nam';
                            } else echo 'Nữ';?>
                        </td>
                    </tr>
    
                    <tr class="row-infor">
                        <td class="col-infor wd-30">
                            <strong>Địa chỉ:</strong>
                        </td>
                        <td class="col-infor">
                            <?php echo $data["info"][0]['diachi']?>,
                            <?php echo $data["ward"][0]['name']?>,
                            <?php echo $data["district"][0]['name']?>,
                            <?php echo $data["city"][0]['name']?>
                        </td>
                    </tr>
    
                    <tr class="row-infor">
                        <td class="col-infor">
                            <a href="<?=base?>inforuser/changeinfor"><button class="infor-user-btn">Thay đổi thông tin</button></a>
                        </td>
                        <td class="col-infor">
                            <a href="<?=base?>inforuser/changepassword"><button class="infor-user-btn">Đổi mật khẩu</button></a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <!--Footer-->
    <?php 
        require_once "./mvc/views/client/include/footer.php";
    ?>
	<!--/Footer-->
</body>
