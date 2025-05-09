<div>
    <input type="text" name="search" id="search" placeholder="Buscar producto" wire:model.live="search">
    <input type="number" name="paginas" id="paginas" placeholder="10" wire:model.live="pagination">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->price }}</td>
                    <td>@if($product->image)<img src="/storage/{{$product->image}}" alt="{{$product->name}}">
                       @else
                        No existe imagen
                       @endif</td>
                    <td>{{ $product->category->name }}</td>
                    <td>
                        <a href="{{route('products.show',$product)}}" class="btn btn-success">Mostrar</a>
                        <a href="{{route('products.edit',$product)}}" class="btn btn-warning">Editar</a>
                        <form action="{{route('products.destroy',$product)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
</div>
