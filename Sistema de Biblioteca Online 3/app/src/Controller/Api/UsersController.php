<?php

namespace App\Controller\Api;

use App\Controller\AppController;

class UsersController extends AppController
{
    public function add()
    {
        $this->loadModel('User');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $arr = [
                    'status' => 200,
                    'message' => ' user cadastrado com succe'
                ];
                echo json_encode(($arr));
            } else {
                echo "Nao deu certo";
            }
        }
        exit;
    }
}
