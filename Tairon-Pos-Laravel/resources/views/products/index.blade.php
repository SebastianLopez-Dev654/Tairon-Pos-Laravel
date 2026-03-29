<h1>Productos</h1>

@foreach($productos as $producto)
    <p>{{ $producto->nombre }} - {{ $producto->precio }}</p>
@endforeach
