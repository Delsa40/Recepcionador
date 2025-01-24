<?php

if (!isset($_SESSION['listaDePacientesLlamados'])) {
    $_SESSION['listaDePacientesLlamados'] = array();
}

if (isset($_POST['pacienteSeleccionado']) && isset($_POST['listaConsultorios'])) {

    if ($_POST['listaConsultorios'] == "Ninguno") {

        echo '<div id="eligeUnConsultorio">'."Elige un consultorio".'</div>';

    } else {
        $pacienteConsultorio = array(
            'paciente' => $_POST['pacienteSeleccionado'],
            'consultorio' => $_POST['listaConsultorios']
        );
        $_SESSION['listaDePacientesLlamados'][] = $pacienteConsultorio;

        $pacienteSeleccionado = $_POST['pacienteSeleccionado'];
        foreach ($_SESSION['listaDePacientesEnEspera'] as $key => $paciente) {
            if ($paciente == $pacienteSeleccionado) {
                unset($_SESSION['listaDePacientesEnEspera'][$key]);
                break; 
            }
        }
    }
}
