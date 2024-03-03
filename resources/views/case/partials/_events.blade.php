@php
    $events = $case->events;
    $btn = '';
    $uu = __('Scehdule Event');
    if (Auth::user()->isClerk() && $case->isActive()) {
        $btn = "<button class='btn btn-primary btn-xs float-right' onclick='registerEvent({$case->id}); return false;'>$uu</button>";
    }
    if ($events) {
        $ee = __('Event Type');
        $dd = __('Event Date');
        $ll = __('Locatin');
        $oo = __('OutCome');
        $yy = __('Events Schedules');
        $add = isset($print) ? '' : __('Archives');
        echo "<h6 class='text-info'>$yy{$btn}</h6> 
        <table class='table table-condensed table-sm table-bordered' style='font-size: 9pt;'>
            <thead style='background-color:cornflowerblue;'>
                <th>#</th>
                <th>$ee</th>
                <th>$dd</th>
                <th>$ll</th>
                <th>$oo</th>
                <th colspan=2>$add</th>
            </thead><tbody>";
        $count = 0;
        foreach ($events as $event) {
            $btn2 = '';
            $ad = '';
            $ccount = $event->archives()->where('file_type', '<>', null)->count();
            if (!isset($print)) {
                $btn = "<button class='btn btn-xs btn-success' onclick='showArchives({$event->id});return false;'>{$ccount} archives</button>";
            }
            // Auth::user()->can('event-create') &&
            //     $event->createdBy &&
            //     $event->createdBy->id == Auth::user()->id &&
            //     $event->case->isActive()
            if (Auth::user()->can('archive-create') && $event->case->isActive()) {
                // $btn2 = "<button title='{{ $event->createdBy->id }}' class='btn btn-xs btn-link float-right' onclick='updateEvent({$event->id}); return false;'>Update</button>";
                if (!isset($print)) {
                    $ad = "<button class='btn btn-primary btn-xs' onclick='addArchive({$event->id}); return false;'>Add {$add}</button>";
                }
            }
            echo "<tr>
                    <td>" .
                ++$count .
                "</td>
                    <td>{$event->eventType->event_type_name}</td>
                    <td>{$event->getDate()}</td>
                    <td>{$event->location}</td>
                    <td>{$event->out_come}{$btn2}</td>
                    <td style='text-align: center;'>{$ad}</td>
                    <td style='text-align: center;'>{$btn}</td>
                </tr>";
        }
        echo '</tbody></table>';
    } else {
        echo 'No event attach to this case.';
    }
@endphp
