@extends('admin.layouts.app')

@section('content')
    <h1>Cadastrar Produto</h1>

    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data" class="form">
        @include('admin.pages.products._partials.form')
        <button type="submit" class="btn btn-success">Enviar</button>
    </form>
@endsection