@extends('menu_principal/pedidos/pedidos_ver')


@section('listado')
    <div class="accordion" id="accordionExample">
        @foreach ($pedidos as $item)
            <div class="card">
                <div class="card-header" id="heading{{$item->id_pedido}}">
                    <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse{{$item->id_pedido}}" aria-expanded="true" aria-controls="collapse{{$item->id_pedido}}">
                        {{ date($item->fecha_creacion)}}
                    </button>
                    </h2>
                </div>
            

                <div id="collapse{{$item->id_pedido}}" class="collapse" aria-labelledby="heading{{$item->id_pedido}}" data-parent="#accordionExample">
                    <div class="card-body">
                        <h6>Pedido</h6>
                        <table class="table">
                            <thead> 
                                <tr>
                                    <th>Id</th>
                                    <th>Fecha Creación</th>                                    
                                    <th>Costo Total</th>
                                    <th>Estado</th>                                                                                                          
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$item->id_pedido}}</td>
                                    <td>{{$item->fecha_creacion}}</td>
                                    <td>${{$item->costo_total}}</td>
                                    @foreach ($estados as $est)
                                        @if ($est->id_estado == $item->id_estado)
                                            <td>{{$est->estado}}</td>
                                        @endif
                                    @endforeach                                      
                                </tr>
                            </tbody>
                        </table>


                        <br><br>
                        <h6>Detalle del pedido</h6>
                        <table class="table">
                            <thead> 
                                <tr>
                                    <th>Nombre Producto</th>
                                    <th>Código Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio Compra</th>
                                    <th>Costo línea</th>
                                    <th>Estado</th>
                                    <th>Fecha Recepción</th>                                    
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
                                                @foreach ($estados as $est)
                                                    @if ($est->id_estado == $linea->id_estado)
                                                        <td>{{$est->estado}}</td>
                                                    @endif
                                                @endforeach                                                
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
