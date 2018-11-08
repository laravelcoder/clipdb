@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.ftp.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.ftp.fields.ftp-server')</th>
                            <td field-key='ftp_server'>{{ $ftp->ftp_server }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.ftp.fields.ftp-directory')</th>
                            <td field-key='ftp_directory'>{{ $ftp->ftp_directory }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.ftp.fields.ftp-username')</th>
                            <td field-key='ftp_username'>{{ $ftp->ftp_username }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.ftp.fields.ftp-password')</th>
                            <td>---</td>
                        </tr>
                        <tr>
                            <th>@lang('global.ftp.fields.notes')</th>
                            <td field-key='notes'>{{ $ftp->notes }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.ftps.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop


