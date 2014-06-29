<div class="conteiner tactions cell8 form_title asbutton active">
  Параметры
</div>
<div class="conteiner">
  <div class="table cell8 prosmotr">
    <div class="tbody">
      <?php $this->renderPartial('application.views.site._formLine', array('form'=>$form, 'req'=>$req, 'model'=>$model, 'elem'=>'name_lang1', 'elemtype'=>'textfield'))?>
      <?php $this->renderPartial('application.views.site._formLine', array('form'=>$form, 'req'=>$req, 'model'=>$model, 'elem'=>'description_lang1', 'elemtype'=>'textfield'))?>
      <?php $this->renderPartial('application.views.site._formLine', array('form'=>$form, 'req'=>$req, 'model'=>$model, 'elem'=>'description_meta_lang1', 'elemtype'=>'textfield'))?>

    </div>
  </div>
</div>
