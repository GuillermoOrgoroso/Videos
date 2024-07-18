

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir videito</title>
</head>
<body>

    <h1>holaMiPrimerVideoEnYouPorn</h1>
    <form action="/api/v1/videos" method="post" enctype="multipart/form-data">
    @csrf
    <label for="titulo">Titulo:</label>
    <input type="text" name="titulo" id="titulo" required>
    <br>
    <label for="descripcion">Descripcion:</label>
    <input type="text" name="descripcion" id="descripcion" required>
    <label for="autor">autor:</label>
    <input type="text" name="autor" id="autor" required>
    <label for="visitas">visitasr:</label>
    <input type="number" name="visitas" id="visitas" required>
    <br>
    <label for="archivo">Selecciona un video:</label>
    <input type="file" name="archivo" id="archivo" required>
    <br>
    <input type="submit" value="subir video"> 
</form>
</body>
</html>