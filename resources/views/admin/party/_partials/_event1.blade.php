@php
    $parties = $case->parties;
    if ($parties) {
        echo "<h6>parties In This Case</h6>
        <table class='table table-condensed table-sm table-bordered' style='font-size: 9pt;'>
            <thead style='background-color:cornflowerblue;'>
                <th>#</th>
                <th>Name</th>
                <th>Party Type</th>
                <th>Date submitted</th>
                <th>By</th>
            </thead><tbody>";
                $count = 0;
        foreach ($parties as $party) {
            echo "<tr>
                    <td>" .
                ++$count .
                "</td>
                    <td>{$party->person->getFullName()}</td>
                    <td>{$party->partyType->party_type_name}</td>
                    <td>{$party->created_at}</td>
                </tr>";
        }
        echo '</tbody></table>';
    } else {
        echo 'No party attach to this case.';
    }
@endphp
