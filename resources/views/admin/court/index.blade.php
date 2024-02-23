@extends('layout.adminLTE')
@section('title', $viewData['title'])
@section('innerTitle', $viewData['subtitle'])
@section('content')
    <div class="">
        <div class="card">
            <h5 class="card-header bg-light">
                Courts - Admin Panel - MOD-CCMS
                @can('court-create')
                    <a class="btn btn-primary btn-xs register-caseType-btn" href="{{ route('admin.court.create') }}"
                        style="align-self: flex-end">Register New Court</a>
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
                        'title' => 'Courts', // It can be empty ''
                        'strictFilters' => true, // If true, then a searching by filters will be strict, using an equal '=' SQL operator instead of 'like'.
                        'rowsFormAction' => '/admin/pages/deletion', // Route url to send slected checkbox items for deleting rows, for example.
                        'useSendButtonAnyway' => true, // If true, even if there are no checkbox column, the main send button will be displayed.
                        'searchButtonLabel' => 'Find',
                        'columnFields' => [
                            [
                                'attribute' => 'name', // REQUIRED if value is not defined. Attribute name to get row column data.
                                'label' => 'Court Name', // Column label.
                                // 'filter' => false, // If false, then column will be without a search filter form field.,
                                'htmlAttributes' => [
                                    'width' => '15%', // Width of table column.
                                ],
                            ],
                            // [
                            //     'label' => 'court_id', // Column label.
                            //     'filter' => Arr::map(Court::all(), function($model){
                            //         return $model->name;
                            //     }),
                            // ],
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
                            [
                                'attribute' => 'Active Cases',
                                'value' => function ($model) {
                                    return $model->getActiveCases();
                                },
                            ],
                            // 'created_at', // Simple column setting by string.
                            [
                                // Set Action Buttons.
                                'class' => Itstructure\GridView\Columns\ActionColumn::class, // REQUIRED.
                                'options' => [
                                    'style' => 'background-color: red;',
                                ],
                                'actionTypes' => [
                                    // REQUIRED.
                                    'view' => function ($data) {
                                        return '/admin/court/show/' . $data->id;
                                    },
                                    'edit' => function ($data) {
                                        return '/admin/court/' . $data->id . '/edit';
                                    },
                                    [
                                        'class' => Itstructure\GridView\Actions\Delete::class, // REQUIRED
                                        'url' => function ($data) {
                                            return '/admin/court/' . $data->id . '/delete';
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
