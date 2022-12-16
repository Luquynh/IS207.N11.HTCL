<!-- head-->
<?php 
        require_once "./mvc/views/client/include/head.php";
?>
    <!--/head-->
<script>
    $(document).ready(function(){
        $("#email").keyup(function(){
            var email = $(this).val();
            $.post("ajax/checkuser",{email:email},function(data){
                $("#mess").html(data);
            });
        });

        $("#pass_confirm").keyup(function(){
            var pass_confirm = $(this).val();
            var pass  = $("#pass").val();
            $.post("ajax/checkpass",{pass:pass,pass_confirm:pass_confirm},function(data){
                $("#mess").html(data);
            });
        });

		$(".update__input").blur(function(){
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
    <div class="update">
            <div class="update__container">
                <header class="update__header">
                    <h1 class="update__header--title">Cập nhật thông tin</h1>
                </header>
                <div class="update__form">
                    <!-- <div style="height: 24px; width: 100%; text-align: left; font-size: 12px; font-weight: 600;" id= "mess"><?=$data["mess"]?></div> -->

                    <form action="changeinfor" method="post">
                        <div class="update__form-group">
                            <input type="text"  name = "data[name]"class="update__input" value="<?=$data['info'][0]['tenkh']?>" required>
                            <label for="" class="update__label">Họ tên</label>
                        </div>
            
                        <div class="update__form-group">
                            <input type="text" name="data[phonenumber]" class="update__input" value="<?=$data['info'][0]['sodt']?>"required>
                            <label for="" class="update__label">Số điện thoại</label>
                        </div>
            
                        <div class="update__form-group">
                            <input type="text" name="data[email]" id="email" class="update__input" value="<?=$data['info'][0]['email']?>"required>
                            <label for="" class="update__label">Email</label>
                        </div>
                        <?php 
                            if($data['info'][0]['gioitinh'] == 0){
                                echo '<div class="gender">
                                            <div class="gender__input">
                                                <input type="radio" name="data[gender]" id="" class="gender__input--radio" value="0" checked>
                                                <label class="gender__input--label">Nam</label>
                                            </div>
                                            <div class="gender__input">
                                                <input type="radio" name="data[gender]" id="" class="gender__input--radio" value="1">
                                                <label class="gender__input--label">Nữ</label>
                                            </div>
                                    </div>';
                            } else 
                            {
                                echo '<div class="gender">
                                        <div class="gender__input">
                                            <input type="radio" name="data[gender]" id="" class="gender__input--radio" value="0">
                                            <label class="gender__input--label">Nam</label>
                                        </div>
                                        <div class="gender__input">
                                            <input type="radio" name="data[gender]" id="" class="gender__input--radio" value="1" checked>
                                            <label class="gender__input--label">Nữ</label>
                                        </div>
                                </div>';
                            }
                            ?>
            
                        <div class="update__input--address">
                            <div class="select-address">
                                <select class="update__input--address-combobox" id="city" name="data[city]">
                                    <option value="<?=$data['info'][0]['matp']?>" selected><?= $data['city'][0]['name']?></option>
                                    <?php 
                                    $listcity = $this->full_address->city_all();
                                    // $listcity = $data['list_city'];
                                    foreach($listcity as $row):?>
                                        <option value="<?php echo $row['matp']; ?>"><?php echo $row['name']; ?></option>
                                    <?php endforeach; ?>
                                    ?>
                                </select>
                            </div>
                            
                            <div class="select-address">
                                <select class="update__input--address-combobox" id="district" name="data[district]" >
                                    <option value="<?=$data['info'][0]['maqh']?>" selected><?=$data['district'][0]['name']?></option>
                                </select>
                            </div>
            
                            <div class="select-address">
                                <select class="update__input--address-combobox" id="ward" name="data[ward]">
                                    <option value="<?=$data['info'][0]['xaid']?>" selected><?=$data['ward'][0]['name']?></option>
                                </select>
                            </div>
                        </div>
            
                        <div class="update__form-group">
                            <input type="text" class="update__input" name = data[address] value="<?=$data['info'][0]['diachi']?>" required>
                            <label for="" class="update__label">Địa chỉ <label style="font-size: 1.2rem;">(Ví dụ: 79 đường số 12...)</label></label>
                        </div>

                        <div class="update__form-group center-colum">
                            <p class="update__footer--text">This site is protected by reCAPTCHA and the Google 
                                <a href="https://policies.google.com/privacy" target="_blank">Privacy Policy</a> and 
                                <a href="https://policies.google.com/terms" target="_blank">Terms of Service</a> apply.</p>
                            <input class="update__footer--btn" type="submit" value="Cập nhật" name="change_infor" >
                        </div>
                    </form>
                </div>
                <div class="update__footer">
                    <a href="<?=base?>inforuser/inforuser" class="update__footer--item">
                        <i class="update__footer-icon fa-solid fa-arrow-left-long"></i>
                        Quay lại 
                    </a>

                    <!-- <a href="<?=base?>login" class="update__footer--item">
                        Đăng nhập
                        <i class="update__footer-icon fa-solid fa-arrow-right-long"></i>
                    </a> -->
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
</script>
