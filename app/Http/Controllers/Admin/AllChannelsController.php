<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class AllChannelsController extends Controller
{
    public function index()
    {
        if (! Gate::allows('all_channel_access')) {
            return abort(401);
        }
        return view('admin.all_channels.index');
    }
}
