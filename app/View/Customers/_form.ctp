<?php
# Breadcrumb
$breadcrumb = array(
    array(
        'label' => __('Customers'),
        'link'	=> '/customers/index'
    ),
    array(
		'label' => $this->params->action == 'add'
            ? __('Register')
            : __('Edit').' '.$customer['Customer']['name']
	)
);
echo $this->element('breadcrumb', array('links' => $breadcrumb)); 


# Open Form.
echo $this->Form->create(
    'Customer',
    array(
        'url' => array(
            'controller' => 'customers',
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
                'value'     => !empty($customer['Customer']['name'])
                    ? $customer['Customer']['name']
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
                'tabindex' => 2,
                'value'    => !empty($customer['Customer']['observation'])
                    ? $customer['Customer']['observation']
                    : ''
            ));	
            ?>	
        </div>
        <br />


        <legend><?php echo __('Contacts'); ?></legend>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th><?php echo __('Name'); ?></th>
                    <th><?php echo __('Phone'); ?></th>
                    <th><?php echo __('E-mail'); ?></th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="container-line-contacts">
            </tbody>
        </table>

        <div class="clearfix">
            <?php
            if (!empty($customer['Contact'])) {

                echo '
                <script>
                $(function()
                {';

                foreach ($customer['Contact'] as $contact) {
                    echo '
                    App.addContact("'.$contact['name'].'", "'.$contact['phone'].'", "'.$contact['email'].'");';
                }

                echo '
                });
                </script>';
            }
            ?>
        </div>	

        <div class="row-fluid">
            <div class="span12">
                <button type="button" tabindex="82" type="button" value="+" class="btn add-line btn-success" alt="line-contact">
                    <i class="icon-plus"></i>
                </button>    
            </div>
        </div>
    </fieldset>


    <!-- Template contacts -->
    <script type="text/html" id="contactTemplate">
        <tr class="line-contact" alt="${id}" valtabindex="${tabindex+4}">
            <td class="contact-name">
                <input type="text" name="data[Contact][${id}][name]" value="${name}" class="span3" placeholder="<?php echo __('Name'); ?>" tabindex="${tabindex}">
            </td>
            <td>
                <input type="text" name="data[Contact][${id}][phone]" value="${phone}" class="span2" placeholder="<?php echo __('Phone'); ?>" tabindex="${tabindex+1}">
            </td>
            <td>
                <input type="text" name="data[Contact][${id}][email]" value="${email}" class="span4" placeholder="<?php echo __('E-mail'); ?>" tabindex="${tabindex+2}">
            </td>
            <td>
                <button type="button" class="btn remove-line btn-danger" value="-" style="" tabindex="${tabindex+3}">
                    <i class="icon-trash"></i>
                </button>
            </td>
        </tr>
    </script>
    <!-- Template contacts -->

    <div class="box-button-form">
        <?php
        echo 
        # Button save.
        $this->Form->button($label, array(
            'class'    => 'btn btn-primary btn-large',
            'tabindex' => 83
        )).

        # Button cancel.
        $this->Html->link(__('Cancel'), 
            array(
                'controller' => 'customers',
                'action'     => 'index'
            ),
            array(
                'class'    => 'btn btn-large',
                'tabindex' => 84
            )
        );
        ?>
    </div>
</form>