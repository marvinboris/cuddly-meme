<iframe id="iframepdf" src="{{ $url }}" class="{{ isset($class) ? $class: '' }}">
    <html>
        <body>
            <object data="{{ $url }}" type="application/pdf">
                <embed src="{{ $url }}" type="application/pdf" />
            </object>
        </body>
    </html>
</iframe>