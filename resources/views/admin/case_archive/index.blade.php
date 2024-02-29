@extends('layout.adminLTE')
@section('title', $viewData['title'])
@section('innerTitle', $viewData['subtitle'])
@section('content')
@section('plugins.Datatables', true)
    <div class="">
        <div class="card">
            <h5 class="card-header">
                {{__('Case Archive - MOD-CCMS')}}
                @can('archive-create')
                    <a class="btn btn-primary btn-xs register-caseType-btn float-right" href="{{ route('admin.case_archive.create') }}"
                        style="align-self: flex-end"> {{__('Add New Archive')}}</a>
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
                        'title' => __('Case Archive'), // It can be empty ''
                        'strictFilters' => false, // If true, then a searching by filters will be strict, using an equal '=' SQL operator instead of 'like'.
                        'rowsFormAction' => '/admin/pages/deletion', // Route url to send slected checkbox items for deleting rows, for example.
                        'useSendButtonAnyway' => false, // If true, even if there are no checkbox column, the main send button will be displayed.
                        'searchButtonLabel' => __('Find'),
                        'resetButtonLabel' => __('Reset'),
                        'columnFields' => [
                            
                            [
                                'attribute' => 'event_id',
                                'label' => __('Event Id'),
                                'value' => function ($row) {
                                    return $row->event_id;
                                },
                            ],
                            [
                                'attribute' => 'case_id',
                                'label' => __('Case Id'),
                                'value' => function ($row) {
                                    return $row->case_id;
                                },
                               
                            ],
                            [
                                'attribute' => 'file_type',
                                'label' => __('File Type'),
                                'value' => function ($row) {
                                    return $row->file_type;
                                },
                               
                            ],
                            [
                                'attribute' => 'file_path',
                                'label' => __('File Path'),
                                'value' => function ($row) {
                                    return $row->file_path;
                                },
                               
                            ],
                            [
                                'attribute' => 'description',
                                'label' => __('Description'),
                                'value' => function ($row) {
                                    return $row->description;
                                },
                               
                            ],
                            [
                                'attribute' => 'remark',
                                'label' => __('Remark'),
                                'value' => function ($row) {
                                    return $row->remark;
                                },
                               
                            ],

                            __('created_at'), // Simple column setting by string.
                            [
                                'attribute' => 'archived_by',
                                'label' => __('Archived By'),
                                'value' => function ($row) {
                                    return $row->archived_by;
                                },
                               
                            ],
                            [
                                // Set Action Buttons.
                                'class' => Itstructure\GridView\Columns\ActionColumn::class, // REQUIRED.
                                'options' => [
                                    'style' => 'background-color: red;',
                                ],
                                'actionTypes' => [
                                    // REQUIRED.
                                    'view' => function ($data) {
                                        return '/admin/case-archive/show/' . $data->id;
                                    },
                                    'edit' => function ($data) {
                                        return '/admin/case-archive/' . $data->id . '/edit';
                                    },
                                    [
                                        'class' => Itstructure\GridView\Actions\Delete::class, // REQUIRED
                                        'url' => function ($data) {
                                            return '/admin/case_archive/' . $data->id . '/delete';
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
