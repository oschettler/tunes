@extends('layouts.project')

@section('content')
    @auth
        <a style="position:absolute;z-index:1;top:10px;right:10px;" href="{{ route('project.edit', ['project' => $entity]) }}" class="btn btn-default">Edit</a>
    @endauth
    {!! $entity->markup !!}
@endsection

@push('styles')
    <style type="text/css">
        body { margin: 0; }
        {!! $entity->style !!}
    </style>
@endpush

@push('scripts')
    <script>
        {!! $entity->script !!}
    </script>
@endpush