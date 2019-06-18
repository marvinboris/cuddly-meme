@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => url('/')])
            WORKOO
        @endcomponent
    @endslot

    {{-- Body --}}
# Hello  {!! $user->user_name !!},<br>

Please click on the following link to updated your password
@component('mail::button', ['url' =>  $user->forgotPasswordUrl ])
    Reset Password
@endcomponent


    Thanks,

    {{-- Footer --}}
    @slot('footer')
    @component('mail::footer')
    &copy; 2019 All Copy right received
@endcomponent
@endslot
@endcomponent
