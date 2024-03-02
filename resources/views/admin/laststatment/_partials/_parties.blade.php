@php
    $staffs = $case->parties;
    if ($staffs) {
        echo "<h6>parties In This Case</h6>
        <table class='table table-condensed table-sm table-bordered' style='font-size: 9pt;'>
            <thead style='background-color:cornflowerblue;'>
                <th>#</th>
                <th>Party Type</th>
                <th>Date submitted</th>
                <th>By</th>
            </thead><tbody>";
        $count = 0;
        foreach ($staffs as $staff) {
            echo "<tr>
                    <td>" .
                ++$count .
                "</td>
                    <td>{$staff->person->getFullName()}</td>
                    <td>{$staff->partyType->party_type_name}</td>
                    <td>{$staff->created_at}</td>
                </tr>";
        }
        echo '</tbody></table>';
    } else {
        echo 'No parties assign to this case.';
    }
@endphp