<?php
# Breadcrumb
$breadcrumb = array(
    array(
        'label' => __('Customers'),
        'link'	=> '/customers/index'
    ),
    array(
        'label' => $customer['Customer']['name'],
        'link'	=> '/customers/view/'.$customer['Customer']['id']
    ),
    array(
		'label' => $this->params->action == 'add'
            ? __('Register Domain')
            : __('Edit Domain')
	)
);
echo $this->element('breadcrumb', array('links' => $breadcrumb)); 


# Open Form.
echo $this->Form->create(
    'Domain',
    array(
        'url' => array(
            'controller' => 'domains',
            'action' => $this->params->action,
            !empty($this->params->pass[0])
                ? $this->params->pass[0]
                : '',
            !empty($this->params->pass[1])
                ? $this->params->pass[1]
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
            # Input url.
            echo $this->Form->input('url', array(
                'class'     => 'span4',
                'label'     => '* '.__('Url'),
                'autofocus' => 'autofocus',
                'tabindex'  => 1,
                'value'     => !empty($domain['Domain']['url'])
                    ? $domain['Domain']['url']
                    : ''
            ));	
            ?>
        </div>

        <div class="row-fluid">
            <?php
            # Input server
            echo $this->Form->input('server_id', array(
                'class'    => 'span4',
                'label'    => __('Server'),
                'tabindex' => 2,
                'empty'    => '',
                'options'  => $serverOptions,
                'selected' => !empty($domain['Domain']['server_id']) 
                    ? $domain['Domain']['server_id'] 
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
                'tabindex' => 3,
                'type'     => 'textarea',
                'value'    => !empty($domain['Domain']['observation'])
                    ? $domain['Domain']['observation']
                    : ''
            ));	
            ?>
        </div>
        <br />


        <legend><?php echo __('Connections'); ?></legend>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th><?php echo __('Type'); ?></th>
                    <th><?php echo __('Host'); ?></th>
                    <th><?php echo __('User'); ?></th>
                    <th><?php echo __('Password'); ?></th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="container-line-connections">
            </tbody>
        </table>
        
        
       <div class="clearfix ">
            <?php
            if (!empty($domain['Connection'])) {

                echo '
                <script>
                $(function()
                {';

                foreach ($domain['Connection'] as $connection) {
                    echo '
                    App.addConnection("'.$connection['connection_type_id'].'", "'.$connection['host'].'", "'.$connection['user'].'", "'.$connection['password'].'");';
                }

                echo '
                });
                </script>';
            }
            ?>
        </div>	

        <div class="row-fluid">
            <div class="span12">
                <button type="button" tabindex="104" type="button" value="+" class="btn add-line btn-success" alt="line-connection">
                    <i class="icon-plus"></i>
                </button>    
            </div>
        </div>
    </fieldset>


    <!-- Template connection -->
    <script type="text/html" id="connectionTemplate">
        <tr class="line-connection" alt="${id}" valtabindex="${tabindex+5}">
            <td class="connection-type">
                <?php
                # Input connection type.
                echo $this->Form->input('connection_type_id', array(
                    'class'    => 'span2',
                    'label'    => false,
                    'tabindex' => '${tabindex+1}',
                    'div'      => false,
                    'name'     => 'data[Connection][${id}][connection_type_id]',
                    'empty'    => '',
                    'options'  => $connectionTypeOptions
                ));
                ?>
            </td>
            <td>
                <input type="text" name="data[Connection][${id}][host]" value="${host}" class="span3" placeholder="<?php echo __('Host'); ?>" tabindex="${tabindex+2}">
            </td>
            <td>
                <input type="text" name="data[Connection][${id}][user]" value="${user}" class="span3" placeholder="<?php echo __('User'); ?>" tabindex="${tabindex+3}">
            </td>
            <td>
                <input type="text" name="data[Connection][${id}][password]" value="${password}" class="span3" placeholder="<?php echo __('Password'); ?>" tabindex="${tabindex+4}">
            </td>
            <td>
                <button type="button" class="btn remove-line btn-danger" value="-" style="" tabindex="${tabindex+5}">
                    <i class="icon-trash"></i>
                </button>
            </td>
        </tr>
    </script>
    <!-- Template connection -->

    <div class="box-button-form">
        <?php
        echo 
        # Button save.
        $this->Form->button($label, array(
            'class'    => 'btn btn-primary btn-large',
            'tabindex' => 105
        )).

        # Button cancel.
        $this->Html->link(__('Cancel'), 
            array(
                'controller' => 'customers',
                'action'     => 'index'
            ),
            array(
                'class'    => 'btn btn-large',
                'tabindex' => 106
            )
        );
        ?>
    </div>
</form>