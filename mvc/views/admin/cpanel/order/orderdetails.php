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
        padding: 6px 70px;
        margin-left: 50%;
        font-size: 18px;
        margin-top:60px;
    }
</style>
<h3 style="text-align: center;font-weight: bold;">CHI TIẾT ĐƠN HÀNG</h3>
<a class="btn btn-primary" href="<?=base?>admin/order&page=<?=$data["page"]?>">Trở Về</a>
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
  </tbody>
</table>
<h3>Thông Tin Đơn Hàng</h3>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên Sản Phẩm</th>
      <th scope="col">Số Lượng</th>
      <th scope="col">Hình Ảnh</th>
      <th scope="col">Đơn Giá</th>
    </tr>
  </thead>
  <tbody>
      <?php $total = 0?>
    <?php foreach($data["orderdetails"] as $key=>$values){?>
    <tr>
      <th scope="row"><?=$key+1?></th>
      <td><?=$values["tensp"]?></td>
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
<div class="row" style="background: #F7F7F7; padding:5px;" >
      <div class="col-6"></div>
      <div class="col-6">
          <input class="btn btn-success btn_update" type="submit" value="IN HÓA ĐƠN" name="submit" >
      </div>
</div>