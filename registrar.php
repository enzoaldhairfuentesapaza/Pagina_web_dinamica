<?php
    include("con_db.php");
    if($conex)
    {
        echo "Conexion a la base de datos correcta";
    }
    $lenguajesProgramacion = isset($_POST['lenguajes_programacion']) ? $_POST['lenguajes_programacion'] : array();
    $habilidades = isset($_POST['habilidades']) ? $_POST['habilidades'] : array();
    if(isset($_POST['Enviar']))
    {

        if(strlen($_POST['n_apellidos']) >= 1 
        && strlen($_POST['f_nacimiento'])>=1 
        && strlen($_POST['ocupacion'])>=1
        && strlen($_POST['contacto'])>=1
        && strlen($_POST['nacionalidad'])>=1
        && strlen($_POST['aptitudes'])>=1
        && strlen($_POST['perfil'])>=1 )
        {
            $nombreApellidos = $_POST['n_apellidos'];
            $fechaNacimiento = $_POST['f_nacimiento'];
            $ocupacion = $_POST['ocupacion'];
            $contacto = $_POST['contacto'];
            $nacionalidad = $_POST['nacionalidad'];
            $nivelIngles = $_POST['n_ingles'];
            $aptitudes = $_POST['aptitudes'];
            $perfil = $_POST['perfil'];

            $fechareg = date("d/m/y");

            $trabajos = $_POST["trabajo"];
            $empresas = $_POST["empresa"];
            $titulos = $_POST["titulo"];
            $instituciones = $_POST["institucion"];
            $idiomas = $_POST["idioma"];
            $aptitudes_habilidades = $_POST["aptitud"];

            $consulta1 = "INSERT INTO datos(nombre, fecha, contacto, nacionalidad, nivel_ingles, lenguaje, aptitudes, habilidades, perfil, fecha_reg) VALUES ('$nombreApellidos','$fechaNacimiento','$contacto','$nacionalidad','$nivelIngles','Python','aptitud','Prox','$perfil','$fechareg')";

            for ($i = 0; $i < count($trabajos); $i++) 
            {
                $trabajo = ($trabajos[$i]);
                $empresa = ($empresas[$i]);
                $consulta = "INSERT INTO exp_laboral (trabajo, empresa) VALUES ('$trabajo','$empresa')";
                $resultado = mysqli_query($conex,$consulta);
            }

            for ($i = 0; $i < count($titulos); $i++) 
            {
                $titulo = ($titulos[$i]);
                $institucion = ($instituciones[$i]);
                $consulta = "INSERT INTO formacion (titulo, institucion) VALUES ('$titulo','$institucion')";
                $resultado = mysqli_query($conex,$consulta);

            }

            for ($i = 0; $i < count($idiomas); $i++) 
            {
                $idioma = ($idiomas[$i]);
                $consulta = "INSERT INTO  idioma (idioma) VALUES ('$idioma')";
                $resultado = mysqli_query($conex,$consulta);

            }

            for ($i = 0; $i < count($aptitudes_habilidades); $i++)
            {
                $aptitud_habilidad = ($aptitudes_habilidades[$i]);
                $consulta = "INSERT INTO habilidades (aptitudes) VALUES ('$aptitud_habilidad')";
                $resultado = mysqli_query($conex,$consulta);
            }
            $resultado = mysqli_query($conex,$consulta1);
            if($resultado)
            {
                ?>
                <div> <h4 class="ok">¡Te has inscrito correctamente! </h4> <br></div>
                <?php
            }
            else
            {
                ?>
                <div><h4 class="bad"> ¡Se ha generado un error! </h4><br></div>
                <?php
            }
        }
        ?>

    <div class="grid-container">
        <div class="grid-item1">
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135768.png" alt="" class="imagen">
        </div>
        <div class="grid-item2">
            <?php echo"<h1>$nombreApellidos</h1>"?>
            <h2>PUESTO OCUPADO / BUSCADO</h2>
        </div>
        <div class="grid-item3">
            <h2>contacto</h2>
            <div class="text-icono">
                <p><img src="https://assets.stickpng.com/images/5a4525cd546ddca7e1fcbc84.png" alt="" class="icono"><?php echo $contacto ?></p>
                <p><img src="https://assets.stickpng.com/thumbs/584856a0e0bb315b0f7675a9.png" alt="" class="icono">jose.martinez@gmail.com</p>
                <p><img src="https://static.vecteezy.com/system/resources/previews/009/589/962/non_2x/location-location-pin-location-icon-transparent-free-png.png" alt="" class="icono">México DF</p>
                <p><img src="https://cdn-icons-png.flaticon.com/512/49/49408.png" alt="" class="icono">linkedin.com/jose-martinez</p>
            </div>
            <h2>idiomas</h2>
                <p>Español: Nativo</p>
                <p>Inglés: <?php echo $nivelIngles ?></p>
                <p><?php for ($i = 0; $i < count($idiomas); $i++) {
                echo $idiomas[$i] . "<br>\n"; } ?></p>

            <h2>aptitudes</h2>
                <ul class="list">
                <li><?php for ($i = 0; $i < count($aptitudes_habilidades); $i++) {
                echo $aptitudes_habilidades[$i] . "<br>\n"; } ?></li>

                </ul>
            <h2>habilidades</h2>
                <ul class="list">
                    <li> <?php echo implode(", ", $habilidades) ?> </li>
                </ul>
            <h2>Otros intereses</h2>
                <ul class="list">
                    <li> <?php echo $aptitudes ?> </li>
                </ul>
        </div>
        <div class="grid-item4">
            <h2>perfíl</h2>
                <p><?php echo $perfil ?></p>
            <h2>experiencia laboral</h2>

                <div class="exp-lab">
                    <h3 class="cursiva">Trabajo</h3>
                    <h3 class="transparente">| Empresa</h3>
                </div>
                <ul class="list2">
                    <li> <?php  for ($i = 0; $i < count($trabajos); $i++){
                            echo $trabajos[$i] . " , " . $empresas[$i] . "<br>\n";}?> 
                    </li>
                </ul>

            <h2>Formacion</h2>
                <div class="exp-lab">
                    <h3> <?php  for ($i = 0; $i < count($titulos); $i++){
                            echo $titulos[$i] . " , " . $instituciones[$i] . "<br>\n";}?> 
                    </h3>
                </div>
        </div>
    </div>
        <?php
    }
    else
    {
        ?>
        <div><h4 class="bad"> !Por favor complete los campos! </h4><br></div>
        <?php
    }
?>
