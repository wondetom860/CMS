@php
    $staffs = $case->staffs;
    if ($staffs) {
        echo "<h6>Staffs Assign To This Case</h6>
        <table class='table table-condensed table-sm table-bordered' style='font-size: 9pt;'>
            <thead style='background-color:cornflowerblue;'>
                <th>#</th>
                <th>Staff Name</th>
                <th>Assign As</th>
                <th>Assign At</th>
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
