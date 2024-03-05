@extends('layout.adminLTE')
@section('title', 'Change Court Staff Case Assignment Detail')
@section('subtitle',  $viewData['subtitle'])
@section('content')
<div class="container-fluid ">
        <h3 class="">Detail: {{ $viewData['changes']->getDetail() }}</h3>
             
    
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4 p-2">
                    <img src="{{ asset('/images' . $viewData['changes']->getLogoPath()) }}" class="img-fluid rounded-start" style="width: 320px; height:auto">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="card-title">
                            {{-- <p class="card-text"><b>Changer-ID : </b>{{ $viewData['changes']->id }}</p> --}}
                        <p class="card-text"><b>Case Number : </b>{{ $viewData['changes']->caseStaffAssignment->case->case_number }}</p>
                        <p class="card-text"><b>Assigned Staff : </b>{{ $viewData['changes']->caseStaffAssignment->courtStaff->person->getFullName()}}</p>
                        <p class="card-text"><b>Termination Reason : </b>{{ $viewData['changes']->termination_reason}}</p>
                        <p class="card-text"><b>Requested At: </b>{{ $viewData['changes']->requestd_at}}</p>
                        <p class="card-text"><b>Requested By: </b>{{ $viewData['changes']->requestedBy->user_name}}</p>
                        <p class="card-text"><b>Request Accepted : </b>{{ $viewData['changes']->request_accepted ? 'Yes' : 'No'}}</p>
                        <p class="card-text"><b>Request Accepted At: </b>{{ $viewData['changes']->request_accepted_at}}</p>
                        <p class="card-text"><b>Approval Status : </b>{{ $viewData['changes']->approval_status}}</p>
                        <p class="card-text"><b>Approved At: </b>{{ $viewData['changes']->approved_at }}</p>
                        <p class="card-text"><b>Approved By : </b>{{ $viewData['changes']->approvedBy ? $change->approvedBy->user_name : 'Not approved yet.'}}</p>
                        <p class="card-text"><b>Remark : </b>{{ $viewData['changes']->remark}}</p>
                        <p class="card-text"><b>Created At: </b>{{ $viewData['changes']->created_at}}</p>
                        <p class="card-text"><b>Updated At : </b>{{ $viewData['changes']->updated_at}}</p>
                         {{-- <div class="container-fluid">@include('admin.change_court_staff.detail', ['change_court_staff'=>$viewData['changes']])</div> --}}
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
