<!-- head-->
<?php 
        require_once "./mvc/views/client/include/head.php";
?>
    <!--/head-->
<script>
    $(document).ready(function(){
        $("#phonenumber").keyup(function(){
            var phonenumber = $(this).val();
            $.post("ajax/checkSodt",{phonenumber:phonenumber},function(data){
                $("#mess_phonenumber").html(data);
            });
        });
        $("#email").keyup(function(){
            var email = $(this).val();
            $.post("ajax/checkuser",{email:email},function(data){
                $("#mess_email").html(data);
            });
        });

        $("#pass_confirm").keyup(function(){
            var pass_confirm = $(this).val();
            var pass  = $("#pass").val();
            $.post("ajax/checkpass",{pass:pass,pass_confirm:pass_confirm},function(data){
                $("#mess_pass").html(data);
            });
        });
        $("#pass_confirm").blur(function(){
            var city  = $("#city").val();
            $.post("ajax/checkCity",{city:city},function(data){
                $("#mess_address").html(data);
            });
        });
		$(".register__input").blur(function(){
            $("#mess").html("");
        });

        // $("#city").mouseup(function(){
        //     // var city  = $("#city").val();
        //     // $.post("ajax/checkCity",{city:city},function(data){
        //     //     $("#mess").html(data);
        //     // });
        //     var district  = $("#district").val();
        //     $.post("ajax/checkDistrict",{district:district},function(data){
        //         $("#mess_address").html(data);
        //     });
        // });
        $("#city").change(function(){
            var district  = $("#district").val();
            $.post("ajax/checkDistrict",{district:district},function(data){
                $("#mess_address").html(data);
            });
        });
        // $("#district").mouseup(function(){
        //     var ward  = $("#ward").val();
        //     $.post("ajax/checkWard",{ward:ward},function(data){
        //         $("#mess_address").html(data);
        //     });
        // });
        $("#district").change(function(){
            var ward  = $("#ward").val();
            $.post("ajax/checkWard",{ward:ward},function(data){
                $("#mess_address").html(data);
            });
        });
        $("#ward").mouseup(function(){
            var ward  = $("#ward").val();
            $.post("ajax/checkWard",{ward:ward},function(data){
                $("#mess_address").html(data);
            });
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
                    <h1 class="register__header--title">Tạo tài khoản</h1>
                </header>
                <div class="register__form">
                    <!-- <div style="height: 24px; width: 100%; text-align: left; font-size: 12px; font-weight: 600;" id= "mess"><?=$data["mess"]?></div> -->

                    <form action="./register/register" method="post">
                        <div class="register__form-group">
                            <input type="text" name="data[name]" class="register__input" required>
                            <label for="" class="register__label">Họ tên</label>
                        </div>
                        <div style="padding-left: 4px; padding-bottom: 10px;width: 100%; text-align: left; font-size: 12px; font-weight: 600;" id= "mess_phonenumber"><?=$data["mess"]?></div>

                        <div class="register__form-group">
                            <input type="text" name="data[phonenumber]" id="phonenumber" class="register__input" required>
                            <label for="" class="register__label">Số điện thoại</label>
                        </div>
            
                        <div style="padding-left: 4px; padding-bottom: 10px;width: 100%; text-align: left; font-size: 12px; font-weight: 600;" id= "mess_email"><?=$data["mess"]?></div>
                        <div class="register__form-group">
                            <input type="text" name="data[email]" id="email" class="register__input" required>
                            <label for="" class="register__label">Email</label>
                            
                        </div>
                        <div class="gender">
                            <div class="gender__input">
                                <input type="radio" name="data[gender]" id="" class="gender__input--radio" value="0" checked>
                                <label class="gender__input--label">Nam</label>
                            </div>
                            <div class="gender__input">
                                <input type="radio" name="data[gender]" id="" class="gender__input--radio" value="1">
                                <label class="gender__input--label">Nữ</label>
                            </div>
                        </div>
                        
                        <div style="padding-left: 4px; padding-bottom: 10px;width: 100%; text-align: left; font-size: 12px; font-weight: 600;" id= "mess_pass"><?=$data["mess"]?></div>
                        <div class="register__form-group">
                            <input type="password" class="register__input" name="data[pass]" id = "pass" required>
                            <label for="" class="register__label">Mật khẩu</label>
                        </div>
            
                        <div class="register__form-group">
                            <input type="password" class="register__input" name="data[pass_confirm]" id = "pass_confirm" required>
                            <label for="" class="register__label">Xác nhận mật khẩu</label>
                        </div>
                        <div style="padding-left: 4px; padding-bottom: 10px; width: 100%; text-align: left; font-size: 12px; font-weight: 600;" id= "mess_address"><?=$data["mess"]?></div>
                        <div class="register__input--address">
                            <div class="select-address">
                                <!-- <label for="" class="register__label">Xác nhận mật khẩu</label> -->
                                <select class="register__input--address-combobox" id="city" name="data[city]" required>
                                    <option value = "0" disabled selected>---Chọn thành phố---</option>
                                    <!-- <option value="83">Bến Tre</option> -->
                                    <?php 
                                    $listcity = $this->full_address->city_all();
                                    // $listcity = $data['list_city'];
                                    foreach($listcity as $row):?>
                                        <option value="<?php echo $row['matp']; ?>"><?php echo $row['name']; ?></option>
                                    <?php endforeach; ?>
                                    
                                </select>
                            </div>
                            
                            <div class="select-address">
                                <select class="register__input--address-combobox" id="district" name="data[district]" required>
                                    <option value ='0' disabled selected>---Chọn quận huyện---</option>
                                </select>
                            </div>
            
                            <div class="select-address">
                                <select class="register__input--address-combobox" id="ward" name="data[ward]" required>
                                    <option value ='0' disabled selected>---Chọn xã phường---</option>
                                </select>
                            </div>
                        </div>
            
                        <div class="register__form-group">
                            <input type="text" class="register__input" name = data[address] required>
                            <label for="" class="register__label">Địa chỉ <label style="font-size: 1.2rem;">(Ví dụ: 79 đường số 12...)</label></label>
                        </div>

                        <div class="register__form-group center-colum">
                            <p class="register__footer--text">This site is protected by reCAPTCHA and the Google 
                                <a href="https://policies.google.com/privacy" target="_blank">Privacy Policy</a> and 
                                <a href="https://policies.google.com/terms" target="_blank">Terms of Service</a> apply.</p>
                            <input class="register__footer--btn" type="submit" value="Đăng ký" name="sigin" >
                        </div>
                    </form>
                </div>
                <div class="register__footer">
                    <a href="<?=base?>" class="register__footer--item">
                        <i class="register__footer-icon fa-solid fa-arrow-left-long"></i>
                        Quay lại trang chủ
                    </a>

                    <a href="<?=base?>login" class="register__footer--item">
                        Đăng nhập
                        <i class="register__footer-icon fa-solid fa-arrow-right-long"></i>
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



<script>
    $(document).ready(function(){
        $("#city").change(function(){
            var id_city = $("#city").val();
            // alert(id_city);
            $.post("<?=base?>ajax/district", {id_city: id_city}, function(data){
                    $("#district").html(data);
                }
                )
        })

        $("#district").change(function(){
            var id_district = $("#district").val();
            $.post("<?=base?>ajax/ward", {id_district: id_district}, function(data){
                $("#ward").html(data);
            })
        })
    })
</script>