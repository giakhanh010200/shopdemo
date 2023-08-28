@extends('admin.layout')
@section('link')
<link rel="stylesheet" href="{{ URL::asset('css/admin/payment_method.css') }}">
@stop
@section('content')
<div class="auth-main--content -wrapper">
    <div class="auth---header">
        <div class="header--left">
            <h3 class="auth-pages-title">
                Phương thức thanh toán
            </h3>
        </div>
    </div>
</div>
@stop
@section('script')
    <script type="text/javascript" src={{ URL::asset('js/admin/payment_method.js') }}></script>
@stop
