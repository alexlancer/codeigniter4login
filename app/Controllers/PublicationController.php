<?php


namespace App\Controllers;


use App\Models\PublicationModel;

class PublicationController extends BaseController
{


    public function publication(){
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            //let's do the validation here
            $rules = [
                'hashtag' => 'required|min_length[1]|max_length[255]',
                'description' => 'required|min_length[1]|max_length[255]',
                'auteur' => 'required|min_length[1]|max_length[255]'

            ];

            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else{
                $model = new PublicationModel();

                $newData = [
                    'users_id' => session()->get('id'),
                    'hashtag' => $this->request->getVar('hashtag'),
                    'description' => $this->request->getVar('description'),
                    'auteur' => $this->request->getVar('auteur')


                ];
                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Successful Publish');
                return redirect()->to('/');

            }
        }


        echo view('templates/header', $data);
        echo view('publication');
        echo view('templates/footer');
    }

    public function displayVerifiedPublication(){

        $model = new PublicationModel();
        $dataTable['table'] = $model->selectVerifiedPublish();



        echo view('templates/header');
        echo view('displayPublication', $dataTable);
        echo view('templates/footer');
    }

    public function displayUnVerifiedPublication(){

        $model = new PublicationModel();
        $dataTable['table'] = $model->selectUnVerifiedPublish();



        echo view('templates/header');
        echo view('aprouvepublish', $dataTable);
        echo view('templates/footer');
    }

    public function userPublish(){
        $idUser = session()->get('id');
        $model = new PublicationModel();
        $dataTable['table'] = $model->selectUserPublish($idUser);

        echo view('templates/header');
        echo view('displayPublication', $dataTable);
        echo view('templates/footer');
    }

public function publicationGestion(){
    if(isset($_POST['approuve'])) {
        $this->aprouvePublish();
    }
    if(isset($_POST['delete'])){
        $this->deletePublish();

    }

    $this->displayUnVerifiedPublication();

}

    public function aprouvePublish(){
        if(isset($_POST['approuve'])) {


            $data = [];
            helper(['form']);

            if ($this->request->getMethod() == 'post') {
                //let's do the validation here


                $newData = [
                    'isverified' => 1,


                ];
                $model = new PublicationModel();
                $model->update($this->request->getVar('approuve'), $newData);
                $session = session();
                $session->setFlashdata('success', 'Successful Publish');
                return redirect()->to('/');


            }


        }

    }
    public function deletePublish(){
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {

            $model = new PublicationModel();
            $model->delete(['id' => $this->request->getVar('delete')]);
            $session = session();
            $session->setFlashdata('success', 'Successful deleted');
            return redirect()->to('/');


        }



    }


}