<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3><?= $data['title']?></h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="x_content" style="min-height: 460px;max-height: 460px;">
        <div class="table-responsive" >
            <table class="table table-striped jambo_table bulk_action">
                <thead>
                    <tr class="headings">
                        <th class="column-title">STT</th>
                        <th class="column-title">Tên Khách Hàng</th>
                        <th class="column-title">Tổng Tiền</th>
                        <th class="column-title">Ngày Đặt</th>
                        <th class="column-title">Trạng Thái</th>
                        <th class="column-title no-link last"><span class="nobr">Thao Tác</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data["listorder"] as $key=>$values){ ?>
                        <tr class="even pointer">
                            <td style=" font-size: 16px;" class=""><?=($data["currentpage"]-1)*6+$key+1?></td>
                            <td style=" font-size: 16px;" class=""><?=$values["tenkh"]?></td>
                            <td style=" font-size: 16px;" class=""><?=number_format ($values["tonggiatri"] , $decimals = 0 , $dec_point = "," , $thousands_sep = "." )?> VNĐ</td>
                            <td style=" font-size: 16px;" class=""><?=$values["ngaymua"]?></td>
                            <?php 
                            $color="btn-outline-success";
                            $tentt="";
                                switch($values["matrangthai"]){
                                    case 0:$tentt= "Đã hủy";
                                    $color="btn-outline-danger";
                                    break;
                                    case 1: $tentt="Chờ xử lý";
                                    $color="btn-outline-primary";
                                    break;
                                    case 2:$tentt="Đã đóng gói";
                                    break;
                                    case 3:$tentt="Đang vận chuyển";
                                    break;
                                    case 4: $tentt="Đã thanh toán";
                                    break;
                                    default:
                                    $tentt="Đặt hàng thành công";
                                }

                            
                            ?>
                            <td>
                                <a style="height: 35px;font-weight: 600;" class="btn <?=$color?>" href="<?=base?>admin/orderdetails&id_order=<?=$values['madonhang']?>&id_user=<?=$values['makh']?>&page=<?=$data['currentpage']?>"><?=$tentt?></a>
                            </td>
                                
                                
                               
                            <td>
                                <a href="<?=base?>admin/orderdetails&id_order=<?=$values['madonhang']?>&id_user=<?=$values['makh']?>&page=<?=$data["currentpage"]?>" style="height: 35px;" class="btn btn-primary" href="">Chi Tiết</a>
                                <a style="height: 35px; " class="btn btn-success" href="<?=base?>admin/editorder&id_order=<?=$values['madonhang']?>&id_user=<?=$values['makh']?>&page=<?=$data['currentpage']?>">Sửa</a>
                                 

                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if($data["currentpage"] != 1 && $data["currentpage"] >= 4){?>
        <a class="page-item" href="<?=base?>admin/order&page=<?=1?>">Trang đầu</a>
        <?php }?>
    <?php for($i = 1; $i <= $data["totalpage"];$i++){ ?>
                <?php if($data["currentpage"] != $i){ 
                    if($i > $data["currentpage"]-3 && $i < $data["currentpage"] + 3){ ?>
                         <a class="page-item" href="<?=base?>admin/order&page=<?=$i?>"><?=$i?></a>
                    <?php }?>
                <?php }else{ ?>
                <span class="current-page page-item"><?=$i?></span>
    <?php }}?>
    <?php if($data["currentpage"] != $data["totalpage"] && $data["currentpage"] <= $data["totalpage"] - 3){?>
        <a class="page-item" href="<?=base?>admin/order&page=<?=$data["totalpage"]?>">Trang cuối</a>
    <?php }?>
</div>
