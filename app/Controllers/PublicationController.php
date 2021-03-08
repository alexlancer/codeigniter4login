<?php


namespace App\Controllers;


use App\Models\PublicationModel;

class PublicationController extends BaseController /*Déclaration de classe qui hérite du controlleur de base de CI*/
{


    public function publication(){ /*Crée une nouvelle publication*/
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post') { /* méthode post pour masqué les infos */
            //let's do the validation here
            $rules = [
                'hashtag' => 'required|min_length[1]|max_length[255]',    /* règle de longueur des info  */
                'description' => 'required|min_length[1]|max_length[255]',
                'auteur' => 'required|min_length[1]|max_length[255]'

            ];

            if (! $this->validate($rules)) { /* est_ce que regle NOK ?*/
                $data['validation'] = $this->validator; /*NOK*/
            }else{
                $model = new PublicationModel(); /* Création d'un nouvel objet PublicationModel afin d'appeler notre model*/

                $newData = [
                    'users_id' => session()->get('id'), /*Récuperation de l'id de l'user connecté que l'on affectera à la publication afin de lié user et publi  */
                    'hashtag' => $this->request->getVar('hashtag'), /* Récupération des var de POST*/
                    'description' => $this->request->getVar('description'),
                    'auteur' => $this->request->getVar('auteur')


                ];
                $model->save($newData); /* save est une méthode de CI pour sauvegarder des data en db équivaut à INSERT INTO etc.....*/
                $session = session();
                $session->setFlashdata('success', 'Successful Publish'); /*Validation*/
                return redirect()->to('/'); /*Rédirection vers dashboard*/

            }
        }


        echo view('templates/header', $data); /* Appel des vues*/
        echo view('publication');
        echo view('templates/footer');
    }

    public function displayVerifiedPublication(){   /*AFFICHAGE des publi verifiée*/

        $model = new PublicationModel();
        $dataTable['table'] = $model->selectVerifiedPublish();



        echo view('templates/header');
        echo view('displayPublication', $dataTable);
        echo view('templates/footer');
    }

    public function displayUnVerifiedPublication(){ /*AFFICHAGE des publi non vérifiée*/

        $model = new PublicationModel();
        $dataTable['table'] = $model->selectUnVerifiedPublish();



        echo view('templates/header');
        echo view('aprouvepublish', $dataTable);
        echo view('templates/footer');
    }

    public function userPublish(){  /*Afficher les publication de l'user courant */
        $idUser = session()->get('id');
        $model = new PublicationModel();
        $dataTable['table'] = $model->selectUserPublish($idUser); /*Envoi en parametre l'id de l'user courant au model */

        echo view('templates/header');
        echo view('displayPublication', $dataTable);
        echo view('templates/footer');
    }



    public function aprouvePublish()
    {  /*Permet d'approuvé les publications*/

        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            //


            $newData = [ // On change l'état du champs isverified à 1
                'isverified' => 1,


            ];
            $model = new PublicationModel();
            $model->update($this->request->getVar('approuve'), $newData);
            $session = session();
            $session->setFlashdata('success', 'Publication approuvée !');
            return redirect()->to('/');


        }


    }


    public function deletePublish(){ //Pour supprimer une publication
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {

            $model = new PublicationModel();
            $model->delete(['id' => $this->request->getVar('delete')]); // supprimer une ligne dans la table Publication en fct de son id
            $session = session();
            $session->setFlashdata('success', 'Successful deleted');
            return redirect()->to('/');


        }



    }
    public function publicationGestion(){     //gère l'aprobation ou la suppression des publication en fonction du bouton cliqué
        if(isset($_POST['approuve'])) {
            $this->aprouvePublish();
        }
        if(isset($_POST['delete'])){
            $this->deletePublish();

        }

        $this->displayUnVerifiedPublication();

    }


}