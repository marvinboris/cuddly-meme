@extends('admin.layout.default')

@section('title')
    Questons
@endsection

@php
    function htmlTypeToHumansType($type)
    {
        switch ($type) {
            case 'text':
                return 'Short text';

            case 'textarea':
                return 'Long text';

            case 'number':
                return 'Number';

            case 'checkbox':
                return 'Boolean';

            case 'email':
                return 'E-mail';

            case 'tel':
                return 'Phone number';

            case 'url':
                return 'URL';

            case 'date':
                return 'Date';


            case 'time':
                return 'Time';

            case 'datetime':
                return 'Date and time';


            default:
                return "Short text";
        }
    }

    $avaibleType = ['text', 'email', 'tel', 'textarea', 'number', 'checkbox', 'url', 'date', 'time', 'datetime'];
@endphp

@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Questions</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active"><a href="#">Questions</a>
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

                                    <h4 class="card-title">Questions list</h4>

                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <button class="btn btn-success" data-toggle="modal" data-target="#addModal">
                                                <i class="fa fa-plus"></i> Add question
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
                                                        <th>#</th>
                                                        <th>Label</th>
                                                        <th>Type</th>
                                                        <th>Placeholder</th>
                                                        <th>Default value</th>
                                                        <th>Created at</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($questions as $question)
                                                    <tr>
                                                        <td>{{ $loop->index +1 }}</td>
                                                        <td>{{ $question->label }}</td>
                                                        <td>{{ htmlTypeToHumansType($question->type) }}</td>
                                                        <td>{{ $question->placeholder }}</td>
                                                        <td>{{ $question->pre_value }}</td>
                                                        <td>{{ $question->created_at }}</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a class="btn btn-danger"
                                                                    href="#"
                                                                    title="Delete"
                                                                    data-label="{{ $question->label }}"
                                                                    data-id="{{ $question->id }}"
                                                                    data-toggle="modal"
                                                                    data-target="#deleteModal">
                                                                    <i class="fa fa-remove"></i>
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

<form action="{{ route('admin.questions.destroy', ['#id'])}}" method="POST" id="deleteForm">
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
                    <h4>Are you sure you want to delete question ?</h4>
                    Question: <h5><b id="label"></b></h5>
                    <p>
                        It will delete all users reponse of this question, this action is irreversible.
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





<form action="{{ route('admin.questions.store')}}" method="POST" id="addForm">
    @csrf
    <div class="modal" tabindex="-1" role="dialog" id="addModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add new question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="userinput1">Label <sup style="color:red;">*</sup></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" required placeholder="Label" name="label">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 label-control">Response type <sup style="color:red;">*</sup></label>
                        <div class="col-md-9">
                            <select class="form-control" required name="type">
                                <option></option>
                                @foreach ($avaibleType as $type)
                                    <option value="{{ $type }}">{{ htmlTypeToHumansType($type) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="userinput1">Placeholder</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="Question placeholder" name="placeholder">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="userinput1">Default value</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="Question placeholder" name="pre_value">
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
    <script>
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var recipient = button.data('label');
            var id = button.data('id');
            var modal = $(this);
            //modal.find('.modal-title').text('New message to ' + recipient);
            modal.find('.modal-body #label').html(recipient);

            var act = $('#deleteForm').attr('action');
            act = act.replace('#id',id);
            $('#deleteForm').attr('action',act);
        });
    </script>
@endsection
