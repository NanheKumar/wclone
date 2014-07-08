<?php
/* @var $this FeedController */
/* @var $model Feed */

$this->breadcrumbs=array(
	'Feeds'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Feed', 'url'=>array('index')),
	array('label'=>'Create Feed', 'url'=>array('create')),
	array('label'=>'View Feed', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Feed', 'url'=>array('admin')),
);
?>

<h1>Update Feed <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>