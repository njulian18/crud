<!-- Extends template page-->
@extends('app')

<!-- Specify content -->
@section('content')

<div class="container">
   <h3 class="mt-5">Agregando pedidos</h3>
</div>

<div class="row">
   <div class="col-md-12 col-sm-12 col-xs-12">
      <!-- Alert message (start) -->
      @if(Session::has('message'))
      <div class="alert {{ Session::get('alert-class') }}">
         {{ Session::get('message') }}
      </div>
      @endif
      <!-- Alert message (end) -->

      <div class='actionbutton'>

         <a class='btn  btn-primary ' href="{{route('subjects.create')}}">Agregar</a>

      </div>
      <table class="table" >
        <thead>
          <tr>
            <th width='40%'>Nombre</th>
            <th width='40%'>Descripción</th>
            <th width='20%'>Accción</th>
          </tr>
        </thead>
        <tbody>
        @foreach($subjects as $subject)
           <tr>
              <td>{{ $subject->name }}</td>
              <td>{{ $subject->description }}</td>
              <td>
                 <!-- Edit nombre de la ruta -->
                 <a href="{{ route('subjects.edit',[$subject->id]) }}" class="btn btn-sm btn-dark">Editar</a>
                 <!-- Delete nombre de la ruta -->
                 <a href="{{ route('subjects.delete',$subject->id) }}" class="btn btn-sm btn-danger">Eliminar</a>
              </td>
           </tr>
        @endforeach
        </tbody>
     </table>

   </div>
</div>
@stop
