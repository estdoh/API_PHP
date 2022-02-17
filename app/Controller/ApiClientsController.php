<?php
require_once "Model/ClientsModel.php";
require_once "View/ApiView.php";

class ApiClientsController{

    private $model;
    private $view;

    function __construct(){
        $this->model = new ClientsModel();
        $this->view = new ApiView();
    }

    function getClients(){
        $clients = $this->model->getClients();
        // $clients = json_encode($clients); //convertir a json
        return $this->view->response($clients, 200);
    }

    function getClient($params = null){
        $id = $params[":ID"];
        $client = $this->model->getClientById($id);
        if (!empty($client)){
            return $this->view->response($client, 200);
        } else {
            $this->view->response("La Presupuesto con el id=$id no existe", 404);
        };
    }

    public function deleteClient($params = null) {
        $id = $params[':ID'];
        $client = $this->model->getClients($id);
        if($client){
            $this->model->deleteClient($id);
            $this->view->response("El cliente con el id=$id fue eliminada", 200);
        } else {
            $this->view->response("El cliente con el id=$id no existe", 404);
        };
    }

    public function insertClient(){
        $body = $this->getBody();               
        if (!empty($body)) {
            $id = $this->model->addClient($body->client_name,$body->client_mail,$body->client_phone);
            $this->view->response( $this->model->getClientById($id), 201);
        } else {
            $this->view->response("El cliente no se pudo insertar", 404);
        };
    }

    private function getBody(){
        $bodystring = file_get_contents("php://input");
        // return $bodystring;
        return json_decode($bodystring);
    }

    public function editClient($params = null){
        $id = $params[':ID'];
        //agarro los datos de request (json)
        $body = $this->getBody();
        $client = $this->model->getClientById($id);
        // verifica si la tarea existe
        if (!empty($client)) {
            $this->model->updateClientById($body->cliente_name,$body->client_description,$body->client_detail,$body->client_total, $id);
            $this->view->response( $this->model->getClientById($id), 200);
        } else {
            $this->view->response("El cliente no se pudo insertar", 404);
        };
    }
}