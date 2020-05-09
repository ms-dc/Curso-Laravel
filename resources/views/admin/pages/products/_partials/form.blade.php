@include('admin.includes.alerts')

@csrf
<div class="form-group">
    <input type="text" class="form-control" name="name" id="" placeholder="Nome: " value="{{ $product->name ?? old('name') }}">
</div>
<div class="form-group">
    <input type="text" class="form-control" name="price" id="" placeholder="Preço: " value="{{ $product->price ?? old('price') }}">
</div>
<div class="form-group">
    <input type="file" class="form-control" name="image" id="">
</div>