<div class="preloader"></div>
    <div class="backdrop"></div>
    <div class="main-wrapper">
        <div class="banner-wrapper">
            <div class="container">
                <div class="row mb-2 mt-2">
                    <div class="col-sm-12">
                        <marquee behavior="" direction="">วันเวลาของเซิฟเวอร์ <?php echo date('Y-m-d H:i:s');?> สนามกีฬาไก่ชนเทิดไท</marquee>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="banner-slider owl-carousel owl-theme">
                            <div class="owl-items">
                                <div class="banner-wrap justify-content-between align-items-center">
                                    <div class="left-wrap">
                                        <h2>ชิง 40,2000,000 บาท</h2>
                                        <span class="tag"><b>วันอาทิตย์ที่ 31 กรกฎาคม 2565</b></span>
                                        <p>ซุ้ม บ้านเมืองนนท์ VS ซุ้ม มีสุวรรณทีม</p>
                                        <a href="<?php echo route('payment');?>" class="btn btn-lg"><img src="assets/images/play.png" alt="icn">เข้าชม</a>
                                    </div>
                                    <div class="right-wrap" style="background-image: url(assets/images/20220729.jpg);background-position: center;"></div>
                                </div>
                            </div>
                            <div class="owl-items">
                                <div class="banner-wrap justify-content-between align-items-center">
                                    <div class="left-wrap">
                                        <h2>ชิง 2,200,000</h2>
                                        <span class="tag"><b>วันอาทิตย์ที่ 31 กรกฎาคม 2565</b></span>
                                        <p>ซุ้ม ลานไม้วุฒิพงษ์ VS ซุ้ม พญาบ้านดอน</p>
                                        <a href="<?php echo route('payment');?>" class="btn btn-lg"><img src="assets/images/play.png" alt="icn">เข้าชม</a>
                                    </div>
                                    <div class="right-wrap" style="background-image: url(assets/images/20220729_2.jpg);background-position: center;"></div>
                                </div>
                            </div>
                            
                            
                            <!-- <div class="owl-items">
                                <div class="banner-wrap justify-content-between align-items-center">
                                    <div class="left-wrap">
                                        <span class="rnd">IMDb 6.7</span>
                                        <h2>Zero<br> dark night</h2>
                                        <span class="tag"><b>SEASON 1</b></span>
                                        <span class="tag">2020</span>
                                        <span class="tag"><b>HD</b></span>
                                        <span class="tag"><b>16+</b></span>
                                        <span class="tag">2 h 20 min</span>
                                        <p>Radhe is a singing prodigy determined to follow in the classical footsteps of his grandfather. Tamanna is a YouTube pop sensation desperate to become .</p>
                                        <a href="#" class="btn btn-lg"><img src="assets/images/play.png" alt="icn">Watch now</a>
                                    </div>
                                    <div class="right-wrap" style="background-image: url(assets/images/banner-2.jpg);"></div>
                                </div>
                            </div>
                            <div class="owl-items">
                                <div class="banner-wrap justify-content-between align-items-center">
                                    <div class="left-wrap">
                                        <span class="rnd">IMDb 6.7</span>
                                        <h2>The <br> night ever</h2>
                                        <span class="tag"><b>SEASON 1</b></span>
                                        <span class="tag">2020</span>
                                        <span class="tag"><b>HD</b></span>
                                        <span class="tag"><b>16+</b></span>
                                        <span class="tag">2 h 20 min</span>
                                        <p>Radhe is a singing prodigy determined to follow in the classical footsteps of his grandfather. Tamanna is a YouTube pop sensation desperate to become .</p>
                                        <a href="#" class="btn btn-lg"><img src="assets/images/play.png" alt="icn">Watch now</a>
                                    </div>
                                    <div class="right-wrap">
                                        <video autoplay muted loop id="myVideo">
                                            <source src="assets/images/video3.mp4" type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- banenr wrapper -->
        <!-- slider wrapper -->
        <div class="slide-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 text-left mb-4 mt-4">
                        <h2>ข่าวสาร</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="slide-slider owl-carousel owl-theme">
                            <div class="owl-items">
                                <a class="slide-one" href="<?php echo route('home/blogDetail');?>">
                                    <div class="slide-image">
                                        <div  style="background:url(assets/images/253122.jpg);height:300px;background-position:center;background-size: cover;"></div>
                                    </div>
                                    <div class="slide-content">
                                        <h2>เปรียบติดมัดจำ</h2>
                                        <p>เปรียบ จันทร์ที่ 25 กรกฎา บ่ายโมง</p>
                                        <span class="tag">5 กุมภาพันธ์ 2566</span>
                                        <span class="tag">ผู้ดูแลระบบ</span>
                                    </div>
                                </a>
                            </div>
                            <div class="owl-items">
                                <a class="slide-one" href="<?php echo route('home/blogDetail');?>">
                                    <div class="slide-image">
                                        <div  style="background:url(assets/images/6.jpg);height:300px;background-position:center;background-size: cover;"></div>
                                    </div>
                                    <div class="slide-content">
                                        <h2>ผลิตภัณฑ์ P-ONE</h2>
                                        <p>ยากำจัดพนาธิทุกชนิด</p>
                                        <span class="tag">5 กุมภาพันธ์ 2566</span>
                                        <span class="tag">ผู้ดูแลระบบ</span>
                                    </div>
                                </a>
                            </div>
                            <div class="owl-items">
                                <a class="slide-one" href="<?php echo route('home/blogDetail');?>">
                                    <div class="slide-image">
                                        <div  style="background:url(assets/images/5.jpg);height:300px;background-position:center;background-size: cover;"></div>
                                    </div>
                                    <div class="slide-content">
                                        <h2>สินเชื่อเงิน ไชโย</h2>
                                        <p>เปิดให้บริการสินเชื่อเงินไชโย</p>
                                        <span class="tag">5 กุมภาพันธ์ 2566</span>
                                        <span class="tag">ผู้ดูแลระบบ</span>
                                    </div>
                                </a>
                            </div>
                            <div class="owl-items">
                                <a class="slide-one" href="<?php echo route('home/blogDetail');?>">
                                    <div class="slide-image">
                                        <div  style="background:url(https://via.placeholder.com/300.png/09f/fff );height:300px;background-position:center;background-size: cover;"></div>
                                    </div>
                                    <div class="slide-content">
                                        <h2>เปิดให้บริการเว็บไซต์</h2>
                                        <p>เปิดให้บริการเว็บไซต์</p>
                                        <span class="tag">5 กุมภาพันธ์ 2566</span>
                                        <span class="tag">ผู้ดูแลระบบ</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                            <div class="owl-items">
                                <a class="slide-one" href="<?php echo route('home/live');?>">
                                    <div class="slide-image">
                                        <div  style="background:url(assets/images/20220729.jpg );height:300px;background-position:center;background-size: cover;"></div>
                                    </div>
                                    <div class="slide-content">
                                        <h2>ชิง 40,2000,000 บาท <img src="assets/images/plus.png" alt="icon" class="add-wishlist"></h2>
                                        <p>ซุ้ม บ้านเมืองนนท์ VS ซุ้ม มีสุวรรณทีม</p>
                                        <span class="tag">วันอาทิตย์ที่ 31 กรกฎาคม 2565</span>
                                    </div>
                                </a>
                            </div>
                            <div class="owl-items">
                                <a class="slide-one" href="<?php echo route('home/live');?>">
                                    <div class="slide-image">
                                        <div  style="background:url(assets/images/20220729_2.jpg );height:300px;background-position:center;background-size: cover;"></div>
                                    </div>
                                    <div class="slide-content">
                                        <h2>ชิง 2,200,000 <img src="assets/images/plus.png" alt="icon" class="add-wishlist"></h2>
                                        <p>ซุ้ม ลานไม้วุฒิพงษ์ VS ซุ้ม พญาบ้านดอน</p>
                                        <span class="tag">วันอาทิตย์ที่ 31 กรกฎาคม 2565</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mb-4">
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