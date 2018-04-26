<?php
require '../model/usuariosModel.php';
require '../libs/Request.php';
require '../libs/Security.php';

class usuariosController extends usuariosModel
{
    public function main()
    {
        $security=new Security();
        $pass=$security->has('123');
        $token=$security->genToken(60);
       $answer= $this->getTable(['id'],'usuarios');
        $this->response($answer,200);
    }
}