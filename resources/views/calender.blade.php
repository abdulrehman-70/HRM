<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" integrity="sha256-5veQuRbWaECuYxwap/IOE/DAwNxgm4ikX7nrgsqYp88=" crossorigin="anonymous">
    <body>
    <div id='calendar'></div>
<!--
    <script>
         document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new Calendar(calendarEl, {
  events: [
    {
      title  : 'event1',
      start  : '2010-01-01'
    },
    {
      title  : 'event2',
      start  : '2010-01-05',
      end    : '2010-01-07'
    },
    {
      title  : 'event3',
      start  : '2010-01-09T12:30:00',
      allDay : false // will make the time show
    }
  ]
});
        calendar.render();
      });
        </script>
         -->
         <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js" integrity="sha256-7PzqE1MyWa/IV5vZumk1CVO6OQbaJE4ns7vmxuUP/7g=" crossorigin="anonymous"></script></head>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var user = '<?php echo @$user; ?>';
        user= JSON.parse(user);
        console.log('user:' ,user);



        var result = user.map(person => {
            return {
                title: person.availability==0 ? 'Absent' :'Present' ,
                start:person.start_time,
                end:person.end_time,
                color:person.availability==0?'red' : 'green',
            }
        });


        var absent = '<?php echo @$absent; ?>';
        absent= JSON.parse(absent);


        let weArr = [
            {
                daysOfWeek: [0,6], //Sundays and saturdays
                rendering:"background",
                color: "red",
                overLap: false,
                allDay: true,
                title:'Off',
            }

        ]

        result = [...result, ...weArr];
        console.log(result)

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'listWeek',
            events: result,

         });
        calendar.render();
      });

      var dt = new Date();
        // if(dt.getDay() == 6 || dt.getDay() == 0)
        // {
        //    console.log('weekend')
        // }
        // else{
        //     console.log('mpt weekend')
        // }


        </script>
</body>
</html>
