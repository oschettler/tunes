@extends('crud::' . $theme . '.edit')

@section('above-fields')
    <div class="col-12">
        <div class="float-right" id="links">
            <h3>@lang('Helpful')</h3>
            <ul>
                <li><a href="https://www.htmling.net/" target="doc" title="HTMLling">Einführung in HTML und CSS</a></li>
                <li><a href="https://wiki.selfhtml.org/" target="doc" title="SELFhtml">Nachschlagewert HTML / CSS / Javascript</a></li>
            </ul>
        </div>
        <div id="images" class="row"></div>
    </div>
@endsection

@push('scripts')
    <script>
        CodeMirror.fromTextArea(document.getElementById('style-field'), {
            lineNumbers: true,
            mode: "css"
        });

        CodeMirror.fromTextArea(document.getElementById('script-field'), {
            lineNumbers: true,
            mode: "javascript"
        });

        CodeMirror.fromTextArea(document.getElementById('markup-field'), {
            lineNumbers: true,
            mode: "htmlmixed"
        });

        $.get('/project/{{ $entity->slug }}/images', function (images) {
            $.each(images.data, function (i, image) {
                $('#images').append('<div class="col-3"><figure class="figure"><a href="#" class="delete-image" data-id="' + image.id + '"><i class="fas fa-times-circle"></i></a><a href="' + image.preview + '"><img class="figure-img img-fluid rounded" src="' + image.thumb + '"></a><figcaption class="figure-caption">' + image.name + '</figcaption></figure></div>');
            });
        });

        $('#images').on('click', '.delete-image', function (e) {
            var $figure = $(this).parent();
            axios.post('/media/' + $(this).data('id') + '/delete')
                .then(function () {
                    $figure.fadeOut();
                });
        });
    </script>
@endpush