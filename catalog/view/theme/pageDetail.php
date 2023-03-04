<div class="preloader"></div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <style>
                .wrapper{
                      margin-left: 20px; margin-top:20px; height:480px ; width:100%;
                }
            </style>
            <div class="wrapper">
                <div id="player"></div>
            </div>
            <script src="liveplayer.js"></script>
            <script>
              LivePlayer.load ([
            {
                  "file": "<?php echo $detail['detail'];?>",
                  "type": "webrtc",
                  "label": "HD",
                  "default": "true"
            }
            ]);
            </script>
        </div>
    </div>
</div>