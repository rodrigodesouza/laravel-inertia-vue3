<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('User/RegisterView');
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

        return Redirect::route('login')
            ->with('success', 'Cadastro realizado com sucesso! Faça login para área administrativa.');
    }
}
