<?php
# Open form.
echo $this->Form->create(
    'User',
    array(
        'url' => array(
            'controller' => 'users',
            'action' => 'login'
        ),
        'class' => 'well',
        'inputDefaults' => array(
            'label' => false,
            'error' => false
        )
    )
); 

    # Input username.
    echo $this->Form->input(
        'username', 
        array(
            'placeholder' => __('Username'), 
            'class'       => 'span12', 
            'autofocus'   => 'autofocus', 
            'tabindex'    => 1
        )
    );

    # Input password.
    echo $this->Form->input(
        'password', 
        array(
            'placeholder' => __('Password'), 
            'type'        => 'password', 
            'class'       => 'span12', 
            'tabindex'    => 2
        )
    );
    ?> 

    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn btn-primary" tabindex="3">
                <i class="icon-play-circle icon-white"></i> Login
            </button>
        </div>
    </div>

    <div class="control-group">
        <div class="controls">
            <span>
                <!-- <?php echo __('Forgot your password?'); ?><br/> 
                <?php 
                echo $this->Html->link(
                    __('Remember my password'), 
                    array('controller' => 'users', 'action' => 'remember_password'), 
                    array('tabindex' => 4)
                ); 
                ?>-->
            </span>
        </div>
    </div>
</form>