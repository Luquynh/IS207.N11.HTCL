<?php $row = mysqli_fetch_array($data["getdetails"])?>
<div class="details_blog">
    <h1 class="tieude_blog"><?php echo $row["tieude"]?></h1>
    <img src="<?=base?>public/client/assets/img/blog/<?php echo $row["img"]?>.jpg" alt="" class="img_blog">
    <p class="noidung_blog"><?php echo $row["noidung"]?></p>
</div>



