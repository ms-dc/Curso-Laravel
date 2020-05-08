@extends('admin.layouts.app')

@section('content')
    <h1>Cadastrar Produto</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" id="" placeholder="Nome: " value="{{ old('name') }}">
        <input type="text" name="description" id="" placeholder="Descrição: " value="{{ old('description') }}">
        <input type="file" name="photo" id="">
        <button type="submit">Enviar</button>
    </form>
@endsection