<footer class="ct-footer " >
        <div class="container" style="padding-top: 30px;">
            <div class="row">
                <!-- COLUMN-->
                <div class="col-md-3 col-sm-6">
                    <img src="uploads/logo_gosport_1.png" alt="Footer Logo">
                    <p class="ct-u-padding-both-20">ดูกีฬาออนไลน์</p>
                    <ul class="ct-socials list-inline list-unstyled">
                        <li class="ct-socials__item--facebook"><a href="https://www.facebook.com/GoSportThailand/" target="_blank"><i class="fa fa-facebook"></i></a>
                        </li>
                        <!-- <li class="ct-socials__item--twitter"><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li class="ct-socials__item--instagram"><a href="#"><i class="fa fa-instagram"></i></a>
                        </li> -->
                    </ul>
                </div>
                <!-- COLUMN-->
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title ct-u-padding-bottom-5"><a href="<?php echo route('home/contact'); ?>">ติดต่อเรา</a></h4>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#" target="_blank"><i class="fa fa-home"></i></a>
                        </div>
                        <div class="media-body media-middle">
                            <a href="#" target="_blank">สนามเวทีมวยลุมพินี</a>
                        </div>
                    </div>
                    <div class="media">
                        <span>Line: </span><br>
                        <img src="M_gainfriends_qr.png" style="max-width:100%;height:auto;" alt="">
                    </div>
                    <div class="media">
                        <div class="media-left"><a href="gosport.world" target="_blank"><i class="fa fa-globe"></i></a>
                        </div>
                        <div class="media-body media-middle"><a href="https://gosport.world/" target="_blank" class="ct-u-color--motive">https://gosport.world/</a>
                        </div>
                    </div>
                </div>
                <div class="clearfix visible-sm"></div>
                <!-- COLUMN-->
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <div class="widget-inner">
                            <h4 class="widget-title">ทางลัด</h4>
                            <ul>
                                <li><a href="<?php echo route('home/about'); ?>">เกี่ยวกับเรา</a>
                                </li>
                                <li><a href="<?php echo route('home/contact'); ?>">ติดต่อเรา</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <div class="widget-inner">
                            <h4 class="widget-title">สมาชิก</h4>
                            <ul>
                                <li><a href="<?php echo route('member/login'); ?>">เข้าสู่ระบบ</a>
                                </li>
                                <li><a href="<?php echo route('member/register'); ?>">สมัครสมาชิก</a>
                                </li>
                            </ul>
                            <br>
                            จำนวนผู้เข้าชม
                            <a href="https://www.hitwebcounter.com" target="_blank">
                            <img src="https://hitwebcounter.com/counter/counter.php?page=8031679&style=0036&nbdigits=9&type=page&initCount=0" title="Free Counter" Alt="web counter"   border="0" /></a>             
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="ct-footer-copyrights ct-u-background--white ct-u-scratches--top">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 text-center text-left-sm">
                    <p class="ct-u-margin-bottom-0">&copy; gosport.world</p>

                                    
                                        
                                          
                            
                </div>
                <div class="col-sm-6 text-center text-right-sm">
                    <ul class="list-inline">
                        <li><a href="<?php echo route('home/terms'); ?>">ข้อตกลงการใช้บริการ</a>
                        </li>
                        <li><a href="<?php echo route('home/privacy'); ?>">นโยบายความเป็นส่วนตัว</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="panel-cookie" class="text-center">
        เว็บไซต์นี้ใช้คุกกี้ เราใช้คุกกี้เพื่อนำเสนอเนื้อหาและโฆษณา คลิกเพื่อดูข้อมูลเพิ่มเติม <a href="<?php echo route('home/privacy');?>">'นโยบายความเป็นส่วนตัว'</a> 
        <a href="#" id="btn-cookie" class="btn btn-primary btn-xs">ยอมรับ</a>
    </div>  
    <!-- JavaScripts-->
    
<!-- switcher -->

<!-- end switcher -->
<script>
    $(function(){
        // var Cookies.get('name') 
        $('#btn-cookie').click(function(e){
            createCookie('panel_cookie','1','90');
            $('#panel-cookie').css('display','none');
            e.preventDefault();
        });
        var panel_cookie = readCookie('panel_cookie');
        if(panel_cookie){
            $('#panel-cookie').css('display','none');
        }
    });
    function createCookie(name, value, days) {
        var expires;

        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toGMTString();
        } else {
            expires = "";
        }
        document.cookie = encodeURIComponent(name) + "=" + encodeURIComponent(value) + expires + "; path=/";
    }

    function readCookie(name) {
        var nameEQ = encodeURIComponent(name) + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) === ' ')
                c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) === 0)
                return decodeURIComponent(c.substring(nameEQ.length, c.length));
        }
        return null;
    }

    function eraseCookie(name) {
        createCookie(name, "", -1);
    }
</script>
</body>

</html>