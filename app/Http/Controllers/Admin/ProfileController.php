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
        return DataTables::of(DB::table('users')
            ->join('profiles', 'users.id', '=', 'profiles.user_id')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select('users.id', 'users.name', 'profiles.ci', 'profiles.phone', 'profiles.genero', 'profiles.apellido_paterno', 'profiles.apellido_materno')
            ->where('roles.name', 'Cliente')
            ->orderBy('users.id', 'desc'))
            ->addColumn('full_name', function ($user) {
                return $user->name . ' ' . $user->apellido_paterno . ' ' . $user->apellido_materno;
            })
            ->addColumn('ci', function ($user) {
                return $user->ci;
            })
            ->addColumn('phone', function ($user) {
                return $user->phone;
            })
            ->addColumn('genero', function ($user) {
                return $user->genero;
            })
            ->addColumn('btn', 'admin.clients.partials.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function index()
    {
        return view('admin.clients.index');
    }

    public function show(Profile $profile)
    {
        return view('admin.profiles.show', [
            'profile' => $profile
        ]);
    }

    public function destroy(Profile $profile)
    {
        $profile->delete();
        return redirect()->route('admin.clients.index')->with('flash', 'Cliente eliminado corretamente');
    }
}
