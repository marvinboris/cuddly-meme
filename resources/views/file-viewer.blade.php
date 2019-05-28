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
    <video width="{{ isset($vw) ? $vw : 320 }}" height="{{ isset($vh) ? $vh : 240 }}" controls class="{{ isset($class) ? $class: '' }}">
        <source src="{{ $path_url }}" type="{{ $file->mime }}">
        Please update your browser
    </video>
@else
    <p>Unknow format</p>
@endif
