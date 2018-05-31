@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>@lang('Excuse me!')</h2>

        <p>@lang('project')</p>

        <p>@lang('The error is: :msg', ['msg' => $exception->getMessage()])</p>
    </div>
@endsection