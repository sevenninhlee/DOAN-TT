<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

use Auth;
use Hash;

use App\User;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->format) {
            return view('pages/users/index');
        }

        $in = $request->input;
        $res = array();
        $res['draw'] = $request->input('draw');

        $datatable = new Datatables(new User(), $request);

        $users = User::where('admin', '<>', '1')
                ->get();

        $res['recordsTotal'] = count($users);
        $res['recordsFiltered'] = count($users);
        $res['data'] = $users;

        return $res;
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return response(null, 200);
    }

    // Admin
    public function settings()
    {
        return view('pages/settings');
    }

    public function password(Request $request)
    {
        $data = $request->all();
        if (Hash::check($data['current'], Auth::user()->password)) {
            User::find(Auth::user()->id)->update([
                'password' => Hash::make($data['new']),
            ]);
            $res['status'] = 200;
            return $res;
        } else {
            $res['status'] = 400;
            return $res;
        }
    }

    public function profile(Request $request)
    {
        $data = $request->all();
        $user = User::find(Auth::user()->id);
        User::find(Auth::user()->id)->update([
            'email' => $data['email']
        ]);
        $res['status'] = 200;
        return $res;
    }
}
