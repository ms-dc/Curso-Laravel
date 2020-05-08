@extends('admin.layouts.app')

@section('title', 'Gestão de Produtos')

@section('content')
    <h1>Produtos</h1>
    <a href="{{ route('products.create') }}">Cadastrar</a>

    @component('admin.components.card')
        exemplo
    @endcomponent

    <hr>

    @include('admin.includes.alerts')
@endsection

@push('styles')
    <style>
        .last {background: #CCC;}
    </style>
@endpush    

@push('scripts')
    <script>
        document.body.style.background = "#efefef"
    </script>
@endpush