<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" lang="es-ES">
    <title>Problemath</title>
    <meta name="description" content="Aplicación de búsqueda de problemas de matemáticas; Universidad de La Rioja." lang="es-ES">
    <meta name="keywords" content="problemas" lang="es-ES">
    <meta name="language" content="es-ES">
    <meta name="robots" content="index,follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <link rel="icon" type="image/png" href="public/img/favicon.png">

</head>

<body>
    <h1>PROBLEMATH</h1>
    <div class="contenido">
        <form name="fProblems" id="fProblems" action="SearchProblems">
            <fieldset>
                <legend>Datos</legend>
                <div class="field">
                    <label for="tags">Etiquetas: </label>
                    <input type="text" name="tags" id="tags" size="63" value=""/>
                </div>
                <div class="field">
                    <label for="prop">Revista: </label>
                    <input type="text" name="prop" id="prop" size="63" value=""/>
                </div>
                <div class="field">
                    <label for="mag">Proponente: </label>
                    <input type="text" name="mag" id="mag" size="63" value=""/>
                </div>

            </fieldset>

            <fieldset class="submit">
                <div class="right">
                    <div class="field">
                        <input class="submitb" type="submit" value="Buscar"/>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>

</body>

</html>