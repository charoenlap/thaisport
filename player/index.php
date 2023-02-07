<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <script src="sldp-v2.19.1.min.js"></script>
  </head>
  <body>
    <div id="player"></div>

    <script type="text/javascript">
      document.addEventListener("DOMContentLoaded", initPlayer);

      function initPlayer(){
        sldpPlayer = SLDP.init({
          container:          'player',
          stream_url:         "wss://streaming01.gosport.world:3334/gosportlive/gosport_live01",
          // stream_url:         "rtmp://streaming01.gosport.world:11935/gosportlive/gosport_live01",
          // initial_resolution: '240p',
          buffering:          500,
          autoplay:           true,
          height:             480,
          width:              424,
          fullscreen:         true
        });
      };

      function removePlayer(){
        sldpPlayer.destroy(function () {
          console.log('SLDP Player is destroyed.');
        });
      }
    </script>
  </body>
</html>