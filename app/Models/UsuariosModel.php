<?php

namespace  App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model{

    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['username', 'userpassword', 'useremail'];

    public function userInsert($dadosRecebidos){
        try {
            //code...
            $dataBase = \Config\Database::connect();


            $userName = $dadosRecebidos['username'];
            $useremail = $dadosRecebidos['useremail'];
            $userpassword = $dadosRecebidos['userpassword'];
            
            $query = "insert into users(username, userpassword, useremail) values('$userName','$userpassword','$useremail')";
            $respostaDb = $dataBase->query($query);
            if ($respostaDb) {
                # code...
                return true;
            }
            return false;

        } catch (\Throwable $th) {
            //throw $th;
            return false;
        }
    }

    public function getUsers($email,$senha){
        $dataBase = \Config\Database::connect();
        $query = "SELECT * FROM users WHERE id = (SELECT id WHERE useremail = '$email' AND userpassword = '$senha')";
        return $dataBase->query($query)->getResultArray();
    }

}