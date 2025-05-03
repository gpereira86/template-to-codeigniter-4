<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Register extends BaseController
{
    public function index()
    {
        return view('register');
    }

    public function store()
    {
        $validated = $this->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required'
        ], [
                'firstName' => [
                    'required'      => 'O campo nome é obrigatorio',
                ],
                'lastName' => [
                    'required'      => 'O campo sobrenome é obrigatorio',
                ],
                'email' => [
                    'required'      => 'O campo e-mail é obrigatorio',
                    'valid_email'   => 'Insira um e-mail válido',
                    'is_unique'     => 'O email já encontra-se cadastrado'
                ],
                'password' => [
                    'required'      => 'A senha é obrigatoria',
                ]
            ]
        );

        if (!$validated) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->route('register');
        }

    }
}
