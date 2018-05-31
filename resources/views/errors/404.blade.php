@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>@lang('Excuse me!')</h2>

        <p>@lang('You have not created this page yet.')</p>

        <p>@lang('The error is: :msg', ['msg' => $exception->getMessage()])</p>
    </div>
@endsection