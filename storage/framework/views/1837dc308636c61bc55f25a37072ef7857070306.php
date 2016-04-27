<?php $__env->startSection('content'); ?>
    <?php if( ! empty($msg_ajout)): ?>
        <div class="alert alert-success">
            <div class="alert alert-success">
                <strong>Success! </strong><?php echo e($msg_ajout); ?>

            </div>
            <?php endif; ?>
            <?php if( ! empty($msg_modif)): ?>
                <div class="alert alert-success">
                    <div class="alert alert-success">
                        <strong>Success! </strong><?php echo e($msg_modif); ?>

                    </div>
                    <?php endif; ?>
                </div>
                <div class="box-content">
                    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                        <thead>
                        <tr>
                            <th>nom du cours</th>
                            <th>auteur du cours</th>
                            <th>theme du cours</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($li_cours as $cours): ?>
                            <tr>
                                <td><?php echo e($cours->name); ?></td>
                                <td class="center"><?php echo e($cours->auteur); ?></td>
                                <td class="center"><?php echo e($cours->theme); ?></td>
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
                </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>