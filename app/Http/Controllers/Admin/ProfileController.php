<?php

namespace App\Http\Controllers\Admin;

use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:profiles_index')->only(['index', 'datatables']);
        $this->middleware('permission:profiles_create')->only(['create', 'store']);
        $this->middleware('permission:profiles_show')->only('show');
        $this->middleware('permission:profiles_edit')->only(['edit', 'update']);
        $this->middleware('permission:profiles_destroy')->only('destroy');
    }

    public function datatables()
    {
        $users = User::with(['profile', 'roles'])
            ->whereHas('roles', function ($query) {
                $query->where('name', 'Cliente');
            })
            ->orderBy('id', 'desc');

        return DataTables::of($users)
            ->addColumn('full_name', function ($user) {
                return $user->name . ' ' . $user->profile->apellido_paterno . ' ' . $user->profile->apellido_materno;
            })
            ->addColumn('ci', function ($user) {
                return $user->profile->ci;
            })
            ->addColumn('phone', function ($user) {
                return $user->profile->phone;
            })
            ->addColumn('genero', function ($user) {
                return $user->profile->genero;
            })
            ->addColumn('btn', 'admin.clients.partials.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }


    public function index()
    {
        return view('admin.clients.index');
    }

    public function show(User $client)
    {
        return view('admin.clients.show', [
            'client' => $client
        ]);
    }

    public function destroy(Profile $profile)
    {
        $profile->delete();
        return redirect()->route('admin.clients.index')->with('flash', 'Cliente eliminado corretamente');
    }
}
