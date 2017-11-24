@extends('layouts.master')

@section('breadcrumb')
<ol class="breadcrumb hide-phone p-0 m-0">
    <li class="active">
    	<a href="{{ url('/dashboard') }}"> Dashboard</a>/
        <a href="{{ url('/finance') }}"> Finance</a>
    </li>
</ol>
@stop
@section('page_title') Finance @stop
@section('content')
<div class="row">
    <div class="col-sm-2">
                        <div class="card-box">
                            <div class="tabs-vertical-env">
                            <ul class="nav tabs-vertical">
                                <li class="active">
                                    <a href="{{url('/suppliers') }}"  aria-expanded="false">
                                        <span class="visible-xs">Suppliers</span>
                                        <span class="hidden-xs">Suppliers</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#customers" aria-expanded="true">
                                        <span class="visible-xs">Customers</span>
                                        <span class="hidden-xs">Customers</span>
                                    </a>
                                </li>
                             <li class="">
                                    <a href="#student" aria-expanded="false">
                                        <span class="visible-xs">Student Finance</span>
                                        <span class="hidden-xs">Student Finance</span>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="#billing"  aria-expanded="false">
                                        <span class="visible-xs">Billing</span>
                                        <span class="hidden-xs">Billing</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#receivables" aria-expanded="false">
                                        <span class="visible-xs">Receivables</span>
                                        <span class="hidden-xs">Receivables</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#vouchers"  aria-expanded="false">
                                        <span class="visible-xs">Payment Vouchers</span>
                                        <span class="hidden-xs">Payment Vouchers</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#reconciliation"  aria-expanded="false">
                                        <span class="hidden-xs">Reconciliation</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#statements" aria-expanded="false">
                                        <span class="hidden-xs">Statements</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#settings"  aria-expanded="false">
                                        <span class="hidden-xs">Settings</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                         </div>
                     </div>
                          <div class="col-sm-10">
                        <div class="card-box">
                            <h4 class="header-title m-t-0 m-b-30 text-warning">Finance Setup</h4>
                                <ul class="nav nav-tabs tabs-bordered">
                                    <li class="active">
                                        <a href="#payment" data-toggle="tab" aria-expanded="false">Payment Mode</a>
                                    </li>
                                    <li class="">
                                        <a href="#customer" data-toggle="tab" aria-expanded="true">Customer Category</a>
                                    </li>
                                    <li class="">
                                        <a href="#ledgers" data-toggle="tab" aria-expanded="false">Ledgers</a>
                                    </li>
                                    <li class="">
                                        <a href="#year_setup" data-toggle="tab" aria-expanded="false">Financial Year Setup</a>
                                    </li>
                                    <li class="">
                                        <a href="#currencies" data-toggle="tab" aria-expanded="false">Currencies</a>
                                    </li>
                                    <li class="">
                                        <a href="#votehead" data-toggle="tab" aria-expanded="false">Votehead Setup</a>
                                    </li>
                                    <li class="">
                                        <a href="#bank_setup" data-toggle="tab" aria-expanded="false">Bank Setup</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane" id="payment">
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                                        <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                    </div>
                                    <div class="tab-pane active" id="customer">
                                        <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                                    </div>
                                    <div class="tab-pane" id="ledgers">
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                                        <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                    </div>
                                    <div class="tab-pane" id="year_setup">
                                        <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                                    </div>
                                      <div class="tab-pane" id="currencies">
                                        <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                                    </div>
                                      <div class="tab-pane" id="votehead">
                                        <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                                    </div>
                                      <div class="tab-pane" id="bank_setup">
                                        <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
               </div>

@stop