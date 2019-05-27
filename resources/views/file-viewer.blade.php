@php
    $path_url = url( "/files/" . $file->filename );
@endphp

@if(strpos($file->mime, 'image') !== false)
    <img src="{{ $path_url }}" alt="Fichier image non trouvé" class="{{ isset($class) ? $class: '' }}">
@elseif(strpos($file->mime, 'pdf') !== false)
    @if(isset($class))
        @include('pdf-viewer', ['url' => $path_url, 'class' => $class ])
    @else
        @include('pdf-viewer', ['url' => $path_url ])
    @endif
@elseif(strpos($file->mime, 'video') !== false)
    <video width="320" height="240" controls class="{{ isset($class) ? $class: '' }}">
        <source src="{{ $path_url }}" type="{{ $file->mime }}">
        Votre navigateur requière une mise à jour
    </video>
@else
    <p>Format non pris en charge !</p>
@endif
