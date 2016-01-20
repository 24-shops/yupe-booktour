<?php
/* @var $variant ProductVariant */
$new = false;
if (!$time->id) {
    $new = true;
    $time->id = rand(10000, 50000);
} ?>

<tr>
    <?php if (!$new): ?>
        <input type="hidden" name="Times[<?= $time->id; ?>][id]" value="<?= $time->id; ?>"/>
    <?php endif; ?>
    
    <td>
        <input class="form-control hummer-time" type="text" name="Times[<?= $time->id; ?>][time]" value="<?= $time->time; ?>">
    </td>
    <td>
        <input class="form-control" type="text" name="Times[<?= $time->id; ?>][maximum_quantity]" value="<?= $time->maximum_quantity?>">
        </td>
        <td>
            <?php echo $form->switchGroup(
                $time, 
                'status',
                array(
                    'widgetOptions' => array(
                        'options' => array(
/*                            'onText' => 'Жопень',
                            'offText' => 'Ебала',*/
                        ),
                        'htmlOptions' => array(
                            'class' => 'popover-help', 
                            'data-original-title' => $time->getAttributeLabel('status'),
                            'data-content' => $time->getAttributeDescription('status')
                        )
                    )
                )
            ); ?>
        </td>
    <td><a href="#" class="btn btn-danger btn-sm remove-variant"><?= 'Удалить' ?></a></td>
</tr>
