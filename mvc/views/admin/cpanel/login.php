<!-- head-->
<?php 
        require_once "./mvc/views/admin/include/head.php";
    ?>
    <!--/head-->
<style>
    :root {
    --bg-color: #f8f7f4;
    --text-color: #161a21;
    --curnon-font: 'Montserrat',-apple-system,BlinkMacSystemFont,sans-serif;
}
    body{
    background-color: var(--bg-color);
    }
    .background_curnon{
        background-color: var(--bg-color);
    }
    .ac_interface{
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        margin-top: 16px;
        margin-bottom: 16px;
        padding: 60px 15px;
        box-shadow:  rgba(0, 0, 0, 0.16) 0px 1px 4px;
        background-color: var(--text-color);

    }
    .title_welcome{
        background-color: var(--text-color);
        color: #fff;
        font-size: 3rem;
        font-weight: 600;
        text-transform: uppercase;
        border-radius: 3px;
        margin-top: 16px;
        text-align: center;
        
    }
    .img-login{
        width: 45%;
       margin: auto;
       margin-top:20px ;
    }
    .text_login{
        color: white; 
        text-align:center; 
        margin-top: 15px;
        font-size:14px;
    }
    
</style>
<body>
   <!-- login -->
    <!-- <div for="" class="overlay__account"></div> -->
    <div class="account-modal background_curnon">   
            <div class="ac_interface ">
                <h1 class="title_welcome">Welcome back !</h1>
                <p class="text_login">Our Admin</p>
                <img src="<?=base?>public/admin/assets/img/technical-support.png" alt="" class="img-login">
            </div>
            <div class="account__container_admin">
                <!-- <label for="account-modal__check" href="">
                    <i class="account__header--close ti-close"></i>
                </label> -->
                <header class="account__header">
                    <h3 class="account__header--title">
                        Đăng nhập tài khoản
                    </h3>
                    <p class="account__header--text">Nhập email và mật khẩu </p>
                </header>
                <div style="height: 20px; width: 100%; color: red;"><?=$data["mess"]?><?php if(isset($_SESSION["error_login"])){echo $_SESSION["error_login"];unset($_SESSION["error_login"]);}?></div>
                <form action="<?=base?>admin/login" class="account__body" method="POST">
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
                        <input class="register__footer--btn" type="submit" name="login">
                    </div>
                </form>
            </div>
        </div>
	<!-- login -->
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