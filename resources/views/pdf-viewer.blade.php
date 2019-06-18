<iframe id="iframepdf" src="{{ $url }}" class="{{ isset($class) ? $class: '' }}" allowfullscreen="true" {{ isset($w) ? "width='$w'":"" }} {{ isset($h) ? "height='$h'":"" }}>
    <html>
        <body>
            <object data="{{ $url }}" type="application/pdf" >
                <embed src="{{ $url }}" type="application/pdf" />
            </object>
        </body>
    </html>
</iframe>
