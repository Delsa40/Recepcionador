<?php

    session_start();

    if (!isset($_SESSION['listaDePacientesEnEspera'])) {
        $_SESSION['listaDePacientesEnEspera'] = array();
    }

    if(isset($_POST['paciente'])){

        if($_POST['paciente'] != ""){
            
            $_SESSION['listaDePacientesEnEspera'][] = $_POST['paciente'];
        
        }

    }

?>