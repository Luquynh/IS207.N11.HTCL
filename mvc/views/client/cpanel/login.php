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

    <!-- login -->
    <!-- <div for="" class="overlay__account"></div> -->
    <div class="account-modal">
            <div class="account__container">
                <!-- <label for="account-modal__check" href="">
                    <i class="account__header--close ti-close"></i>
                </label> -->
                <header class="account__header">
                    <h3 class="account__header--title">
                        Đăng nhập tài khoản
                    </h3>
                    <p class="account__header--text">Nhập email và mật khẩu của bạn:</p>
                </header>
    
                <form action="" class="account__body">
                    <div class="register__form-group">
                        <input type="text" name="" id="" class="register__input" required>
                        <label for="" class="register__label">Email</label>
                    </div>

                    <div class="register__form-group">
                        <input type="password" name="" id="" class="register__input" required>
                        <label for="" class="register__label">Mật khẩu</label>
                    </div>
                    
                    <div class="register__form-group center-colum ">
                        <p class="register__footer--text">This site is protected by reCAPTCHA and the Google <a href="">Privacy Policy</a> and <a href="">Terms of Service</a> apply.</p>
                        <input class="register__footer--btn" type="submit" value="Đăng nhập">
                    </div>
                </form>
    
                <footer class="account__footer">
                    <p class="account__footer--text">Khách hàng mới? 
                        <a href="<?=base?>register/register" class="account__footer--link" >Tạo tài khoản</a>
                    </p>
    
                    <p class="account__footer--text">Quên mật khẩu? 
                        <a href="" class="account__footer--link">Khôi phục mật khẩu</a>
                    </p>
                </footer>
            </div>
        </div>
	<!-- login -->

	<!--Footer-->
    <?php 
        require_once "./mvc/views/client/include/footer.php";
    ?>
	<!--/Footer-->
</body>