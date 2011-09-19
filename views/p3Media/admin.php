<?php
if(!isset($this->breadcrumbs))

$this->breadcrumbs=array(
	'P3 Medias'=>array(Yii::t('app', 'index')),
	Yii::t('app', 'Manage'),
);

if(!isset($this->menu) || $this->menu === array())
$this->menu=array(
	array(
		'label' => Yii::t('app', 'Administration'), 
		'items' => array(
			array('label'=>Yii::t('app', 'Create') , 'url'=>array('create')),
		)
	),
	/*array(
		'label' => Yii::t('app', 'View'), 
		'items' => array(
			array('label'=>Yii::t('app', 'List') , 'url'=>array('index')),
		)
	)*/
);


		Yii::app()->clientScript->registerScript('search', "
			$('.search-button').click(function(){
				$('.search-form').toggle();
				return false;
				});
			$('.search-form form').submit(function(){
				$.fn.yiiGridView.update('p3-media-grid', {
data: $(this).serialize()
});
				return false;
				});
			");
		?>

<h1> <?php echo Yii::t('app', 'Manage'); ?> <?php echo Yii::t('app', 'P3 Medias'); ?> </h1>

<?php
echo "<ul>";
foreach ($model->relations() AS $key => $relation)
{
	echo  "<li>".
		Yii::t("app",substr(str_replace("Relation","",$relation[0]),1))." ".
		CHtml::link(Yii::t("app",$relation[1]), array($this->resolveRelationController($relation)."/admin")).
		" </li>";
}
echo "</ul>";
?>
<?php echo CHtml::link(Yii::t('app', 'Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div>

<?php
$locale = CLocale::getInstance(Yii::app()->language);

 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'p3-media-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
#		'description',
		'type',
		'path',
		'md5',
		/*
		'originalName',
		'mimeType',
		'size',
#		'info',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
