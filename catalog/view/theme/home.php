<div id="ct-js-wrapper" class="ct-pageWrapper">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <div class="slider-slick" style="background-image: url(assets/images/demo-content/header-bg.jpg);
    background-position: center;
    background-size: cover;padding-bottom:20px;">
    <?php // var_dump($banners); ?>
        <?php if($banners){ ?>
            <?php foreach($banners as $val){ 
                    $src = (file_exists('uploads/content/'.$val['cover'])?'uploads/content/'.$val['cover']:'uploads/content_sub/'.$val['cover']);
                ?>
                <div class="container" style="margin-top:150px;">
                    <div class="row ct-product">
                        <div class="col-sm-8 text-center">
                            <a href="<?php echo route('home/blogDetail&id='.$val['id']); ?>" 
                                class="text-center" style="width: 100%;
                                display: block;
                                margin: 0px auto;">
                                <img src="<?php echo $src; ?>" alt="" class="img-fluid" style="max-width: 100%;
                                height: auto;
                                text-align: center;
                                margin: 0px auto;">
                            </a>
                        </div>
                        <div class="col-sm-4 ct-u-padding-top-40">
                            <h3 class="ct-u-margin-bottom-20"><span><?php echo $val['title']; ?></span></h3>
                            <div style="color:#fff;"><?php echo mb_strimwidth(strip_tags($val['detail']), 0, 200, "..."); ?></div>
                            <div class="ct-separator ct-u-padding-both-0 ct-u-margin-bottom-30"></div>
                            <a style="color:#fff;" href="<?php echo route('home/blogDetail&id='.$val['id']); ?>" class="btn btn-accent-o ">ดูรายละเอียด
                            </a>
                            <?php if($val['ref_content_sub_id']){?>
                                <a href="<?php echo route("member/contentView&id_content=".$val['ref_content_sub_id']); ?>" class="btn btn-motive">เข้าชมคลิก</a>
                            <?php }?>
                            <?php if($val['id']==99){?>
                                <a href="<?php echo route("payment&id_package=4"); ?>" class="btn btn-motive">สมัครแพคเกจ 6 เดือน</a>
                            <?php }?>
                            <?php // var_dump($val['images']); ?>
                            <?php if($val['images']){ ?>
                                <h3 class="title" style="margin-top:10px;"><span>รูปภาพเพิ่มเติม</span></h3>
                                <div>
                                <?php foreach($val['images'] as $image){?>
                                    <a href="uploads/content_sub/<?php echo $image['image'];?>" target="_blank">
                                        <img src="uploads/content_sub/<?php echo $image['image'];?>" alt="" style="width:auto;height:100px;display:inline-block;margin-top:10px;">
                                    </a>
                                <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
        </div>
        <?php //echo "<pre>";var_dump($banners); ?>
        <script>
            $('.slider-slick').slick({
              dots: true,
              infinite: true,
              speed: 500,
              fade: true,
              cssEase: 'linear',
              slidesToShow: 1,
              arrows:true,
              autoplay: true,
              autoplaySpeed: 8000,
            });   
        </script>
    <?php if($event){ ?>
    <section id="coming-next" data-background="assets/images/demo-content/bg-1.jpg" data-parallax="35" class="ct-u-padding-both-40 ct-u-background--black ct-u-mask">

        <div class="container">
            <h2 class="ct-section-header" style="color:#0033ff !important;background-color:transparent !important;">โปรแกรมถัดไป</h2>
            <?php 
                $date_arr = explode(' ',$event['date_start']);
                $date=date_create($date_arr[0].' 18:00:00'); 
                $date2=date_create();
                $diff=date_diff($date,$date2);
            ?>
            <div class="row ct-u-padding-bottom-60">
                <div class="col-md-4">
                    <div class="ct-event-box media">
                        <div class="media-left">
                            <div class="ct-event-box__day"><?php echo date_format($date,"d");?></div>
                            <div class="ct-event-box__month"><?php echo date_format($date,"M");?></div>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading"><?php echo $event['title'];?> </h3> 
                            <h3><span><?php echo $event['location'];?></span></h3>
                            <?php echo mb_strimwidth(strip_tags($event['detail']), 0, 100, "..."); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php if($event['cover']){?>
                        <img src="uploads/content/<?php echo $event['cover'];?>" alt="" class="img-fluid">
                    <?php } ?>
                </div>
                <div class="col-md-4 text-right text-center-md text-center-sm text-center-xs">
                    <div class="ct-u-padding-top-40 hidden-lg"></div>
                    <div  class="ct-countdown">
                        <h6>นับถอยหลัง</h6>
                        <div><span class=""><?php echo $diff->format("%d"); ?></span>
                            <div class="ct-countdown__text">วัน</div>
                        </div>
                        <div><span class=""><?php echo $diff->format("%H"); ?></span>
                            <div class="ct-countdown__text">ชั่วโมง</div>
                        </div>
                        <div><span class=""><?php echo $diff->format("%i"); ?></span>
                            <div class="ct-countdown__text">นาที</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ct-action-link__wrapper">
                <a href="<?php echo route('home/pageDetail&id='.$event['id']); ?>" class="ct-action-link">
                    <span class="ct-action-link__text-left">คลิกที่นี่</span>
                    <span class="ct-action-link__icon"><i class="fa fa-angle-double-down"></i></span>
                    <span class="ct-action-link__text-right">ดูรายละเอียดเพิ่มเติม</span>
                </a>
            </div>
        </div>
    </section>
    <?php } ?>
    <div id="continue" class="ct-u-scratches--both">
        <div class="container mb-4">
            <h2 class="ct-section-header">gosport.world<span> ครบเครื่องเรื่องกีฬา</span></h2>
            <div class="ct-action-link__wrapper">
                <a href="#" data-scroll="#coming-next" class="ct-action-link">
                    <span class="ct-action-link__text-left">สมัครสมาชิก</span>
                    <span class="ct-action-link__icon">
                        <i class="fa fa-angle-double-down"></i>
                    </span>
                    <span class="ct-action-link__text-right">ดูถ่ายทอดสด</span>
                </a>
            </div>
            <?php if($highlight){ ?>
            <div class="row" style="margin-bottom: 20px;">
                <?php foreach($highlight as $val){ ?>
                <div class="col-md-4">
                    <a href="https://www.youtube.com/watch?v=<?php echo $val['url']; ?>" target="_blank">
                        <img src="https://img.youtube.com/vi/<?php echo $val['url']; ?>/0.jpg" alt="">
                    </a>
                </div>
                <?php } ?>
            </div>
            <div class="row" style="margin-bottom: 20px;">
                <div class="col-md-12 text-center">
                    <a href="https://gosport.world/index.php?route=home/highlight" class="btn btn-motive">ดู Highlight ทั้งหมด</a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <div id="continue" class="ct-u-scratches--both">
        <div class="container mb-4">
            <h2 class="ct-section-header">gosport.world<span> ถ่ายทอดสด</span></h2>
            <div class="row" style="margin-bottom: 20px;">
                <div class="col-md-12">
                    <iframe width="100%" height="500" src="https://www.youtube.com/embed/pcUatVHjt5A" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                </div>
            </div>
        </div>
    </div>
    <section id="why-choose" data-background="assets/images/demo-content/bg-12.jpg" class="ct-u-background--black ct-u-scratches--top ct-u-scratches--dark">
        <div class="container">
            <h2 class="ct-section-header"><span> สนับสนุน</span> โดย</h2>
            <div class="row text-center-md">
                <div class="col-md-12 ct-u-padding-both-40">
                    <img src="uploads/poster.jpeg" alt="">
                </div>
            </div>
        </div>
    </section>

    <section id="blog-section" class="ct-u-scratches--top ct-u-padding-top-100">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-9 col-sm-7">
                    <h3 class="ct-section-title">ข่าวสาร</h3>
                </div>
                <div class="col-lg-3 col-sm-5">
                    <div class="ct-slider-nav"><a href="#" class="ct-slider-nav__link">ดูทั้งหมด</a>
                        <div class="ct-slider-nav__buttons"></div>
                    </div>
                </div>
                <div class="col-xs-12 hidden-xs ct-u-padding-bottom-60"></div>
            </div>
            <div class="row ct-u-padding-top-40">
                <div data-items-lg="3" data-items-sm="2" class="ct-slick ct-js-slick ct-slick--arrows-custom">
                    <?php foreach($blogs as $val){ ?>
                    <article class="ct-blog-post">
                        <div class="ct-blog-post__body media">
                            <div class="media-left">
                                <?php $date=date_create($val['date_create']); ?>
                                <div class="ct-blog-post__day"><?php echo date_format($date,"d");?></div>
                                <div class="ct-blog-post__month"><?php echo date_format($date,"M");?></div>
                            </div>
                            <div class="media-body">
                                 <?php if(!empty($val['cover'])){?>
                                    <img src="uploads/content/<?php echo $val['cover'];?>" alt="" class="img-fluid">
                                <?php } ?>
                                <br>
                                
                            </div>
                        </div>
                        <div>
                            <h3 class="media-heading">
                                <a href="<?php echo route('home/blogDetail&id='.$val['id']); ?>" class="title">
                                    <?php echo $val['title']; ?>
                                </a>
                                <small>โดย<a href="#">ผู้ดูแลระบบ </a></small>
                            </h3>
                            <p><?php echo mb_strimwidth(strip_tags($val['detail']), 0, 100, "...",'utf-8'); ?></p>
                        </div>
                    </article>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="ct-u-padding-bottom-100 hidden-xs"></div>
    </section>
    <!-- Footer-->
    
</div>
<link href="assets/css/home.css" rel="stylesheet">
<script src="assets/js/home.js"></script>