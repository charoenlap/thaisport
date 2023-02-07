<header class="ct-page-header ct-u-scratches--bottom ct-u-scratches--inner ct-u-background--black">
    <div class="inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <h1 class="ct-page-header__title"><?php echo $detail['title'];?></h1>
                </div>
                <div class="col-sm-8">
                    <ul class="breadcrumb">
                        <li><a href="#">หน้าหลัก</a>
                        </li>
                        <li><a href="<?php echo route('home/blog');?>"></a>เนื้อหา</li>
                        <li><?php echo $detail['title'];?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<main class="ct-blog mb-4">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <article class="ct-blog-post ct-blog-post--image">
                    <div class="ct-blog-post__media" style="">
                        <img src="uploads/content/<?php echo $detail['banner'];?>" alt="<?php echo $detail['title'];?>">
                        <br>
                        <?php if($detail['cover']){ ?>
                        <img src="uploads/content/<?php echo $detail['cover'];?>" alt="<?php echo $detail['title'];?>">
                        <?php } ?>
                    </div>
                    <div class="ct-blog-post__body media">
                        <div class="media-left">
                            <?php $date=date_create($detail['date_start']); ?>
                            <div class="ct-blog-post__day"><?php echo date_format($date,"d");?></div>
                            <div class="ct-blog-post__month"><?php echo date_format($date,"M");?></div>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">
                                <a href="#" class="title"><?php echo $detail['title'];?></a>
                                <small>by   <a href="#">ผู้ดูแลระบบ</a> <a href="#">บทความ & ข่าวสาร</a></small>
                            </h3>
                            <p><?php echo $detail['location'];?></p>
                            <?php echo $detail['detail'];?>
                        </div>
                    </div>
                </article>
                <!-- <ul class="pager">
                    <li><a href="#"><i class="fa fa-chevron-left"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-chevron-right"></i></a>
                    </li>
                </ul> -->
                <div class="clearfix"></div>
            </div>
            <div class="col-md-3">
                <aside class="ct-sidebar ct-blog__sidebar">
                    <div class="ct-sidebar__inner">
                        <!-- <form class="ct-search form-group">
                            <input id="blog-search" placeholder="Search" required="required" name="field[]" class="form-control">
                            <label for="blog-search" class="sr-only">Search</label>
                            <button type="submit"><i class="fa fa-search"></i>
                            </button>
                        </form> -->
                        <div class="widget widget_categories">
                            <div class="widget-inner">
                                <h4 class="widget-title">Categories</h4>
                                <ul>
                                    <li class="cat-item"><a href="<?php echo route('home/blog'); ?>">ข่าวสาร</a>
                                    </li>
                                    <li class="cat-item"><a href="<?php echo route('home/terms'); ?>">ข้อตกลงการใช้บริการ</a>
                                    </li>
                                    <li class="cat-item"><a href="<?php echo route('home/privacy'); ?>">นโยบายความเป็นส่วนตัว</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- <div class="widget widget_recent_entries">
                            <div class="widget-inner">
                                <h4 class="widget-title">Recent Posts</h4>
                                <ul>
                                    <li>
                                        <div class="widget-li-image">
                                            <img src="assets/images/demo-content/blog-5.jpg" alt="Lorem Pixel">
                                        </div>
                                        <div class="widget-li-content"><a href="blog-single.html" class="widget-name">To make this treat, you will need to lorem ipsum</a><a href="#">August 21, 2015</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="widget-li-image">
                                            <img src="assets/images/demo-content/blog-5.jpg" alt="Lorem Pixel">
                                        </div>
                                        <div class="widget-li-content"><a href="blog-single.html" class="widget-name">Blue colors of Jell-O...</a><a href="#">August 21, 2015</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="widget-li-image">
                                            <img src="assets/images/demo-content/blog-5.jpg" alt="Lorem Pixel">
                                        </div>
                                        <div class="widget-li-content"><a href="blog-single.html" class="widget-name">Skewers or Cake...</a><a href="#">August 21, 2015</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div> -->
                        <!-- <div class="widget widget_archive">
                            <div class="widget-inner">
                                <h4 class="widget-title">Archive List</h4>
                                <ul>
                                    <li><a href="#">August 2015</a>
                                    </li>
                                    <li><a href="#">July 2015</a>
                                    </li>
                                    <li><a href="#">June 2015</a>
                                    </li>
                                    <li><a href="#">May 2015</a>
                                    </li>
                                    <li><a href="#">April 2015</a>
                                    </li>
                                    <li><a href="#">Show Earlier</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="widget widget_tag_cloud">
                            <div class="widget-inner">
                                <h4 class="widget-title">Tag Cloud</h4>
                                <div class="tagcloud"><a href="#" class="tag-link-0">Bike</a><a href="#" class="tag-link-1">Extreme</a><a href="#" class="tag-link-2">Mountain</a><a href="#" class="tag-link-3">MTB</a><a href="#" class="tag-link-4">Professional</a>
                                    <a href="#" class="tag-link-5">New</a><a href="#" class="tag-link-6">Archived</a><a href="#" class="tag-link-7">MTB</a><a href="#" class="tag-link-8">Professional</a><a href="#" class="tag-link-9">Mountain</a>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </aside>
                <button class="ct-sidebar__mobile-toggle"></button>
            </div>
        </div>
    </div>
</main>
<style>

</style>