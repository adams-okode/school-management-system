@extends('layouts.master')

@section('breadcrumb')
<ol class="breadcrumb hide-phone p-0 m-0">
    <li class="active">
        <a href="{{ url('/dashboard') }}"> Dashboard</a>
    </li>
</ol>
@stop
@section('page_title') Dashboard @stop
@section('content')
<div class="row">
    <div class="row">

                            <div class="col-sm-4">
                                <div class="card-box widget-box-four">
                                    <div id="dashboard-1" class="widget-box-four-chart"><canvas width="80" height="80" style="display: inline-block; width: 80px; height: 80px; vertical-align: top;"></canvas></div>
                                    <div class="wigdet-four-content pull-left">
                                        <h4 class="m-t-0 font-16 m-b-5 text-overflow" title="Total Revenue">Total Revenue</h4>
                                        <p class="font-secondary text-muted">Jan - Apr 2017</p>
                                        <h3 class="m-b-0 m-t-20"><span>$</span> <span data-plugin="counterup">52,548</span></h3>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-sm-4">
                                <div class="card-box widget-box-four">
                                    <div id="dashboard-2" class="widget-box-four-chart"><canvas width="80" height="80" style="display: inline-block; width: 80px; height: 80px; vertical-align: top;"></canvas></div>
                                    <div class="wigdet-four-content pull-left">
                                        <h4 class="m-t-0 font-16 m-b-5 text-overflow" title="Total Unique Visitors">Total Unique Visitors</h4>
                                        <p class="font-secondary text-muted">Jan - Apr 2017</p>
                                        <h3 class="m-b-0 m-t-20"><span>$</span> <span data-plugin="counterup">65,241</span></h3>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-sm-4">
                                <div class="card-box widget-box-four">
                                    <div id="dashboard-3" class="widget-box-four-chart"><canvas width="80" height="80" style="display: inline-block; width: 80px; height: 80px; vertical-align: top;"></canvas></div>
                                    <div class="wigdet-four-content pull-left">
                                        <h4 class="m-t-0 font-16 m-b-5 text-overflow" title="Number of Transactions">Number of Transactions</h4>
                                        <p class="font-secondary text-muted">Jan - Apr 2017</p>
                                        <h3 class="m-b-0 m-t-20"><span>$</span> <span data-plugin="counterup">285,960</span></h3>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div><!-- end col -->

                        </div>
</div>
@stop