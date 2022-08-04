<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::filter(request()->all())->paginate(15);

        return Inertia::render('User/UsersView', [
            'users' => $users,
            'active_users' => 3400,
            'inactive_users' => 600,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('User/CreateUserFormView');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:50'],
            'password' => ['required', 'max:50'],
            'email' => ['required', 'max:50', 'email', 'unique:users'],
        ]);
        $request['password'] = bcrypt($request->password);

        User::create(
            $request->all()
        );

        return Redirect::route('users')
            ->with('success', 'Cadastro realizado com sucesso!');
    }

    public function show($id)
    {
        return Inertia::render('User/UserFormView', ['user' => User::find($id)]);
    }

    public function edit($id)
    {
        $user = User::find($id);

        return Inertia::render('User/UserFormView', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:50'],
            'password' => ['max:50', 'nullable'],
            'email' => ['required', 'max:50', 'email'],
        ]);

        $validated = array_filter($validator->validated());

        $user = User::find($id);

        if ($user->update($validated)) {
            return redirect()->route('users')->with('success', 'Registro atualizado com sucesso!');
        }

        return redirect()->back()->withErrors('Não foi possível atualizar o registro.');
    }

    public function destroy($id)
    {
        try {
            $user = User::find($id);
            if (!$user) {
                return redirect()->back()
                    ->withErrors('Usuário não encontrado.');
            }

            $user->delete();

            return redirect()->back()->with('success', 'Usuário deletado com sucesso!');

        } catch (\Exception $e) {
            return redirect()->back()
            ->withErrors('Não foi possível deletar usuário');
        }
    }
}
