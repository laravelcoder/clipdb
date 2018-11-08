@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.ftp.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.ftps.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ftp_server', trans('global.ftp.fields.ftp-server').'', ['class' => 'control-label']) !!}
                    {!! Form::text('ftp_server', old('ftp_server'), ['class' => 'form-control', 'placeholder' => 'HOST']) !!}
                    <p class="help-block">HOST</p>
                    @if($errors->has('ftp_server'))
                        <p class="help-block">
                            {{ $errors->first('ftp_server') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ftp_directory', trans('global.ftp.fields.ftp-directory').'', ['class' => 'control-label']) !!}
                    {!! Form::text('ftp_directory', old('ftp_directory'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ftp_directory'))
                        <p class="help-block">
                            {{ $errors->first('ftp_directory') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ftp_username', trans('global.ftp.fields.ftp-username').'', ['class' => 'control-label']) !!}
                    {!! Form::text('ftp_username', old('ftp_username'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ftp_username'))
                        <p class="help-block">
                            {{ $errors->first('ftp_username') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ftp_password', trans('global.ftp.fields.ftp-password').'', ['class' => 'control-label']) !!}
                    {!! Form::password('ftp_password', ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ftp_password'))
                        <p class="help-block">
                            {{ $errors->first('ftp_password') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('notes', trans('global.ftp.fields.notes').'', ['class' => 'control-label']) !!}
                    {!! Form::text('notes', old('notes'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('notes'))
                        <p class="help-block">
                            {{ $errors->first('notes') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

