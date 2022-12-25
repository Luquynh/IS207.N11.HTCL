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
                        Khôi phục mật khẩu
                    </h3>
                    <p class="account__header--text">Nhập email của bạn:</p>
                </header>
                <div style="padding-bottom: 10px;width: 100%; text-align: left; font-size: 12px; font-weight: 600;" id="mess"><?=$data["mess"]?></div>
                <form action="<?=base?>login/resetpassword" class="account__body" method="POST">
                    <div class="register__form-group">
                        <input type="text"  id="email" class="register__input" name="email" value="<?=$data['email']?>" required>
                        <label for="" class="register__label">Email</label>
                    </div>

                    <div class="register__form-group center-colum ">
                        <p class="register__footer--text">This site is protected by reCAPTCHA and the Google <a href="">Privacy Policy</a> and <a href="">Terms of Service</a> apply.</p>
                        <input class="register__footer--btn" type="submit" name="resetpass" value="KHÔI PHỤC MẬT KHẨU">
                    </div>
                </form>
    
                <footer class="account__footer">
                    <p class="account__footer--text">
                        <a href="<?=base?>login" class="account__footer--link" >Trở lại đăng nhập</a>
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
    // $(document).ready(function(){
    //     $("#email").keyup(function(){
    //         var email = $(this).val();
    //         $.post("ajax/checkEmail",{email:email},function(data){
    //             $("#mess").html(data);
    //         });
    //     })
    // });
</script>