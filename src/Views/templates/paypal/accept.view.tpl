<section class="container">
    <div class="card mt-4">
        <div class="card-header bg-<?= ($mensaje === '¡Compra realizada con éxito!') ? 'success' : 'danger' ?> text-white">
            <h2 class="mb-0"><?= $mensaje ?></h2>
        </div>
        <div class="card-body">
            <a href="index.php?page=libreria_historial_transacciones" class="btn btn-primary">
                Ver mi historial de compras
            </a>
        </div>
    </div>
</section>
