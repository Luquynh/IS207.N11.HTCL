<?php 
$banner=$data["product"][0]["img"];
?>
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
    .btn_update{
        padding: 6px 70px;
        margin-left: 50%;
        font-size: 18px;
        margin-top:60px;
    }
    
</style>                     
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3><?= $data['title']?></h3>
            <a class="btn btn-primary" href="<?=base?>admin/showproduct&page=<?=$data["page"]?>">Trở Về</a>
                <h4 class="text-success"><?php if(isset($data["notifi"]["addsuccess"])){echo $data["notifi"]["addsuccess"];} ?></h4>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="x_content">
        <form class="" action="" method="post" novalidate enctype="multipart/form-data">
            <div class="row" >
                <div class="col-5">
                    <div class="form-group">
                        <label for="">Tên Sản Phẩm</label>
                        <h6 class="text-danger"><?php if(isset($data["notifi"]["name"])){echo $data["notifi"]["name"];}?> </h6>
                        <input id="name" type="text" class="form-control" name="product[tensp]" value="<?=$data["product"][0]["tensp"]?>">
                   
                    </div>
                   
                    <div class="form-group">
                        <label for="">Chọn Danh Mục Sản Phẩm</label>
                        <h6 class="text-danger"><?php if(isset($data["notifi"]["category"])){echo $data["notifi"]["category"];}?> </h6>
                        <?php 
                            
                        ?>
                        <select class="form-control" name="product[mabosuutap]">
                            <option value="<?=$data["product"][0]["mabosuutap"]?>"><?=$data["tenbosuutap"][0]["tenbosuutap"]?></option>
                            <?php foreach($data["category"] as $key=>$values){?>
                            <option value="<?=$values["mabosuutap"]?>"><?=$values["tenbosuutap"]?></option>
                            <?php } ?>
                        </select>
                    </div>
                   
                  
                    
                </div>
                
                <!-- trong row chứa col , trong col chứa dc row -->
                <!-- col từ 1 -> 12 -->
                <div class="col-2">
                    <div class="form-group">
                        <label for="">Giá Sản Phẩm</label>
                        <h6 class="text-danger"><?php if(isset($data["notifi"]["price"])){echo $data["notifi"]["price"];}?> </h6>
                        <input id="" type="number" class="form-control" name="product[gia]" value="<?=$data["product"][0]["gia"]?>">
                    </div>
                    <div class="form-group">
                        <label for="">Giảm Giá</label>
                        <h6 class="text-danger"><?php if(isset($data["notifi"]["sale"])){echo $data["notifi"]["sale"];}?> </h6>
                        <input id="name" type="number" class="form-control" name="product[giamgia]" value="<?=$data["product"][0]["giamgia"]?>" placeholder="%">
                    </div>
                    <div class="form-group">
                        <label for="">Số Lượng</label>
                        <h6 class="text-danger"><?php if(isset($data["notifi"]["quantity"])){echo $data["notifi"]["quantity"];}?> </h6>
                        <input id="name" type="number" class="form-control" name="product[soluong]" value="<?=$data["product"][0]["soluong"]?>">
                    </div>
                </div>
                <div class="col-2">
                <div class="form-group">
                        <label for="">Hình Ảnh</label>
                        <h6 class="text-danger"><?php if(isset($data["notifi"]["img"])){echo $data["notifi"]["img"];}?> </h6>
                         <div class="img_product" style=" font-size: 16px; width: 20%;">
                            <img id ="image" alt="" style=" width: 100px;" >
            
                        </div>
                        <input id="img" type="file" class="" name="img" >
                    </div>
                </div>
                <div class="col-7">
                    <div class="form-group">
                    <label for="">Mô Tả</label>
                        <textarea style="height: 100px;" id="name" type="text" class="form-control" name="product[mota]" ><?=$data["product"][0]["mota"]?></textarea>
                    </div>
                </div>
                
                <div class="row" style="background: #F7F7F7; padding:5px;" >
                            <div class="col-6"></div>
                            <div class="col-6">
                                <input class="btn btn-success btn_update" type="submit" value="Cập nhật" name="submit" >
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