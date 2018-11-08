<?php

namespace App\Http\Controllers\Admin;

use App\Ftp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreFtpsRequest;
use App\Http\Requests\Admin\UpdateFtpsRequest;
use Yajra\DataTables\DataTables;

class FtpsController extends Controller
{
    /**
     * Display a listing of Ftp.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('ftp_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = Ftp::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('ftp_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'ftps.id',
                'ftps.ftp_server',
                'ftps.ftp_directory',
                'ftps.ftp_username',
                'ftps.ftp_password',
                'ftps.notes',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'ftp_';
                $routeKey = 'admin.ftps';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('ftp_server', function ($row) {
                return $row->ftp_server ? $row->ftp_server : '';
            });
            $table->editColumn('ftp_directory', function ($row) {
                return $row->ftp_directory ? $row->ftp_directory : '';
            });
            $table->editColumn('ftp_username', function ($row) {
                return $row->ftp_username ? $row->ftp_username : '';
            });
            $table->editColumn('ftp_password', function ($row) {
                return '---';
            });
            $table->editColumn('notes', function ($row) {
                return $row->notes ? $row->notes : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.ftps.index');
    }

    /**
     * Show the form for creating new Ftp.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('ftp_create')) {
            return abort(401);
        }
        return view('admin.ftps.create');
    }

    /**
     * Store a newly created Ftp in storage.
     *
     * @param  \App\Http\Requests\StoreFtpsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFtpsRequest $request)
    {
        if (! Gate::allows('ftp_create')) {
            return abort(401);
        }
        $ftp = Ftp::create($request->all());



        return redirect()->route('admin.ftps.index');
    }


    /**
     * Show the form for editing Ftp.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('ftp_edit')) {
            return abort(401);
        }
        $ftp = Ftp::findOrFail($id);

        return view('admin.ftps.edit', compact('ftp'));
    }

    /**
     * Update Ftp in storage.
     *
     * @param  \App\Http\Requests\UpdateFtpsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFtpsRequest $request, $id)
    {
        if (! Gate::allows('ftp_edit')) {
            return abort(401);
        }
        $ftp = Ftp::findOrFail($id);
        $ftp->update($request->all());



        return redirect()->route('admin.ftps.index');
    }


    /**
     * Display Ftp.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('ftp_view')) {
            return abort(401);
        }
        $ftp = Ftp::findOrFail($id);

        return view('admin.ftps.show', compact('ftp'));
    }


    /**
     * Remove Ftp from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('ftp_delete')) {
            return abort(401);
        }
        $ftp = Ftp::findOrFail($id);
        $ftp->delete();

        return redirect()->route('admin.ftps.index');
    }

    /**
     * Delete all selected Ftp at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('ftp_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Ftp::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Ftp from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('ftp_delete')) {
            return abort(401);
        }
        $ftp = Ftp::onlyTrashed()->findOrFail($id);
        $ftp->restore();

        return redirect()->route('admin.ftps.index');
    }

    /**
     * Permanently delete Ftp from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('ftp_delete')) {
            return abort(401);
        }
        $ftp = Ftp::onlyTrashed()->findOrFail($id);
        $ftp->forceDelete();

        return redirect()->route('admin.ftps.index');
    }
}
