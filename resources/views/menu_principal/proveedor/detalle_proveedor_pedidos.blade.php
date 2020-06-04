@extends('menu_principal/proveedor/proveedor_pedidos')



@section('detalle_proveedor_pedidos')
          
      <div class="accordion" id="accordionExample">
      @foreach($pedidos as $item)
          <div class="card">
            <div class="card-header" id="heading{{$item->id_pedido}}">
              <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse{{$item->id_pedido}}" aria-expanded="true" aria-controls="collapse{{$item->id_pedido}}">
                        ID:{{$item->id_pedido}} Fecha:{{$item->fecha_creacion}} 
                        @foreach ($estados as $item3)
                            @if ($item->id_estado == $item3->id_estado)
                                ({{$item3->estado}})
                            @endif                                       
                        @endforeach
                </button>
              </h2>
            </div>
          </div>
          <div id="collapse{{$item->id_pedido}}" class="collapse" aria-labelledby="heading{{$item->id_pedido}}" data-parent="#accordionExample">
            <div class="card-body">                                
                  <table class="table">
                    <thead>
                        <tr>
                          <th scope="col">Codigo producto</th>
                          <th scope="col">Cantidad</th>
                          <th scope="col">Costo linea</th>
                          <th scope="col">estado</th>
                          <th scope="col">fecha recepcion</th>
                        </tr>
                      <thead>
                      <tbody>
                        @foreach ($detalle as $item2)
                            @if ($item->id_pedido == $item2->id_pedido)
                            <tr>
                              <!--<th scope="row">{{$item2->id_pedido}}</th>-->
                              <td>{{$item2->codigo_producto}}</td>
                              <td>{{$item2->cantidad}}</td>
                              <td>${{$item2->costo_linea}}</td>
                              @foreach ($estados as $item3)
                                  @if ($item2->id_estado == $item3->id_estado)
                                    <td>{{$item3->estado}}</td>                                  
                                  @endif                                
                              @endforeach                              
                              <td>{{$item2->fecha_recepcion}}</td>
                            </tr>                                 
                            @endif 
                        @endforeach   
                    </tbody>
                  </table>
                  
            </div>
          </div>
      @endforeach
      </div>
@endsection