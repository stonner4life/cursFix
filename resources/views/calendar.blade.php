<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8' />
    <link href='/css/fullcalendar.min.css' rel='stylesheet' />
    <link href='/css/jquery.qtip.min.css' rel='stylesheet' />
    <link href='/css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
    <script src='/js/lib/moment.min.js'></script>
    <script src='/js/lib/jquery.min.js'></script>
    <script src='/js/fullcalendar.min.js'></script>
    <script src='/js/jquery.qtip.min.js'></script>
    <script src='/js/locale/th.js'></script>
    <script>

        $(document).ready(function() {

            $.ajax({
                url: "/calendadata",
            })
            .done(function( data ) {

               //alert(data.title);
                var events = [];
                for(var i =0; i < data.length; i++){
                    events.push( {
                        title: data[i].topic,
                        start: data[i].start_at,
                        end: data[i].finish_at,
                        description: data[i].description,
                    })
                }

                $('#calendar').fullCalendar({
                    defaultDate: '2017-03-12',
                    editable: false,
                    lang:'th',
                    navLinks: true, // can click day/week names to navigate views
                    eventLimit: true, // allow "more" link when too many events
                    header:
                    {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay,listMonth'
                    },
                    events: events,
                    eventRender: function(event, element) {
                        element.qtip({
                            content: {
                                text: event.description,
                                

                            }
                        });
                    }

                });
            });



        });

    </script>

    <style>

        body {
            margin: 40px 10px;
            padding: 0;
            font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
            font-size: 14px;
        }

        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }

    </style>
</head>
<body>

<div id='calendar'></div>

</body>
</html>
