<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recepcionador</title>
</head>

<body>

    <?php require('sesion.php') ?>

    <div class="perspectivas">

        <h1>PERSPECTIVA DEL RECEPCIONISTA</h1>

    </div>

    <section id="seccionRecepcionista">
        <article id="cargarPaciente" class="articulosRecepcionista">

            <div class="titulos">

                <h1>CARGAR PACIENTE</h1>

            </div>

            <div id="formulario">

                <form action="index.php" method="post">Nombre y apellido:

                    <input type="text" name="paciente">

                    <input class="botones" type="submit" value="Cargar">

                </form>

            </div>

        </article>

        <article id="pacientesEspera" class="articulosRecepcionista">

            <div class="titulos">

                <h1>PACIENTES EN ESPERA</h1>

            </div>

            <?php require('llamarPaciente.php') ?>

            <form action="index.php" method="post">

                <div id="listaEspera">

                    <ul>
                        <?php

                        if (isset($_SESSION['listaDePacientesEnEspera']) && is_array($_SESSION['listaDePacientesEnEspera'])) {
                            $pacientes = $_SESSION['listaDePacientesEnEspera'];

                            foreach ($pacientes as $key => $paciente) {
                                $radio_id = "paciente_" . $key;

                                echo '<li><input type="radio" name="pacienteSeleccionado" value="' . htmlspecialchars($paciente, ENT_QUOTES, 'UTF-8') . '" id="' . $radio_id . '">';
                                echo '<label for="' . $radio_id . '">' . htmlspecialchars($paciente, ENT_QUOTES, 'UTF-8') . '</label></li>';
                            }
                        }
                        ?>
                    </ul>

                </div>

                <select name="listaConsultorios" id="consultorios">

                    <option value="Ninguno">Ninguno</option>
                    <option value="Consultorio 1">Consultorio 1</option>
                    <option value="Consultorio 2">Consultorio 2</option>
                    <option value="Consultorio 3">Consultorio 3</option>
                    <option value="Consultorio 4">Consultorio 4</option>
                    <option value="Consultorio 5">Consultorio 5</option>
                    <option value="Consultorio 6">Consultorio 6</option>

                </select>

                <input class="botones" type="submit" value="Llamar" id="llamar">

            </form>

        </article>

        <article id="pacientesLlamados" class="articulosRecepcionista">

            <div class="titulos">

                <h1>PACIENTES LLAMADOS</h1>

                <div class="listaLlamados">

                    <ul>
                        <?php

                        if (isset($_SESSION['listaDePacientesLlamados']) && is_array($_SESSION['listaDePacientesLlamados'])) {
                            $pacientes = array_reverse($_SESSION['listaDePacientesLlamados']);

                            foreach ($pacientes as $key => $paciente) {

                                $pacienteNombre = htmlspecialchars($paciente['paciente'], ENT_QUOTES, 'UTF-8');
                                $consultorioNombre = htmlspecialchars($paciente['consultorio'], ENT_QUOTES, 'UTF-8');

                                echo '<li>' . $pacienteNombre . ' - ' . $consultorioNombre . '</li>';
                            }
                        }
                        ?>
                    </ul>

                </div>

            </div>

        </article>
    </section>

    <!-------------- CAMBIO DE PERSPECTIVA -------------->

    <div class="perspectivas">

        <h1>PERSPECTIVA DE LA SALA DE ESPERA</h1>

    </div>

    <section>

        <h1>

            <?php

            if (isset($pacientes)) {

                echo $pacientes[0]['paciente'] . ' - ' . $pacientes[0]['consultorio'];
            }

            ?>

        </h1>

    </section>

    <section id="seccionSalaEspera">

        <article class="articulosSalaEspera">

            <div class="titulos">

                <h1>PACIENTES EN ESPERA</h1>

            </div>

            <div id="listaEsperaSalaDeEspera">

                <ul>
                    <?php

                    if (isset($_SESSION['listaDePacientesEnEspera']) && is_array($_SESSION['listaDePacientesEnEspera'])) {
                        $pacientes = $_SESSION['listaDePacientesEnEspera'];

                        foreach ($pacientes as $key => $paciente) {
                            echo '<li>' . htmlspecialchars($paciente, ENT_QUOTES, 'UTF-8') . '</li>';
                        }
                    }
                    ?>
                </ul>

            </div>

        </article>

        <article id="pacientesLlamados2" class="articulosSalaEspera">

            <div class="titulos">

                <h1>PACIENTES LLAMADOS</h1>

            </div>

            <div class="listaLlamados">

                <ul>
                    <?php

                    if (isset($_SESSION['listaDePacientesLlamados']) && is_array($_SESSION['listaDePacientesLlamados'])) {
                        $pacientes = array_reverse($_SESSION['listaDePacientesLlamados']);

                        foreach ($pacientes as $key => $paciente) {

                            $pacienteNombre = htmlspecialchars($paciente['paciente'], ENT_QUOTES, 'UTF-8');
                            $consultorioNombre = htmlspecialchars($paciente['consultorio'], ENT_QUOTES, 'UTF-8');

                            echo '<li>' . $pacienteNombre . ' - ' . $consultorioNombre . '</li>';
                        }
                    }
                    ?>
                </ul>

            </div>

        </article>

    </section>

    <!-------------- ESTILOS -------------->

    <style>
        html {
            font-family: "Open Sans", sans-serif;
        }

        #seccionRecepcionista {
            display: flex;
            justify-content: space-between;
        }

        #formulario {
            position: absolute;
            margin: 4px;
            font-size: 15px;
        }

        .articulosRecepcionista {
            width: 32%;
            min-height: 500px;
            border: 5px;
            border-style: solid;
            border-color: rgb(72, 163, 225);
            font-size: 15px;
        }

        .botones {
            height: 30px;
            background: none;
            border-color: rgb(72, 163, 225);
            transition: all .3s ease;
        }

        .botones:hover {
            background-color: gainsboro;
            transition: all .3s ease;
        }

        ul {
            list-style: none;
            padding-left: 10px;
        }

        ul li {
            margin: 2px;
        }

        .perspectivas {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgb(0, 0, 155);
            color: white;
            height: 70px;
        }

        .titulos {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgb(72, 163, 225);
        }

        #pacientesEspera {
            position: relative;
        }

        #pacientesLlamados {
            position: relative;
        }

        #consultorios {
            position: absolute;
            top: 98px;
            right: 10px;
        }

        #eligeUnConsultorio {
            position: absolute;
        }

        #llamar {
            position: absolute;
            top: 450px;
            left: 45%;
        }

        #listaEspera {
            position: absolute;
            top: 80px;
            height: 350px;
            overflow: auto;
        }

        .listaLlamados {
            position: absolute;
            top: 60px;
            left: 0px;
            height: 412px;
            overflow: hidden;
        }

        #seccionSalaEspera {
            display: flex;
            justify-content: space-between;
        }

        .articulosSalaEspera {
            width: 45%;
            min-height: 500px;
            border: 5px;
            border-style: solid;
            border-color: rgb(72, 163, 225);
            font-size: 15px;
        }

        #listaEsperaSalaDeEspera{
            height: 412px;
            overflow: hidden;
        }

        #pacientesLlamados2 {
            position: relative;
            font-size: 15px;
        }
    </style>
</body>

</html>