@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}

                            </div>
                        @endif
                        {!! Form::model($empleado, ['route' => ['empleado_update', $empleado->id],'method' => 'PUT']) !!}
                        <div>
                            <label for="name">Nombre Completo:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-font"></i></span>
                                </div>
                                <input id="name" class="form-control @error('name') is-invalid @enderror" name="nombre" value="{{ old('name', $empleado->nombre) }}" required autocomplete="name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="email">Correo Electrónico:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-font"></i></span>
                                </div>
                                <input id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $empleado->email) }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for=" male" style="display: block; margin: 10px 0 10px 0">
                                <input type="radio" name="genero" value="male">
                                Masculino
                            </label>
                            <label for="male" style="display: block; margin: 10px 0 10px 0">
                                <input type="radio" name="genero" value="female" >
                                Femenino
                            </label>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Area</label>
                            </div>
                            <select class="custom-select" name="area">
                                <option selected>Elija su opcion</option>
                                @foreach ($areas as $area)
                                <option value="{{$area->id}}">{{$area->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div>
                            <label for="content">Descripción</label>
						    <textarea placeholder="{{ $empleado->descripcion }}" name="descripcion" class="form-control" id="" cols="10" rows="5"></textarea>
                        </div>

                        <div class="mt-2 mb-2">
                            <div>
                                <input type="checkbox" name="rol_profesional" value="activo">
                                <label for="terms">Profesional de proyectos - Desarrollador</label>
                            </div>
                            <div>
                                <input type="checkbox" name="rol_gerente" value="activo">
                                <label for="terms">Gerente estrategico</label>
                            </div>
                            <div>
                                <input type="checkbox" name="rol_auxiliar" value="activo">
                                <label for="terms">Auxiliar administrativo</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Guardar" class="btn btn-dark btn-lg btn-block">
                        </div>
                        <div class="form-group">
                            <a href="{{ route('home') }}" class="btn btn-outline-primary btn-lg btn-block"> Ir a Home</a>
                        </div>
                        {!! Form::close() !!}
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
