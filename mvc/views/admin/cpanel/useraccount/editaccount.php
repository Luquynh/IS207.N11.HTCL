<!-- head-->
<?php 
        // require_once "./mvc/views/client/include/head.php";
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
<style>
    .form-control{
    height: calc(1.5em + 1.5rem + 2px);
    font-size: 1.5rem;
}
    label{
        font-size: 17px;
    }
    .gender .gender__input{
        width: 20%;
    }
    .btn_update{
        padding: 6px 70px;
        margin-left: 50%;
        font-size: 18px;
        margin-top:90px;
    }
    
    
</style>
<body>


    <!-- Register -->
    <div class="">
            <div class="x_content">
            <div class="title_left">
                <h3 class="text-title"><?= $data['title']?></h3>
                <h4 class="text-success"><?php if(isset($data["mess"])){echo $data["mess"];} ?></h4>
                <a class="btn btn-primary" href="<?=base?>admin/useraccount">Trở Về</a>
                <h4 class="text-success"><?php if(isset($data["notifi"]["addsuccess"])){echo $data["notifi"]["addsuccess"];} ?></h4>
            </div>

                <div class="update__form">
                    <!-- <div style="height: 24px; width: 100%; text-align: left; font-size: 12px; font-weight: 600;" id= "mess"><?=$data["mess"]?></div> -->

                    <form action="" method="post"  enctype="multipart/form-data">
                        <!-- ho ten va email -->
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-5">
                                    <label for="" class="">Họ tên</label>
                                    <input type="text"  name = "data[name]"class="form-control " value="<?=$data['info'][0]['tenkh']?>" required>

                                </div>
                                <div class="col-1"></div>
                                <div class="col-5">
                                    <label for="" class="">Số điện thoại</label>
                                    <input type="text" name="data[phonenumber]" class="form-control" value="<?=$data['info'][0]['sodt']?>"required>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- so dien thoai va gioi tinh  -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-5">
                                    <label for="" class="">Email</label>
                                    <input type="text" name="data[email]" id="email" class="form-control " value="<?=$data['info'][0]['email']?>"required>
                                
                                </div>
                                <div class="col-1"></div>
                                <div class="col-5">
                                    <label for="" class="">Giới tính</label>
                                    <?php 
                                    if($data['info'][0]['gioitinh'] == 0){
                                        echo '
                                        
                                        <div class="gender">
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
                                </div>
                            </div>
                        </div>
                        
            
                        
            <!-- Chon quan huyen va dia chi -->
                        <div class="form-group">
                            <div class="row ">
                                <div class="col-5">
                                    <label for="" class="">Nơi sống</label>
                                    <div class="">
                                        
                                        <div class="select-address">
                                            <select class="update__input--address-combobox" id="city_update" name="data[city]">
                                                <option value="<?=$data['info'][0]['matp']?>" selected><?= $data['city'][0]['name']?></option>
                                                <?php 
                                                $listcity = $this->full_address->city_all();
                                                // $listcity = $data['list_city'];
                                                foreach($listcity as $row):?>
                                                    <option value="<?php echo $row['matp']; ?>"><?php echo $row['name']; ?></option>
                                                <?php endforeach; ?>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="">
                                            <div class="select-address">
                                                <select class="update__input--address-combobox" id="district_update" name="data[district]" >
                                                    <option value="<?=$data['info'][0]['maqh']?>"><?=$data['district'][0]['name']?></option>
                                                    
                                                </select>
                                            </div>
                                    </div>
                    
                                    <div class="">
                                        <div class="select-address">
                                            <select class="update__input--address-combobox" id="ward_update" name="data[ward]">
                                                <option value="<?=$data['info'][0]['xaid']?>" selected><?=$data['ward'][0]['name']?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1"></div>
                                <div class="col-5">
                                    <label for="" class="">Địa chỉ nhà</label>
                                    <input type="text" class="form-control " name = data[address] value="<?=$data['info'][0]['diachi']?>" required>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- dia -->
                                  
                        <div class="row">
                            <div class="col-6"></div>
                            <div class="col-6">
                                <input class="btn btn-success btn_update" type="submit" value="Cập nhật" name="submit" >
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    <!--/ Register -->
	
	
</body>


<script>
    $(document).ready(function(){
        $("#city_update").change(function(){
            var id_city = $("#city_update").val();
            // alert(id_city);
            $.post("<?=base?>ajax/district", {id_city: id_city}, function(data2){
                    $("#district_update").html(data2);
                }
                )
        })

        $("#district_update").change(function(){
            var id_district = $("#district_update").val();
            $.post("<?=base?>ajax/ward", {id_district: id_district}, function(data2){
                $("#ward_update").html(data2);
            })
        })
    })
</script>
