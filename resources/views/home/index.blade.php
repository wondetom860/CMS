@extends('layout.mystore')
@section('title', $viewData['title'])
@section('content')
    <div class="container-fluid d-flix align-items-center flex-column" style="background-color: #E6EDf5;">
        <div class="row p1 rounded-left" style="margin-bottom: 15%">
            <header>
                <div class="container d-flex align-items-center flex-column">
                    <h2>@yield('subtitle', 'About MoD-CMS')</h2>
                </div>
            </header>
            <header>
                <div class="container d-flex align-items-center flex-column">
                    <h6>@yield(
                        'subtitle',
                        'Courts in Ethiopia Defence Force: 
                                                                A brief note on Courts in Ethiopia and their structure.
                                                                
                                                                As keepers, fountains of justice, Ethiopian courts have been playing significant roles (still they could do more) in the administration of justice. Since the Ethiopian State is federal, the courts, whose independence and significance is assured in the FDRE Constitution, are generally structured at federal and state levels. These constitutionally recognized adjudicatory organs are mostly the ordinary courts of law. City and social courts dealing with frequent and/or minor municipal matters are as well other feature of the judicial system in Ethiopia (Addis Ababa City Courts could be illustrious here). Quasi-judicial organs such as the Labor Relations Board (established by the labour law) and Tax Appeal Tribunal (established 
                                                                Search For Legal Articles
                                                                
                                                                by tax laws) are other interesting components in the administration of justice. There are also religious and customary courts with limited jurisdiction focusing on maters of personal relations with the consent of disputing parties. Indeed the House of Federation (the upper house of the two parliaments), having the jurisdiction to adjudicate constitutional matters, could also be mentioned in passing'
                    )</h4>
                </div>
            </header>
            <header>
                <div class="container d-flex align-items-center flex-column">
                    <h2>@yield('subtitle', '')</h2>
                    <h2>@yield('subtitle', '')</h2>
                    <h2>@yield('subtitle', 'Chief-Staffs')</h2>

                </div>
            </header>
            <div class="card col-lg-3 col-md-3 col-sm-12 text-center mx-auto">
                <img class="card-img-top rounded-left img-fluid" src="{{ asset('/images/3.jpg') }}" alt="Card image">
                <div class="card-body">

                </div>
            </div>
            <div class="card col-lg-3 col-md-3 col-sm-12 text-center mx-auto">
                <img class="card-img-top rounded-left img-fluid" src="{{ asset('/images/2.webp') }}" alt="Card image">
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
@endsection
