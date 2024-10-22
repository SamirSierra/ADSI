<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/adminlte/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Font Awesome -->
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Lista de Vacantes</h1>
        <div class="card-body">
            <table id="dt_vacantes" class="table table-bordered dt-responsive" style="width: 100%">
                <thead>
                    <tr>
                        <th>Empresa</th>
                        <th>Programa</th>
                        <th>Cargo</th>
                        <th>Modalidad de prácticas</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($lista_vacantes) && count($lista_vacantes) > 0) : ?>
                        <?php foreach ($lista_vacantes as $vacante) : ?>
                            <tr>
                                <td><?= htmlspecialchars($vacante->empresa) ?></td>
                                <td><?= htmlspecialchars($vacante->programa) ?></td>
                                <td><?= htmlspecialchars($vacante->cargo) ?></td>
                                <td><?= htmlspecialchars($vacante->modalidad_practicas) ?></td>
                                <td><?= htmlspecialchars($vacante->estado) ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?= route('vacante/ver/' . $vacante->id) ?>" class="btn btn-success" title="Ver detalle">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="<?= route('vacante/editar/' . $vacante->id) ?>" class="btn btn-primary" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button class="btn btn-danger btnEliminarVacante" title="Eliminar" value="<?= $vacante->id ?>">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="6" class="text-center">No hay vacantes disponibles.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="../../assets/adminlte/js/bootstrap.min.js"></script>
</body>
</html>
