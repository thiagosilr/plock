<?php
# Breadcrumb
$breadcrumb = array(
    array(
        'label' => __('Users'),
        'link'	=> '/users/index'
    ),
    array(
		'label' => $this->params->action == 'add'
            ? __('Register')
            : __('Edit').' '.$user['User']['name']
	)
);
echo $this->element('breadcrumb', array('links' => $breadcrumb)); 


# Open form.
echo $this->Form->create(
    'User',
    array(
        'url' => array(
            'controller' => 'users',
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
                'value'     => !empty($user['User']['name'])
                    ? $user['User']['name']
                    : ''
            ));	
            ?>
        </div>

        <div class="row-fluid">
            <?php
            # Input login.
            echo $this->Form->input('username', array(
                'class'     => 'span4',
                'label'     => '*'.__('Login'),
                'tabindex'  => 2,
                'value'     => !empty($user['User']['username'])
                    ? $user['User']['username']
                    : ''
            ));
            ?>
        </div>
              
        <div class="row-fluid">
            <?php
            # Input email.
            echo $this->Form->input('email', array(
                'class'     => 'span4',
                'label'     => '*'.__('E-mail'),
                'tabindex'  => 3,
                'value'     => !empty($user['User']['email'])
                    ? $user['User']['email']
                    : ''
            ));
            ?>
        </div>

        <div class="row-fluid">
            <?php
            # Input password.
            echo $this->Form->input('password', array(
                'class'     => 'span4',
                'label'     => '*'.__('Password'),
                'tabindex'  => 4
            ));	
            ?>
        </div>

        <div class="row-fluid">
            <?php
            if (AuthComponent::user('role') == 'admin') {
                # Input type.
                echo $this->Form->input('role', array(
                    'class'    => 'span4',
                    'label'    => '*'.__('Type'),
                    'tabindex' => 5,
                    'options'  => array(
                        'admin'  => __('Admin'), 
                        'author' => __('Author')
                    ),
                    'selected' => !empty($user['User']['role']) 
                        ? $user['User']['role'] 
                        : ''
                ));
            }
            ?>
        </div>
    </fieldset>

    <div class="box-button-form">
        <?php
        echo 
        # Button save.
        $this->Form->button($label, array(
            'class'    => 'btn btn-primary btn-large',
            'tabindex' => 6
        )).

        # Button cancel.
        $this->Html->link(__('Cancel'), 
            array(
                'controller' => 'users',
                'action'     => 'index'
            ),
            array(
                'class'    => 'btn btn-large',
                'tabindex' => 7
            )
        );
        ?>
    </div>
</form>