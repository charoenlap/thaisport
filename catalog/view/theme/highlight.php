<header class="ct-page-header ct-u-scratches--bottom ct-u-scratches--inner ct-u-background--black">
    <div class="inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <h1 class="ct-page-header__title">Highlight</h1>
                </div>
                <div class="col-sm-8">
                    <ul class="breadcrumb">
                        <li><a href="#">หน้าหลัก</a>
                        </li>
                        <li>Highlight</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<main>
    <section class="container ct-u-padding-bottom-50">
        <div class="ct-u-padding-top-60 hidden-xs"></div>
        <?php if($highlight){ ?>
            <div class="row" style="margin-bottom: 20px;">
                <?php foreach($highlight as $val){ ?>
                <div class="col-md-4" style="margin-bottom: 20px;">
                    <a href="https://www.youtube.com/watch?v=<?php echo $val['url']; ?>" target="_blank">
                        <img src="https://img.youtube.com/vi/<?php echo $val['url']; ?>/0.jpg" alt="">
                    </a>
                </div>
                <?php } ?>
            </div>
        <?php } ?>
        <div class="ct-separator"></div>
    </section>
</main>