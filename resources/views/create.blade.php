

<!-- Extends template page -->
@extends('app')

<!-- Specify content -->
@section('content')

<h3>Agregar pedido</h3>

<div class="row">

   <div class="col-md-12 col-sm-12 col-xs-12">

     <!-- Alert message (start) -->
     @if(Session::has('message'))
     <div class="alert {{ Session::get('alert-class') }}">
        {{ Session::get('message') }}
     </div>
     @endif 
     <!-- Alert message (end) -->

     <div class="actionbutton">

        <a class='btn btn-primary float-right' href="{{route('subjects')}}">Volver a la lista</a>

     </div>

     <form action="{{route('subjects.store')}}" method="post" >
        {{csrf_field()}}

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12 mb-2" for="name">Nombre <span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
             <input id="name" class="form-control col-md-12 col-xs-12" name="name" placeholder="Ingrese su nombre" required="required" type="text">

             @if ($errors->has('name'))
               <span class="errormsg">{{ $errors->first('name') }}</span>
             @endif
          </div>
        </div>

        <div class="form-group mt-2">
          <label class="control-label col-md-3 col-sm-3 col-xs-12 mb-2" for="description">Descripción</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
             <textarea name='description' id='description' class='form-control' placeholder="Ingrese su mensaje"></textarea>

             @if ($errors->has('description'))
                <span class="errormsg">{{ $errors->first('description') }}</span>
             @endif
          </div>
        </div>

        <div class="form-group">
           <div class="col-md-6 mt-3">

              <input type="submit" name="submit" value='Cargar Datos' class='btn btn-success'>
           </div>
        </div>

     </form>

   </div>
</div>
@stop
