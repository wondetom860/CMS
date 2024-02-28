@extends('layout.adminLTE')
@section('title', $viewData['title'])
@section('innerTitle', $viewData['subtitle'])
@section('content')
@section('plugins.Datatables', true)
    <div class="">
        <div class="card">
            <h5 class="card-header">
                {{__('Person - MOD-CCMS')}}
                @can('profile-create')
                    <a class="btn btn-primary btn-xs register-caseType-btn float-right" href="{{ route('admin.person.create') }}"
                        style="align-self: flex-end"> {{__('Register New person')}}</a>
                @endcan
            </h5>
            <div class="card-body">
                @php
                    $gridData = [
                        'dataProvider' => $dataProvider,
                        'paginatorOptions' => [
                            // Here you can set some options of paginator Illuminate\Pagination\LengthAwarePaginator, used in a package.
                            'pageName' => 'p',
                        ],
                        'rowsPerPage' => 5, // The number of rows in one page. By default 10.
                        'title' => __('Person'), // It can be empty ''
                        'strictFilters' => false, // If true, then a searching by filters will be strict, using an equal '=' SQL operator instead of 'like'.
                        'rowsFormAction' => '/admin/pages/deletion', // Route url to send slected checkbox items for deleting rows, for example.
                        'useSendButtonAnyway' => false, // If true, even if there are no checkbox column, the main send button will be displayed.
                        'searchButtonLabel' => __('Find'),
                        'resetButtonLabel' => __('Reset'),
                        'columnFields' => [
                            
                            [
                                'attribute' => 'id_number',
                                'label' => __('ID'),
                                'value' => function ($row) {
                                    return $row->id_number;
                                },
                            ],
                            [
                                'attribute' => 'name',
                                'label' => __('Full Name'),
                                'value' => function ($row) {
                                    return $row->getFullName();
                                },
                            ],
                            [
                                'attribute' => 'role',
                                'label' => __('Role'),
                                'value' => function ($row) {
                                    return $row->getUserRoles();
                                },
                                //'sort' => 'first_name', // To sort rows. Have to set if an 'attribute' is not defined for column.
                            ],
                            [
                                'attribute' => 'age',
                                'label' => __('Age'),
                                'value' => function ($row) {
                                    return $row->getAge();
                                },
                                //'sort' => 'first_name', // To sort rows. Have to set if an 'attribute' is not defined for column.
                            ],
                            [
                                'label' => __('Login Account'),
                                'value' => function ($row) {
                                    return $row->getLoginCreds();
                                },
                                //'sort' => 'first_name', // To sort rows. Have to set if an 'attribute' is not defined for column.
                            ],

                            __('created_at'), // Simple column setting by string.
                            [
                                // Set Action Buttons.
                                'class' => Itstructure\GridView\Columns\ActionColumn::class, // REQUIRED.
                                'options' => [
                                    'style' => 'background-color: red;',
                                ],
                                'actionTypes' => [
                                    // REQUIRED.
                                    'view' => function ($data) {
                                        return '/admin/person/show/' . $data->id;
                                    },
                                    'edit' => function ($data) {
                                        return '/admin/person/' . $data->id . '/edit';
                                    },
                                    [
                                        'class' => Itstructure\GridView\Actions\Delete::class, // REQUIRED
                                        'url' => function ($data) {
                                            return '/admin/person/' . $data->id . '/delete';
                                        },
                                        'htmlAttributes' => [
                                            'target' => '_self',
                                            'style' => 'color: yellow; font-size: 16px;',
                                            'onclick' => 'return window.confirm("Sure to delete?");',
                                        ],
                                    ],
                                ],
                            ],
                            // [
                            //     // For this case checkboxes will be rendered according with: <input type="checkbox" name="delete[]" value="{{ $row->id }}" />
                            //     'class' => Itstructure\GridView\Columns\CheckboxColumn::class, // REQUIRED.
                            //     'field' => 'delete', // REQUIRED.
                            //     'attribute' => 'id', // REQUIRED.
                            //     // 'display' => function ($row) {
                            //     //     return {...condition to return true for displaying...};
                            //     // }
                            // ],
                        ],
                    ];
                @endphp
                @gridView($gridData)
            </div>
        </div>
    </div>
@endsection
