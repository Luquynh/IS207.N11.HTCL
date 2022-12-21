<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3><?= $data['title']?></h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="x_content" style="min-height: 460px; max-height: 460px;">
        <div class="table-responsive" >
            <table class="table table-striped jambo_table bulk_action">
                <thead>
                    <tr class="headings">
                        <th class="column-title">STT</th>
                        <th class="column-title">Họ Tên</th>
                        <th class="column-title">Email</th>
                        <th class="column-title">Giới tính</th>
                        <th class="column-title">Số Điện Thoại</th>
                        <th class="column-title">Địa Chỉ</th>
                        <th class="column-title no-link last"><span class="nobr">Trạng thái hoạt động</span></th>
                        <th class="column-title no-link last"><span class="nobr">Hành Động</span>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data["listaccount"] as $key=>$values){ ?>
                        <tr class="even pointer">
                            <td style=" font-size: 16px;" class=""><?=($data["currentpage"]-1)*6+$key+1?></td>
                            <td style=" font-size: 16px;" class=""><?=$values["tenkh"]?></td>
                            <td style=" font-size: 16px;" class=""><?=$values["email"]?></td>
                            <?php 
                            
                            if($values["gioitinh"]==0){
                                $gioitinh="Nam";
                            }
                            else{
                                $gioitinh="Nữ";
                            }
                            ?>
                            <td style=" font-size: 16px;" class=""><?=$gioitinh?></td>
                            <td style=" font-size: 16px;" class=""><?=$values["sodt"]?></td>
                            <td style=" font-size: 16px;" class=""><?=$values["diachi_dd"]?></td>
                            <td>
                                
                            <a href="<?=base?>admin/statusaccountuser&id=<?=$values["makh"]?>&status=<?=$values["tt_xoa"]?>&page=<?=$data["currentpage"]?>" style="height: 35px;" class="btn btn-primary" href="">
                            <?php 
                            if($values["tt_xoa"]==1){
                                $tt_hd="Đã block";
                            }
                            else{
                                $tt_hd="Đang hoạt động";
                            }
                            ?>
                            <?=$tt_hd?>
                            </a> 
                    
                        </td>
                        <td>
                             
                            <a style="height: 35px;" class="btn btn-success" href="<?=base?>admin/editaccount&id=<?=$values['makh']?>">Sửa</a>
                        </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if($data["currentpage"] != 1 && $data["currentpage"] >= 4){?>
        <a class="page-item" href="<?=base?>admin/useraccount&page=<?=1?>">Trang đầu</a>
        <?php }?>
    <?php for($i = 1; $i <= $data["totalpage"];$i++){ ?>
                <?php if($data["currentpage"] != $i){ 
                    if($i > $data["currentpage"]-3 && $i < $data["currentpage"] + 3){ ?>
                         <a class="page-item" href="<?=base?>admin/useraccount&page=<?=$i?>"><?=$i?></a>
                    <?php }?>
                <?php }else{ ?>
                <span class="current-page page-item"><?=$i?></span>
    <?php }}?>
    <?php if($data["currentpage"] != $data["totalpage"] && $data["currentpage"] <= $data["totalpage"] - 3){?>
        <a class="page-item" href="<?=base?>admin/useraccount&page=<?=$data["totalpage"]?>">Trang cuối</a>
    <?php }?>
</div>
