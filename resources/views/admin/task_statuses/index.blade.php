@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.task-statuses.title')</h3>
    @can('task_status_create')
    <p>
        <a href="{{ route('admin.task_statuses.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        <a href="#" class="btn btn-warning" style="margin-left:5px;" data-toggle="modal" data-target="#myModal">@lang('global.app_csvImport')</a>
        @include('csvImport.modal', ['model' => 'TaskStatus'])
        
    </p>
    @endcan

    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($task_statuses) > 0 ? 'datatable' : '' }} @can('task_status_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('task_status_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('global.task-statuses.fields.name')</th>
                                                <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($task_statuses) > 0)
                        @foreach ($task_statuses as $task_status)
                            <tr data-entry-id="{{ $task_status->id }}">
                                @can('task_status_delete')
                                    <td></td>
                                @endcan

                                <td field-key='name'>{{ $task_status->name }}</td>
                                                                <td>
                                    @can('task_status_view')
                                    <a href="{{ route('admin.task_statuses.show',[$task_status->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('task_status_edit')
                                    <a href="{{ route('admin.task_statuses.edit',[$task_status->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('task_status_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.task_statuses.destroy', $task_status->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('task_status_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.task_statuses.mass_destroy') }}';
        @endcan

    </script>
@endsection