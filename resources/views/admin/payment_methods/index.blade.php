@extends('admin.layout.default')

@section('title')
    Payment options
@endsection

@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Payment options</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active"><a href="#">Payment options</a>
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

                                    <h4 class="card-title">Payment option list</h4>

                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    {{-- <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <button class="btn btn-success" data-toggle="modal" data-target="#addModal">
                                                <i class="fa fa-plus"></i> Add
                                            </button>
                                        </ul>
                                    </div> --}}
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table display nowrap table-striped table-bordered zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Enabled?</th>
                                                        <th>Payments</th>
                                                        <th>Logo</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($paymentMethods as $paymentMethod)
                                                    <tr>
                                                        <td>{{ $loop->index +1 }}</td>
                                                        <td>{{ $paymentMethod->vendor }}</td>
                                                        <td>{{ $paymentMethod->deleted_at ? 'NO':'YES' }}</td>
                                                        <td>{{ $paymentMethod->transactions->count() }}</td>
                                                        <td>
                                                            @if($paymentMethod->logosrc)
                                                                <img src="{{ url($paymentMethod->logosrc) }}" class="img-border height-100" alt="Card image">
                                                            @else
                                                                No image
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="btn-group">
                                                                @if($paymentMethod->deleted_at)
                                                                <form method="POST" action="{{ route('admin.payment_methods.restore', [$paymentMethod->id]) }}">
                                                                    @csrf @method('PUT')
                                                                    <button type="submit" class="btn btn-warning" title="Enable">
                                                                        <i class="fa fa-unlock"></i>
                                                                    </button>
                                                                </form>
                                                                @else
                                                                    <form method="POST" action="{{ route('admin.payment_methods.destroy', [$paymentMethod->id]) }}">
                                                                        @csrf @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger" title="Disable">
                                                                            <i class="fa fa-lock"></i>
                                                                        </button>
                                                                    </form>
                                                                @endif
                                                            </div>
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
                </section>
            </div>
        </div>
    </div>
<!-- END: Content-->

{{-- <form action="{{ route('admin.payment_options.store')}}" method="POST" id="addForm"  enctype="multipart/form-data">
    @csrf
    <div class="modal" tabindex="-1" role="dialog" id="addModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add new payment option</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="userinput1">Name <sup style="color:red;">*</sup></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" required placeholder="Name" name="name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="description">Description</label>
                        <div class="col-md-9">
                            <textarea name="description" rows="3" placeholder="Description..." class="form-control" id="description"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 label-control">Logo <sup style="color:red;">*</sup></label>
                        <div class="col-md-9">
                            <input type="file" accept="image/*" class="form-control" required placeholder="Choose logo" name="logo_file">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form> --}}
@endsection
