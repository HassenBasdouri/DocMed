import {Calendar} from 'admin-lte/plugins/fullcalendar';
import dayGridPlugin from 'admin-lte/plugins/fullcalendar-daygrid';
import timeGridPlugin from 'admin-lte/plugins/fullcalendar-timegrid';

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new Calendar(calendarEl, {
      plugins: [ dayGridPlugin,timeGridPlugin ],
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      eventSources: [

        // your event source
        {
          url: routeRendezVous,
          method: 'POST',
          extraParams: {
            '_token':token,
          },
          failure: function() {
            alert('there was an error while fetching events!');
          }
        }

        // any other sources...

      ]
    });

    calendar.render();
  });
