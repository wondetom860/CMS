@php
    $viewData['changes']=$changes->CaseModel;
    if ($changes) {
        echo "<h6>Cases registered in this court</h6>
        <table class='table table-condensed table-sm table-bordered' style='font-size: 9pt;'>
            <thead style='background-color:cornflowerblue;'>
                <th>#</th> 
                    <th>Case Number</th>
                    <th>Assigned Staff</th>
                    <th>Termination Reason</th>
                    <th>Requested At</th> 
                    <th>Requested By</th> 
                    <th>Request Accepted</th>
                    <th>Request Accepted At</th>
                    <th>Approval Status</th>
                    <th>Approved At</th>
                    <th>Approved By</th>
                    <th>Remark</th>
                    <th>Created At</th>
                    <th>Updated At</th> 
            </thead><tbody>";
        $count = 0;
        foreach ($viewData['changes'] as $change) {
            echo "<tr>
                    <td>" .
                ++$count .
                "</td>
                        {{-- <td>{{ $change->id }}</td> --}}
                        <td>{{ $change->caseStaffAssignment->case->case_number }}</td>
                        <td>{{ $change->caseStaffAssignment->courtStaff->person->getFullName() }}</td>
                        <td>{{ $change->termination_reason }}</td>
                        {{-- <td>{{ $change->requestd_at }}</td> --}}
                        {{-- <td>{{ $change->requestedBy->user_name }}</td> --}}
                        <td>{{ $change->request_accepted ? 'Yes' : 'No' }}</td>
                        {{-- <td>{{ $change->request_accepted_at }}</td> --}}
                        <td>{{ $change->approval_status }}</td>
                        <td>{{ $change->approved_at }}</td>
                        <td>{{ $change->approvedBy ? $change->approvedBy->user_name : 'Not approved yet.' }}</td>
                        <td>{{ $change->remark }}</td>
                        <td>{{ $change->created_at }}</td>
                        <td>{{ $change->updated_at }}</td> 
                       
                </tr>";
        }
        echo '</tbody></table>';
    } else {
        echo 'No case registered in this court.';
    }
@endphp
