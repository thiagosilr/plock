<?php
# Breadcrumb
$breadcrumb = array(
    array(
        'label' => __('Servers'),
        'link'	=> '/servers/index'
    ),
    array(
		'label' => $this->params->action == 'add'
            ? __('Register')
            : __('Edit').' '.$server['Server']['name']
	)
);
echo $this->element('breadcrumb', array('links' => $breadcrumb)); 


# Open form.
echo $this->Form->create(
    'Server',
    array(
        'url' => array(
            'controller' => 'servers',
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
                'value'     => !empty($server['Server']['name'])
                    ? $server['Server']['name']
                    : ''
            ));	
            ?>
        </div>

        <div class="row-fluid">
            <?php
            # Input url.
            echo $this->Form->input('url', array(
                'class'     => 'span4',
                'label'     => __('URL'),
                'tabindex'  => 2,
                'value'     => !empty($server['Server']['url'])
                    ? $server['Server']['url']
                    : ''
            ));
            ?>
        </div>
              
        <div class="row-fluid">
            <?php
            # Input ip.
            echo $this->Form->input('ip', array(
                'class'     => 'span4',
                'label'     => __('IP'),
                'tabindex'  => 3,
                'value'     => !empty($server['Server']['ip'])
                    ? $server['Server']['ip']
                    : ''
            ));
            ?>
        </div>

        <div class="row-fluid">
            <?php
            # Input user.
            echo $this->Form->input('user', array(
                'class'     => 'span4',
                'label'     => __('User'),
                'tabindex'  => 4,
                'value'     => !empty($server['Server']['user'])
                    ? $server['Server']['user']
                    : ''
            ));	
            ?>
        </div>
        
        <div class="row-fluid">
            <?php
            # Input password.
            echo 
            $this->Form->label('password', __('Password')).
            $this->Form->text('password', array(
                'class'     => 'span4',
                'label'     => __('Password'),
                'tabindex'  => 5,
                'value'     => !empty($server['Server']['password'])
                    ? $server['Server']['password']
                    : ''
            ));	
            ?>
        </div>

        <div class="row-fluid">
            <?php
            # Input observation.
            echo $this->Form->input('observation', array(
                'class'    => 'span12',
                'label'    => __('Observation'),
                'type'     => 'textarea',
                'tabindex' => 6,
                'value'    => !empty($server['Server']['observation'])
                    ? $server['Server']['observation']
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
            'tabindex' => 7
        )).

        # Button cancel.
        $this->Html->link(__('Cancel'), 
            array(
                'controller' => 'servers',
                'action'     => 'index'
            ),
            array(
                'class'    => 'btn btn-large',
                'tabindex' => 8
            )
        );
        ?>
    </div>
</form>