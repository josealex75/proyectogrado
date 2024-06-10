<?php
session_start();
error_reporting(0);
require '../conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mostrar Calificaciones</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

  <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>

<form action="resultado_estudiante.php" method="post" class="admin-login">
                                <div class="form-group">
                                    <label for="rollid" class="control-label">Ingresa tu documento</label>
                                    <input type="text" class="form-control" id="rollid" placeholder="Numero documento" autocomplete="off" name="rollid">
                                </div>
                                <div class="form-group">
                                    <label for="default" class="control-label">Grado</label>
                                    <select name="class" class="form-control" id="default" required="required">
                                    <option value="">Selecciona tu Grado</option>
                                    <?php 
                                    $sql = "SELECT * FROM grados WHERE estado = 1";
                                    $query = $dbh->prepare($sql);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    if ($query->rowCount() > 0) {
                                        foreach ($results as $result) { ?>
                                            <option value="<?php echo htmlentities($result->id_grado); ?>"> <?php echo htmlentities($result->n_grado); ?>&nbsp; Section-<?php echo htmlentities($result->Section); ?></option>

                                    <?php 
                                        }
                                    } 
                                    ?>
                                    </select>
                                </div>

                                <div class="form-group mt-20">
                                    <div class="">

                                        <button type="submit" class="btn" style="color: #172541;">Buscar</button>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <a href="index.php" class="text-white">Volver</a>
                                </div>
</form>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
  &copy; 2024 Gestión de Notas
</footer>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Bootstrap JS (dependencias Popper.js y Bootstrap) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>