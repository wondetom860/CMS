@extends('layout.mystore')
@section('title', $viewData['title'])
@section('innerTitle', $viewData['title'])
@section('content')
    <div class="container d-flix align-items-center flex-column">
        <div class="card">
            <h4 class="card-header">
                Cases - CCMS
                <a class="btn btn-primary btn-xs register-case-btn" href="{{ route('case.create') }}"
                    style="align-self: flex-end">Register Case</a>
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
                        'title' => 'Cases', // It can be empty ''
                        'strictFilters' => true, // If true, then a searching by filters will be strict, using an equal '=' SQL operator instead of 'like'.
                        'rowsFormAction' => '/admin/pages/deletion', // Route url to send slected checkbox items for deleting rows, for example.
                        'useSendButtonAnyway' => true, // If true, even if there are no checkbox column, the main send button will be displayed.
                        'searchButtonLabel' => 'Find',
                        'columnFields' => [
                            [
                                'attribute' => 'Case_number', // REQUIRED if value is not defined. Attribute name to get row column data.
                                'label' => 'case_number', // Column label.
                                // 'filter' => false, // If false, then column will be without a search filter form field.,
                                'value' => function ($row) {
                                    return $row->case_number;
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
                                'label' => 'Court',
                                'attribute' => 'court_name',
                                'value' => function ($row) {
                                    return $row->court->name;
                                },
                            ],
                            [
                                'label' => 'Cause of Action',
                                'value' => function ($row) {
                                    return $row->cause_of_action;
                                },
                                //'sort' => 'first_name', // To sort rows. Have to set if an 'attribute' is not defined for column.
                            ],
                            [
                                'label' => 'Case Type', // Column label.
                                'attribute' => 'case_type_case_type_name', // Attribute, by which the row column data will be taken from a model.
                                'value' => function ($row) {
                                    return $row->caseType->case_type_name;
                                },
                            ],
                            [
                                'label' => 'Date Reported', // Column label.
                                'attribute' => 'start_date', // Attribute, by which the row column data will be taken from a model.
                                'value' => function ($row) {
                                    return $row->start_date;
                                },
                            ],
                            [
                                'attribute' => 'Status',
                                'value' => function($model){
                                    return $model->getStatus();
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
                                        return '/case/show/' . $data->id ;
                                    },
                                    'edit' => function ($data) {
                                        if (Auth::user()->can('case-edit')) {
                                            return '/case/' . $data->id . '/edit';
                                        } else {
                                            return false;
                                        }
                                    },
                                //      @can('case-edit')
                                    //     'edit' => function ($data) {
                                    //         return '/case/' . $data->id . '/edit';
                                    //      },
                                //      ,@endcan
                                //      @can('case-edit')
                                        // [
                                        // 'class' => Itstructure\GridView\Actions\Edit::class, // REQUIRED
                                        // 'url' => function ($data) {
                                        //     return '/case'.'/'. $data->id . '/edit';
                                        // },
                                        // 'visible' => Auth::user()->can('case-edit'),
                                        // ],
                                //     @endcan
                                    [
                                        'class' => Itstructure\GridView\Actions\Delete::class, // REQUIRED
                                        'url' => function ($data) {
                                            if (Auth::user()->can('case-delete')) {
                                                return '/case/'. $data->id . '/delete';
                                        } else {
                                            return false;
                                        }
                                        },
                                        'htmlAttributes' => [
                                            'target' => '_blank',
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
