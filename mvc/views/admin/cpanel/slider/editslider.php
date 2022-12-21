<?php
//lay banner_img
    $banner=$data["data"][0]["banner_img"];     
?>
                       
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3><?= $data['title']?></h3>
            <h4 class="text-success"><?php if(isset($data["mess"])){echo $data["mess"];} ?></h4>
            <a class="btn btn-primary" href="<?=base?>admin/showslider">Trở Về</a>
                <h4 class="text-success"><?php if(isset($data["notifi"]["addsuccess"])){echo $data["notifi"]["addsuccess"];} ?></h4>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="x_content">
        <form class="" action="" method="post"  enctype="multipart/form-data">
            <div class="row" >
                <div class="col-5">
                    <div class="form-group">
                        <label for="">Tên Slider</label>
                        <h6 class="text-danger"><?php if(isset($data["notifi"]["name"])){echo $data["notifi"]["name"];}?> </h6>
                        <input id="name" type="text" class="form-control" name="name" value="<?=$data["data"][0]["pretitle"]?>">
                   
                    </div>
                  
                    <div class="form-group">
                        <label for="">Content</label>
                        <input id="content" type="text" class="form-control" name="content" value="<?=$data["data"][0]["title"]?>">
                    </div>
                    
                </div>
                
                <!-- trong row chứa col , trong col chứa dc row -->
                <!-- col từ 1 -> 12 -->
                <div class="col-2">
                    <div class="form-group">
                        <label for="">Slogan</label>
                        <input id="subtitle" type="text" class="form-control" name="slogan" value="<?=$data["data"][0]["subtitle"]?>">
                    </div>
                    <div class="form-group">
                        <label for="">Hình Ảnh</label>
                        <div class="img_product" style=" font-size: 16px; width: 20%;">
                            <img id ="image" alt="" style=" width: 300px;" name="image">
            
                        </div>
                        <input id="img" type="file" class="" name="img" >
                        <!-- <button class="btn btn-primary" type="submit" name="uploadimg">Cập Nhật hình mới</button> -->
                        
                        
                    </div>
                    
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit" name="submit">Cập Nhật</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
 
   $("#image").attr("src","<?=imgclient?><?=$banner?>");

    const file = document.querySelector("#img")
    file.addEventListener("change", function() {
    const reader = new FileReader()
    reader.addEventListener("load", () => {
        document.querySelector("#image").src = reader.result
    })
    reader.readAsDataURL(this.files[0]);
    })

</script>