$(document).ready(function() {
    $('#calendar').fullCalendar({
        themeSystem: 'bootstrap4',
        customButtons: {
            Add: {
                text: 'Add event',
                click: function() {
                    alert('Event added!');
                }
            }
        },
        header: {
            left: 'month,agendaWeek,agendaDay today',
            center: 'prev title next',
            right: 'Add'
        },
        height: 'parent',
        fixedWeekCount: false,
        selectable: true,
        eventLimit: true,
        // events coming from json feed
        eventSources: [
            {
                url: './eventfeed.php'
            }
        ],
        // handling the popover which comes up when you click on an event
        eventClick: function(calEvent, jsEvent, view) {
            jsEvent.stopPropagation();
            var p = $(jsEvent.currentTarget);
            
            // remove another popover if it's already there
            if ($('.popover').length > 0) {
                detachAndRemoveHandlers();
            }
            
            // get the content for popover from html
            var content = $('#popover-content');
            content.find('#time').html(calEvent.start.format("Do MMM h:mm a") + " - " +
                calEvent.end.format("Do MMM h:mm a"));
            content.find('#desc').html(calEvent.desc);
            content.find('#venue').html(calEvent.venue);
            
            // create popover and show
            $(p).popover({
                html: true,
                title: '<span >' + calEvent.title + 
                    '</span><span class="close" aria-hidden="true">&times;</span>',
                content: function() {
                    return content.html();
                },
                placement: 'right',
                fallbackPlacement: ['left', 'bottom', 'top']
            }).popover('show');
            
            // function to remove popover and handlers
            function detachAndRemoveHandlers() {
                $('.popover').detach();
                $('#calendar-container').off('click');
                $('.fc-day-grid-event').off('click');
            }

            // handlers to close the popover
            $('.close').on('click', detachAndRemoveHandlers);
            $('#calendar-container').on('click', detachAndRemoveHandlers);
            $(p).on('click', function(e) {
                e.stopPropagation();
                detachAndRemoveHandlers();
            });
        }
    });
}); 