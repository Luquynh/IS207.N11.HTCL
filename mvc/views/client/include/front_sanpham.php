<div style="margin-top: 80px" class="outstanding_products">
    <div class="watch_container" >
        <?php while($row = mysqli_fetch_assoc($data["searchten"])):?>
            <div class="watch_mid_con">
                <a href="http://localhost/curnon/callMCprodetails/show/<?php echo $row["masp"]?>" class="watch_item">
                    <img class="img_watch_item" src="<?=base?>public/client/assets/img/<?php echo $row["img"]?>" alt="">
                    <p class="p_watch_item"><?php echo $row["tenbosuutap"]?></p>
                    <h4 class="h4_watch_item"><?php echo $row["tensp"]?></h4>
                    <div class="div_watch_item"><?php echo number_format($row["gia"], 0,",",".")?> ₫</div>
                </a>
                <button class="button_watch_item">THÊM VÀO GIỎ</button>
            </div>
        <?php endwhile;?>
    </div>
</div>
