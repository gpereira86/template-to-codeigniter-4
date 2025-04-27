<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Comment as CommentModel;

class Comment extends BaseController
{
    public function store()
    {
        $validated = $this->validate([
            'comment' => 'required',
        ],[
            'comment' => [
                'required' => 'O comentário é obrigatório',
                ]
            ]
        );

        if (!$validated) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->back();
        }

        $created = (new CommentModel())->insert([
            'user_id' => session()->get('user')->id,
            'post_id' => $this->request->getPost('post_id'),
            'comment' => strip_tags((string)$this->request->getPost('comment')),
        ]);

        $created ?
            session()->setFlashdata('created', 'Comentário cadastrado com sucesso!') :
            session()->setFlashdata('not_created', 'Ocorreu um erro ao cadastrar o comentario!');

        return redirect()->back();
    }
}
