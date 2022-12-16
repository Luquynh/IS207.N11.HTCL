<!-- head-->
<?php 
        require_once "./mvc/views/client/include/head.php";
?>
    <!--/head-->
<script>
    $(document).ready(function(){
        // $("#email").keyup(function(){
        //     var email = $(this).val();
        //     $.post("ajax/checkuser",{email:email},function(data){
        //         $("#mess").html(data);
        //     });
        // });

        // $("#pass_confirm").keyup(function(){
        //     var pass_confirm = $(this).val();
        //     var pass  = $("#pass_new").val();
        //     $.post("ajax/checkpass",{pass:pass,pass_confirm:pass_confirm},function(data){
        //         $("#mess").html(data);
        //     });
        // });

		$(".register__input").blur(function(){
            $("#mess").html("");
        });

        
    });
</script>
<body>

	<!-- header-->
    <?php 
        require_once "./mvc/views/client/include/header.php";
    ?>
	<!--/header-->

    <!-- Register -->
    <div class="register">
            <div class="register__container">
                <header class="register__header">
                    <h1 class="register__header--title">Đổi mật khẩu</h1>
                </header>
                <div class="register__form">
                    <!-- <div style="height: 24px; width: 100%; text-align: left; font-size: 12px; font-weight: 600;" id= "mess"><?=$data["mess"]?></div> -->

                    <form action="changepassword" method="post">
            
                        <div class="register__form-group">
                            <input type="password" class="register__input" name="data[pass_old]" id = "pass_old" required>
                            <label for="" class="register__label">Mật khẩu cũ</label>
                        </div>
                        <div class="register__form-group">
                            <input type="password" class="register__input" name="data[pass_new]" id = "pass_new" required>
                            <label for="" class="register__label">Mật khẩu mới</label>
                        </div>
                        <div class="register__form-group">
                            <input type="password" class="register__input" name="data[pass_confirm]" id = "pass_confirm" required>
                            <label for="" class="register__label">Xác nhận mật khẩu</label>
                        </div>
                        
                        <div class="register__form-group center-colum">
                            <p class="register__footer--text">This site is protected by reCAPTCHA and the Google 
                                <a href="https://policies.google.com/privacy" target="_blank">Privacy Policy</a> and 
                                <a href="https://policies.google.com/terms" target="_blank">Terms of Service</a> apply.</p>
                            <input class="register__footer--btn" type="submit" value="Đổi mật khẩu" name="change_password" >
                        </div>
                    </form>
                </div>
                <div class="register__footer">
                    <a href="<?=base?>inforuser/inforuser" class="register__footer--item">
                        <i class="register__footer-icon fa-solid fa-arrow-left-long"></i>
                        Quay lại
                    </a>
                </div>
            </div>
        </div>
    <!--/ Register -->
	
	<!--Footer-->
    <?php 
        require_once "./mvc/views/client/include/footer.php";
    ?>
	<!--/Footer-->
</body>



<!-- <script>
    $(document).ready(function(){
        $("#city").change(function(){
            var id_city = $("#city").val();
            // alert(id_city);
            $.post("./mvc/views/client/cpanel/district.php", {id_city: id_city}, function(data){
                    $("#district").html(data);
                }
                )
        })

        $("#district").change(function(){
            var id_district = $("#district").val();
            $.post("./mvc/views/client/cpanel/ward.php", {id_d: id_district}, function(data){
                $("#ward").html(data);
            })
        })
    })
</script> -->