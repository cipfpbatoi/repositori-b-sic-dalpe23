<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Alta Llibre</title>
    <style>
        .error {
            color: red;
        }
        table {
            width: 25%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>

<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $editorial = htmlspecialchars($_POST['editorial']);
            $preu = htmlspecialchars($_POST['preu']);
            $pagines = htmlspecialchars($_POST['pagines']);
            $modul = ["Fantasia", "Por", "Amor"];
            $comentari = htmlspecialchars($_POST['comentari']);
            $estado = isset($_POST["status"]) ? htmlspecialchars($_POST["status"]) : '';
            $error = [];  

            if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
                $foto = $_FILES['foto']['name'];
                move_uploaded_file($_FILES['foto']['tmp_name'], "./uploads/{$foto}");
        
                echo "<p>Archivo $foto subido con éxito</p>";
            }

            if (empty($editorial)) {
                $error[] = "<p>El campo editorial esta vacío.</p>";
            }
            if (empty($preu)) {
                $error[] = "<p>El campo preu esta vacío.</p>";
            }
            if (empty($pagines)) {
                $error[] = "<p>El campo pagines esta vacío.</p>";
            }
    
            if (!empty($error)) {
                foreach ($error as $err) {
                    echo $err;
                }
            } else {
                echo "<table>";
                echo "<tr><td><b>Editorial</b></td><td>$editorial</td></tr>";
                echo "<tr><td><b>Preu</b></td><td>$preu</td></tr>";
                echo "<tr><td><b>Pàgines</b></td><td>$pagines</td></tr>";
                echo "<tr><td><b>Estat</b></td><td>$estado</td></tr>";
                echo "<tr><td><b>Comentari</b></td><td>$comentari</td></tr>";
                echo "<tr><td><b>Foto</b></td><td><img src = './uploads/$foto'></td></tr>";
                echo "</table>";
            }
    } else {
        $modul = ["Fantasia", "Por", "Amor"];
        $estado = ["nuevo", "desgastado", "roto"];
        ?>

<form action="" method="post" enctype="multipart/form-data">
    <div>
        <label for="module">Mòdul:</label>
        <select id="module" name="module">
        <?php 
                foreach($modul as $modulos){ 
                    echo "<option value='$modulos'>$modulos</option>";
                }
            ?>
        </select>
        <span class="error"><!-- Missatge d'error per al mòdul aquí --></span>
    </div>
    <div>
        <label for="editorial">Editorial:</label>
        <input type="text" id="editorial" name="editorial" value="">
        <span class="error"><!-- Missatge d'error per a l'editorial aquí --></span>
    </div>
    <div>
        <label for="preu">Preu:</label>
        <input type="text" id="preu" name="preu" value="">
        <span class="error"><!-- Missatge d'error per al preu aquí --></span>
    </div>
    <div>
        <label for="pagines">Pàgines:</label>
        <input type="text" id="pagines" name="pagines" value="">
        <span class="error"><!-- Missatge d'error per a les pàgines aquí --></span>
    </div>
    <div>
        <label for="status">Estat:</label> <br>
        <?php 
                foreach($estado as $estados){ ?>
                    <input type="radio" name="status" value="<?php echo $estados ?>"> <?php echo $estados ?> <br>
                <?php    }?> 
            
         <span class="error"><!-- Missatge d'error per a l'estat aquí --></span>
    </div>
    <div>
        <label for="foto">Foto:</label>
        <input type="file" id="foto" name="foto">
    </div>
    <div>
        <label for="comentari">Comentaris:</label>
        <textarea id="comentari" name="comentari"></textarea>
    </div>
    <div>
        <button type="submit">Donar d'alta</button>
    </div>
</form>
<?php } ?>
</body>
</html>

