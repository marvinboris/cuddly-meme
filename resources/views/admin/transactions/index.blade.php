@extends('admin.layout.default')

@section('title')
    Payments
@endsection

@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Payments</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active"><a href="#">Payments</a>
                            </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">


                <!-- Scroll - horizontal table -->
                <section id="horizontal">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">

                                    <h4 class="card-title">Payments list</h4>

                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table display nowrap table-striped table-bordered zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>User</th>
                                                        <th>Method</th>
                                                        <th>Amount</th>
                                                        <th>Status</th>
                                                        <th>Transaction ID</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($transactions as $transaction)
                                                    <tr>
                                                        <td>
                                                            <a href="{{ route('admin.users.show', [$transaction->user->id]) }}" title="See {{ $transaction->user->first_name }} profile">
                                                                {{ $transaction->user->first_name . ' ' . $transaction->user->last_name }}
                                                            </a>
                                                        </td>
                                                        <td>{{ $transaction->method }}</td>
                                                        <td>$ {{ round($transaction->amount,2) }}</td>
                                                        <td>{{ $transaction->status }}</td>
                                                        <td>{{ $transaction->tx_id }}</td>
                                                        <td>{{ $transaction->created_at }}</td>
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
                </section>
            </div>
        </div>
    </div>
<!-- END: Content-->
