
@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => url('/')])
            WORKOO
        @endcomponent
    @endslot

    {{-- Body --}}
# Hello  {!! $user->user_name !!},<br>

Welcome to <a href="{{ url('/') }}" >Workoo</a> the hiring plateform of new world ! Please click on the following link to confirm your Workoo account:<br />
@component('mail::button', ['url' =>  $user->activationUrl  ])
    Activate Account
@endcomponent


    Thanks,

    {{-- Footer --}}
    @slot('footer')
    @component('mail::footer')
    &copy; 2019 All Copy right received
@endcomponent
@endslot
@endcomponent
