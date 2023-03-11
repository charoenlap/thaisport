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
        </div>
    </div>
</div>