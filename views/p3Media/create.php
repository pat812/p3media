<?php
$this->breadcrumbs['P3 Medias'] = array('admin');
$this->breadcrumbs[] = Yii::t('app', 'Create');
?>
<h1>
    Create P3 Media</h1>

<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>
<?php
$this->renderPartial('_form', array(
'model' => $model,
'buttons' => 'create'));

?>

