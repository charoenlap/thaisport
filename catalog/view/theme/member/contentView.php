<header class="ct-page-header ct-u-scratches--bottom ct-u-scratches--inner ct-u-background--black">
    <div class="inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <h1 class="ct-page-header__title">รับชม <?php echo $content['title']; ?></h1>
                </div>
                <div class="col-sm-8">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo route('home');?>">หน้าหลัก</a>
                    </li>
                    <li>รับชม</li>
                    <li><?php echo $content['title']; ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>
</header>
<main>
<section class="ct-u-scratches--top ct-u-padding-both-20" >
    <div class="container-fluid" style="padding-left:0px !important;padding-right:0px !important;">
        <?php if($content['url']){?>
        <div class="row">
            <div class="col-md-12">
                <div class="LivePlayer op-wrapper large op-autohide" tabindex="-1" aria-label="" id="player">
                    <div class="op-ratio"></div>
                    <div class="op-player op-clear">
                        <div class="op-core-ui-wrapper op-clear">
                            <div class="op-media-element-container op-clear" data-parent-id="player">
                                <video disableremoteplayback="" webkit-playsinline="true" playsinline="true" autoplay=""></video>
                            </div>
                        </div>
                        <div class="op-ui op-clear">
                            <div class="op-helpers-container">
                                <div class="op-spinner-container" style="display: none;">
                                    <div class="op-spinner"></div>
                                </div>
                                <div class="op-caption-viewer">
                                    <div class="op-caption-text-container">
                                        <pre class="op-caption-text"></pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="op-controls-container op-clear" style="display: block;">
                            <div class="op-bottom-panel op-clear">
                                <div class="op-gradient-bottom op-clear"></div>
                                <div class="op-controls op-clear">
                                    <div class="op-left-controls op-clear">
                                        <div class="op-navigators op-play-controller">
                                            <button class="op-button op-play-button" type="button">
                                            <i class="op-con op-play" style="display: none;"></i>
                                            <i class="op-con op-pause" style="display: block;"></i>
                                            <i class="op-con op-replay" style="display: none;"></i>
                                            </button>
                                            <button class="op-button op-seek-button op-seek-button-back" type="button" style="display: none;">
                                            <i class="op-con op-seek-back"></i>
                                            <span class="op-seek-back-text">10</span>
                                            </button>
                                            <button class="op-button op-seek-button op-seek-button-forward" type="button" style="display: none;">
                                            <i class="op-con op-seek-forward"></i>
                                            <span class="op-seek-forward-text">10</span>
                                            </button>
                                        </div>
                                        <div class="op-navigators op-volume-controller">
                                            <button class="op-button op-volume-button">
                                            <i class="op-con op-volume-max" style="display: none;"></i>
                                            <i class="op-con op-volume-small" style="display: none;"></i>
                                            <i class="op-con op-volume-mute" style="display: block;"></i>
                                            </button>
                                            <div class="op-volume-slider-container">
                                                <div class="op-volume-silder">
                                                    <div class="op-volume-slider-bg"></div>
                                                    <div class="op-volume-slider-value" style="width: 0px;"></div>
                                                    <div class="op-volume-slider-handle" style="left: 0px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="op-navigators op-time-display">
                                            <span class="op-live-badge" disabled="disabled">
                                                <span class="op-live-badge-lowlatency">Live Low Latency Streaming</span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="op-right-controls op-clear">
                                        <div class="playlist-holder op-navigators op-clear"></div>
                                        <div class="setting-holder op-navigators op-clear">
                                            <button class="op-button op-setting-button">
                                            <i class="op-con op-setting"></i>
                                            </button>
                                        </div>
                                        <div class="fullscreen-holder op-navigators op-clear">
                                            <button class="op-button op-fullscreen-button">
                                            <i class="op-con op-fullscreen-expand" style="display: block;"></i>
                                            <i class="op-con op-fullscreen-compress" style="display: none;"></i>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <div class="op-progressbar-container op-clear"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="resize-sensor" style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden; opacity: 0;">
                    <div class="resize-sensor-expand" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden; opacity: 0;">
                        <div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 100000px; height: 100000px;"></div>
                    </div>
                </div>
                <div class="resize-sensor-shrink" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden; opacity: 0;">
                    <div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div>
                </div>
            </div>
        </div>
        <?php }else{?>
        <div class="text-center">
            <b><span class="text-danger">ขณะนี้ยังไม่มีการถ่ายทอดสด เริ่มรับชมได้ตั้งแต่ <?php echo $content['date_start'];?> เป็นต้นไป</span></b>
        </div>
        <?php } ?>
    </div>
    <div class="col-md-3">&nbsp;</div>
</div>
</div>
<div class="ct-u-padding-top-80 hidden-xs"></div>
</section>
</main>
<style>
header{
padding-top: 120px !important;
min-height: 100px !important;
padding-bottom: 0px !important;
}
</style>
<script src="player/script/liveplayer.js"></script>
<script>
LivePlayer.load ([
    {
        //"file": "wss://streaming01.gosport.world:3334/gosportlive/gosport_live01",
        "file": "<?php echo (!empty($content['url'])?$content['url']:'');?>",
        "type": "webrtc",
        "label": "HD",
        // "default": "true",
        "fullscreen": "true",
        "volume": "100",
        "fullscreenOption": "auto",
        // "setFullscreen": "true",
        // "fullscreen": "true",
        // "expandFullScreenUI":'true',
        // "autoStart":'true',
        // "fullscreenOption":"true"
    }
]);
function update_user_activity()
{
 var action = 'update_time';
 $.ajax({
  url:"index.php?route=member/updateOnline",
  method:"POST",
  dataType: 'json',
  success:function(data)
  {
    if(data==0){
        window.location = 'index.php?route=member/logout';
    }
  }
 });
}
setInterval(function(){ 
 update_user_activity();
 console.log('1')
}, 3000);
</script>