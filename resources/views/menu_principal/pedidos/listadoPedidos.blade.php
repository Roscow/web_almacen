@extends('menu_principal/pedidos/pedidos_ver')


@section('listado')
    <div class="accordion" id="accordionExample">
        @foreach ($pedidos as $item)
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        {{ date($item->fecha_creacion)}}
                    </button>
                    </h2>
                </div>
            

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <h6>Pedido</h6>
                        <table class="table">
                            <thead> 
                                <tr>
                                    <th>id</th>
                                    <th>Fecha Creacion</th>                                    
                                    <th>Costo Total</th>
                                    <th>Estado</th>                                                                                                          
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$item->id_pedido}}</td>
                                    <td>{{$item->fecha_creacion}}</td>
                                    <td>${{$item->costo_total}}</td>
                                    <td>{{$item->id_estado}}</td>
                                </tr>
                            </tbody>
                        </table>


                        <br><br>
                        <h6>Detalle del pedido</h6>
                        <table class="table">
                            <thead> 
                                <tr>
                                    <th>Nombre Producto</th>
                                    <th>Codigo Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio Compra</th>
                                    <th>Costo linea</th>
                                    <th>Estado</th>
                                    <th>Fecha Recepcion</th>                                    
                                </tr>
                            </thead>

                            <tbody>                                
                                @foreach ($detalle_pedidos as $linea)
                                    @if ( $linea->id_pedido == $item->id_pedido)
                                        @foreach ($productos as $prod )
                                            @if ($prod->codigo_producto == $linea->codigo_producto)
                                            <tr>
                                                <td>{{$prod->nombre}}</td>
                                                <td>{{$prod->codigo_producto}}</td>
                                                <td>{{$linea->cantidad}} /uds.</td>
                                                <td>${{$prod->precio_compra}}</td>
                                                <td>${{$linea->costo_linea}}</td>
                                                <td>{{$linea->id_estado}}</td>
                                                <td>{{$linea->fecha_recepcion}}</td>
                                            </tr>
                                            @endif                                           
                                        @endforeach
                                    @endif                                                                                   
                                @endforeach  
                            </tbody>
                        </table>

                                                    
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
