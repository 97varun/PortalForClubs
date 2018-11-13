$(document).ready(function() {
    // initialize full calendar
    $('#calendar').fullCalendar({
        themeSystem: 'bootstrap4',
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
                url: 'php/eventfeed.php'
            }
        ],
        eventClick: eventClick
    });

    // create event button click
    function addEvent() {
        window.open("../events/html/event.html", "_self");
    }

    // handling the popover which comes up when you click on an event
    function eventClick(calEvent, jsEvent, view) {
        jsEvent.stopPropagation();
        var p = $(jsEvent.currentTarget);
        
        // remove another popover if it's already there
        if ($('.popover').length > 0) {
            detachAndRemoveHandlers();
        }

        //get title from html
        var title = $("#popover-title");
        title.find("#title").html(calEvent.title);
        
        // get the content for popover from html
        var content = $('#popover-content');
        var eventTime = calEvent.start.format("Do MMM h:mm a");
        if (calEvent.end != undefined) {
            eventTime += " - " + calEvent.end.format("Do MMM h:mm a");
        }
        content.find('#time').html(eventTime);
        content.find('#club').html(calEvent.club);
        
        // don't show description if it's empty.
        if (calEvent.desc.trim().length > 0) {
            content.find('#desc').parent().css("display", "table-row");
            content.find('#desc').html(calEvent.desc);
        } else {
            content.find('#desc').parent().css("display", "none");
        }
        content.find('#venue').html(calEvent.venue);
        content.find('.btn-group').css("display", calEvent.showDelete ? "inline-flex" : "none");

        // edit button
        $('body').on('click', '#edit', function() {
            window.open("../events/php/edit_event.php?event_id=" + calEvent.id, "_self");
        });

        // create popover and show
        $(p).popover({
            html: true,
            title: title.html(),
            content: function() {
                return content.html();
            },
            placement: 'left',
        }).popover('show');

        // add some css to popover header
        $(".popover-header").css({"background-color": calEvent.color, "color": calEvent.textColor});
        $(".close").css({"color": calEvent.textColor, "opacity": 0.6});
        $(".close").hover(function() {
            $(this).css({"opacity": 1});
        }, function() {
            $(this).css({"opacity": 0.6});
        });
        
        // function to remove popover and handlers
        function detachAndRemoveHandlers() {
            $('.popover').detach();
            $('#calendar-container').off('click');
            $('.fc-day-grid-event').off('click');
            $('body').off('click', '#del');
            $('body').off('click', '#yes');
            $('body').off('click', '#cancel');
        }

        // handlers to close the popover
        $('.close').on('click', detachAndRemoveHandlers);
        $('#calendar-container').on('click', detachAndRemoveHandlers);
        $(p).on('click', function(e) {
            e.stopPropagation();
            detachAndRemoveHandlers();
        });

        // handler to prevent more popover from closing on clicking event popover
        $(".popover").on('mousedown', function(e) {
            e.stopPropagation();
        });

        function switchContent() {
            $('.popover-body').find("#event-details").toggle();
            $('.popover-body').find("#cfm-dia").toggle();
            $(p).popover('update');
        }

        // confirm delete
        $('body').on('click', '#yes', function() {
            $.ajax({
                url: "php/delevent.php",
                data: {event_id: calEvent.id},
                success: function(resp) {
                    if (resp === "deleted") {
                        $('#calendar').fullCalendar('refetchEvents');
                        detachAndRemoveHandlers();
                    } else {
                        alert("resp: " + resp);
                    }
                },
                error: function(error) {
                    alert("error: " + error);
                }
            });
        });
        $('body').on('click', '#cancel', switchContent);
        $('body').on('click', '#del', switchContent);
    }

    // refetch events if someone else updates events
    var eventSource = new EventSource('php/updevents.php');
    eventSource.onmessage = refetch;

    toggleCreateEventBtn();
    $(window).focus(refresh);

    // refetches events
    function refetch() {
        $('#calendar').fullCalendar('refetchEvents');
    }

    // refresh page
    function refresh() {
        $('#calendar').fadeToggle("fast");
        toggleCreateEventBtn();
        refetch();
        $('#calendar').fadeToggle("fast");
    }

    // show/hide create event button
    function toggleCreateEventBtn() {
        $.ajax({
            url: "php/chkaccess.php",
            success: function(resp) {
                if (resp === "admin") {
                    $('#calendar').fullCalendar('option', 'customButtons', {
                        Add: {
                            text: 'Create event',
                            click: addEvent
                        }
                    });
                } else {
                    $('#calendar').fullCalendar('option', 'customButtons', {});
                }
            },
            error: function(error) {
                alert("error: " + error);
            }
        });
    }
}); 