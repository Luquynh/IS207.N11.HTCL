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
        padding: 6px 50px;
        margin-left: 70%;
        font-size: 18px;
        margin-top:40px;
    }
    .form-control{
    height: calc(1.5em + 1.5rem + 2px);
    font-size: 1.5rem;
}

</style>
<h3 style="text-align: center;font-weight: bold;"><?=$data["title"]?></h3>
<a class="btn btn-primary" href="<?=base?>admin/order&page=<?=$data["page"]?>">Trở Về</a>

    <!-- Form sua thong tin don hang -->
    <div class="update__form">
                    <!-- <div style="height: 24px; width: 100%; text-align: left; font-size: 12px; font-weight: 600;" id= "mess"><?=$data["mess"]?></div> -->

        <form action="" method="post"  enctype="multipart/form-data">
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
                <td scope="row" style="width: 200px;">
                    <?=$data["infouser"][0]["tenkh"]?>
                    
                </td>
                <td style="width: 150px;">
                
                    <input id="sodt" type="text" class="form-control" name="sodt"  value="<?=$data["info_order"][0]["sodt"]?>">
                </td>
                <td>
                    <input id="diachi" type="text" class="form-control" name="diachi" value="<?=$data["info_order"][0]["diachi"]?>">            
                </td>
                <td style="width: 250px;">
                  <?=$data["infouser"][0]["email"]?>
                </td>
                </tr>
                </tbody>
            </table>
                                  
                        <div class="row">
                            <div class="col-6"></div>
                            <div class="col-6">
                                <input class="btn btn-success btn_update" type="submit" value="Cập nhật" name="submit" >
                            </div>
                        </div>
                    </form>
                </div>
    <!-- Form sua thong tin don hang -->
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
  
<h3>Thông Tin Đơn Hàng Mã #<?=$data["info_order"][0]["madonhang"]?></h3>
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
            <h2 style="margin-right: 15px;color: black;">Trạng thái đơn hàng:</h2>
            <h2 style="color: <?=$color?>;"><?=$tentt?></h2>
          </div>
          
          
                    
             
        </div>
        
  </div>
</form>

<script>
 
</script>