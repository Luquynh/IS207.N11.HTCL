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
                        <li class="infor-tab-content__item ">Thông tin tài khoản</li>
                        <li class="infor-tab-content__item infor-active">Danh sách đơn hàng</li>
                        <a href="logout" class="link">
                            <li class="infor-tab-content__item item-center"><i class="ti-shift-right infor-icon"></i>Đăng xuất</li>
                        </a>
                    </ul>
                </div>
            </div>
            <div class="infor-content">
                <h2 class="infor-content--header">Danh sách đơn hàng</h2>
                <table class="infor-content-infor" >
                    <tr class="row-infor">
                        <th class="">
                            <strong>Địa chỉ</strong>
                        </th>
                        <th class="">
                            <strong>Số điện thoại</strong>
                        </th>
                        
                        <th class="">
                            <strong>Ngày mua</strong>
                        </th>
                    
                        <th class=" ">
                            <strong>Tổng tiền</strong>
                        </th>
                    
                        <th class="">
                            <strong>Trạng thái</strong>
                        </th>
                    
                        <th class="">
                            <strong>Chức năng</strong>
                        </th>
                        <!-- </th> -->
                        <!-- <td class="col-infor">
                            <?php echo $data["info"][0]["tenkh"]?>
                        </td> -->
                    </tr>
    
                    <tr class="row-infor">
                        <!-- <td class="col-infor wd-30">
                            <strong>Email:</strong>
                        </td>
                        <td class="col-infor">
                            
                        </td> -->
                    </tr>
    
                    <tr class="row-infor">
                        <!-- <td class="col-infor wd-30">
                            <strong>Số điện thoại:</strong>
                        </td>
                        <td class="col-infor">
                            <?php echo $data["info"][0]["sodt"]?>
                        </td> -->
                    </tr>
    
                    <tr class="row-infor">
                        <!-- <td class="col-infor wd-30">
                            <strong>Giới tính:</strong>
                        </td>
                        <td class="col-infor">
                            <?php if($data["info"][0]["gioitinh"] == 0){
                                echo 'Nam';
                            } else echo 'Nữ';?>
                        </td> -->
                    </tr>
    
                    <tr class="row-infor">
                        <!-- <td class="col-infor wd-30">
                            <strong>Địa chỉ:</strong>
                        </td>
                        <td class="col-infor">
                            <?php echo $data["info"][0]['diachi']?>,
                            <?php echo $data["ward"][0]['name']?>,
                            <?php echo $data["district"][0]['name']?>,
                            <?php echo $data["city"][0]['name']?>
                        </td> -->
                    </tr>
    
                    <tr class="row-infor">
                        <!-- <td class="col-infor">
                            <a href="<?=base?>inforuser/changeinfor"><button class="infor-user-btn">Thay đổi thông tin</button></a>
                        </td>
                        <td class="col-infor">
                            <a href="<?=base?>inforuser/changepassword"><button class="infor-user-btn">Đổi mật khẩu</button></a>
                        </td> -->
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
<style>
    table, td, th {
        border: 1px solid #eee;
        border-collapse: collapse;
    }
    th {
        background-color: #eee;
        padding: 10px 0;
    }
</style>