@extends('layouts.app')

@section('content')
    {!! $page->markup !!}
@endsection

@push('styles')
    <style type="text/css">
        {!! $page->styles !!}
    </style>
@endpush

@push('styles')
    <script>
        {!! $page->script !!}
    </script>
@endpush