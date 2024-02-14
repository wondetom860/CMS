@php
    $docs = $party->documents;
    if ($docs) {
        echo "<h6>Documents Registered In This Case</h6>
        <table class='table table-condensed table-sm table-bordered' style='font-size: 9pt;'>
            <thead style='background-color:cornflowerblue;'>
                <th>#</th>
                <th>Doc Type</th>
                <th>Date submitted</th>
                <th>By</th>
            </thead><tbody>";
        $count = 0;
        foreach ($docs as $doc) {
            echo "<tr>
                    <td>" .
                ++$count .
                "</td>
                    <td>{$doc->doc_type_id}</td>
                    <td>{$doc->date_filed}</td>
                    <td>{$doc->csa_id}</td>
                </tr>";
        }
        echo '</tbody></table>';
    } else {
        echo 'No docs attached to this case.';
    }
@endphp
