@extends('layout.adminLTE')
@section('title', $viewData['title'])
@section('innerTitle', $viewData['title'])
@section('content')
    <div class="container-fluid table-responsive">
        <h3 class="text-center ">{{ $viewData['title'] }} </h3>
        <div class="row">
            <div class="col-11">
                <label for="report_type">Choose Report</label>
                <select class="form-control" name="report_type" id="report_type" title="Cases Registered "
                    onchange="updateReport($(this).val()); return false;">
                    <option value="" selected>--Cases Registered---</option>
                    <option value="1">Today</option>
                    <option value="2">This Week</option>
                    <option value="3">Last 3 Month</option>
                    <option value="4">Last 6 Month</option>
                    <option value="5">Last 1 Year</option>
                </select>
            </div>
            <div class="col-1">
                <br>
                <button class="btn btn-secondary p-1 m-2" onclick="printReport();return false;">Print</button>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12" id="report_container" style="max-height: 500px; overflow:auto">

            </div>
        </div>
    </div>
    </div>

    <script>
        const printReport = () => {
            $rtype = $("#report_type").val();
            window.open('/case/get-report?report_type=' + $rtype, "Case Report {{ date('d/m/Y') }}",
                "menubar=0,location=0,height=700,width=800");
        }
        const updateReport = (report_type) => {
            $.get("{{ route('case.get-report') }}", {
                report_type: report_type
            }).done((resp) => {
                $("#report_container").html(resp);
            });
        }
    </script>
@endsection
