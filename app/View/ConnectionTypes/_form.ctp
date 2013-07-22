<?php
# Breadcrumb
$breadcrumb = array(
    array(
        'label' => __('Connection Types'),
        'link'	=> '/connection_types/index'
    ),
    array(
		'label' => $this->params->action == 'add'
            ? __('Register')
            : __('Edit').' '.$connectionType['ConnectionType']['name']
	)
);
echo $this->element('breadcrumb', array('links' => $breadcrumb)); 


# Open Form.
echo $this->Form->create(
    'ConnectionType',
    array(
        'url' => array(
            'controller' => 'connection_types',
            'action' => $this->params->action,
            !empty($this->params->pass[0])
                ? $this->params->pass[0]
                : ''
        ),
        'class' => 'well',
        'inputDefaults' => array(
            'error' => false
        )
    )
);
?>

    <fieldset>
        <legend><?php echo $title; ?></legend>
        
        <div class="row-fluid">
            <?php
            # Input name.
            echo $this->Form->input('name', array(
                'class'     => 'span4',
                'label'     => '* '.__('Name'),
                'autofocus' => 'autofocus',
                'tabindex'  => 1,
                'value'     => !empty($connectionType['ConnectionType']['name'])
                    ? $connectionType['ConnectionType']['name']
                    : ''
            ));	
            ?>
        </div>
    </fieldset>

    <div class="box-button-form">
        <?php
        echo 
        # Button save.
        $this->Form->button($label, array(
            'class'    => 'btn btn-primary btn-large',
            'tabindex' => 2
        )).

        # Button cancel.
        $this->Html->link(__('Cancel'), 
            array(
                'controller' => 'connection_types',
                'action'     => 'index'
            ),
            array(
                'class'    => 'btn btn-large',
                'tabindex' => 3
            )
        );
        ?>
    </div>
</form>