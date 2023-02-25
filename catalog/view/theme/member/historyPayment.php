<header class="ct-page-header ct-u-scratches--bottom ct-u-scratches--inner ct-u-background--black">
    <div class="inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="ct-page-header__title">ประวัติการชำระเงิน</h1>
                </div>
            </div>
        </div>
    </div>
</header>
<main>
    <section class="ct-u-scratches--top ct-u-padding-both-50">
        <div class="ct-u-padding-top-50 hidden-xs"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                            <th width="30px;">ลำดับ</th>
                            <th class="text-center">ชื่อแพคเกจ</th>
                            <th>เนื้อหา</th>
                            <th width="130px;">วันที่ซื้อ</th>
                            <th width="130px;">วันที่หมดอายุ</th>
                        </thead>
                        <tbody>
                            <?php $i=1;foreach($history as $val){?>
                            <tr>
                                <td><?php echo $i++;?></td>
                                <td class="text-center"><?php echo $val['package_title'];?></td>
                                <td><?php echo $val['content_title'];?></td>
                                <td><?php echo $val['date_create'];?></td>
                                <td><?php echo $val['date_expired'];?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="ct-u-padding-top-80 hidden-xs"></div>
    </section>
</main>