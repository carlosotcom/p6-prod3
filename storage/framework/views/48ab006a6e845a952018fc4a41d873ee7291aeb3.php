

<?php $__env->startSection('content'); ?>


<?php
$asignaturas = App\Models\Asignatura::get();

$asignaturaId = App\Models\Asignatura::find(Request::get('borra-id-asigns'));

echo '<pre>';
    print_r($asignaturas);
echo '</pre>';

?>
<br><br>
<div id="adminasign" class="container">
    <h3>Edición de asignaturas</h3>

    <hr>
    <br>
    <div class="row">
        <div class="col-md-4">
            <form  class="asignatio" action="crea" method="post">
                <?php echo csrf_field(); ?>
                <div class="form-group editasign">
                    <label for=""><?php if(Request::get('edita')): ?> Editar Asignatura <?php else: ?> Crear Asignatura <?php endif; ?></label>

                        <div class="input-group mb-3">
                            <?php if(Request::get('edita')): ?><input type="hidden" name="id" value="<?php echo e($asignaturaId->id_class); ?>"> <?php endif; ?>

                            <input autofocus="true" required type="text" class="form-control fullwidth"
                                   name="name" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1"
                                   value="<?php if(Request::get('edita')): ?><?php echo e($asignaturaId->name); ?><?php endif; ?>">
                            <br>
                            <label for="favcolor">Elegir color :  </label>
                            <input  class="form-control asign color" type="color" id="favcolor" name="color" value="<?php if(Request::get('edita')): ?><?php echo e($asignaturaId->color); ?><?php endif; ?>">
                        </div>




                    <?php if(Request::get('edita')): ?>
                            <input type="submit" name="accion" value="Edita" class="btn btn-primary mb-2">
                    <?php else: ?>
                            <button type="submit" class="btn btn-primary mb-2">Crear Asignatura</button>
                    <?php endif; ?>
                </div>
            </form>
        </div>
        <div class="col-md-8">
            <form class="asignatio" action="" method="">

                <div class="form-group editasign">
                    <label for="exampleFormControlSelect1">Lista de Asignaturas</label>
                    <select name="borra-id-asigns" size="10" class="form-control" id="">
                      <?php $__currentLoopData = $asignaturas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asignatura): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option style="color:<?php echo e($asignatura->color); ?>; font-weight:900;" value="<?php echo e($asignatura->id_class); ?>"><?php echo e($asignatura->name); ?></span></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </select>
                    <br>
                    <input type="submit" name="edita" value="Edita" class="btn btn-primary mb-2">
                    <input type="submit" name="borra" value="Borra" class="btn btn-primary mb-2">

                </div>
            </form>

        </div>
    </div>
    <br>
    <hr>
 </div>
<script>
    if (window.history.replaceState) { // verificamos disponibilidad
        window.history.replaceState(null, null, window.location.href);
    }


</script>
<?php /*
if($reload){
    echo '<script>location.reload();</script>';
}*/
?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamp\htdocs\p6-4\resources\views/asignaturas.blade.php ENDPATH**/ ?>