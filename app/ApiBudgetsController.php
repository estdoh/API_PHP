<?php
require_once "Model/BudgetsModel.php";
require_once "View/ApiView.php";

class ApiBudgetsController{

    private $model;
    private $view;

    function __construct(){
        $this->model = new BudgetsModel();
        $this->view = new ApiView();
    }

    function getBudgets(){
        $budgets = $this->model->getBudgets();
        var_dump($budgets);
        return $this->view->response($budgets, 200);
    }

    function getBudget($params = null){
        $id = $params[":ID"];
        $budget = $this->model->getBudgetById($id);
        if (!empty($budget)){
            return $this->view->response($budget, 200);
        } else {
            $this->view->response("La Presupuesto con el id=$id no existe", 404);
        };
    }

    public function deleteBudget($params = null) {
        $id = $params[':ID'];
        $budget = $this->model->getBudgets($id);
        if($budget){
            $this->model->deleteBudget($id);
            $this->view->response("El presupuesto con el id=$id fue eliminada", 200);
        } else {
            $this->view->response("El presupuesto con el id=$id no existe", 404);
        };
    }

    public function insertBudget(){
        //agarro los datos de request (json)
        $body = $this->getBody();
        // verifica si la tarea existe
        //  convert to string
        
        
       
        if (!empty($body)) {
            $id = $this->model->addBudget($body->cliente_name,$body->budget_description,$body->budget_detail,$body->budget_total);
            $this->view->response( $this->model->getBudgetById($id), 201);
        } else {
            $this->view->response("El presupuesto no se pudo insertar", 404);
        };
    }

    private function getBody(){
        $bodystring = file_get_contents("php://input");
        // return $bodystring;
        return json_decode($bodystring);
    }

    public function editBudget($params = null){
        $id = $params[':ID'];
        //agarro los datos de request (json)
        $body = $this->getBody();
        $budget = $this->model->getBudgetById($id);
        // verifica si la tarea existe
        if (!empty($budget)) {
            $this->model->updateBudgetById($body->cliente_name,$body->budget_description,$body->budget_detail,$body->budget_total, $id);
            $this->view->response( $this->model->getBudgetById($id), 200);
        } else {
            $this->view->response("El presupuesto no se pudo insertar", 404);
        };
    }
}