Dear, {{ $csa->courtStaff->person->first_name }}, You have been assigned as {{ $csa->assigned_as }} for the case
numbered {{ $csa->case->case_number }}.
Please follow up by logging into your
account to the system by <a
    href="{{ route('case.detail_remote', ['case_number' => str_replace('/', '_', $csa->case->case_number)]) }}"
    target="_blank"> here</a>
