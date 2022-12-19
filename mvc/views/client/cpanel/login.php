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
                <div style="color:red; 4px; padding-bottom: 10px;width: 100%; text-align: left; font-size: 12px; font-weight: 600;"><?=$data["mess"]?><?php if(isset($_SESSION["error_login"])){echo $_SESSION["error_login"];unset($_SESSION["error_login"]);}?></div>
                <form action="./login/login" class="account__body" method="POST">
                    <div class="register__form-group">
                        <input type="text"  id="" class="register__input" name="email" value="<?=$data["email"]?>" required>
                        <label for="" class="register__label">Email</label>
                    </div>

                    <div class="register__form-group">
                        <input type="password" id="id_password" class="register__input" name="password" value="<?=$data["pass"]?>" required>
                        <label for="" class="register__label">Mật khẩu</label>
                        <i class="fa-regular fa-eye-slash" id="togglePassword"></i>
                    </div>
                    
                    <div class="register__form-group center-colum ">
                        <p class="register__footer--text">This site is protected by reCAPTCHA and the Google <a href="">Privacy Policy</a> and <a href="">Terms of Service</a> apply.</p>
                        <input class="register__footer--btn" type="submit" name="login" value="Đăng nhập">
                    </div>
                </form>
    
                <footer class="account__footer">
                    <p class="account__footer--text">Khách hàng mới? 
                        <a href="<?=base?>register" class="account__footer--link" >Tạo tài khoản</a>
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

<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#id_password');

    togglePassword.addEventListener('click', function (e) {
        // toggle the eye slash icon
        // this.classList.remove('fa-eye');
        this.classList.toggle('fa-eye');
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
});
</script>