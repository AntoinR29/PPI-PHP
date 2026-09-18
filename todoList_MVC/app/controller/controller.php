<?php 

// Corrigido para a pasta 'models' (plural)
require_once __DIR__ . '/../models/tarefa.php';

class tarefaController {
    private $tarefaModel; 

    public function __construct() {
        $this->tarefaModel = new Tarefa(); 
    }

    public function index() {
        $tarefas = $this->tarefaModel->listar(); 
        // Corrigido para a pasta 'views' (plural)
        include __DIR__ . '/../views/listar.php'; 
    }

    public function criar() {
        if(isset($_POST['descricao']) && !empty(trim($_POST['descricao']))) {
            $this->tarefaModel->criar($_POST['descricao']);
        }
        header("Location: index.php");
    }

    public function excluir() {
        if(isset($_GET['id'])) {
            $this->tarefaModel->excluir($_GET['id']);
        }
        header("Location: index.php"); 
    }

    // Adicionado para suportar a rota 'editar' do index.php
    public function editar() {
        if(isset($_GET['id'])) {
            // Vai precisar de uma função no Model para procurar a tarefa pelo ID
            // $tarefa = $this->tarefaModel->buscarPorId($_GET['id']);
            // include __DIR__ . '/../views/editar.php';
        }
    }

    // Adicionado para suportar a rota 'atualizar' do index.php
    public function atualizar() {
        if(isset($_POST['id']) && isset($_POST['descricao'])) {
            // Vai precisar de criar esta função no seu tarefa.php (Model)
            // $this->tarefaModel->atualizar($_POST['id'], $_POST['descricao']);
        }
        header("Location: index.php");
    }
}
?>