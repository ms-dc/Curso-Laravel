@extends('admin.layouts.app')

@push('styles')
@endpush

@section('title', 'Gestão de Produtos')

@section('content')
    <h1>Produtos</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Cadastrar</a>

    <hr>

    <form action="{{ route('products.search') }}" method="post" class="form form-inline">
        @csrf
        <input type="text" name="filter" id="filter" placeholder="Filtrar:" class="form-control" value="{{ $filters['filter'] ?? '' }}">
        <button type="submit" class="btn btn-info">Pesquisar</button>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Nome</th>
                <th>Preço</th>
                <th width="200">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>
                        @if ($product->image)
                        <img src="{{ url("storage/{$product->image}") }}" alt="{{ $product->name }}" style="max-width: 100px">
                        @endif
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>R${{ $product->price }}</td>
                    <td>
                        <a href="{{ route('products.edit',[ $product->id]) }}" class="btn btn-primary btn-sm text-white">
                                <i class="fas fa-edit"></i>
                                <span class='d-none d-md-inline'> Editar</span>
                            </a>
                        <span data-url="{{ route('products.destroy',[ $product->id]) }}" data-idProduct='{{ $product->id}}' 
                        class="btn btn-danger btn-sm text-white deleteButton">
                            <i class="fas fa-trash"></i>
                            <span class='d-none d-md-inline'> Deletar</span>
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    @if (isset($filters))
        {!! $products->appends($filters)->links() !!}
    @else
        {!! $products->links() !!}
    @endif
    

@endsection

@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $('.deleteButton').on('click', function (e) {
    var url = $(this).data('url');
    var idProduct = $(this).data('idProduct');
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
        method: 'DELETE',
        url: url
    });
    $.ajax({
        data: {
            'idProduct': idProduct,
        },
        success: function (data) {
            console.log(data);
            if (data['status'] ?? '' == 'success') {
                if (data['reload'] ?? '') {
                    location.reload();
                }
            } else {
                console.log('error');
            }
        },
        error: function (data) {
            console.log(data);
        }
    });
});
</script>
@endpush
