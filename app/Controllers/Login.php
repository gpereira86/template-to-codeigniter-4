<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use CodeIgniter\HTTP\ResponseInterface;
use App\Libraries\Login as LoginLib;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function store()
    {
        $validated = $this->validate([
            'email' => 'required|valid_email',
            'password' => 'required'
        ],[
            'email' => [
                'required' => 'O email é obrigatorio',
                'valid_email' => 'O email deve ser válido'
            ],
            'password' => [
                'required' => 'A campo password é obrigatorio',
            ]
        ]);

        if (!$validated) {
            return redirect()->route('login')->with('errors', $this->validator->getErrors());
        }

        $user = (new User())->where('email', $this->request->getPost('email'))->first();
        
        if (!$user) {
            return redirect()->route('login')->with('error', 'Email ou senha inválidos');
        }

        if (!password_verify((string)$this->request->getPost('password'), $user->password)) {
            return redirect()->route('login')->with('error', 'Email ou senha inválidos');
        }

        LoginLib::login($user);

        return redirect()->route('home');

    }

    public function destroy()
    {
        session()->remove('auth');
        session()->remove('user');

        return redirect()->route('home');
    }
}
