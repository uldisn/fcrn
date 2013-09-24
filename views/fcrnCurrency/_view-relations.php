<h2>
    <?php echo Yii::t('FcrnModule.crud_static', 'Relations') ?></h2>


<?php 
        echo '<h3>FcrtCurrencyRates ';
            $this->widget(
                'bootstrap.widgets.TbButtonGroup',
                array(
                    'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'size' => 'mini',
                    'buttons' => array(
                        array(
                            'icon' => 'icon-list-alt',
                            'url' =>  array('//fcrn/fcrtCurrencyRate/admin')
                        ),
                        array(
                'icon' => 'icon-plus',
                'url' => array(
                    '//fcrn/fcrtCurrencyRate/create',
                    'FcrtCurrencyRate' => array('fcrt_fcrn_id' => $model->{$model->tableSchema->primaryKey})
                )
            ),
            
                    )
                )
            );
        echo '</h3>' ?>
<ul>

    <?php
    $records = $model->fcrtCurrencyRates(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon icon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('/fcrn/fcrtCurrencyRate/view', 'fcrt_id' => $relatedModel->fcrt_id)
            );
            echo CHtml::link(
                ' <i class="icon icon-pencil"></i>',
                array('/fcrn/fcrtCurrencyRate/update', 'fcrt_id' => $relatedModel->fcrt_id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>

