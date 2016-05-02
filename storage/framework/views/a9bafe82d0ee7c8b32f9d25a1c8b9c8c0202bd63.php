<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Formulaire d'ajout d'un cours</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST"
                              action="/cours/modifier/<?php echo e($cours->id); ?>">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Nom du cours:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name"
                                           value="<?php echo e($cours->name); ?>" placeholder="Entrez le nom du cours">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="auteur">Auteur :</label>
                                <div class="col-sm-10">
                                    <!-- la liste des auteurs ne veut pas s'afficher -->
                                    <input type="text" list="cars" id="auteur" name="auteur" />
                                    <datalist id="cars">
                                        <?php foreach($li_auteurs as $auteur): ?>
                                            <option><?php echo e($auteur->name); ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="theme">Théme:</label>
                                <div class="col-sm-10">
                                    <select class="selectpicker" id="theme" name="theme" >
                                        <?php foreach($li_themes as $theme): ?>
                                            <?php if($theme->id == $id_theme): ?>
                                                <option selected="selected"> <?php echo e($theme->name); ?></option>
                                            <?php else: ?>
                                                <option><?php echo e($theme->name); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="url">Fichier du cours:</label>
                                <div class="col-sm-10">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <span class="btn btn-default btn-file"><input
                                                    value="<?php echo e($chemin); ?>" type="file" id="url" name="url"/></span>
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