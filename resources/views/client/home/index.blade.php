@extends('layout.client')
@section('content-page')
<h2>Home</h2>
{!! Auth::guard('member')->user() !!}

@endsection