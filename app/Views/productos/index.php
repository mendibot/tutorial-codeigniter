
<?php echo $this->extend('plantilla/layout'); ?>

<?php echo $this->section('contenido'); ?>

<h2>Productos</h2>

    <table>
        <thead>
            <th>Código</th>
            <th>Nombre</th>
            <th>Stock</th>
            <tbody>
                <?php foreach($productos as $producto): ?>
                    <tr>
                        <td><?php echo $producto->codigo; ?></td>
                        <td><?php echo $producto->nombre; ?></td>
                        <td><?php echo $producto->stock; ?></td>
                    </tr>
                    <?php endforeach; ?>
            </tbody>
        </thead>
    </table>

<?php echo $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>

<script>
    alert("Hola JS");
</script>

<?php echo $this->endSection(); ?>
    
