@extends('layouts.project')

@section('content')
    <a style="float:right;margin-left:4px" href="{{ route('project.edit', ['project' => $entity]) }}" class="btn btn-default">Edit</a>
    {!! $entity->markup !!}
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