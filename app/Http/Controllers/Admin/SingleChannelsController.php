<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class SingleChannelsController extends Controller
{
    public function index()
    {
        if (! Gate::allows('single_channel_access')) {
            return abort(401);
        }
        return view('admin.single_channels.index');
    }
}
