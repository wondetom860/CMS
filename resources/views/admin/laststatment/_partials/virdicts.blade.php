@php
    $lStats = $case->laststatements;
    if ($lStats) {
        $bttn = "";
        if ($case->case_status != 2) {
            if (Auth::user()->can('laststatment-create')) {
                $bttn =  "<button onclick='lastStatement({$case->id});return false;' class='btn btn-primary btn-xs float-right' title='Give Decision Statement to the case'>Decision Statement</button>";
            }
        } else {
            // $bttn =  "<small class='text-warning text-right' style='font-size:8pt;'>Case Closed, See Judgement detail for more.</small>";
        }
        echo "<h6 class='text-info'>Judgement / Decisions / Verdicts{$bttn}</h6>
        <table class='table table-condensed table-sm table-bordered' style='font-size: 9pt;'>
            <thead style='background-color:cornflowerblue;'>
                <th>#</th>
                <th>Case Number</th>
                <th>Case Type</th>
                <th>Judgement</th>
                <th>Remark</th>
                <th>Date</th>
            </thead><tbody>";
        $count = 0;
        foreach ($lStats as $judgement) {
            echo "<tr>
                    <td>" .
                ++$count .
                "</td>
                    <td>{$judgement->case->case_number}</td>
                    <td>{$judgement->case->caseType->case_type_name}</td>
                    <td>{$judgement->statement_description}</td>
                    <td>{$judgement->remark}</td>
                    <td>{$judgement->getDate()}</td>
                </tr>";
        }
        echo '</tbody></table>';
    }
@endphp
