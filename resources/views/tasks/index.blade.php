@extends('layouts.app')

@section('content')
    
<div class="container">
        <div class="col-xs-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Nueva Tarea
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form action="{{ url('task') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Task</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Task
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>      
</div>

  

<div class="container">
    <div class="row">
            <!-- Current Tasks -->

            @if (count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tareas Actuales
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>ID</th>
                                <th>Tarea</th>
                                <th>Creado por</th>
                                <th>Estado</th>
                                <th>Prioridad</th>
                                <th>Creado</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>

                                @foreach ($tasks as $task)
                                
                                    <tr data-id="{{ $task->id }}">
                                        <td class="table-text"><div>{{ $task->id }}</div></td>
                                        <td class="table-text"><div>{{ $task->name }}</div></td>
                                        <td class="table-text"><div>{{ $task->user->name }}</div></td>
                                         <!-- Estado -->
                                        <td class="table-text">
                                            <div>
                                                @if($task->estado->name == "Abierto")
                                                    <span class="label label-success">{{ $task->estado->name }}</span>
                                                @else
                                                    <span class="label label-danger">{{ $task->estado->name }}</span>
                                                @endif        
                                            </div>
                                        </td>
                                         <!-- Ptioridad -->
                                        <td class="table-text">
                                            <div>
                                                @if($task->priority->name == "Baja")
                                                    <span class="label label-warning">{{ $task->priority->name }}</span>
                                                @elseif ($task->priority->name == "Media")
                                                    <span class="label label-info">{{ $task->priority->name }}</span>    
                                                @else
                                                    <span class="label label-danger">{{ $task->priority->name }}</span>
                                                @endif        
                                            </div>
                                        </td>    
                                        <td class="table-text"><div>{{ $task->created_at }}</div></td

                                        <!-- Task complete Button -->
                                        
                                        <!-- Split button -->
                                        <td class="table-text">
                                            <div class="btn-group btn-sm">
                                              <button type="button" class="btn btn-default">...</button>
                                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                              </button>
                                              <ul class="dropdown-menu">
                                                <li><a href="{{ url('task/' . $task->id)}}" class="glyphicon glyphicon-eye-open">  Abrir</a></li>
                                                <li role="separator" class="divider"></li>
                                                <li><a href="#" class="glyphicon glyphicon-ok" id="completar">  Completar</a></li>
                                                <li><a href="#" class="glyphicon glyphicon-random">  Asignar</a></li>
                                                <li><a href="" class="btn-delete">Eliminar</a></li>
                                              </ul>

                                            </div>
                                        </td>

                                        <!--
                                        <td class="table-text">
                                            
                                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target=".bs-example-modal-sm">
                                                    <i class="glyphicon glyphicon-ok"></i>
                                                   
                                            </button>
                                       
                                            <form action="{{url('task/' . $task->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger btn-sm " style="  position: adsolute; display: block; ">
                                                    <i class="fa fa-btn fa-trash"></i>
                                                </button>
                                            </form>
                                            
                                        </td>
                                        -->
                                    </tr>
                                 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

@section('scripts')
    <script>
        $(document).ready(function(){
            $('.btn-delete').click(function () {

                var row = $(this).parents('tr');

                var id = row.data('id');

                

            });
        });
    </script>
@endsection


@endsection