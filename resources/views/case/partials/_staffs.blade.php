@php
    $staffs = $case->staffs;
    if ($staffs) {
        $ee = __('Staff Name');
        $pp = __('Assign As');
        $rr = __('Assign Date');
        $staffAddBtn = '';
        $nmnm = __('Assign Staff to this case');
        // dd(Auth::user()->can('case-staff-assignment-create'));
        if (Auth::user()->can('case-staff-assignment-create')) {
            // $staffAddBtn = ""
            $staffAddBtn = "<button class='btn btn-sm btn-link float-right' onclick='registerCsa({$case->id}); return false;'>$nmnm</button>";
        }
        echo "<h6>Staffs Assign To This Case{{$staffAddBtn}}</h6>
        <table class='table table-condensed table-sm table-bordered' style='font-size: 9pt;'>
            <thead style='background-color:cornflowerblue;'>
                <th>#</th>
                <th>$ee</th>
                <th>$pp</th>
                <th>$rr</th>
            </thead><tbody>";
        $count = 0;
        foreach ($staffs as $staff) {
            echo "<tr>
                    <td>" .
                ++$count .
                "</td>
                    <td>{$staff->courtStaff->person->getFullName()}</td>
                    <td>{$staff->assigned_as}</td>
                    <td>{$staff->assigned_at}</td>
                </tr>";
        }
        echo '</tbody></table>';
    } else {
        echo 'No staff assign to this case.';
    }
@endphp
