 <style>
    .img_product .img__product-img{
        width: 100px;
        height: 80px;
        object-fit: cover;
    }
    span{
        display: inline-block;
    }
</style>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3><?= $data['title']?></h3>
                <a href="admin/addproduct" class="btn btn-primary">Thêm mới</a>
                <h3 class="text-success"><?=$data["mess"]?></h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="x_content">
        <div class="table-responsive" style="min-height: 400px;">
            <table class="table table-striped jambo_table bulk_action">
                <thead>
                    <tr class="headings">
                    <th class="column-title">STT</th>

                        <th class="column-title">Tên Sản Phẩm</th>
                        <th class="column-title">Bộ sưu tập</th>
                        <th class="column-title">Màu sắc</th>
                        <th class="column-title">Kích thước</th>

                        <th class="column-title">Hình Ảnh</th>
                        <th class="column-title">Giá</th>
                        <th class="column-title">Số Lượng</th>
                        <th class="column-title no-link last"><span class="nobr">Hành Động</span>
                        </th>
                    </tr>
                </thead>
                <?php if(isset($data["data"])){?>
                <tbody>
                    <?php foreach($data["data"] as $key => $values){ $stt = ($data['currentpage']-1)*3+($key+1)?>
                    <tr class="even pointer">
                        <td style=" font-size: 16px;" class=""><?=($data["currentpage"]-1)*4+$key+1?></td>
                        <td style=" font-size: 16px;" class="name__product"><?=$values['tensp']?></td>
                        <td style=" font-size: 16px;" class="price__product"><?=$values['tenbosuutap']?></td>
                        <td style=" font-size: 16px;" class="price__product"><?=$values['mausac']?></td>
                        <?php 
                        $kichthuoc=40;
                        switch($values["makichthuoc"]){
                            case 1:$kichthuoc= 40;
                            
                            break;
                            case 2: $kichthuoc=38;
                            $color="black";
                            break;
                            case 3:$kichthuoc=42;
                            break;
                            case 4:$kichthuoc=28;
                            break;
                            case 5: $kichthuoc=30;
                            break;
                            default:
                            $kichthuoc=32;
                        }

      
      
                    ?>
                        <td style=" font-size: 16px;" class="price__product"><?=$kichthuoc?>mm</td>

                        <td style=" font-size: 16px;" class="img_product">
                            <img class="img__product-img" src="<?=base?>public/client/assets/img/<?=$values['img']?>" alt="">
                        </td>
                        <td><?=number_format ($values['gia'], $decimals = 0 , $dec_point = "," , $thousands_sep = "." )?> VNĐ</td>
                        <td><?=$values['soluong']?></td>
                        <td>
                            <a style="height: 35px;" class="btn btn-success" href="<?=base?>admin/editproduct&id=<?=$values['masp']?>&page=<?=$data["currentpage"]?>">Sửa</a>
                            <a style="height: 35px" class="btn btn-danger submit" href="javascrip:void(0)" onclick="del(<?=$values['masp']?>,'<?=$values['tensp'] ?>','<?=base.'admin/deleteproduct/'?>','sản phẩm ',<?=$data['currentpage']?>,<?=$stt?>)"  >Xóa</a> 
                        </td>
                    </tr>
                    <?php  } ?>
                </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
    <?php if($data["currentpage"] != 1 && $data["currentpage"] >= 4){?>
        <a class="page-item" href="<?=base?>admin/showproduct&page=<?=1?>">Trang đầu</a>
        <?php }?>
    <?php for($i = 1; $i <= $data["total"];$i++){ ?>
                <?php if($data["currentpage"] != $i){ 
                    if($i > $data["currentpage"]-3 && $i < $data["currentpage"] + 3){ ?>
                         <a class="page-item" href="<?=base?>admin/showproduct&page=<?=$i?>"><?=$i?></a>
                    <?php }?>
                <?php }else{ ?>
                <span class="current-page page-item"><?=$i?></span>
    <?php }}?>
    <?php if($data["currentpage"] != $data["total"] && $data["currentpage"] <= $data["total"] - 3){?>
        <a class="page-item" href="<?=base?>admin/showproduct&page=<?=$data["total"]?>">Trang cuối</a>
        <?php }?>
</div>
