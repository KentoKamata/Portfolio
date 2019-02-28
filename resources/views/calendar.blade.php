@extends('adminlte::page')
@section('title', 'TaskCalendar')
@section('content')
<head>
  <meta charset="utf-8" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>TaskCalendar</title>
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('bower_components/fullcalendar/dist/fullcalendar.min.css') }}">
  <link rel="stylesheet" href="{{ asset('bower_components/fullcalendar/dist/fullcalendar.print.min.css') }}" media="print">
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<section class="content-header">
  <h1>TaskCalendar</h1>
</section>
<section class="content">
  <div class="box box-primary">
    <div class="box-body no-padding">
      <div id="calendar" class="fc fc-unthemed fc-ltr"></div>
    </div><!-- /.box-body -->
  </div><!-- /. box -->
</section>
@section('js')
<script async="" src="//www.google-analytics.com/analytics.js"></script>
<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
<script src="{{asset('vendor/adminlte/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('bower_components/moment/moment.js')}}"></script>
<script src="{{asset('bower_components/fullcalendar/dist/fullcalendar.min.js')}}"></script>
<script>
const items = @json($items);
$(function () {
  /* initialize the external events
  * 外部イベントを初期化する
  -----------------------------------------------------------------*/
  function init_events(ele) {
    ele.each(function () {
      // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
      // it doesn't need to have a start or end
      // 開始や終了が必要ない
      var eventObject = {
        title: $.trim($(this).text()) // use the element's text as the event title
      }
      // store the Event Object in the DOM element so we can get to it later
      $(this).data('eventObject', eventObject)
      })
  }

  init_events($('#external-events div.external-event'))

  /* initialize the calendar
  -----------------------------------------------------------------*/
  //Date for the calendar events (dummy data)
  var date = new Date()
  var d    = date.getDate(),
      m    = date.getMonth(),
      y    = date.getFullYear()
  const map1 = items.map(item =>{
      if( item.status === "0" ) {
          return {
          id             : item.id,
          title          : item.title,
          start          : new Date(y, m, item.limitDate.substr(8, 2)),
          backgroundColor: '#dd4b39',
          borderColor    : '#dd4b39'
          };
      }else if ( item.status === "1" ){
          return {
          id             : item.id,
          title          : item.title,
          start          : new Date(y, m, item.limitDate.substr(8, 2)),
          backgroundColor: '#f39c12',
          borderColor    : '#f39c12'
          };
      }else{
          return {
          id             : item.id,
          title          : item.title,
          start          : new Date(y, m, item.limitDate.substr(8, 2)),
          backgroundColor: '#00a65a',
          borderColor    : '#00a65a'
          };
      }
  });
  
  $('#calendar').fullCalendar({
    header    : {
      left  : 'prev,next today',
      center: 'title',
      right : 'month,agendaWeek,agendaDay'
    },
    buttonText: {
      today: 'today',
      month: 'month',
      week : 'week',
      day  : 'day'
    },
    //Random default events
    events    : map1,
    editable  : true,
    droppable : true, // this allows things to be dropped onto the calendar !!!
    eventDrop : function(item, delta,revertFunc,jsEvent,ui, view) {
                $itemDays = item.start._i;
                $.ajax({
                    url: "api/owners/item.id",
                    type : "PUT",
                    data : {
                        put_data_id: item.id,
                        put_data_year: $itemDays[0],
                        put_data_month: $itemDays[1],
                        put_data_day: $itemDays[2],
                    },
                    success: function(data) {
                        console.log('success');
                        console.log(data);
                    },
                    error: function(xhr, status, error) {
                        console.log('error');
                        console.log(xhr);
                        console.log(status);
                        console.log(error);
                    }
                });
    },
  })

  var calendar = $('#calendar').fullCalendar({
    eventDblClick:function(event, jsEvent){
      var title = prompt('予定を入力してください:', event.title);
      if(title && title!=""){
          event.title = title;
          calendar.fullCalendar('updateEvent', event); //イベント（予定）の修正
      }else{
          calendar.fullCalendar("removeEvents", event.id); //イベント（予定）の削除				
      }
    }
  });

  /* ADDING EVENTS */
  var currColor = '#3c8dbc' //Red by default
  //Color chooser button
  var colorChooser = $('#color-chooser-btn')

  $('#color-chooser > li > a').click(function (e) {
    e.preventDefault()
    //Save color
    currColor = $(this).css('color')
    //Add color effect to button
    $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
  })
  
  $('#add-new-event').click(function (e) {
    e.preventDefault()
    //Get value and make sure it is not null
    var val = $('#new-event').val()
    if (val.length == 0) {
      return
    }
  })
})
</script>
@stop
@stop