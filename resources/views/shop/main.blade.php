@extends('layout.app')

@section('body')
<shop-menu></shop-menu>
<div class="amado_product_area section-padding-100">
    <div class="container-fluid">
        <shop></shop>
    </div>
</div>
@stop

@section('news')
<news></news>
@stop

@section('footer')
<footer-section></footer-section>
@stop