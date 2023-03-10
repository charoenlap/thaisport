<div class="main-wrapper">
    <div class="page-nav p-0">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <div class="search-wrapper">
                            <h2 class="mb-3">เนื้อหา</h2>
                            <p class="mb-0"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="faq-page">
        <div class="container">
            <?php if($blog['cover']){?>
                <?php if(empty($blog['cover'])){?>
                <div class="row justify-content-center">
                    <div class="col-sm-12">
                        <div class="text-center">
                            <img src="uploads/content/<?php echo $blog['cover'];?>" alt="image" class="img-fluid">
                        </div>
                        
                    </div>
                </div>
                <?php } ?>
            <?php } ?>
            <div class="row justify-content-center">
                <div class="col-sm-12">
                    <?php echo $blog['detail'];?>
                </div>
            </div>
        </div>
    </div>

</div>
<?php /* ?><header class="ct-page-header ct-u-scratches--bottom ct-u-scratches--inner ct-u-background--black">
    <div class="inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <h1 class="ct-page-header__title"><?php echo $blog['title'];?></h1>
                </div>
                <div class="col-sm-8">
                    <ul class="breadcrumb">
                        <li><a href="#">หน้าหลัก</a>
                        </li>
                        <li><a href="<?php echo route('home/blog');?>"></a>ข่าวสาร & บทความ</li>
                        <li><?php echo (isset($blog['title'])?$blog['title']:'-');?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<main class="ct-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <article class="ct-blog-post ct-blog-post--image">
                    <div class="ct-blog-post__media" style="">
                        <img src="uploads/content/<?php echo $blog['cover'];?>" alt="<?php echo $blog['title'];?>">
                    </div>
                    <div class="ct-blog-post__body media">
                        <div class="media-left">
                            <?php $date=date_create($blog['date_create']); ?>
                            <div class="ct-blog-post__day"><?php echo date_format($date,"d");?></div>
                            <div class="ct-blog-post__month"><?php echo date_format($date,"M");?></div>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">
                                <a href="#" class="title"><?php echo $blog['title'];?></a>
                                <small>by   <a href="#">ผู้ดูแลระบบ</a> in   <a href="#">บทความ & ข่าวสาร</a></small>
                            </h3>
                            <p><?php echo $blog['detail']; ?></p>

                            <?php if($blog['ref_content_sub_id']){ 
                                    $date1=date_create($blog['date_create']);
                                    $date2=date_create(date("Y-m-d"));
                                    $diff=date_diff($date1,$date2);
                                    if($diff->format("%R")!="+"){
                            ?>
                                <a href="<?php echo route("member/contentView&id_content=".$blog['ref_content_sub_id']); ?>" 
                                    class="btn btn-motive">เข้าชมคลิก</a>
                                <?php }?>
                            <?php }?>
                        </div>
                        
                        <h3 class="title" style="margin-top:10px;"><span>รูปภาพเพิ่มเติม</span></h3>
                        <div>
                            <a href="uploads/content/<?php echo $blog['banner'];?>" target="_blank">
                                    <img src="uploads/content/<?php echo $blog['banner'];?>" alt="<?php echo $blog['title'];?>" style="width:auto;height:100px;display:inline-block;margin-top:10px;">
                                </a>
                        <?php if($images){ ?>    
                            
                                
                            <?php foreach($images as $image){?>
                                <a href="uploads/content_sub/<?php echo $image['image'];?>" target="_blank">
                                    <img src="uploads/content_sub/<?php echo $image['image'];?>" alt="" style="width:auto;height:100px;display:inline-block;margin-top:10px;">
                                </a>
                            <?php } ?>
                            
                        <?php } ?>
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
<?php */?>