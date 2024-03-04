@php
    $staffs = $case->staffs;
    if ($staffs) {
        $ee = __('Staff Name');
        $pp = __('Assign As');
        $rr = __('Assign Date');
        $ff = __('Staffs Assign To This Case');
        $staffAddBtn = '';
        $nmnm = __('Assign Staff to this case');
        if (Auth::user()->can('case-staff-assignment-create') && $case->isActive()) {
            if(!isset($print))
            $staffAddBtn = "<button class='btn btn-primary btn-xs float-right' onclick='registerCsa({$case->id}); return false;'>$nmnm</button>";
        }
        echo "<h6 class='text-info'>$ff{$staffAddBtn}</h6>
        <table class='table table-condensed table-sm table-bordered' style='font-size: 9pt;'>
            <thead style='background-color:cornflowerblue;'>
                <th>#</th>
                <th>$ee</th>
                <th>$pp</th>
                <th>$rr</th>
            </thead><tbody>";
        $count = 0;
        foreach ($staffs as $staff) {
            $sendNotificationBtn = '';
            if (Auth::user()->isClerk() && $staff->case->isActive()) {
                if(!isset($print))
                $sendNotificationBtn = "<button class='btn btn-xs btn-primary float-right' onclick='sendNotification({$staff->id});return false;' title='Send Notification Email'>Send</button>";
            }
            echo "<tr>
                    <td>" .
                ++$count .
                "</td>
                    <td>{$staff->courtStaff->person->getFullName()}{$sendNotificationBtn}</td>
                    <td>{$staff->assigned_as}</td>
                    <td>{$staff->getAssignedDate()}</td>
                </tr>";
        }
        echo '</tbody></table>';
    } else {
        echo 'No staff assign to this case.';
    }
@endphp
<script>
    
</script>
