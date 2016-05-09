<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">

                    <div class="panel-heading"><h1 class="text-center"><?php echo e($nom_theme); ?></h1></div>
                    <?php if( ! empty(session('msg_ajout'))): ?>
                        <div class="alert alert-success" role="alert">

                            <strong>Opération réussie ! </strong><?php echo e(session('msg_ajout')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if( ! empty(session('msg_modif'))): ?>
                        <div class="alert alert-success" role="alert">
                            <strong>Opération réussie ! </strong><?php echo e(session('msg_modif')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(count($li_cours)==0): ?>
                        <p class="lead text-center">Pour l'instant ,Ce théme ne comporte aucun cours</p>
                    <?php else: ?>

                        <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                            <thead>
                            <tr>
                                <th>nom du cours</th>
                                <th>auteur du cours</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($li_cours as $cours): ?>
                                <tr>
                                    <td><?php echo e($cours->name); ?></td>
                                    <td class="center"><?php echo e($cours->auteur_name); ?></td>
                                    <td>
                                        <a class="btn btn-success" href="/cours/afficher/<?php echo e($cours->url); ?>">
                                            <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                            View
                                        </a>
                                        <?php if(Auth::user()->admin==1): ?>
                                            <a class="btn btn-info" href="/cours/editer/<?php echo e($cours->id); ?>">
                                                <i class="glyphicon glyphicon-edit icon-white"></i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger" href="/cours/supprimer/<?php echo e($cours->id); ?>">
                                                <i class="glyphicon glyphicon-trash icon-white"></i>
                                                Delete
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>