<!-- head-->
<?php 
        require_once "./mvc/views/client/include/head.php";
?>
<!--/head-->

<body>
    <!-- header-->
    <?php 
        require_once "./mvc/views/client/include/header.php";
    ?>
	<!--/header-->
    <!--Infor user -->
    <div class="main">
        <div class="infor-container">
            <div class="infor-tab">
                <div class="infor-tab--header">
                    <div class="infor-tab--header__acc-logo" >
                        <?php echo $data['avt'];?>
                    </div>
                    <div class="infor-tab--header__user">
                        <p class="infor-tab--header__name">
                            <?php echo $data["info"][0]["tenkh"]?>
                        </p>
                        <p class="infor-tab--header__email">
                        <?php echo $data["info"][0]["email"]?>
                        </p>
                    </div>
    
                </div>
    
                <div class="infor-tab-content">
                    <ul class="infor-tab-content__list">
                        <a href = "<?=base?>inforuser" class="infor-tab-content__item ">Thông tin tài khoản</a>
                        <a href = "<?=base?>inforuser/history" class="infor-tab-content__item infor-active">Danh sách đơn hàng</a>
                        <a href="logout" class="link">
                            <li class="infor-tab-content__item item-center logout-btn"><i class="ti-shift-right infor-icon"></i>Đăng xuất</li>
                        </a>
                    </ul>
                </div>
            </div>
            <div class="infor-content">
                <h2 class="infor-content--header">Danh sách đơn hàng</h2>
                <table class="infor-content-infor" >
                    <tr class="row-infor">
                        <th class="">
                            <strong>Địa chỉ</strong>
                        </th>
                        <th class="">
                            <strong>Số điện thoại</strong>
                        </th>
                        
                        <th class="">
                            <strong>Ngày mua</strong>
                        </th>
                    
                        <th class=" ">
                            <strong>Tổng tiền</strong> 
                        </th>
                    
                        <th class="">
                            <strong>Trạng thái</strong>
                        </th>
                    
                        <th class="">
                            <strong>Chức năng</strong>
                        </th>
                    </tr>
                <?php foreach($data['order'] as $row): ?>
                    <tr class="row-infor">
                        <td class="col-infor">
                            <?=$row['diachi']?>
                        </td>
                        <td class="col-infor">
                            <?=$row['sodt']?>
                        </td>
                        <td class="col-infor">
                            <?=$row['ngaymua']?>
                        </td>
                        <td class="col-infor">
                            <!-- <?=$row['tonggiatri']?> ₫ -->
                            <?=number_format($row['tonggiatri'], $decimals=0, $dec_point=',', $thousands_sep = '.')?> ₫
                        </td>
                        <td class="col-infor">
                            <?php 
                            $trangthaidonhang = $this->checkoutmodel->getTrangthaidonhang($row['matrangthai']);
                            echo $trangthaidonhang[0]['tentrangthai'];
                            ?>
                        </td>
                        <td class="col-infor">
                            <a  id_order="<?=$row["madonhang"]?>" href="javascrip:void(0)" style="margin-bottom: 18px;" class="btn_details_order" name="details">Xác nhận</a>
                            <a  id_order="<?=$row["madonhang"]?>" href="javascrip:void(0)" style="margin-bottom: 18px;" class="btn_details_order" name="details">Chi Tiết</a>

                        </td>
                    </tr>
                <?php endforeach;?>
                    
                </table>
            </div>
        </div>
    </div>

    <!--Footer-->
    <?php 
        require_once "./mvc/views/client/include/footer.php";
    ?>
	<!--/Footer-->
</body>
<style>
    table, td, th {
        border: 1px solid #eee;
        border-collapse: collapse;
    }
    th {
        background-color: #eee;
        padding: 10px;
    }
</style>
<script>

		//Chi tiết hóa đơn
		$(document).on('click','.btn_details_order',function(){
			id_order = $(this).attr('id_order')
			$.post("<?=base?>ajax/orderdetails",{id_order:id_order},function(data){
				$(".infor-content").html(data);
			});
   		 });
		// thông báo xác nhận xóa đơn hàng
		function deleteorder(){
			Swal.fire({
			title: 'Bạn có muốn xóa đơn hàng này không?',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Có'
			}).then((result) => {
			if (result.isConfirmed) {
				$( "#delete" ).click();
			}
			});
		}
		// thông báo xác nhận hủy đơn hàng
		function cancelorder(){
			Swal.fire({
			title: 'Bạn có muốn hủy đơn hàng này không?',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Có'
			}).then((result) => {
			if (result.isConfirmed) {
				$( "#cancel" ).click();
			}
			});
		}
	</script>