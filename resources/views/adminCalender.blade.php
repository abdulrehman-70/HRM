@extends('layouts.applayout')

@section('content')

     <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-body" id="calendar">

                    </div>
                </div>
              </div>
            </div>
          </div>
       </div>
    </div>



@endsection
@section('js')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var attendances = '<?php echo @$attendances; ?>';
                attendances= JSON.parse(attendances);
        console.log('attendances:' ,attendances);

        var result = attendances.map(person => {
            return {
                title: person.availability==0 ? person.user.name +'-'+'Absent' : person.user.name+'-'+'Present',
                start:person.start_time, 
                end:person.end_time,
                color:person.availability==0 ?'red' : 'green',
            }
        });

        let weArr = [
            {
                daysOfWeek: [0,6], //Sundays and saturdays
                rendering:"background",
                color: "red",
                overLap: false,
                allDay: true,
                title:'Weekend OFF',
            }

        ]
        result = [...result, ...weArr];
            console.log(result)

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'listWeek',
            // initialView: 'dayGridMonth',
            displayEventEnd : true,
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
@endsection

</html>
