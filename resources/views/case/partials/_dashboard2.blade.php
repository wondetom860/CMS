<div class="container-fluid table-responsive">
    <h2 class="text-center bg-gray mr-2 underlined">{{__('Cases registered Today')}}</h2>
    @php
        $cases = App\models\CaseModel::getTodayRegisteredCases(1);
        $count = 0;
    @endphp
    @if ($cases)
        <table class="table table-condensed table-sm table-bordered">
            <thead class="bg-active">
                <th>#</th>
                <th>{{__('Case Number')}}</th>
                <th>{{__('Plaintiff')}}</th>
                <th>{{__('Defendant')}}</th>
                <th>{{__('Case Of Action')}}</th>
                {{-- <th>{{__('Type')}}</th> --}}
                {{-- <th>{{__('Decision')}}</th> --}}
            </thead>
            <tbody>
                @foreach ($cases as $case)
                    <tr>
                        <td><?= ++$count ?></td>
                        <td>{{$case->case_number}}</td>
                        <td>{{$case->getPlaintiff()}}</td>
                        <td>{{$case->getDefendant()}}</td>
                        <td>{{$case->getCouseOfAction()}}</td>
                        {{-- <td>{{$case->getEventType()}}</td> --}}
                        <td></td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    @else
        <p>No case registered today</p>
    @endif
</div>
