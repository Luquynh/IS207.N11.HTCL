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
            <a class="btn btn-primary" href="<?=base?>admin/showcategory">Trở Về</a>
                
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="x_content">
        <div class="table-responsive" style="min-height: 150px;">
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
                        
                        </th>
                    </tr>
                </thead>
                <td style=" font-size: 16px;" class=""><?=$data['info'][0]['tenbosuutap']?></td>
                <td style=" font-size: 16px;width: 300px;" class=""><?=$data['info'][0]['mota']?></td>
                <td style=" font-size: 16px;" class=""><?=$data['info'][0]['gioitinh']?></td>
                <td style=" font-size: 16px;" class="img_product">
                    <img src="<?=imgclient?><?=$data['info'][0]['gioitinh']?>/<?=$data['info'][0]['img']?>" alt="" class="img__product-img"></td>
                <td style=" font-size: 16px;" class="img_product">
                    <img src="<?=imgclient?><?=$data['info'][0]['gioitinh']?>/<?=$data['info'][0]['tenbosuutap']?>/<?=$data['info'][0]["imgmain"] ?>" alt="" class="img__product-img"></td>
                <td style=" font-size: 16px;" class=""><?=$data['info'][0]['sl_sp']?></td>
                <td style=" font-size: 16px;" class=""><?=$data['info'][0]['kichthuoc']?>mm</td>
                </tbody>
                
            </table>
        </div>
        <div class="page-title">
            <div class="title_left">
                <h3>Các Sản Phẩm Thuộc <?=$data['info'][0]['tenbosuutap']?></h3>
                    
            </div>
        </div>
        <div class="table-responsive" style="min-height: 450px;">
            <table class="table table-striped jambo_table bulk_action">
                <thead>
                    <tr class="headings">
                        <th class="column-title">Tên sản phẩm</th>
                        <th class="column-title">Giá</th>
                        <!-- <th class="column-title">Giới tính</th> -->
                        <th class="column-title">Loại sản phẩm</th>
                        <th class="column-title">Hình ảnh</th>
                        <th class="column-title">Số lượng sp</th>
                        <th class="column-title">Giảm giá</th>
                        <th class="column-title no-link last"><span class="nobr">Hành Động</span>
                        </th>
                    </tr>
                </thead>
                <?php if(isset($data["info_sp"])){?>
                <tbody>
                    <?php foreach($data["info_sp"] as $key => $values){ $stt = ($data["currentpage"]-1)*5 + $key+1?>
                    <tr class="even pointer">
                        <td style=" font-size: 16px;" class=""><?=$values["tensp"] ?></td>
                        <td style=" font-size: 16px; width: 300px;" class="" ><?=number_format ($values["gia"] , $decimals = 0 , $dec_point = "," , $thousands_sep = "." )?> VNĐ</td>
                        <td style=" font-size: 16px;" class=""><?php 
                            if($values["maloaisp"]==1 ){
                                echo "Đồng hồ";
                            }
                            else{
                                echo "Dây đồng hồ";
                            }
                        
                        ?></td>
                        <td style=" font-size: 16px;" class="img_product">
                            <img src="<?=imgclient?><?=$values["img"] ?>" alt="" class="img__product-img"></td>
                       
                           
                        <td style=" font-size: 16px;" class=""><?=$values["soluong"] ?></td>
                        <td style=" font-size: 16px;" class=""><?=$values["giamgia"] ?>%</td> 
                        <td>
                            <a href="<?=base?>admin/detailproduct&id=<?=$values['masp']?>" style="height: 35px;" class="btn btn-primary" href="">Chi Tiết SP</a> 
                            
                        </td>
                    </tr>
                    <?php }?>
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
