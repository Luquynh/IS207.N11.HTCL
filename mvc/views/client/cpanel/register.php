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
                    <h1 class="register__header--title">Tạo tài khoản</h1>
                    <div style="height: 30px; width: 100%;" id= "mess"><?=$data["mess"]?></div>
                </header>
                <div class="register__form">

                    <form action="./register/register" method="post">
                        <div class="register__form-group">
                            <input type="text" name="data[name]" class="register__input" required>
                            <label for="" class="register__label">Họ tên</label>
                        </div>
            
                        <div class="register__form-group">
                            <input type="text" name="data[phonenumber]" id="" class="register__input" required>
                            <label for="" class="register__label">Số điện thoại</label>
                        </div>
            
                        <div class="register__form-group">
                            <input type="text" name="data[email]" id="email" class="register__input" required>
                            <label for="" class="register__label">Email</label>
                            
                        </div>
            
                        <div class="gender">
                            <div class="gender__input">
                                <input type="radio" name="gender" id="" class="gender__input--radio" value="0">
                                <label class="gender__input--label">Nam</label>
                            </div>
                            <div class="gender__input">
                                <input type="radio" name="gender" id="" class="gender__input--radio" value="1">
                                <label class="gender__input--label">Nữ</label>
                            </div>
                        </div>
            
                        <div class="register__form-group">
                            <input type="password" class="register__input" name="data[pass]" id = "pass" required>
                            <label for="" class="register__label">Mật khẩu</label>
                        </div>
            
                        <div class="register__form-group">
                            <input type="password" class="register__input" name="data[pass_confirm]" id = "pass_confirm" required>
                            <label for="" class="register__label">Xác nhận mật khẩu</label>
                        </div>
                        <div class="register__input--address">
                            <div class="select-address">
                                <select class="register__input--address-combobox" id="city">
                                    <option value="" selected>Chọn tỉnh / thành </option>
                                </select>
                            </div>
            
                            <div class="select-address">
                                <select class="register__input--address-combobox" name="" id="district">
                                    <option value="" selected>Chọn quận / huyện</option>
                                </select>
                            </div>
            
                            <div class="select-address">
                                <select class="register__input--address-combobox" name="" id="ward">
                                    <option value="" selected>Chọn phường / xã</option>
                                </select>
                            </div>
                        </div>
            
                        <div class="register__form-group">
                            <input type="text" name="" id="" class="register__input" required>
                            <label for="" class="register__label">Địa chỉ</label>
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

                    <a href="<?=base?>login/login" class="register__footer--item">
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
    // alert("xin chao");
    // Chọn tỉnh huyện phường xã trong form đăng ký
    var citis = document.getElementById("city");
    var districts = document.getElementById("district");
    var wards = document.getElementById("ward");
    var Parameter = {
    url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json", //Đường dẫn đến file chứa dữ liệu hoặc api do backend cung cấp
    method: "GET", //do backend cung cấp
    responseType: "application/json", //kiểu Dữ liệu trả về do backend cung cấp
    };
    //gọi ajax = axios => nó trả về cho chúng ta là một promise
    var promise = axios(Parameter);
    //Xử lý khi request thành công
    promise.then(function (result) {
    renderCity(result.data);
    });

    function renderCity(data) {
    for (const x of data) {
        citis.options[citis.options.length] = new Option(x.Name, x.Id);
    }

    // xứ lý khi thay đổi tỉnh thành thì sẽ hiển thị ra quận huyện thuộc tỉnh thành đó
    citis.onchange = function () {
        district.length = 1;
        ward.length = 1;
        if(this.value != ""){
        const result = data.filter(n => n.Id === this.value);

        for (const k of result[0].Districts) {
            district.options[district.options.length] = new Option(k.Name, k.Id);
        }
        }
    };

    // xứ lý khi thay đổi quận huyện thì sẽ hiển thị ra phường xã thuộc quận huyện đó
    district.onchange = function () {
        ward.length = 1;
        const dataCity = data.filter((n) => n.Id === citis.value);
        if (this.value != "") {
        const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

        for (const w of dataWards) {
            wards.options[wards.options.length] = new Option(w.Name, w.Id);
        }
        }
    };
    }
</script>