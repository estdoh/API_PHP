<?php
require_once "app/Model/BudgetsModel.php";
require_once "app/View/ApiView.php";

class ApiBudgetsController{

    private $model;
    private $view;

    function __construct(){
        $this->model = new BudgetsModel();
        $this->view = new ApiView();
    }

    function getBudgets(){
        $budgets = $this->model->getBudgets();
        // print_r($budgets);
        $total_budgets = [];
        foreach($budgets as $budget) {            
            $budget = [
                "cliente_name" => $budget->client_name,
                "budget_description" => $budget->budget_description,
                "budget_detail" => [
                    "quantity_product" => $budget->quantity_product,
                    "name_product" => $budget->name_product,
                    "price_product" => $budget->price_product
                ],
                "budget_total" => $budget->budget_total,
            ];
            array_push($total_budgets, $budget);

        }
        return $this->view->response($total_budgets, 200);
    }

    function getBudget($params = null){
        $id = $params[":ID"];
        $budget = $this->model->getBudgetById($id);
        
        if (!empty($budget)){
            $budget = [
                "cliente_name" => $budget->client_name,
                "budget_description" => $budget->budget_description,
                "budget_detail" => [
                    "quantity_product" => $budget->quantity_product,
                    "name_product" => $budget->name_product,
                    "price_product" => $budget->price_product
                ],
                "budget_total" => $budget->budget_total,
            ];
            return $this->view->response($budget, 200);
        } else {
            $this->view->response("El Presupuesto con el id: $id no existe", 404);
        };
    }

    public function deleteBudget($params = null) {
        $id = $params[':ID'];
        $budget = $this->model->getBudgetById($id);
        if($budget){
            $this->model->deleteBudget($id);
            $this->view->response("El presupuesto con el id: $id fue eliminada", 200);
        } else {
            $this->view->response("El presupuesto con el id: $id no existe", 404);
        };
    }

    public function insertBudget(){
        $body = $this->getBody();    
        if (!empty($body)) {
            $id = $this->model->addBudget($body->cliente_name,$body->budget_description,$body->budget_detail,$body->budget_total);
            $this->view->response( $this->model->getBudgetById($id), 200);
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