@php
    $events = $case->events;
    $btn = '';
    $uu = __('Scehdule Event');
    if (Auth::user()->isClerk()) {
        $btn = "<button class='btn btn-primary btn-xs float-right' onclick='registerEvent({$case->id}); return false;'>$uu</button>";
    }
    if ($events) {
        $ee = __('Event Type');
        $dd = __('Event Date');
        $ll = __('Locatin');
        $oo = __('OutCome');
        // $oo = __('Events Attached To This Case');
        echo "<h6>$oo{$btn}</h6> 
        <table class='table table-condensed table-sm table-bordered' style='font-size: 9pt;'>
            <thead style='background-color:cornflowerblue;'>
                <th>#</th>
                <th>$ee</th>
                <th>$dd</th>
                <th>$ll</th>
                <th>$oo</th>
            </thead><tbody>";
        $count = 0;
        foreach ($events as $event) {
            $btn2 = "";
            if (Auth::user()->can('event-create') && $event->createdBy->id == Auth::user()->id) {
                $btn2 = "<button title='{{$event->createdBy->id}}' class='btn btn-xs btn-link float-right' onclick='updateEvent({$event->id}); return false;'>Update</button>";
            }
            echo "<tr>
                    <td>" .
                ++$count .
                "</td>
                    <td>{$event->eventType->event_type_name}</td>
                    <td>{$event->date_time}</td>
                    <td>{$event->location}</td>
                    <td>{$event->out_come}{$btn2}</td>
                </tr>";
        }
        echo '</tbody></table>';
    } else {
        echo 'No event attach to this case.';
    }
@endphp
