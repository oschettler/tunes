@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="float-right">
            <a href="{{ route('project.edit', ['project' => $entity]) }}" class="btn btn-default">Edit</a>
        </div>
        {!! $entity->markup !!}
    </div>
@endsection

@push('styles')
    <style type="text/css">
        {!! $entity->style !!}
    </style>
@endpush

@push('scripts')
    <script>
        {!! $entity->script !!}
    </script>
@endpush