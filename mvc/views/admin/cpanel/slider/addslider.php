<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3><?= $data['title']?></h3>
            <a class="btn btn-primary" href="<?=base?>admin/showslider">Trở Về</a>
                <h4 class="text-success"><?php if(isset($data["mess"])){echo $data["mess"];} ?></h4>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="x_content">
        <form class="" action="" method="post" novalidate>
            <div class="row" >
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Title Slider</label>
                        <h6 class="text-danger"><?php if(isset($data["notifi"]["pretitle"])){echo $data["notifi"]["pretitle"];}?> </h6>
                        <input id="pretitle" type="text" class="form-control" name="slider[pretitle]">
                   
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Content Slider</label>
                        <h6 class="text-danger"><?php if(isset($data["notifi"]["title1"])){echo $data["notifi"]["title1"];}?> </h6>
                        <input id="title1" type="text" class="form-control" name="slider[title1]">
                   
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Slogan Slider</label>
                        <h6 class="text-danger"><?php if(isset($data["notifi"]["subtitle"])){echo $data["notifi"]["subtitle"];}?> </h6>
                        <input id="subtitle" type="text" class="form-control" name="slider[subtitle]">
                   
                    </div>
                </div>
                <!-- trong row chứa col , trong col chứa dc row -->
                <!-- col từ 1 -> 12 -->
                <div class="col-2">
                    <div class="form-group">
                        <label for="">Hình Ảnh</label>
                        <h6 class="text-danger"><?php if(isset($data["notifi"]["img"])){echo $data["notifi"]["img"];}?> </h6>
                        <input id="img" type="file" class="" name="slider[img]">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit" name="submit">Thêm</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
