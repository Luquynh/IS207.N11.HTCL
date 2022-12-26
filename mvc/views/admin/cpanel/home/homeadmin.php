<style>
    .title-statistical{
        font-size: 25px;
        
    }
    .tile-stats{
        min-height: 125px;
        color: white;
    }
    .count{
      font-size: 15px;
      color: white;
    }
    .tile-stats h3 {
    color: white;
    font-size: 17px;
  }
  .tile-stats .icon{
    color: white;
  }
</style>
<div class="col" role="main">
    <div class="">
    <div class="page-title">
        <div class="title_left">
        <h3>Bảng Điều Khiển</h3>
        </div>

        <div class="title_right">
        <div class="col-md-5 col-sm-5   form-group pull-right top_search">
            <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go!</button>
            </span>
            </div>
        </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">
        <div class="">
            <div class="x_content">
            <div class="row">
                <div class="animated flipInY col-lg-3 col-md-4 col-sm-6  ">
                <div class="tile-stats blue_bg">
                    <div class="icon"><i class="fa fa-shopping-cart"></i>
                    </div>
                    <div class="count"><?=$data["totalorder"]?></div>

                    <h3>Đơn Hàng</h3>
                </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-4 col-sm-6  " >
                <div class="tile-stats yellow_bg">
                    <div class="icon"><i class="fa fa-group"></i>
                    </div>
                    <div class="count"><?=$data["totaluser"]?></div>

                    <h3>Thành Viên đang hoạt động</h3>
                </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-4 col-sm-6  ">
                <div class="tile-stats red_bg">
                    <div class="icon"><i class="fa fa-money"></i></i>
                    </div>
                    <div class="count"><?=number_format ($data["totalmony"] , $decimals = 0 , $dec_point = "," , $thousands_sep = "." )?></div>

                    <h3>Doanh Thu trong <?=$data["month"]?>/<?=$data["year"]?></h3>
                </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-4 col-sm-6  ">
                <div class="tile-stats light_blue_bg">
                    <div class="icon"><i class="fa fa-check-square-o"></i>
                    </div>
                    <div class="count"><?=$data["ordersuccess"]?></div>
                    <h3 class="title-statistical">Đơn Hàng Đã Giao</h3>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>

        <div class="page-title">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Đơn Hàng Gần Đây</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>STT</th>
                          <th>Tên Khách Hàng</th>
                          <th>Tổng Tiền</th>
                          <th>Thời Gian</th>
                          <th>Trạng Thái</th>
                          <th>Thao Tác</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php foreach($data["ordernew"] as $key=>$value){ 
                          $infor_user = $this->ordermodel->GetInfoUserById($value['makh']);
                        ?>
                          <tr>
                            <td><?=$key+1?></td>
                            <td><?=$infor_user[0]["tenkh"]?></td>
                            <td><?=number_format ($value["tonggiatri"] , $decimals = 0 , $dec_point = "," , $thousands_sep = "." )?></td>
                            <td><?=$value["ngaymua"]?></td>
                            <?php 
                              $color="green";
                              $tentt="";
                              switch($value["matrangthai"]){
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
                            
                            <td style="color: <?=$color?>; font-weight: bold;"><?=$tentt?></td>
                            
                            <td style="padding: unset; padding-left: 5px ;">
                            <a style="height: 35px;" class="btn btn-primary" href="<?=base?>admin/orderdetails&id_order=<?=$value['madonhang']?>&id_user=<?=$value['makh']?>">Chi Tiết</a>
                            </td>
                          </tr>
                        <?php }?>
                      </tbody>
                    </table>
                  </div>
                  </div>
              </div>
            </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>