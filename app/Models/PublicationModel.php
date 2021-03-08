<?php


namespace App\Models;
use CodeIgniter\Model;

class PublicationModel extends Model
{
    protected $table = 'publication';
    protected $allowedFields = ['id','users_id','hashtag', 'description', 'auteur', 'isverified'];



    function selectUserPublish($idUser){
        $builder = $this->db->table('publication');
        $builder = $builder->where('users_id', $idUser);
        $data = $builder->get()->getResultArray();

        return $data;

    }

    function selectVerifiedPublish(){
        $builder = $this->db->table('publication');
        $builder = $builder->where('isverified', 1);
        $data = $builder->get()->getResultArray();

        return $data;

    }

    function selectUnVerifiedPublish(){
        $builder = $this->db->table('publication');
        $builder = $builder->where('isverified', 0);
        $data = $builder->get()->getResultArray();

        return $data;

    }

}
