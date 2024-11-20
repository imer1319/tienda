<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\StoreRequest;
use App\Http\Requests\Client\UpdateRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Yajra\Datatables\Datatables;

class ClientController extends Controller
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

    public function create()
    {
        $client = new User();
        return view('admin.clients.create', [
            'client' => $client
        ]);
    }

    public function store(StoreRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'username' => $request['username'],
                'password' => $request['password']
            ]);

            $client = new Profile([
                'apellido_paterno' => $request['apellido_paterno'],
                'apellido_materno' => $request['apellido_materno'],
                'ci' => $request['ci'],
                'phone' => $request['phone'],
                'ciudad' => $request['ciudad'],
                'direccion' => $request['direccion'],
                'fecha_nacimiento' => $request['fecha_nacimiento'],
                'genero' => $request['genero'],
            ]);

            $user->save();
            $user->profile()->save($client);

            $clienteRole = Role::findByName('Cliente');
            $user->assignRole($clienteRole);

            return redirect()->route('admin.clients.index')->with('flash', 'Cliente creado corretamente');
        });
    }

    public function show(User $client)
    {
        return view('admin.clients.show', [
            'client' => $client
        ]);
    }

    public function edit(User $client)
    {
        return view('admin.clients.edit', [
            'client' => $client->load('profile')
        ]);
    }
    public function update(UpdateRequest $request, User $client)
    {
        $profile = $client->profile; // Suponiendo que el usuario tiene un perfil relacionado
        $validated = $request->validate([
            'username' => Rule::unique('users')->ignore($client->id),
            'ci' => Rule::unique('profiles')->ignore($profile->id),
            'email' => Rule::unique('users')->ignore($client->id),
        ]);
        return DB::transaction(function () use ($request, $client) {
            $client->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'username' => $request->input('username'),
                'password' => $request->input('password'),
            ]);

            $client->profile()->updateOrCreate(
                ['user_id' => $client->id],
                [
                    'apellido_paterno' => $request->input('apellido_paterno'),
                    'apellido_materno' => $request->input('apellido_materno'),
                    'ci' => $request->input('ci'),
                    'phone' => $request->input('phone'),
                    'ciudad' => $request->input('ciudad'),
                    'direccion' => $request->input('direccion'),
                    'fecha_nacimiento' => $request->input('fecha_nacimiento'),
                    'genero' => $request->input('genero'),
                ]
            );
            $clienteRole = Role::findByName('Cliente');
            if (!$client->hasRole('Cliente')) {
                $client->assignRole($clienteRole);
            }

            return redirect()->route('admin.clients.index')->with('flash', 'Cliente actualizado correctamente');
        });
    }


    public function destroy(User $client)
    {
        $client->delete();
        $client->profile()->delete();
        return redirect()->route('admin.clients.index')->with('flash', 'Cliente eliminado corretamente');
    }
}
