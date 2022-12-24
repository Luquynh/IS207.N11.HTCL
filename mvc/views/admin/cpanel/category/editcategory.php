<!-- head-->
<?php 
        //lay img va imgmain mac dinh
        $img=$data['info'][0]['img'];
        $imgmain=$data['info'][0]['imgmain'];

?>
    <!--/head-->

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
        margin-top:60px;
    }
    .x_content{
        padding: 0;
    }
    
</style>
<body>


    <!-- Register -->
    <div class="">
            <div class="x_content">
            <div class="title_left">
                <h3 class="text-title"><?= $data['title']?></h3>
                
                <a class="btn btn-primary" href="<?=base?>admin/showcategory">Trở Về</a>
                
            </div>

                <div class="update__form">
                    <!-- <div style="height: 24px; width: 100%; text-align: left; font-size: 12px; font-weight: 600;" id= "mess"><?=$data["mess"]?></div> -->

                    <form action="" method="post"  enctype="multipart/form-data">
                        <!-- ho ten va email -->
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-5">
                                    <label for="" class="">Tên bộ sưu tập</label>
                                    <input type="text"  name = "data[name]"class="form-control " value="<?=$data['info'][0]['tenbosuutap']?>" required>

                                </div>
                                <div class="col-1"></div>
                                <div class="col-5">
                                    <label for="" class="">Kích thước</label>
                                    <select name="data[makichthuoc]"  style="width: 60px;" class="form-control">
                                        <option value="<?=$data['info'][0]['makichthuoc']?>"><?=$data['info'][0]['kichthuoc']?></option>
                                       <?php 
                                       $arr_ten=array();
                                       $arr_id=array();
                                       $i=0;
                                        foreach($data["datakt"] as $key => $values){
                                            
                                            if($values["makichthuoc"]!=$data['info'][0]['makichthuoc']){
                                                $arr_id[$i]=$values["makichthuoc"];
                                                $arr_ten[$i]=$values["kichthuoc"];
                                                $i++;
                                            }
                                        }
                                       ?>
                                       <option value="<?=$arr_id[0]?>"><?=$arr_ten[0]?></option>
                                       <option value="<?=$arr_id[1]?>"><?=$arr_ten[1]?></option>
                                       <option value="<?=$arr_id[2]?>"><?=$arr_ten[2]?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                      
                        <!-- so dien thoai va gioi tinh  -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-5">
                                    <!-- <label for="" class="">Email</label>
                                    <input type="text" name="data[mota]" id="email" class="form-control " value=""required> -->
                                <label class="form-label" for="textAreaExample">Mô tả</label>
                                <textarea  class="form-control" rows="4" value="" name="data[mota]"><?=$data['info'][0]['mota']?></textarea>
                                
                                
                                
                                </div>
                                <div class="col-1"></div>
                                <div class="col-5">
                                    <label for="" class="">Giới tính</label>
                                    <?php 
                                    if($data['info'][0]['gioitinh'] == "men"){
                                        echo '
                                        
                                        <div class="gender">
                                                    <div class="gender__input">
                                                        <input type="radio" name="data[gioitinh]" id="" class="gender__input--radio" value="men" checked>
                                                        <label class="gender__input--label">Nam</label>
                                                    </div>
                                                    <div class="gender__input">
                                                        <input type="radio" name="data[gioitinh]" id="" class="gender__input--radio" value="women">
                                                        <label class="gender__input--label">Nữ</label>
                                                    </div>
                                            </div>';
                                    } else 
                                    {
                                        echo '<div class="gender">
                                                <div class="gender__input">
                                                    <input type="radio" name="data[gioitinh]" id="" class="gender__input--radio" value="men">
                                                    <label class="gender__input--label">Nam</label>
                                                </div>
                                                <div class="gender__input">
                                                    <input type="radio" name="data[gioitinh]" id="" class="gender__input--radio" value="women" checked>
                                                    <label class="gender__input--label">Nữ</label>
                                                </div>
                                        </div>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                      
                        
                        <div class="form-group">
                                  <div class="row">
                                    <div class="col-5">
                                        <label for="" class="">Hình đại diện</label>
                                        <div class="" style=" font-size: 16px; width: 20%;">
                                            <img id ="image" alt="" style=" width: 150px;" >
                                            <input id="img" type="file" class="" name="img" >
                                        </div>
                                    </div>
                                    <div class="col-1"></div>
                                    <div class="col-5">
                                        <label for="" class="">Hình ảnh</label>
                                        <div class="" style=" font-size: 16px; width: 20%;">
                                            <img id ="image1" alt="" style=" width: 150px;" >
                                            <input id="imgmain" type="file" class="" name="imgmain" >
                                        </div>                                    
                                    </div>
                                </div>
                        </div>
                        
                        <div class="row" style="background: #F7F7F7; padding:5px;" >
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
    //anh mac dinh 
     $("#image").attr("src","<?=imgclient?><?=$data['info'][0]['gioitinh']?>/<?=$img?>");
     $("#image1").attr("src","<?=imgclient?><?=$data['info'][0]['gioitinh']?>/<?=$data['info'][0]['tenbosuutap']?>/<?=$imgmain?>");  
     //load anh                               
    const file = document.querySelector("#img")
    file.addEventListener("change", function() {
    const reader = new FileReader()
    reader.addEventListener("load", () => {
        document.querySelector("#image").src = reader.result
    })
    reader.readAsDataURL(this.files[0]);
    })

    const file1 = document.querySelector("#imgmain")
    file1.addEventListener("change", function() {
    const reader1 = new FileReader()
    reader1.addEventListener("load", () => {
        document.querySelector("#image1").src = reader1.result
    })
    reader1.readAsDataURL(this.files[0]);
    })
</script>

   

