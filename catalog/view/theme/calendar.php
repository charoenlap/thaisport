<header class="ct-page-header ct-u-scratches--bottom ct-u-scratches--inner ct-u-background--black">
    <div class="inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <h1 class="ct-page-header__title">ตารางเวลา</h1>
                </div>
                <div class="col-sm-8">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo route('home');?>">หน้าหลัก</a>
                        </li>
                        <li>ตรางเวลา</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<main class="ct-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">ตารางเวลา</h3>
                <div id='calendar'></div>
            </div>
        </div>
    </div>
</main>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">รายละเอียด</h5>
      </div>
      <div class="modal-body" id="modal-show">
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close-modal">Close</button>
      </div> -->
    </div>
  </div>
</div>

<link href='assets/fullcalendar-5.11.0/lib/main.css' rel='stylesheet' />

<script src='assets/fullcalendar-5.11.0/lib/main.js'></script>
<script src='assets/fullcalendar-5.11.0/lib/locales/th.js'></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      eventSources: [
        {
          url: 'index.php?route=api/feed',
          method: 'POST',
          extraParams: {
            // custom_param1: 'something',
            // custom_param2: 'somethingelse'
          },
          failure: function() {
            alert('there was an error while fetching events!');
          },
          color: 'red',
          textColor: 'black'
        }
      ],
      eventClick: function(info) {
        $('#modal-show').text(info.event.title);
        $('#exampleModal').modal('show');
        //alert('Event: ' + info.event.title);
        // change the border color just for fun
        info.el.style.borderColor = 'red';
      }
    });
    calendar.render();
    calendar.setOption('locale', 'th');
  });   
  // $('document').on('click','#close-modal',function(e){
  //   $('#exampleModal').dismiss();
  // });
</script>