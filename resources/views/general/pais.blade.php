@extends('layouts.dashboard')
@section('page_heading','Panel de Trabajo')
@section('section')


<section>
{!! Form::open(['method' => 'POST', 'url' => '/', 'class' => 'form-horizontal']) !!}
    <h4>Paises del mundo</h4>
    {!! Form::select('paises', $pais1, ['id' => 'paises', 'class' => 'danger']) !!}
{!! Form::close() !!}
</section>

@stop