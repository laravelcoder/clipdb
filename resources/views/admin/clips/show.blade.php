@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.clips.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.clips.fields.title')</th>
                            <td field-key='title'>{{ $clip->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.video')</th>
                            <td field-key='video'>
                                @if($clip->video)
                           
                            <video controls poster="{{ $clip->getFirstMediaUrl('images') }}">
                               
                              <source src="{{ asset(env('UPLOAD_PATH').'/' . $clip->video) }}" type="video/mp4">
                              Your browser does not support the video tag.
                            </video>
                    
                                <a href="{{ asset(env('UPLOAD_PATH').'/' . $clip->video) }}" target="_blank">Download file</a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.images')</th>
                            <td field-key='images' class="columns"> 
                                @foreach($clip->getMedia('images') as $media)
                                <p class="form-group">
                                    <img src="{{ $media->getUrl() }}" class="img-fluid img-thumbnail" alt="" >
                                    <a href="{{ $media->getUrl() }}" target="_blank">{{ $media->name }}</a>
                                </p>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.ad-enabled')</th>
                            <td field-key='ad_enabled'>{{ Form::checkbox("ad_enabled", 1, $clip->ad_enabled == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.total-impressions')</th>
                            <td field-key='total_impressions'>{{ $clip->total_impressions }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.recommended-frequency')</th>
                            <td field-key='recommended_frequency'>{{ $clip->recommended_frequency }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.ad-airing-date-first')</th>
                            <td field-key='ad_airing_date_first'>{{ $clip->ad_airing_date_first }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.ad-airing-date-last')</th>
                            <td field-key='ad_airing_date_last'>{{ $clip->ad_airing_date_last }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.brand')</th>
                            <td field-key='brand'>{{ $clip->brand->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.industry')</th>
                            <td field-key='industry'>{{ $clip->industry->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.advertiser')</th>
                            <td field-key='advertiser'>{{ $clip->advertiser }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.product')</th>
                            <td field-key='product'>{{ $clip->product }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.description')</th>
                            <td field-key='description'>{!! $clip->description !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.notes')</th>
                            <td field-key='notes'>{!! $clip->notes !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.agency')</th>
                            <td field-key='agency'>{{ $clip->agency }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.sourceurl')</th>
                            <td field-key='sourceurl'>{{ $clip->sourceurl }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.imagespath')</th>
                            <td field-key='imagespath'>{{ $clip->imagespath }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.cai-path')</th>
                            <td field-key='cai_path'>{{ $clip->cai_path }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.caipyurl')</th>
                            <td field-key='caipyurl'>{{ $clip->caipyurl }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.isci-ad-id')</th>
                            <td field-key='isci_ad_id'>{{ $clip->isci_ad_id }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.copylength')</th>
                            <td field-key='copylength'>{{ $clip->copylength }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.media-content')</th>
                            <td field-key='media_content'>{{ $clip->media_content }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.media-filename')</th>
                            <td field-key='media_filename'>{{ $clip->media_filename }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.scheduledate')</th>
                            <td field-key='scheduledate'>{{ $clip->scheduledate }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.expirationdate')</th>
                            <td field-key='expirationdate'>{{ $clip->expirationdate }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.family')</th>
                            <td field-key='family'>{{ $clip->family }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.subfamily')</th>
                            <td field-key='subfamily'>{{ $clip->subfamily }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.group')</th>
                            <td field-key='group'>{{ $clip->group }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.caipy-clipids')</th>
                            <td field-key='caipy_clipids'>{{ $clip->caipy_clipids }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.reviewstate')</th>
                            <td field-key='reviewstate'>{{ $clip->reviewstate }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.ignoreimport')</th>
                            <td field-key='ignoreimport'>{{ Form::checkbox("ignoreimport", 1, $clip->ignoreimport == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#industry" aria-controls="industry" role="tab" data-toggle="tab">Industry</a></li>
<li role="presentation" class=""><a href="#brands" aria-controls="brands" role="tab" data-toggle="tab">Brands</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="industry">
<table class="table table-bordered table-striped {{ count($industries) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.industry.fields.name')</th>
                        <th>@lang('global.industry.fields.slug')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($industries) > 0)
            @foreach ($industries as $industry)
                <tr data-entry-id="{{ $industry->id }}">
                    <td field-key='name'>{{ $industry->name }}</td>
                                <td field-key='slug'>{{ $industry->slug }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.industries.restore', $industry->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.industries.perma_del', $industry->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('industry_view')
                                    <a href="{{ route('admin.industries.show',[$industry->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('industry_edit')
                                    <a href="{{ route('admin.industries.edit',[$industry->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('industry_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.industries.destroy', $industry->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="brands">
<table class="table table-bordered table-striped {{ count($brands) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.brands.fields.name')</th>
                        <th>@lang('global.brands.fields.brand-url')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($brands) > 0)
            @foreach ($brands as $brand)
                <tr data-entry-id="{{ $brand->id }}">
                    <td field-key='name'>{{ $brand->name }}</td>
                                <td field-key='brand_url'>{{ $brand->brand_url }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.brands.restore', $brand->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.brands.perma_del', $brand->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('brand_view')
                                    <a href="{{ route('admin.brands.show',[$brand->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('brand_edit')
                                    <a href="{{ route('admin.brands.edit',[$brand->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('brand_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.brands.destroy', $brand->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="9">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.clips.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop

@section('javascript')
    @parent
    <script src="//cdn.ckeditor.com/4.5.4/full/ckeditor.js"></script>
    <script>
        $('.editor').each(function () {
                  CKEDITOR.replace($(this).attr('id'),{
                    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
                    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
            });
        });
    </script>

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
