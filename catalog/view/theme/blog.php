<div class="main-wrapper">
        <div class="page-nav p-0">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <div class="search-wrapper">
                            <h2 class="mb-3">ข่าวสาร</h2>
                            <p class="mb-0">ข้อมูลข่าวสารทั้งหมด</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide-wrapper search-wrap-slide">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="mb-3">ทั้งหมด</h2>
                    </div>
                </div>
                <div class="row">
                    <?php foreach($blogs as $val){?>
                        <div class="col-xs-6 col-4">
                            <a class="slide-one" href="<?php echo route('home/blogDetail&id='.$val['id']); ?>">
                                <div class="slide-image"><img src="uploads/content/<?php echo $val['cover'];?>" alt="image"></div>
                                <div class="slide-content">
                                    <h2><?php echo $val['title'];?></h2>
                                    <div><?php echo $val['detail'];?></div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>