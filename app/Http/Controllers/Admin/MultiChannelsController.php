<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class MultiChannelsController extends Controller
{
    public function index()
    {
        if (! Gate::allows('multi_channel_access')) {
            return abort(401);
        }
        return view('admin.multi_channels.index');
    }
}
