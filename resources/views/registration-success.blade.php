
@extends("partials.layout")

@section('stylesheet')
 <style>
 </style>
@endsection


@section("content")

@include("partials.header")

<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-header">
                    <h3>Success registration</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="how-it-works section">
    <div class="container">
        <div class="section-header">
            <p style="font-size:1.5em;">
                Welcome {{ $user->first_name . ' ' .$user->last_name }} to the biggest hiring platform of new world.<br>
                You account was created and email has been sent to <b>{{ $user->email }}</b>, check that email to activate your account.
            </p>
        </div>
    </div>
</section>
@endsection


@section('scripts')
    <script>
    </script>
@endsection
