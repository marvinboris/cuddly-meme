@php
    $animated_in =  ['bounceIn', 'fadeInRight','bounceInDown', 'bounceIn', 'flipInY', 'lightSpeedIn', 'rollIn', 'zoomInDown'];
    $animated_out = ['bounceOut', 'fadeOutRight', 'bounceOutUp', 'bounceOut', 'flipOutX', 'lightSpeedOut', 'rollOut', 'zoomOutUp'];
@endphp

{{-- Ce script doit être inclu après boostrap et jquery --}}
<script src="{{ asset('js/bootstrap-notify.min.js') }}"></script>

<script>
    // Form error message
    @if ($errors->any())
        $.notify({
            title: '<strong>Erreur:</strong>',
            message: 'Verifié les données de votre formulaire'
        },{
            type: 'danger',
            newest_on_top: true,
            animate: {
                enter: 'animated {{ $animated_in[ rand(0,count($animated_in)-1) ] }}',
                exit: 'animated {{ $animated_out[ rand(0,count($animated_out)-1) ] }}'
            }
        });
    @endif

    // Info message
    @if ($message = Session::get('info'))
        $.notify({
            title: '<strong>Info:</strong>',
            message: '{{ $message }}'
        },{
            type: 'info',
            newest_on_top: true,
            animate: {
                enter: 'animated {{ $animated_in[ rand(0,count($animated_in)-1) ] }}',
                exit: 'animated {{ $animated_out[ rand(0,count($animated_out)-1) ] }}'
            }
        });
    @endif

    // Success message
    @if ($message = Session::get('success'))
        $.notify({
            title: '<strong>Succès:</strong>',
            message: '{{ $message }}'
        },{
            type: 'success',
            newest_on_top: true,
            animate: {
                enter: 'animated {{ $animated_in[ rand(0,count($animated_in)-1) ] }}',
                exit: 'animated {{ $animated_out[ rand(0,count($animated_out)-1) ] }}'
            }
        });
    @endif

    // Waning message
    @if ($message = Session::get('warning'))
        $.notify({
            title: '<strong>Attention:</strong>',
            message: '{{ $message }}'
        },{
            type: 'warning',
            newest_on_top: true,
            animate: {
                enter: 'animated {{ $animated_in[ rand(0,count($animated_in)-1) ] }}',
                exit: 'animated {{ $animated_out[ rand(0,count($animated_out)-1) ] }}'
            }
        });
    @endif

    // Error message
    @if ($message = Session::get('error'))
        $.notify({
            title: '<strong>Erreur:</strong>',
            message: '{{ $message }}'
        },{
            type: 'danger',
            newest_on_top: true,
            animate: {
                enter: 'animated {{ $animated_in[ rand(0,count($animated_in)-1) ] }}',
                exit: 'animated {{ $animated_out[ rand(0,count($animated_out)-1) ] }}'
            }
        });
    @endif

</script>
