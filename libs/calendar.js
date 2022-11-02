    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          locale: 'es',
          height: 650,
          headerToolbar: {
              left: 'prev,next,today',
              center: 'title',
              right:'dayGridMonth'
          },
          eventClick: function(info) {
            alert('Event: ' + info.event.title);
            alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
            alert('View: ' + info.view.type);
        
            // change the border color just for fun
            info.el.style.borderColor = 'red';
          }
    
        });
        calendar.render();
      });
    
    