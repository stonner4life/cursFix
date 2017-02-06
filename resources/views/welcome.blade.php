<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
    </head>
    <body>

     <ul>
         @foreach($roomtasks as $roomtaks)
             <li>{{$roomtaks->description}}</li>
         @endforeach
     </ul>

    </body>
</html>
