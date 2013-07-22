<?php
# Breadcrumb
$breadcrumb = array(
    array(
        'label' => __('Customers')
    )
);
echo $this->element('breadcrumb', array('links' => $breadcrumb)); 


# Open form search.
echo $this->Form->create(
    'SearchCustomer',
    array(
        'url' => array(
            'controller' => 'customers',
            'action' => 'index'
        ),
        'class' => 'well',
        'inputDefaults' => array(
            'error' => false
        )
    )
);
?>

    <fieldset>
        <legend>
            <?php 
            echo 
            __('Search Customers').
                    
            # Button register customer.
            $this->Html->link(__('Register Customer'), 
                array(
                    'controller' => 'customers',
                    'action'     => 'add'
                ),
                array(
                    'class' => 'btn btn-primary',
                    'style' => 'float:right'
                )
            ); 
            ?>
        </legend>
        
        <div class="row">
            <div class="span4">
                <?php
                # Input name.
                echo $this->Form->input('name', array(
                    'class'     => 'span4',
                    'label'     => __('Name'),
                    'autofocus' => 'autofocus',
                    'tabindex'  => 1,
                    'value'     => !empty($_SESSION['Search']['Customer']['name'])
                        ? $_SESSION['Search']['Customer']['name']
                        : ''
                ));	
                ?>
            </div>
        </div>
    </fieldset>

    <div class="box-button-form">
        <?php
        # Button search.
        echo $this->Form->button(__('Search'), array(
            'class'    => 'btn btn-primary btn-large',
            'tabindex' => 2
        ));
        ?>
    </div>
</form>

<div class="row">
    <div class="span12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th><?php echo __('Name') ?></th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($customers as $customer) { ?>
                    
                    <tr>
                        <td><?php echo $customer['Customer']['name'] ?></td>
                        <td>
                            <?php echo $this->Html->link(__('View'), '/customers/view/'.$customer['Customer']['id']) ?> | 
                            <?php echo $this->Html->link(__('Edit'), '/customers/edit/'.$customer['Customer']['id']) ?> |
                            <?php 
                            echo $this->Html->link(
                                __('Delete'),
                                '#DeleteModal',
                                array(
                                    'class'	=> 'btn-remove-modal',
                                    'data-toggle' => 'modal',
                                    'role'	=> 'button',
                                    'data-uid' => $customer['Customer']['id'],
                                    'data-uname' => $customer['Customer']['name']
                                )
                            );
                            ?>
                        </td>
                    </tr>

				<?php 
                } ?>
            </tbody>
        </table>
    </div>
</div>

<?php echo $this->Element('paginator') ?>

<div class="modal hide" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel"><?php echo __('Delete Customer') ?></h3>
	</div>
	<div class="modal-body">
		<p><?php echo __('Are you sure you want to delete the customer ') ?><span class="label-uname strong"></span>?</p>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true"><?php echo __('Cancel') ?></button>
		<?php echo $this->Html->link(__('Delete'),'/customers/delete/0', array('class' => 'btn btn-danger modal-link')) ?>
	</div>
</div>