@extends('admin.layout.default')

@section('title')
    Users
@endsection

@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Users</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active"><a href="#">Users</a>
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
                                    <h4 class="card-title">Users list</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table display nowrap table-striped table-bordered zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                        <th>Email</th>
                                                        <th>Activity</th>
                                                        <th>Link</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($users as $user)
                                                    <tr>
                                                        <td>{{ $user->first_name }}</td>
                                                        <td>{{ $user->last_name }}</td>
                                                        <td>{{ $user->email }}</td>{{--
                                                        <td>{{ strtoupper($user->sex) == 'M' ? 'Homme':'Femme' }}</td>
                                                        @if($user->birthdate)
                                                            <td>{{ date('Y') - \Carbon\Carbon::createFromFormat('Y-m-d',$user->birthdate)->year }}</td>
                                                        @else
                                                            <td></td>
                                                        @endif --}}
                                                        <td title="@if( !empty( $user->activityArea ) {{ $user->activityArea->description }} @else 'Activity Disabled/Not set' @endif }">
                                                            @if( !empty( $user->activityArea ) ) {{ $user->activityArea->name }} @else "Disabled/Not set" @endif  
                                                        </td>
                                                        <td title="user link to the platfom">
                                                            <a href="">{{ $user->link }}</a>
                                                        </td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a class="btn btn-success" href="{{ route('admin.users.show', [$user->id]) }}" title="Details"><i class="fa fa-eye"></i></a>
                                                                <a class="btn btn-primary" href="{{ route('admin.users.edit', [$user->id]) }}" title="Edit"><i class="fa fa-edit"></i></a>
                                                                @if($user->id != Sentinel::getUser()->id)
                                                                <a class="btn btn-danger"
                                                                    href="#"
                                                                    title="Block {{ $user->first_name }}"
                                                                    data-username="{{ $user->first_name .' '. $user->last_name}}"
                                                                    data-id="{{ $user->id }}"
                                                                    data-toggle="modal"
                                                                    data-target="#deleteModal">
                                                                    <i class="fa fa-lock"></i>
                                                                </a>
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

<form action="{{ route('admin.users.destroy', ['#id'])}}" method="POST" id="deleteForm">
    @csrf @method('DELETE')
    <div class="modal" tabindex="-1" role="dialog" id="deleteModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bock user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Are you sure you want to block <b id="username"></b> ?</h4>
                    <p>
                        He will not be able to connect to the platform.
                        This is not fatal, at any time you can through <a href="{{ route('admin.users.trashed') }}">this link</a> deblock user.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Block</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection


@section('footer_scripts')
    <script>
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var recipient = button.data('username');
            var id = button.data('id');
            var modal = $(this);
            //modal.find('.modal-title').text('New message to ' + recipient);
            modal.find('.modal-body #username').html(recipient);

            var act = $('#deleteForm').attr('action');
            act = act.replace('#id',id);
            $('#deleteForm').attr('action',act);
        });
    </script>
@endsection
