@extends('admin.layout.default')

@section('title')
    Blocked users
@endsection

@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Blocked users</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active"><a href="#">Blocked users</a>
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
                                    <h4 class="card-title">Blocked users list</h4>
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
                                                        <th>Sex</th>
                                                        <th>Blocked at</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($users as $user)
                                                    <tr>
                                                        <td>{{ $user->first_name }}</td>
                                                        <td>{{ $user->last_name }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ strtoupper($user->sex) == 'M' ? 'Homme':'Femme' }}</td>
                                                        <td>{{ $user->deleted_at }}</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                {{-- <a class="btn btn-success" href="{{ route('admin.users.show', [$user->id]) }}" title="Détail"><i class="fa fa-eye"></i></a> --}}
                                                                <a class="btn btn-danger"
                                                                    href="#"
                                                                    title="Delete"
                                                                    data-username="{{ $user->first_name .' '. $user->last_name}}"
                                                                    data-id="{{ $user->id }}"
                                                                    data-toggle="modal"
                                                                    data-target="#deleteModal">
                                                                    <i class="fa fa-remove"></i>
                                                                </a>
                                                                <a class="btn btn-warning"
                                                                    href="#"
                                                                    title="Restore"
                                                                    data-username="{{ $user->first_name .' '. $user->last_name}}"
                                                                    data-id="{{ $user->id }}"
                                                                    data-toggle="modal"
                                                                    data-target="#restoreModal">
                                                                    <i class="fa fa-life-saver"></i>
                                                                </a>
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

<form action="{{ route('admin.users.hard_delete', ['#id'])}}" method="POST" id="deleteForm">
    @csrf @method('DELETE')
    <div class="modal" tabindex="-1" role="dialog" id="deleteModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Are you sure you want to delete <b id="username"></b> ?</h4>
                    <p>
                        This action is irreversible.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Yes, delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>


<form action="{{ route('admin.users.restore', ['#id'])}}" method="POST" id="restoreForm">
    @csrf @method('PUT')
    <div class="modal" tabindex="-1" role="dialog" id="restoreModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Restore</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Are you sure you want to restore <b id="username2"></b> ?</h4>
                    <p>
                        User will be able to reconnect again, and continue his account activity where she did leave it.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">Yes, Restore</button>
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

        $('#restoreModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var recipient = button.data('username');
            var id = button.data('id');
            var modal = $(this);
            //modal.find('.modal-title').text('New message to ' + recipient);
            modal.find('.modal-body #username2').html(recipient);

            var act = $('#restoreForm').attr('action');
            act = act.replace('#id',id);
            $('#restoreForm').attr('action',act);
        });
    </script>
@endsection
