<?php
/* @var $this FeedController */
/* @var $model Feed */

$this->breadcrumbs=array(
	'Feeds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Feed', 'url'=>array('index')),
	array('label'=>'Manage Feed', 'url'=>array('admin')),
);
?>

<h1>Create Feed</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>