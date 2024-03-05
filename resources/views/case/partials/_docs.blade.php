@php
    $docs = $case->documents;
    $uu = __('Upload Attach');
    $attachButton =
        $case->isAssignedTo(Auth::user()->person_id) && $case->isActive() && Auth::user()->can('document-create')
            ? "<button class='btn btn-default btn-link btn-sm float-right' onclick='attachDoc({$case->id});return false;'>$uu</button>"
            : '';
    if ($docs) {
        $hh = __('Document Type');
        $bb = __('Date Submitted');
        $cc = __('By');
        $ff = __('Documents attached to this case');
        echo "<h6 class='text-info'>$ff{$attachButton}</h6>
        <table class='table table-condensed table-sm table-bordered' style='font-size: 9pt;'>
            <thead style='background-color:cornflowerblue;'>
                <th>#</th>
                <th>{$hh}</th>
                <th>{$bb}</th>
                <th>{$cc}</th>
                <th></th>
            </thead><tbody>";
        $count = 0;
        foreach ($docs as $doc) {
            $aa = __('Show');
            $btn = "";
            if (!isset($print)) {
                $btn = "<button class='btn btn-link btn-xs' onclick='shoeDoc({$doc->id});return false;'>$aa</button>";
            }
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
