<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Upload extends BaseController
{
    public function store()
    {
        $img = $this->request->getFile('userfile');

        if (! $this->validateData([], [
            'userfile' => 'uploaded[userfile]|is_image[userfile]|ext_in[userfile,jpg,jpeg,png]|max_dims[userfile,1920,1080]',
        ], [
            'userfile' => [
                'uploaded' => 'Escolha uma imagem',
                'is_image' => 'O arquivo escolhido não é uma imagem',
                'ext_in' => 'A extensão '. $img->getExtension() .' não é válida',
                'max_dims' => 'A imagem não pode ter mais de 1920x1080',
            ]
        ])) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->route('home');
        }

        $name = $img->getRandomName();
        \Config\Services::image('gd')
            ->withFile($img)
            ->text('Copyright 2017 My Photo Co', [
                'color'      => '#fff',
                'opacity'    => 0.5,
                'withShadow' => true,
                'hAlign'     => 'center',
                'vAlign'     => 'middle',
                'fontSize'   => 100,
            ])
            ->resize(640,480, true)
            ->save(FCPATH . 'assets/img/uploads/' . $name, 50);

        if (! $img->hasMoved()) {

//            $img->store('../../public/assets/img/uploads', $img->getRandomName());
            session()->setFlashdata('uploaded', 'Uploaded sucesseful');

            return redirect()->route('home');

        }



    }
}
