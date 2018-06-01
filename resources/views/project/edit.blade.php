@extends('crud::edit')

@section('above-fields')
    <div class="col-12">
        <div id="images" class="row"></div>
    </div>
@endsection

@push('scripts')
    <script>
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