@extends('admin.layout.default')

@section('title')
    Activity areas
@endsection

@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Activity areas</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active"><a href="#">Activity areas</a>
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
                        <form class="col-12" method="POST" action="{{ route('admin.activity_areas.multi-delete') }}">
                            @csrf
                            @method('delete')
                            <div class="card">
                                <div class="card-header">

                                    <h4 class="card-title">Activity area list</h4>

                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#addModal">
                                                <i class="fa fa-plus"></i> Add
                                            </button>
                                            <button class="btn btn-danger" type="submit">
                                                <i class="fa fa-minus"></i> Delete
                                            </button>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table display nowrap table-striped table-bordered zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <input type="checkbox" name="all" id="select-all">
                                                        </th>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Description</th>
                                                        <th>Enabled?</th>
                                                        <th>Added at</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($activities as $activity)
                                                    <tr>
                                                        <th>
                                                            <input type="checkbox" name="checkboxArray[]" class="checkbox" value="{{ $activity->id }}">
                                                        </th>
                                                        <td>{{ $loop->index +1 }}</td>
                                                        <td>{{ $activity->name }}</td>
                                                        <td>{{ $activity->description }}</td>
                                                        <td>{{ $activity->deleted_at ? 'NO':'YES' }}</td>
                                                        <td>{{ $activity->created_at }}</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                @if($activity->deleted_at)
                                                                <form method="POST" action="{{ route('admin.activity_areas.restore', [$activity->id]) }}">
                                                                    @csrf @method('PUT')
                                                                    <button type="submit" class="btn btn-warning" title="Enable">
                                                                        <i class="fa fa-unlock"></i>
                                                                    </button>
                                                                </form>
                                                                @else
                                                                    <form method="POST" action="{{ route('admin.activity_areas.destroy', [$activity->id]) }}">
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
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
<!-- END: Content-->

<form action="{{ route('admin.activity_areas.store')}}" method="POST" id="addForm">
    @csrf
    <div class="modal" tabindex="-1" role="dialog" id="addModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add new activity area</h5>
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

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('footer_scripts')
    @include('partials.multi-delete-script')
@endsection