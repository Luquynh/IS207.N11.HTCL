<style>
    .img_product .img__product-img{
        width: 200px;
        height: 120px;
        object-fit: cover;
    }
    span{
        display: inline-block;
    }
    .test{
        background: red;
    }
</style>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3><?= $data['title']?></h3>
                <a href="admin/addslider" class="btn btn-primary">Thêm mới</a>  
                <h3 class="text-success"><?=$data["mess"]?></h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="x_content">
        <div class="table-responsive" style="min-height: 400px;">
            <table class="table table-striped jambo_table bulk_action">
                <thead>
                    <tr class="headings">
                        <th class="column-title">Tên slider</th>
                        <th class="column-title">Content</th>
                        <th class="column-title">Slogan</th>
                        <th class="column-title">Trạng Thái</th>
                        <th class="column-title">Hình Ảnh</th>
                        <th class="column-title">Ngày Tạo</th>
                        <th class="column-title no-link last"><span class="nobr">Hành Động</span>
                        </th>
                    </tr>
                </thead>
    
                <?php if(isset($data["slider"])){?>
                <tbody>
                    <?php foreach($data["slider"] as $key => $values){ ?>
                    <tr class="even pointer">
                        <td style=" font-size: 16px;" class=""><?=$values["pretitle"] ?></td>
                        <td style=" font-size: 16px;" class=""><?=$values["title"] ?></td>
                        <td style=" font-size: 16px;" class=""><?=$values["subtitle"] ?></td>
                        <td style=" font-size: 16px;" class=""><a onclick="status()" id = "status" href="<?=base?>admin/statusslider&id=<?=$values['maslider']?>&status=<?=$values["tt_xoa"] ?>" class="btn btn-primary"><?=$values["tt_xoa"] ?></a></td>
                        <td style=" font-size: 16px;" class="img_product">
                            <img class="img__product-img" src="<?=imgclient?><?=$values['banner_img']?>" alt="">
                        </td>
                        <td style=" font-size: 16px;" class=""><?=$values["ngaytao"] ?></td>
                        <td>
                            <a style="height: 35px" class="btn btn-danger submit" href="javascrip:void(0)" onclick="del(<?=$values['maslider']?>,'<?=$values['pretitle'] ?>','<?=base.'admin/deleteslider/'?>','slider ')"  >Xóa</a> 
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
