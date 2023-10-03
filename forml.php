<!DOCTYPE html>
<html>
<head>
    <title>Formulario</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
    body 
    {
        font-family: Arial, sans-serif;
        background: linear-gradient(to right, hsla(35, 88%, 52%, 0.788), hsla(10, 100%, 59%, 0.822)); 
        margin: 0;
        padding: 0;
    }

    h1 
    {
        text-align: center;
        color: #333;
    }

    form 
    {
        background-color: #fff;
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label 
    {
        font-weight: bold;
    }

    input[type="text"], input[type="date"], select, textarea 
    {
        width: 100%;
        height: 40px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    input[type="radio"], input[type="checkbox"] 
    {
        margin-right: 5px;
        
    }
    #programacion
    {
        height: 100%;
    }
    input[type="submit"] 
    {
        background-color: #333;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        font-weight: bold;
    }

    input[type="submit"]:hover 
    {
        background-color: #555;
    }
    </style>
</head>
<body>
    <h1>Formulario</h1>
    <form method="post">
        <label for="n_apellidos">Nombre y Apellidos:</label>
        <input type="text" id="n_apellidos" name="n_apellidos" required><br><br>

        <label for="f_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="f_nacimiento" name="f_nacimiento" required><br><br>

        <label for="ocupacion">Ocupación:</label>
        <input type="text" id="ocupacion" name="ocupacion" required><br><br>

        <label for="contacto">Contacto (teléfono, email):</label>
        <input type="text" id="contacto" name="contacto" required><br><br>

        <label for="nacionalidad">Nacionalidad:</label>
        <select id="nacionalidad" name="nacionalidad">
            <option value="Español">Español</option>
            <option value="Ingles">Inglés</option>
            <option value="Frances">Francés</option>
            <option value="Italiano">Italiano</option>
            <option value="Portugues">Portugues</option>
        </select><br><br>

        <label>Nivel de inglés:</label><br>
            <input type="radio" id="basico" name="n_ingles" value="basico">
            <label for="basico">Básico</label><br>
            <input type="radio" id="intermedio" name="n_ingles" value="intermedio">
            <label for="intermedio">Intermedio</label><br>
            <input type="radio" id="avanzado" name="n_ingles" value="avanzado">
            <label for="avanzado">Avanzado</label><br>
            <input type="radio" id="fluido" name="n_ingles" value="fluido">
            <label for="fluido">Fluido</label><br><br>

        <label for="programacion">Lenguajes de Programación:</label>
        <select id="programacion" name="programacion" multiple>
            <option value="java">Java</option>
            <option value="python">Python</option>
            <option value="javascript">JavaScript</option>
            <option value="csharp">C#</option>
        </select><br><br>

        <label for="aptitudes">Aptitudes:</label>
        <input type="text" id="aptitudes" name="aptitudes" list="aptitudes_list">
        <datalist id="aptitudes_list">
            <option value="Comunicación">
            <option value="Resolución de problemas">
            <option value="Trabajo en equipo">
        </datalist><br><br>

        <label>Habilidades:</label><br>
            <input type="checkbox" id="habilidad1" name="habilidades[]" value="Creatividad">
            <label for="habilidad1">Creatividad</label><br>
            <input type="checkbox" id="habilidad2" name="habilidades[]" value="Pensamiento analítico">
            <label for="habilidad2">Pensamiento Analítico</label><br>
            <input type="checkbox" id="habilidad3" name="habilidades[]" value="Resolución de problemas">
            <label for="habilidad3">Resolución de Problemas</label><br>
        <br><br>

        <label for="perfil">Perfil:</label><br>
        <textarea id="perfil" name="perfil" rows="4" cols="50"></textarea><br><br>

        


        <label>Experiencia Laboral</label><br>
        <div id="experiencia-laboral">
            <div>
                <input type="text" name="trabajo[]" placeholder="Trabajo">
                <input type="text" name="empresa[]" placeholder="Empresa">
                <button type="button" class="eliminar-campo">Eliminar</button><br><br>
            </div>
        </div>
        <button type="button" id="agregar-experiencia">Agregar Experiencia Laboral</button><br><br>

        <label>Formación</label><br>
        <div id="formacion">
            <div>
                <input type="text" name="titulo[]" placeholder="Título">
                <input type="text" name="institucion[]" placeholder="Institución">
                <button type="button" class="eliminar-campo">Eliminar</button><br><br>
            </div>
        </div>
        <button type="button" id="agregar-formacion">Agregar Formación</button><br><br>

        <label>Idiomas</label><br>
        <div id="idiomas">
            <div>
                <input type="text" name="idioma[]" placeholder="Idioma">
                <button type="button" class="eliminar-campo">Eliminar</button><br><br>
            </div>
        </div>
        <button type="button" id="agregar-idioma">Agregar Idioma</button><br><br>

        <label>Aptitudes y Habilidades</label><br>
        <div id="aptitudes-habilidades">
            <div>
                <input type="text" name="aptitud[]" placeholder="Aptitud/Habilidad">
                <button type="button" class="eliminar-campo">Eliminar</button><br><br>
            </div>
        </div>
        <button type="button" id="agregar-aptitud">Agregar Aptitud/Habilidad</button><br><br>
        <br>
        <input type="submit" name="Enviar">

    </form>
    <script>
        $(document).ready(function() 
        {
            $("#agregar-experiencia").click(function() 
            {
                $("#experiencia-laboral").append('<div><input type="text" name="trabajo[]" placeholder="Trabajo"><input type="text" name="empresa[]" placeholder="Empresa"><button type="button" class="eliminar-campo">Eliminar</button></div><br>');
            });

            $("#agregar-formacion").click(function() 
            {
                $("#formacion").append('<div><input type="text" name="titulo[]" placeholder="Título"><input type="text" name="institucion[]" placeholder="Institución"><button type="button" class="eliminar-campo">Eliminar</button></div><br>');
            });

            $("#agregar-idioma").click(function() 
            {
                $("#idiomas").append('<div><input type="text" name="idioma[]" placeholder="Idioma"><button type="button" class="eliminar-campo">Eliminar</button></div><br>');
            });

            $("#agregar-aptitud").click(function() 
            {
                $("#aptitudes-habilidades").append('<div><input type="text" name="aptitud[]" placeholder="Aptitud/Habilidad"><button type="button" class="eliminar-campo">Eliminar</button></div><br>');
            });

            $("form").on("click", ".eliminar-campo", function() 
            {
                $(this).parent().remove();
            });
        });
    </script>
    <?php
    include("registrar.php")
    ?>
</body>
</html>