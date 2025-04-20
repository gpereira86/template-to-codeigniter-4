<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Reply as ReplyModel;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class Reply extends BaseController
{
    public function store()
    {
        if ($this->request->isAJAX()) {
            $data = json_decode(file_get_contents("php://input"));

            $replied = (new ReplyModel())->insert([
               'comment_id' => $data->commentId,
               'user_id' => session()->get('user')->id,
               'comment' => $data->reply
            ]);

            return ($replied) ?
                $this->response->setJSON(['message' => 'replied'])->setStatusCode(200):
                $this->response->setJSON(['message' => 'not replied'])->setStatusCode(400);

        }
    }
}
