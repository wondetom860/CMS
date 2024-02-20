@extends('layout.admin')
@section('title', $viewData['title'])
@section('innerTitle', $viewData['subtitle'])
@section('content')
    <div class="container d-flix align-items-center flex-column">
        <div class="card">
            <h4 class="card-header">
                Assign Staff To case- Admin Panel - MOD-CCMS
                <a class="btn btn-primary btn-xs float-end" href="{{ route('admin.case_staff_assignments.create') }}">Assign
                    The Case</a>
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
                       // 'title' => 'Assign Staff To case', // It can be empty ''
                        'strictFilters' => true, // If true, then a searching by filters will be strict, using an equal '=' SQL operator instead of 'like'.
                        'rowsFormAction' => '/admin/pages/deletion', // Route url to send slected checkbox items for deleting rows, for example.
                        'useSendButtonAnyway' => true, // If true, even if there are no checkbox column, the main send button will be displayed.
                        'searchButtonLabel' => 'Find',
                        'columnFields' => [
                            [
                                'attribute' => 'case_number', // REQUIRED if value is not defined. Attribute name to get row column data.
                                'label' => 'Case Number', // Column label.
                                // 'filter' => false, // If false, then column will be without a search filter form field.,
                                'value' => function ($row) {
                                    return $row->case->case_number;
                                },
                                'htmlAttributes' => [
                                    'width' => '15%', // Width of table column.
                                ],
                            ],
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
                                'label' => 'Court Staff',
                                'attribute' => 'courtStaff',
                                'value' => function ($row) {
                                    return $row->courtStaff->person->getFullName();
                                },
                            ],
                            [
                                'label' => 'Assigned As', // Column label.
                                'attribute' => 'assigned_as', // Attribute, by which the row column data will be taken from a model.
                                'value' => function ($row) {
                                    return $row->assigned_as;
                                },
                            ],
                            [
                                'label' => 'Assigned At', // Column label.
                                'attribute' => 'assigned_at', // Attribute, by which the row column data will be taken from a model.
                                'value' => function ($row) {
                                    return $row->assigned_at;
                                },
                            ],
                            [   'label' => 'Assigned By', // Column label.
                                'attribute' => 'assignedBy',
                                'value' => function($row){
                                    return $row->assignedBy->user_name;
                                }
                            ],
                           
                            [
                                // Set Action Buttons.
                                'class' => Itstructure\GridView\Columns\ActionColumn::class, // REQUIRED.
                                'options' => [
                                    'style' => 'background-color: red;'
                                ],
                                'actionTypes' => [
                                    // REQUIRED.
                                    'view' => function ($data) {
                                        return '/admin/case_staff_assignments/show/' . $data->id ;
                                    },
                                    'edit' => function ($data) {
                                        return '/admin/case_staff_assignments/' . $data->id . '/edit';
                                    },
                                    [
                                        'class' => Itstructure\GridView\Actions\Delete::class, // REQUIRED
                                        'url' => function ($data) {
                                            return '/admin/case_staff_assignments/'. $data->id . '/delete';
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
