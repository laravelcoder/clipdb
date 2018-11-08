@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.industry.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.industry.fields.name')</th>
                            <td field-key='name'>{{ $industry->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.industry.fields.slug')</th>
                            <td field-key='slug'>{{ $industry->slug }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#clips" aria-controls="clips" role="tab" data-toggle="tab">Clips</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="clips">
<table class="table table-bordered table-striped {{ count($clips) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.clips.fields.title')</th>
                        <th>@lang('global.clips.fields.video')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($clips) > 0)
            @foreach ($clips as $clip)
                <tr data-entry-id="{{ $clip->id }}">
                    <td field-key='title'>{{ $clip->title }}</td>
                                <td field-key='video'>@if($clip->video)<a href="{{ asset(env('UPLOAD_PATH').'/' . $clip->video) }}" target="_blank">Download file</a>@endif</td>
                                <td field-key='images'>@if($clip->images)<a href="{{ asset(env('UPLOAD_PATH').'/' . $clip->images) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $clip->images) }}"/></a>@endif</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.clips.restore', $clip->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.clips.perma_del', $clip->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('clip_view')
                                    <a href="{{ route('admin.clips.show',[$clip->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('clip_edit')
                                    <a href="{{ route('admin.clips.edit',[$clip->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('clip_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.clips.destroy', $clip->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="36">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.industries.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop


