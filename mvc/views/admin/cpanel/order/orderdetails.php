<style>
    .img_product .img__product-img{
        width: 100px;
        height: 80px;
        object-fit: cover;
    }
    span{
        display: inline-block;
    }
    .btn_update{
        padding: 6px 10px;
        margin-left: 70%;
        font-size: 15px;
        /* margin-top:40px; */
    }
    .form-control{
    height: calc(1.5em + 1.5rem + 2px);
    font-size: 1.5rem;
}

</style>
<h3 style="text-align: center;font-weight: bold;">CHI TIẾT ĐƠN HÀNG</h3>


        <div class="row">
          <div class="col-5">
          <a class="btn btn-primary" href="<?=base?>admin/order&page=<?=$data["page"]?>">Trở Về</a>

          </div>
          <div class="col-1"></div>
          <div class="col-5">
          <form action="<?=base?>printinvoice/print" method="POST"></form>
            <input type="text" name="id_order" id="" value="<?=$data["info_order"][0]['madonhang']?>" hidden>
            <input type="text" name="id_user" id="" value="<?=$data["info_order"][0]['makh']?>" hidden>
            <a href="http://localhost:3000/xampp/htdocs/curnon/mvc/core/invoice.php" target="_blank" class="btn btn-success btn_update" style="width: 150px; height: 40px;  color: #fff;">IN HÓA ĐƠN</a>
          </form>
          </div>
        </div>
<h3>Thông Tin Khách Hàng</h3>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Tên Khách Hàng</th>
      <th scope="col">Số Điện Thoại </th>
      <th scope="col">Địa Chỉ </th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td scope="row"><?=$data["infouser"][0]["tenkh"]?></td>
      <td><?=$data["info_order"][0]["sodt"]?></td>
      <td><?=$data["info_order"][0]["diachi"]?></td>
      <td><?=$data["infouser"][0]["email"]?></td>
    </tr>
    <!-- Lay status cua donhang -->
    <?php 
                            $color="green";
                            $tentt="";
                                switch($data["info_order"][0]["matrangthai"]){
                                    case 0:$tentt= "Đã hủy";
                                    $color="red";
                                    break;
                                    case 1: $tentt="Chờ xử lý";
                                    $color="blue";
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
  </tbody>
</table>
<h3>Thông Tin Đơn Hàng</h3>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên Sản Phẩm</th>
      <th scope="col">Màu</th>
      <th scope="col">Kích thước</th>
      <th scope="col">Số Lượng</th>
      <th scope="col">Hình Ảnh</th>
       <th scope="col">Thành tiền</th>
       
    </tr>
  </thead>
  <tbody>
      <?php $total = 0?>
    <?php foreach($data["orderdetails"] as $key=>$values){?>
    <tr>
      <th scope="row"><?=$key+1?></th>
      <td><?=$values["tensp"]?></td>
      <td><?=$values["mausac"]?></td>
      <?php 
      $kichthuoc=40;
      switch($values["mabosuutap"]){
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
      <td><?=$kichthuoc?>mm</td>
      <td><?=$values["soluong"]?></td>
      <td style=" font-size: 16px;" class="img_product">
                            <img class="img__product-img" src="<?=base?>public/client/assets/img/<?=$values['img']?>" alt="">
        </td>
      <td><?=number_format ($values["tongtien"] , $decimals = 0 , $dec_point = "," , $thousands_sep = "." )?> VNĐ</td>
      

      
    </tr>
    
    <?php }?>
  </tbody>
</table>

<h2>Phí vận chuyển: <?=number_format ($data["info_order"][0]["phiship"] , $decimals = 0 , $dec_point = "," , $thousands_sep = "." )?> VNĐ</h2>
<h2 style="color: black; font-weight: bold;">Tổng Tiền: <?=number_format ($data["info_order"][0]["phiship"]+$data["info_order"][0]["tonggiatri"] , $decimals = 0 , $dec_point = "," , $thousands_sep = "." )?> VNĐ</h2>
<form action="" method="post">
  <div class="row" style="background: #F7F7F7; padding:5px;" >
        <div class="col-5">
          <div class="row">
          <?php if($data['info_order'][0]['matrangthai'] == 4){?>
            <h2 style="margin-right: 15px;color:#077FF8">Trạng thái đơn hàng: <span style="color: green; font-weight: bold;">Đã thanh toán</span></h2>
            
          <?php } else {?>
          <h2 style="margin-right: 15px;color:#077FF8">Trạng thái đơn hàng: </h2>
          <select name="matt"  style="width: 170px; margin-bottom:40px;" class="form-control" >
                      <option value="<?=$data['info_order'][0]['matrangthai']?>" style="color:<?=$color?>;"><?=$tentt?></option>
                            <?php 
                                        $arr_ten=array();
                                        $arr_id=array();
                                        $arr_color=array();
                                        $i=0;
                                          foreach($data["info_tt"] as $key => $values){
                                            
                                              if($values["matrangthai"]!=$data['info_order'][0]['matrangthai']){
                                                  $arr_id[$i]=$values["matrangthai"];
                                                  $arr_ten[$i]=$values["tentrangthai"];
                                                  if($arr_id[$i]==0){
                                                    $arr_color[$i]="red";
                                                  }
                                                  else if($arr_id[$i]==1){
                                                    $arr_color[$i]="blue";
                                              
                                                  }
                                                  else{
                                                    $arr_color[$i]="green";
                                                  }
                                                  
                                                  $i++;
                                              }
                                          }
                            ?>
                                        <option value="<?=$arr_id[0]?> " style="color:<?=$arr_color[0]?>;"><?=$arr_ten[0]?></option>
                                        <option value="<?=$arr_id[1]?>"style="color:<?=$arr_color[1]?>;"><?=$arr_ten[1]?></option>
                                        <option value="<?=$arr_id[2]?>"style="color:<?=$arr_color[2]?>;"><?=$arr_ten[2]?></option>
                                        <option value="<?=$arr_id[3]?>"style="color:<?=$arr_color[3]?>;"><?=$arr_ten[3]?></option>
                                        <option value="<?=$arr_id[4]?>"style="color:<?=$arr_color[4]?>;"><?=$arr_ten[4]?></option>
                                        
              </select>
            </div>
            <input class="btn btn-primary" type="submit" value="Cập Nhật Trạng Thái" name="update"  style="width: 170px;margin-left:156px; margin-bottom:-5px;height: 40px;padding: 0 10px;position: relative; top: -30px;">
          
          
                    
          <!-- <div class="col-1"></div>
        <div class="col-5">
          <div class="row"></div>
          <form action="<?=base?>printinvoice/print" method="POST"></form>
            <input type="text" name="id_order" id="" value="<?=$data["info_order"][0]['madonhang']?>" hidden>
            <input type="text" name="id_user" id="" value="<?=$data["info_order"][0]['makh']?>" hidden>
            <a href="http://localhost:3000/xampp/htdocs/curnon/mvc/core/invoice.php" target="_blank" class="btn btn-success btn_update" style="width: 150px; height: 50px; padding: 5px 8px; color: #fff;">IN HÓA ĐƠN</a>
          </form>
          </div> -->
        <?php }?>
        </div>
        
  </div>
</form>

<script>
 
</script>