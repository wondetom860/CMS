@php
    $docs = $case->documents;
    $attachBytton = $case->isAssignedTo(Auth::user()->person_id) && $case->isActive() ? 
    "<button class='btn btn-link btn-sm float-right' onclick='attachDoc({$case->id});return false;'>Upload/Attach</button>" : "";
    if ($docs) {
        echo "<h6>Documents attached to this case{$attachBytton}</h6>
        <table class='table table-condensed table-sm table-bordered' style='font-size: 9pt;'>
            <thead style='background-color:cornflowerblue;'>
                <th>#</th>
                <th>Doc Type</th>
                <th>Date submitted</th>
                <th>By</th>
                <th></th>
            </thead><tbody>";
        $count = 0;
        foreach ($docs as $doc) {
            $btn = "<button class='btn btn-link btn-sm' onclick='shoeDoc({$doc->id});return false;'>Show</button>";
            echo "<tr>
                    <td>" .
                ++$count .
                "</td>
                    <td>{$doc->documentType->doc_type_name}</td>
                    <td>{$doc->date_filed}</td>
                    <td>{$doc->caseStaffAssignemnt->courtStaff->person->getFullName()}</td>
                    <td>{$btn}</td>
                </tr>";
        }
        echo '</tbody></table>';
    } else {
        echo 'No docs attached to this case.';
    }
@endphp
