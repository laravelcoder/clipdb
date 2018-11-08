@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.tasks.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.tasks.fields.name')</th>
                            <td field-key='name'>{{ $task->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.tasks.fields.description')</th>
                            <td field-key='description'>{!! $task->description !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.tasks.fields.status')</th>
                            <td field-key='status'>{{ $task->status->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.tasks.fields.tag')</th>
                            <td field-key='tag'>
                                @foreach ($task->tag as $singleTag)
                                    <span class="label label-info label-many">{{ $singleTag->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('global.tasks.fields.attachment')</th>
                            <td field-key='attachment'>@if($task->attachment)<a href="{{ asset(env('UPLOAD_PATH').'/' . $task->attachment) }}" target="_blank">Download file</a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('global.tasks.fields.due-date')</th>
                            <td field-key='due_date'>{{ $task->due_date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.tasks.fields.user')</th>
                            <td field-key='user'>{{ $task->user->name ?? '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.tasks.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop

@section('javascript')
    @parent

    <script src="{{ url('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function(){
            moment.updateLocale('{{ App::getLocale() }}', {
                week: { dow: 1 } // Monday is the first day of the week
            });
            
            $('.date').datetimepicker({
                format: "{{ config('app.date_format_moment') }}",
                locale: "{{ App::getLocale() }}",
            });
            
        });
    </script>
            
@stop
