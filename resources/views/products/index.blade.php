@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                     Productos
                     @can('products.create')
                       <a href="{{ route('products.create') }}"
                           class="btn btn-sm btn-primary float-right">
                           Crear
                       </a>
                     @endcan
                 </div>
                    
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    @can('products.show')
                                         <a href="{{ route('products.show', $product->id) }}" 
                                            class="btn btn-sm btn-primary">
                                             Ver
                                         </a>
                                    @endcan
                                </td>

                                <td>
                                    @can('products.edit')
                                         <a href="{{ route('products.edit', $product->id) }}" 
                                            class="btn btn-sm btn-secondary">
                                             Editar
                                         </a>
                                    @endcan
                                </td>

                                <td>
                                    @can('products.destroy')
                                          <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                                 @method('DELETE')
                                                 @csrf
                                                 <button class="btn btn-danger btn-sm">Eliminar</button>
                                          </form>
                                    @endcan
                                </td>


                               
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                       {{ $products->render() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
