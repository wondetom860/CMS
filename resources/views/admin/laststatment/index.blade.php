@extends('layout.adminLTE')
@section('title', $viewData['title'])
@section('innerTitle', $viewData['subtitle'])
@section('content')
    <div class="">
        <div class="card">
            {{-- <img src="{{ asset($row->Image) }}" style="width:80px; height:80px; border-radius:50%;" alt=""> --}}
            <h4 class="card-header">
                {{__('LastStatment - MOD-CCMS')}}
                @can('laststatment-create')
                    <a class="btn btn-primary btn-xs register-caseType-btn float-right"
                        href="{{ route('admin.laststatment.create') }}" style="align-self: flex-end">{{__('Register New LastStatment')}}</a>
                @endcan
            </h4>
            <div class="card-body">
                @php
                    $gridData = [
                        'dataProvider' => $dataProvider,
                        'paginatorOptions' => [
                            // Here you can set some options of paginator Illuminate\Pagination\LengthAwarePaginator, used in a package.
                            'pageName' => 'p',
                        ],
                        'rowsPerPage' => 5, // The number of rows in one page. By default 10.
                        'title' => __('LastStatment'), // It can be empty ''
                        'strictFilters' => true, // If true, then a searching by filters will be strict, using an equal '=' SQL operator instead of 'like'.
                        'rowsFormAction' => '/admin/pages/deletion', // Route url to send slected checkbox items for deleting rows, for example.
                        'useSendButtonAnyway' => false, // If true, even if there are no checkbox column, the main send button will be displayed.
                        'searchButtonLabel' => __('Find'),
                        'resetButtonLabel' => __('Reset'),
                        'columnFields' => [
                            [
                                'attribute' => 'case_number', // REQUIRED if value is not defined. Attribute name to get row column data.
                                'label' => __('Case Number'), // Column label.
                                // 'filter' => false, // If false, then column will be without a search filter form field.,
                                'value' => function ($row) {
                                    return $row->case->case_number;
                                },
                                'htmlAttributes' => [
                                    'width' => '15%', // Width of table column.
                                ],
                            ],
                            // [
                            //     'attribute' => 'Submitted By',
                            //     'label' => 'Submitted By',
                            //     'value' => function ($row) {
                            //         return $row->courtStaff->person->getFullName();
                            //     },
                            //     'htmlAttributes' => [
                            //         'width' => '15%',
                            //     ],
                            // ],
                            // [
                            //     'label' => 'Active', // Column label.
                            //     'value' => function ($row) {
                            //         // You can set 'value' as a callback function to get a row data value dynamically.
                            //         return '<span class="icon fas ' . ($row->logo_image_path == 1 ? 'fa-check' : 'fa-times') . '"></span>';
                            //     },
                            //     'filter' => [
                            //         // For dropdown it is necessary to set 'data' array. Array keys are for html <option> tag values, array values are for titles.
                            //         'class' => Itstructure\GridView\Filters\DropdownFilter::class, // REQUIRED. For this case it is necessary to set 'class'.
                            //         'name' => 'active', // REQUIRED if 'attribute' is not defined for column.
                            //         'data' => [
                            //             // REQUIRED.
                            //             0 => 'No active',
                            //             1 => 'Active',
                            //         ],
                            //     ],
                            //     'format' => 'html', // To render column content without lossless of html tags, set 'html' formatter.
                            //     'sort' => 'active', // To sort rows. Have to set if an attribute is not defined for column.
                            // ],
                            // [
                            //     'label' => 'Icon', // Column label.
                            //     'value' => function ($row) {
                            //         // You can set 'value' as a callback function to get a row data value dynamically.
                            //         return $row->icon;
                            //     },
                            //     'filter' => false, // If false, then column will be without a search filter form field.
                            //     'format' => [
                            //         // Set special formatter. If $row->icon value is a url to image, it will be inserted in to 'src' attribute of <img> tag.
                            //         'class' => Itstructure\GridView\Formatters\ImageFormatter::class, // REQUIRED. For this case it is necessary to set 'class'.
                            //         'htmlAttributes' => [
                            //             // Html attributes for <img> tag.
                            //             'width' => '100',
                            //         ],
                            //     ],
                            // ],
                            
                            [
                                'label' => __('Judges'), // Column label.
                                'attribute' => 'judges', // Attribute, by which the row column data will be taken from a model.
                                'value' => function ($row) {
                                    return $row->judges;
                                },
                            ],
                            [
                                'label' => __('Date'), // Column label.
                                'attribute' => 'date_time', // Attribute, by which the row column data will be taken from a model.
                                'value' => function ($row) {
                                    return $row->getDate();
                                },
                            ],
                            [
                                'label' => __('Decision'), // Column label.
                                'attribute' => 'statement_description', // Attribute, by which the row column data will be taken from a model.
                                'value' => function ($row) {
                                    return $row->statement_description;
                                },
                            ],
                            
                            [
                                'label' => __('Evenet'), // Column label.
                                'attribute' => 'event_id',
                                'value' => function ($row) 
                                {
                                    return $row->event ? $row->event->eventType->event_type_name : "-";
                                },
                
                               
                            ],
                            [
                                'label' => __('Written By'), // Column label.
                                'attribute' => 'writtenBy',
                                'value' => function ($row) 
                                {
                                    return $row->writtenBy->user_name;
                                },
                
                               
                            ],
                            [
                                'label' => __('remark'), // Column label.
                                'attribute' => 'remark', // Attribute, by which the row column data will be taken from a model.
                                'value' => function ($row) {
                                    return $row->remark;
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
                                        return '/admin/laststatment/show/' . $data->id;
                                    },
                                    'edit' => function ($data) {
                                        return '/admin/laststatment/' . $data->id . '/edit';
                                    },
                                    [
                                        'class' => Itstructure\GridView\Actions\Delete::class, // REQUIRED
                                        'url' => function ($data) {
                                            return '/admin/laststatment/' . $data->id . '/delete';
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
        <script>
            const showDocument = (doc_id) => {
                $('#myForm').trigger("reset");
                $('#formModal').modal('show');
                $("#modal_body").html("Laoding image will be implemented soon...");
            }
        </script>
    </div>
@endsection

<div class="modal fade" id="formModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="formModalLabel">Case Document
                </h4>
            </div>
            <div class="modal-body" id="modal_body">

            </div>
        </div>
    </div>
</div>
