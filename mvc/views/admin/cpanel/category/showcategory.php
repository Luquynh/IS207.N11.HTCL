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
                <a href="admin/addcategory" class="btn btn-primary">Thêm mới</a>  
                <h3 class="text-success"><?=$data["mess"]?></h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="x_content">
        <div class="table-responsive" style="min-height: 400px;">
            <table class="table table-striped jambo_table bulk_action">
                <thead>
                    <tr class="headings">
                        <th class="column-title">Tên bộ sưu tập</th>
                        <th class="column-title">Mô tả</th>
                        <th class="column-title">Giới tính</th>
                        <th class="column-title">Hình đại diện</th>
                        <th class="column-title">Hình ảnh</th>
                        <th class="column-title">Số lượng sp</th>
                        <th class="column-title">Kích thước</th>
                        <th class="column-title no-link last"><span class="nobr">Hành Động</span>
                        </th>
                    </tr>
                </thead>
                <?php if(isset($data["data"])){?>
                <tbody>
                    <?php foreach($data["data"] as $key => $values){ $stt = ($data["currentpage"]-1)*5 + $key+1?>
                    <tr class="even pointer">
                        <td style=" font-size: 16px;" class=""><?=$values["tenbosuutap"] ?></td>
                        <td style=" font-size: 16px; width: 300px;" class="" ><?=$values["mota"] ?></td>
                        <td style=" font-size: 16px;" class=""><?=$values["gioitinh"] ?></td>
                        <td style=" font-size: 16px;" class="img_product">
                            <img src="<?=imgclient?><?=$values["gioitinh"]?>/<?=$values["img"] ?>" alt="" class="img__product-img"></td>
                        <td style=" font-size: 16px;" class="img_product">
                            <img src="<?=imgclient?><?=$values["gioitinh"]?>/<?=$values["tenbosuutap"] ?>/<?=$values["imgmain"] ?>" alt="" class="img__product-img"></td>
                        <td style=" font-size: 16px;" class=""><?=$values["sl_sp"] ?></td>
                        <td style=" font-size: 16px;" class=""><?=$values["kichthuoc"] ?>mm</td> 
                        <td>
                            <a href="<?=base?>admin/detailcategory&id=<?=$values['mabosuutap']?>&page=<?=$data["currentpage"]?>" style="height: 35px;" class="btn btn-primary" href="">Chi Tiết</a> 
                            <a style="height: 35px;" class="btn btn-success" href="<?=base?>admin/editcategory&id=<?=$values['mabosuutap']?>&page=<?=$data['currentpage']?>">Sửa</a>
                            <a style="height: 35px" class="btn btn-danger submit" href="javascrip:void(0)" onclick="del(<?=$values['mabosuutap']?>,'<?=$values['tenbosuutap'] ?>','<?=base.'admin/deletecategory/'?>','danh mục ',<?=$data['currentpage']?>,<?=$stt?>)"  >Xóa</a> 
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
    <?php if($data["currentpage"] != 1 && $data["currentpage"] >= 4){?>
        <a class="page-item" href="<?=base?>admin/showcategory&page=<?=1?>">Trang đầu</a>
        <?php }?>
    <?php for($i = 1; $i <= $data["total"];$i++){ ?>
                <?php if($data["currentpage"] != $i){ 
                    if($i > $data["currentpage"]-3 && $i < $data["currentpage"] + 3){ ?>
                         <a class="page-item" href="<?=base?>admin/showcategory&page=<?=$i?>"><?=$i?></a>
                    <?php }?>
                <?php }else{ ?>
                <span class="current-page page-item"><?=$i?></span>
    <?php }}?>
    <?php if($data["currentpage"] != $data["total"] && $data["currentpage"] <= $data["total"] - 3){?>
        <a class="page-item" href="<?=base?>admin/showcategory&page=<?=$data["total"]?>">Trang cuối</a>
        <?php }?>
</div>
