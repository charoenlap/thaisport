<div class="preloader"></div>
    <div class="backdrop"></div>
    <div class="main-wrapper">
        <div class="banner-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="banner-slider owl-carousel owl-theme mt-4">
                            <?php foreach($banners as $banner){ ?>
                            <div class="owl-items">
                                <div class="banner-wrap justify-content-between align-items-center">
                                    <div class="left-wrap">
                                        <h2><?php echo $banner['title'];?></h2>
                                        <div style="color:#fff"><?php echo $banner['detail'];?></div>
                                        <!-- <span class="tag"><b>วันอาทิตย์ที่ 26 กุมภาพันธ์ 2566</b></span>
                                        <p>ซุ้ม บ้านเมืองนนท์ VS ซุ้ม บ่อทอง ฟาร์ม</p> -->
                                        <a href="<?php echo route('home/live&id='.$banner['id']);?>" class="btn btn-lg">
                                        <img src="assets/images/play.png" alt="icn">เข้าชม</a>
                                    </div>
                                    <div class="right-wrap" style="background-image: url(uploads/content/<?php echo $banner['cover'];?>);background-position: center;" onclick="window.location='<?php echo route('home/live&id='.$banner['id']);?>'"></div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-2 mt-2">
                    <div class="col-sm-12">
                        <marquee behavior="" direction="">วันเวลาของเซิฟเวอร์ <?php echo date('Y-m-d H:i:s');?> สนามกีฬาไก่ชนเทิดไท</marquee>
                    </div>
                </div>
            </div>
        </div>
        <!-- banenr wrapper -->
        <!-- slider wrapper -->
        <?php if($blogs){?>
        <div class="slide-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 text-left mb-4">
                        <h2>ข่าวสาร</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="slide-slider owl-carousel owl-theme">
                            <?php foreach($blogs as $blog){?>
                            <div class="owl-items">
                                <a class="slide-one" href="<?php echo route('home/blogDetail');?>">
                                    <div class="slide-image">
                                        <div  style="background:url(uploads/content/<?php echo $blog['cover'];?>);height:300px;background-position:center;background-size: cover;"></div>
                                    </div>
                                    <div class="slide-content">
                                        <h2><?php echo $blog['title'];?></h2>
                                        <p><?php echo mb_strimwidth($blog['detail'], 0, 10, "...",'utf8');?></p>
                                        <span class="tag"><?php echo $blog['date_create'];?></span>
                                        <span class="tag">ผู้ดูแลระบบ</span>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <!-- slider wrapper -->
        <!-- slider wrapper -->
        <div class="slide-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 text-left mb-4 mt-1">
                        <h2>รายการล่าสุด</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="slide-slider owl-carousel owl-theme">
                            <?php foreach($banners as $banner){?>
                            <div class="owl-items">
                                <a class="slide-one" href="<?php echo route('home/blogDetail');?>">
                                    <div class="slide-image">
                                        <div  style="background:url(uploads/content/<?php echo $banner['cover'];?>);height:300px;background-position:center;background-size: cover;"></div>
                                    </div>
                                    <div class="slide-content">
                                        <h2><?php echo $banner['title'];?></h2>
                                        <p><?php echo mb_strimwidth($banner['detail'], 0, 10, "...",'utf8');?></p>
                                        <span class="tag"><?php echo $banner['date_create'];?></span>
                                        <span class="tag">ผู้ดูแลระบบ</span>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mb-4 mt-4">
                <div class="col-sm-12">
                    <img src="assets/images/5.jpg" class="img-fluid" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <img src="assets/images/6.jpg" class="img-fluid" alt="" style="width:100%;">
                </div>
            </div>
        </div>
    </div>