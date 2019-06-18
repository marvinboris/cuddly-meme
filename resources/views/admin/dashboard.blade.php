@extends('admin.layout.default')

@section('title') Dashboard @endsection

@section('header_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/vendors/css/charts/chartist.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/vendors/css/charts/chartist-plugin-tooltip.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/css/pages/chat-application.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/css/pages/dashboard-analytics.min.css') }}">
@endsection

@section('content')

<!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- Revenue, Hit Rate & Deals -->
<div class="row">
    <div class="col-lg-8 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">New users chart</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        {{-- <li><button type="button" class="btn btn-glow btn-round btn-bg-gradient-x-red-pink">More</button></li> --}}
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body p-0 pb-0">
                    <div class="chartist">
                        <div id="project-stats" class="height-350 areaGradientShadow1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="row">
            <div class="col-12">
                <div class="card pull-up">
                    <div class="card-header">
                        <h4 class="card-title float-left">Transactions report</h4><a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <span class="badge badge-pill badge-info float-right m-0">@if($has_paid < $registered) In Progress @else Completed @endif</span>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body pt-0 pb-1">
                            <h6 class="text-muted font-small-3"> Payment percent : {{ $has_paid }}/{{ $registered }}</h6>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: {{ 100*$has_paid/$registered }}%" aria-valuenow="{{ $has_paid }}" aria-valuemin="0" aria-valuemax="{{ $registered }}"></div>
                            </div>
                            {{-- <div class="media d-flex">
                                <div class="align-self-center">
                                    <h6 class="text-bold-600 mt-2"> Client: <span class="info">Xeon Inc.</span></h6>
                                    <h6 class="text-bold-600 mt-1"> Deadline: <span class="blue-grey">5th June, 2018</span></h6>
                                </div>
                                <div class="media-body text-right mt-2">
                                    <ul class="list-unstyled users-list">
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="John Doe" class="avatar avatar-sm pull-up">
                                            <img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-19.png" alt="Avatar">
                                        </li>
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Katherine Nichols" class="avatar avatar-sm pull-up">
                                            <img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-18.png" alt="Avatar">
                                        </li>
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Joseph Weaver" class="avatar avatar-sm pull-up">
                                            <img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-17.png" alt="Avatar">
                                        </li>
                                    </ul>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card pull-up bg-gradient-directional-danger">
                    <div class="card-header bg-hexagons-danger">
                        <h4 class="card-title white">Analytics</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li>
                                    <a class="btn btn-sm btn-white danger box-shadow-1 round btn-min-width pull-right" href="#" target="_blank">Report <i class="fa fa-bar-chart"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show bg-hexagons-danger">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center width-100">
                                    <div id="Analytics-donut-chart" class="height-100 donutShadow"></div>
                                </div>
                                <div class="media-body text-right mt-1">
                                    <h3 class="font-large-2 white">{{ $new_users }}</h3>
                                    <h6 class="mt-1"><span class="text-muted white">New users <a href="#" class="darken-2 white">today.</a></span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Revenue, Hit Rate & Deals -->
<!-- Emails Products & Avg Deals -->
<div class="row">
    <div class="col-md-12 col-lg-8">
        <div class="card">
            <div class="card-header p-1">
                <h4 class="card-title float-left">Users payment </h4>
            </div>
            <div class="card-content collapse show">
                <div class="card-footer text-center p-1">
                    <div class="row">
                        <div class="col-md-3 col-12 border-right-blue-grey border-right-lighten-5 text-center">
                            <p class="blue-grey lighten-2 mb-0">Users</p>
                            <p class="font-medium-5 text-bold-400">{{ $registered }}</p>
                        </div>
                        <div class="col-md-3 col-12 border-right-blue-grey border-right-lighten-5 text-center">
                            <p class="blue-grey lighten-2 mb-0">Completed</p>
                            <p class="font-medium-5 text-bold-400">{{ 100*$has_paid / $registered }}%</p>
                        </div>
                        <div class="col-md-3 col-12 border-right-blue-grey border-right-lighten-5 text-center">
                            <p class="blue-grey lighten-2 mb-0">Pending</p>
                            <p class="font-medium-5 text-bold-400">{{ 100 - (100*$has_paid / $registered) }}%</p>
                        </div>
                        <div class="col-md-3 col-12 text-center">
                            <p class="blue-grey lighten-2 mb-0">Blocked users</p>
                            <p class="font-medium-5 text-bold-400">{{ $blocked }}</p>
                        </div>
                    </div>
                    <hr>
                    <span class="text-muted"><a href="#" class="danger darken-2">User payment</a> Statistics</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-4">
        <div class="card pull-up border-top-info border-top-3 rounded-0">
            <div class="card-header">
                <h4 class="card-title">New Users <span class="badge badge-pill badge-info float-right m-0">{{ $new_users }}+</span></h4>
            </div>
            <div class="card-content collapse show">
                <div class="card-body p-1">
                    <h4 class="font-large-1 text-bold-400">{{ $new_users / $registered }}% <i class="fa fa-users float-right"></i></h4>
                </div>
                <div class="card-footer p-1">
                    <span class="text-muted"><i class="la la-arrow-circle-o-up info"></i> {{ $registered }} total users</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Emails Products & Avg Deals -->
<!-- Chat and Recent Projects -->
<div class="row match-height">{{--
    <div class="col-xl-4 col-lg-6 col-md-12">
        <div class="card card-transparent">
            <div class="card-header bg-transparent pl-0">
                <h5 class="card-title text-bold-700">Project Income</h5>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            </div>
            <div class="card-content">
                <div id="project-income-chart" class="height-450 BarChartShadow"></div>
            </div>
        </div>
    </div> --}}
    <div class="col-xl-12 col-lg-12 col-md-12">
        <h5 class="card-title text-bold-700 my-2">Latest Users</h5>
        <div class="card">
            <div class="card-content">
                <div id="recent-projects" class="media-list position-relative">
                    <div class="table-responsive">
                        <table class="table table-padded table-xl mb-0" id="recent-project-table">
                            <thead>
                                <tr>
                                    <th class="border-top-0">Name</th>
                                    <th class="border-top-0">Email</th>
                                    <th class="border-top-0">Country</th>
                                    <th class="border-top-0">Payment status</th>
                                    <th class="border-top-0">Creation date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($latest as $user)
                                <tr>
                                    <td class="text-truncate align-middle">
                                        <a href="#">{{ $user->first_name .' '. $user->last_name }}</a>
                                    </td>
                                    <td class="text-truncate align-middle">
                                        <a href="#">{{ $user->email }}</a>
                                    </td>
                                    <td class="text-truncate align-middle">
                                        <a href="#">{{ $user->city->country->name }}</a>
                                    </td>
                                    <td class="text-truncate align-middle">
                                        <a href="#">{{ $user->status }}</a>
                                    </td>

                                    <td class="text-truncate pb-0">
                                        <span>{{ $user->created_at->toDayDateTimeString() }}</span>
                                        <p class="font-small-2 text-muted">{{ $user->created_at->diffForHumans() }}</p>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Products sell and New Orders -->
        </div>
      </div>
    </div>
    <!-- END: Content-->

@endsection

@section('footer_scripts')
<!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('assets/admin/app-assets/vendors/js/charts/chartist.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/app-assets/vendors/js/charts/chartist-plugin-tooltip.min.js') }}" type="text/javascript"></script>
    <!-- END: Page Vendor JS-->
<script>
$(window).on("load",function(){new Chartist.Line("#project-stats",{labels:["6 days ago","5 days ago","4 days ago","3 days ago","2 days ago","Yesterday","Today"],series:[[{{$charts[0]}},{{$charts[1]}},{{$charts[2]}},{{$charts[3]}},{{$charts[4]}},{{$charts[5]}},{{$charts[6]}}]/*,[75,120,50,80,130,60,120],[110,50,70,20,90,150,0]*/]},{lineSmooth:Chartist.Interpolation.simple({divisor:2}),fullWidth:!0,showArea:!0,chartPadding:{right:35},axisX:{showGrid:!1},axisY:{labelInterpolationFnc:function(e){return e+""},scaleMinSpace:40,showGrid:!1},plugins:[Chartist.plugins.tooltip({appendToBody:!0,pointClass:"ct-point"})],low:0,onlyInteger:!0}).on("created",function(e){var t=e.svg.querySelector("defs")||e.svg.elem("defs");return t.elem("linearGradient",{id:"area-gradient",x1:1,y1:0,x2:0,y2:0}).elem("stop",{offset:0,"stop-color":"rgba(248,161,236, 1)"}).parent().elem("stop",{offset:1,"stop-color":"rgba(115,150,255, 1)"}),t}).on("draw",function(e){if("point"===e.type){var t=new Chartist.Svg("circle",{cx:e.x,cy:e.y,"ct:value":e.y,r:9,class:180===e.value.y||150===e.value.y?"ct-point-circle ct-point":"ct-point ct-point-circle-transperent"});e.element.replace(t)}"line"!==e.type&&"area"!=e.type||e.element.animate({d:{begin:1e3,dur:1e3,from:e.path.clone().scale(1,0).translate(0,e.chartRect.height()).stringify(),to:e.path.clone().stringify(),easing:Chartist.Svg.Easing.easeOutQuint}})});var e=new Chartist.Pie("#Analytics-donut-chart",{series:[100],labels:["iOS"]},{donut:!0,labelInterpolationFnc:function(e){return""},donutSolid:!0,total:100,donutWidth:5});e.on("draw",function(e){"label"===e.type&&(0===e.index?e.element.attr({dx:e.element.root().width()/2,dy:(e.element.root().height()+e.element.height()/4)/2,class:"ct-label","font-family":"feather"}):e.element.remove())}),e.on("created",function(e){var t=e.svg.querySelector("defs")||e.svg.elem("defs");return t.elem("linearGradient",{id:"donutGradient1",x1:0,y1:1,x2:0,y2:0}).elem("stop",{offset:"0%","stop-color":"rgba(250,203,205,1)"}).parent().elem("stop",{offset:"95%","stop-color":"rgba(250,203,205, 0.7)"}),t});var t=new Chartist.Bar("#project-income-chart",{labels:["2017","2016","2015","2014","2013","2012"],series:[[8e3,12e3,14e3,13e3,9e3,7e3]]},{axisY:{labelInterpolationFnc:function(e){return e/1e3+"k"},scaleMinSpace:50,showGrid:!1},axisX:{showGrid:!1},plugins:[Chartist.plugins.tooltip({appendToBody:!0,pointClass:"ct-point"})]});t.on("draw",function(e){"bar"===e.type&&(e.element.attr({style:"stroke-width: 30px",y1:400,x1:e.x1+.001}),e.group.append(new Chartist.Svg("circle",{cx:e.x2,cy:e.y2,r:15},"ct-slice-pie")))}),t.on("created",function(e){var t=e.svg.querySelector("defs")||e.svg.elem("defs");return t.elem("linearGradient",{id:"barGradient2",x1:0,y1:0,x2:0,y2:1}).elem("stop",{offset:"10%","stop-color":"rgba(249,111,155,0.9)"}).parent().elem("stop",{offset:"90%","stop-color":"rgba(105,103,206,0.8)"}),t}),new Chartist.Line("#new-projects",{labels:["Jan","Feb","Mar","Apr","May"],series:[[90,325,225,600,200],[590,90,300,150,500]]},{low:0,fullWidth:!0,onlyInteger:!0,axisY:{low:0,scaleMinSpace:50},axisX:{showGrid:!1},chartPadding:{right:25},lineSmooth:Chartist.Interpolation.simple({divisor:2}),plugins:[Chartist.plugins.tooltip({appendToBody:!0,pointClass:"ct-point-circle"})]}).on("created",function(e){var t=e.svg.querySelector("defs")||e.svg.elem("defs");return t.elem("linearGradient",{id:"linear6",x1:0,y1:1,x2:0,y2:0}).elem("stop",{offset:0,"stop-color":"rgba(45,121,255,0.7)"}).parent().elem("stop",{offset:1,"stop-color":"rgba(249,81,255, 0.7)"}),t.elem("linearGradient",{id:"linear7",x1:0,y1:1,x2:1,y2:0}).elem("stop",{offset:0,"stop-color":"rgba(247,214,142,1)"}).parent().elem("stop",{offset:1,"stop-color":"rgba(248,120,131, 1)"}),t}).on("draw",function(e){if("point"===e.type){var t=new Chartist.Svg("circle",{cx:e.x,cy:e.y,"ct:value":e.y,r:10,class:600===e.value.y?"ct-point-circle":"ct-point-circle-transperent"});e.element.replace(t)}"line"===e.type&&e.element.animate({d:{begin:1e3,dur:1e3,from:e.path.clone().scale(1,0).translate(0,e.chartRect.height()).stringify(),to:e.path.clone().stringify(),easing:Chartist.Svg.Easing.easeOutQuint}})});new PerfectScrollbar(".chats",{wheelPropagation:!1})});
</script>
@endsection
