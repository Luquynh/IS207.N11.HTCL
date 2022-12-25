  <div class="bg-light">
    <div class="container">
      <div class="text-center my-5">
        <h1 style="font-weight: 600;">CURNON Blog</h1>
        <hr />
      </div>

      <div class="row">
        <?php while($row = mysqli_fetch_array($data["get"])):?>
            <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card mb-5 shadow-sm">
                <img src="<?=base?>public/client/assets/img/blog/<?php echo $row["img"]?>.jpg" class="img-fluid" />

                <div class="card-body">
                <div style="min-height: 90px !important" class="card-title">
                    <h2><?php echo $row["tieude"]?></h2>
                </div>
                <!-- <div class="card-text">
                    <p>
                    <?php echo $row["noidung"]?>
                    </p>
                </div> -->
                <a href="http://localhost/curnon/callMCmainblog/show/<?php echo $row["mablog"]?>" class="btn btn-outline-primary rounded-0 float-end"
                    >Read More</a
                >
                </div>
            </div>
            </div>
        <?php endwhile;?>
      </div>
    </div>
  </div>
