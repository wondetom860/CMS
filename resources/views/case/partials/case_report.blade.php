@extends('layout.printLayout')

@if ($case)
    <div class="container-fluid p-4" style="border: 1px dashed black;">
        <div class="row">
            <h2 class="bg-info" style="text-align: center">{{ $report_title }}</h2>
        </div>
        <div class="row">
            <table class="table table-sm table-bordered"
                style="border: 1px solid black; cell-padding:1; cell-spacing:0; ">
                <tr>
                    <td>Case Number</td>
                    <td>{{ $case->case_number }}</td>
                    <td>Status: {{ $case->getStatus() }}</td>

                </tr>
                <tr>
                    <td>Cuse of action</td>
                    <td colspan="2">{{ $case->cause_of_action }}</td>
                </tr>
                <tr>
                    <td>Case Type</td>
                    <td>{{ $case->caseType->case_type_name }}</td>
                    <td>Date reported: {{ $case->getStartDate() }}</td>

                </tr>
                <tr>
                    <td>Parties</td>
                    <td>
                        <h6 class="text-info text-center">Plaintiff</h6>{{ $case->getPlaintiff() }}
                    </td>
                    <td>
                        <h6 class="text-info text-center">Defendant</h6>{{ $case->getDefendant() }}
                    </td>
                </tr>
                <tr>
                    <td>Witness</td>
                    <td colspan="2">
                        {{ $case->getWitnesses() }}
                    </td>
                </tr>
                <tr>
                    <td>Court Staff</td>
                    <td colspan="2">
                        @include('case.partials._staffs', ['case' => $case, 'print' => 1])
                    </td>
                </tr>
                <tr>
                    <td>Events/Schedules</td>
                    <td colspan="2">
                        @include('case.partials._events', ['case' => $case, 'print' => 1])
                    </td>
                </tr>
                <tr>
                    <td>Documents</td>
                    <td colspan="2">
                        @include('case.partials._docs', ['case' => $case, 'print' => 1])
                    </td>
                </tr>
                <tr>
                    <td>Judgement/Verdict</td>
                    <td colspan="2">
                        @include('admin.laststatment._partials.virdicts', ['case' => $case, 'print' => 1])
                    </td>
                </tr>
            </table>
        </div>
    </div>
@else
    {{ 'No record found.' }}
@endif
