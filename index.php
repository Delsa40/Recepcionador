<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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

            if (isset($pacientes[0])) {

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

</body>

</html>