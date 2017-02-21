<?php 
    if(validation_errors()):
?>      
<div role="alert" class="alert alert-danger alert-icon alert-dismissible">
  <div class="icon"><span class="mdi mdi-close-circle-o"></span></div>
  <div class="message">
    <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true" class="mdi mdi-close"></span></button>
    <?=validation_errors()?>
  </div>
</div>
<?php endif; ?>


<div class="row">
  <div class="col-md-12">
      <div class="panel panel-default panel-border-color panel-border-color-primary">
        <div class="panel-heading panel-heading-divider">Informações Básicas<span class="panel-subtitle">Cadastre abaixo as informações do Projeto</span></div>
        <div class="panel-body">
          <?php echo form_open(base_url().'projetos/form/'. empty($record) ? '' : $record->prj_cod , array('class'=>'form-horizontal group-border-dashed', 'style'=>'border-radius: 0px;')) ?>
            
            <input type="hidden" name="prj_cod" value="<?= !empty($record) ? $record->prj_cod : '0' ?>">    

            <div class="form-group">
              <label class="col-sm-3 control-label">Nome</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="nome"
                value="<?= !empty($_POST) ? $this->input->post('nome') : (!empty($record) ? $record->prj_nome : '') ?>" maxlength="250">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Descrição</label>
              <div class="col-sm-6">
                <textarea class="form-control" name="descricao"><?=!empty($record) ? $record->prj_descricao : $this->input->post('descricao') ?></textarea>
              </div>
            </div>

            <div class="row">
              <div class="col-xs-6"></div>
              <div class="col-xs-3">
                <p class="text-right">
                  <button type="submit" class="btn btn-space btn-primary" name="save"><?=$mode == 'alter' ? 'Salvar Alterações' : 'Cadastrar'?></button>
                  <a href="<?=base_url().'projetos'?>" class="btn btn-space btn-default">Voltar</a>
                </p>
              </div>
            </div>

          </form>
        </div>
      </div>

  </div>
</div>