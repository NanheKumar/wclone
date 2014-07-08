<?php
/* @var $this FeedController */
/* @var $data Feed */
?>

<div class="view">
    <?php
    $feed = json_decode($data->data);
    //echo "<pre>";    print_r($feed);
    ?>
    <b><?php echo CHtml::encode($data->getAttributeLabel('SKU')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($feed->sku), array('view', 'id' => $data->id)); ?>
    <br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('Title')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($feed->title), $feed->link); ?>

    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Price')); ?>:</b>
    <?php echo CHtml::encode($feed->price); ?>
    <br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('Price')); ?>:</b>
    <?php echo CHtml::encode($feed->price); ?>
    <br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('special_price')); ?>:</b>
    <?php //echo isset($feed->special_price)?CHtml::encode($feed->special_price):''; ?>
    <br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('Image')); ?>:</b>
    <image src="<?php echo $feed->image;?>" />
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
    <?php echo CHtml::encode($data->status); ?>
    <br />


</div>