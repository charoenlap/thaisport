<?php 
ini_set( 'upload_max_size' , '50M' );
ini_set( 'post_max_size', '50M'); 
ini_set( 'upload_max_filesize', '50M'); 
ini_set( 'max_execution_time', '1800'); 
ini_set( 'max_input_time', '-1'); 
ini_set( 'memory_limit', '256M'); 
// phpinfo();
?>
<!DOCTYPE html>
<html>
<head>
    <title>
        Async file upload with jQuery
    </title>
      
    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <link rel="stylesheet" href=
"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
  
  <style>
    .qr-code {
      max-width: 200px;
      margin: 10px;
    }
  </style>
</head>
  
<body>
    <div class="container" style="margin-top:20px;">
        <div class="row">
            <div class="col-md-6">
                <h3>Upload</h3>
                <form method="post" action="#" enctype="multipart/form-data" id="myform">
                    <input type="hidden" name="upload_max_filesize" value="50M">
                    <div >
                        <input type="file" id="file" name="file" /><br>
                        <input type="button" class="btn btn-primary" value="Upload" id="but_upload">
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <h3>QR</h3>
                <img src="#" class="qr-code img-thumbnail img-responsive" />
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <?php 
                    $dir    = '../uploads_file/';
                    $files1 = scandir($dir);
                ?>
                <table class="table">
                    <?php foreach($files1 as $val){  
                        if($val=='.'){ continue;}
                        if($val=='..'){ continue;}
                    ?>
                        <tr>
                            <td><a href="https://gosport.world/uploads_file/<?php echo $val;?>" target="_blank"><?php echo $val;?></a></td>
                            <td class="text-right">
                                <img src="https://chart.googleapis.com/chart?cht=qr&chl=https://gosport.world/uploads_file/<?php echo $val;?>&chs=100x100&chld=L|0" alt=""></td>
                        </tr>
                    <?php }?>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#but_upload").click(function() {
                var fd = new FormData();
                var files = $('#file')[0].files[0];
                fd.append('file', files);
       
                $.ajax({
                    url: 'upload.php',
                    type: 'post',
                    data: fd,
                    enctype: 'multipart/form-data',
                    processData: false,
                    contentType: false,
                    cache: false,
                    timeout: 600000,
                    success: function(response){
                        console.log(response);
                        if(response != 0){
                           // alert(response);
                           let finalURL =
                            'https://chart.googleapis.com/chart?cht=qr&chl=' +
                                      htmlEncode(response) +
                                      '&chs=160x160&chld=L|0'
                                    $('.qr-code').attr('src', finalURL);
                        }
                        else{
                            alert('file not uploaded');

                        }
                    },
                });
            });
        });
    </script>
    <script>
    // Function to HTML encode the text
    // This creates a new hidden element,
    // inserts the given text into it 
    // and outputs it out as HTML
    function htmlEncode(value) {
      return $('<div/>').text(value)
        .html();
    }
  
  </script>
</body>
  
</html>