@php
    $csas = $courtstaff->caseStaffAssignments;
    if ($csas) {
        echo "<h6>Case Assign to this Staff Member</h6>
        <table class='table table-condensed table-sm table-bordered' style='font-size: 9pt; '>
            <thead style='background-color:cornflowerblue;color:white'>
                <th>#</th>
                <th>Case Number</th>
                <th>Assigned At</th>
                <th>Assigned As</th>
            </thead><tbody>";
        $count = 0;
        foreach ($csas as $csa) {
            echo "<tr>
                    <td>" .
                ++$count .
                "</td>
                    <td title='Show case detail'><a href='" .
                route('case.show', ['id' => $csa->case_id]) .
                "'>{$csa->case->case_number}</a></td>
                    <td>{$csa->assigned_at}</td>
                    <td>{$csa->assigned_as}</td>
                </tr>";
        }
        echo '</tbody></table>';
    } else {
        echo 'No case assigh to this staff member.';
    }
@endphp
