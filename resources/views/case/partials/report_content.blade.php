@extends('layout.printLayout')
@php
    $count = 0;
@endphp

@if (count($cases) > 0)
    <div class="container-fluid p-4" style="border: 1px dashed black;">
        <h2 class="bg-info" style="text-align: center">{{$report_title}}</h2>
        <table class="table table-condensed table-sm table-bordered"
            style="border: 1px solid black; cell-padding:1; cell-spacing:0; ">
            <thead class="bg-active">
                <th>#</th>
                <th>{{ __('Case Number') }}</th>
                <th>{{ __('Case Type') }}</th>
                <th>{{ __('Plaintiff') }}</th>
                <th>{{ __('Defendant') }}</th>
                <th>{{ __('Date Registered') }}</th>
                <th>{{ __('Last Event') }}</th>
                <th>{{ __('Event Type') }}</th>
                <th>{{ __('Case Status') }}</th>
            </thead>
            <tbody>
                @foreach ($cases as $case)
                    @php
                        $lastEvent = $case->getLastEvent();
                    @endphp
                    <tr style="border: 1px solid black;">
                        <td><?= ++$count ?></td>
                        <td>{{ $case->case_number }}</td>
                        <td>{{ $case->caseType->case_type_name }}</td>
                        <td>{{ $case->getPlaintiff() }}</td>
                        <td>{{ $case->getDefendant() }}</td>
                        <td>{{ $case->getDate() }}</td>
                        <td>{{ $lastEvent[0] }}</td>
                        <td>{{ $lastEvent[1] }}</td>
                        <td>{{ $case->getCaseStatus() }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@else
    {{ 'No record found.' }}
@endif
