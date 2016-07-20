@extends('layouts.master')

@section('content')
    <ul>
        <li v-for="comando in comandos">
            <span>@{{ comando.text }}</span><br>
            <span> > @{{ comando.response }}</span><br>
            <small>@{{comando.date}}</small>
        </li>
    </ul>


    <form action="#" novalidate>
        <div id="row">
            
            <div class="col-md-10">
                <div class="form-group">
                    <label for="exampleInputEmail1">Entrada de Usuario</label>
                    <input :disabled="actions >= cube.m" type="text" v-model="newCommand" class="form-control" id="exampleInputEmail1"
                           placeholder="Escribir Consulta...">
                </div>
            </div>
            <div class="col-md-2">
                <div class="modal-footer">
            </div>
                <button class="btn btn-success" :disabled="newCommand === ''" v-if="actions < cube.m" v-on:click="enviarComando">Realizar Operacion</button>
                <button class="btn btn-success" v-if="actions >= cube.m" v-on:click="resetCube">Reiniciar</button>
            </div>
            </div>
    </form>

    <div class="modal fade" tabindex="-1" role="dialog" id="myModal" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="novalidate">
                    <div class="modal-header">
                        <h3 class="modal-title" align="center">Prueba final, PCV Sin Limites.</h3>
                        <h4 class="modal-title" align="center">Bienvenido al Desafico del Cubo Sumatorio</h4>
                        
                    </div>
                    <div class="modal-body">
                       <h4 class="modal-title">Instrucciones de Formato de Entrada</h4> 
                       <ul class="modal-body">
                            <li>La primera línea contiene un número entero T, el número de casos de prueba.</li>
                            <li>Para cada caso de prueba, la primera línea contendrá dos enteros N y M separadas por un solo espacio.</li>
                            <li>N define la matriz de N * N * N.</li>
                            <li>H define el número de operaciones.</li>
                          </ul>
                      <div class="form-group">
                            <label for="exampleInputEmail1">Numero de Casos de Prueba: <span v-if="tests>0">@{{ tests + 1 }} de @{{ cube.t }}</span> </label>
                            <input type="number" v-model="cube.t" class="form-control" id="exampleInputEmail1"
                                   placeholder="Introduzca el Numero Entero de Caso Posible" :disabled="tests!==0 && tests < cube.t">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tamaño del Cubo 3D</label>
                            <input type="number" v-model="cube.n" class="form-control" id="exampleInputEmail1"
                                   placeholder="Introduzca el Numero Entero Para el tamaño del Cubo">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Numero de Operaciones</label>
                            <input type="number" v-model="cube.m" class="form-control" id="exampleInputEmail1"
                                   placeholder="Introduzca el Numero de Operaciones Posible">
                       </div> 
                    </div>
                    
                    <div class="modal-footer">
                        <button type="submit" v-on:click="config" class="btn btn-primary">Crear Cubo 3D</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->



    <script>
        @if (!$matrix)
                window.showModal = true;
        @endif
    </script>

@endsection



