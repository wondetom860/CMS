@php
    $cases = $court->CaseModel;
    if ($cases) {
        echo "<h6>Cases registered in this court</h6>
        <table class='table table-condensed table-sm table-bordered' style='font-size: 9pt;'>
            <thead style='background-color:cornflowerblue;'>
                <th>#</th>
                <th>Case Type</th>
                <th>Date regsitered</th>
                <th>Status</th>
            </thead><tbody>";
        $count = 0;
        foreach ($cases as $case) {
            echo "<tr>
                    <td>" .
                ++$count .
                "</td>
                    <td>{$case->caseType->case_type_name}</td>
                    <td>{$case->start_date}</td>
                    <td>{$case->getStatus()}</td>
                </tr>";
        }
        echo '</tbody></table>';
    } else {
        echo 'No case registered in this court.';
    }
@endphp
