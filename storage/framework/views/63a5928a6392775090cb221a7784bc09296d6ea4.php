<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Formulaire d'ajout d'un cours</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/cours/traiter_ajout_cours')); ?>">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Nom du cours:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Entrez le nom du cours">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="auteur">Auteur :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="auteur" name="auteur" placeholder="Enter de l'auteur">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="theme">Théme:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="theme" name="theme"
                                           placeholder="Donner le théme du cours">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="url">Fichier du cours:</label>
                                <div class="col-sm-10">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <span class="btn btn-default btn-file"><input
                                                    type="file" id="url" name="url"/></span>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>