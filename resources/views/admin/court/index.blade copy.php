@extends('layout.adminLTE')
@section('title', $viewData['title'])
@section('innerTitle', $viewData['subtitle'])
@section('content')
    <div class="container d-flix align-items-center flex-column">
        <div class="card">
            <h4 class="card-header bg-light">
                Courts - Admin Panel - MOD-CCMS
                <a class="btn btn-primary btn-xs register-caseType-btn" href="{{ route('admin.court.create') }}"
                    style="align-self: flex-end">Register New Court</a>
            </h4>
            <div class="card-body">
                @gridView([
                    'dataProvider' => $dataProvider,
                    'columnFields' => [
                        [
                            'label' => 'Court Name', // Column label.
                            'attribute' => 'name', // Attribute, by which the row column data will be taken from a model.
                        ],
                        [
                            'label' => 'City',
                            'attribute' => 'city',
                            'value' => function ($row) {
                                return $row->city;
                            },
                        ],
                        [
                            'label' => 'State',
                            'value' => function ($row) {
                                return $row->state;
                            },
                            //'sort' => 'first_name', // To sort rows. Have to set if an 'attribute' is not defined for column.
                        ],
                        [
                            'label' => 'Zip Code', // Column label.
                            'attribute' => 'zip', // Attribute, by which the row column data will be taken from a model.
                        ],
                    ],
                ])
            </div>
        </div>
    </div>
@endsection
