<?php
# Breadcrumb
$breadcrumb = array(
    array(
        'label' => __('Connection Types')
    )
);
echo $this->element('breadcrumb', array('links' => $breadcrumb)); 


# Open form search.
echo $this->Form->create(
    'ConnectionType',
    array(
        'url' => array(
            'controller' => 'connection_types',
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
            __('Search Connection Types').
                    
            # Button register connection type.
            $this->Html->link(__('Register Connection Type'), 
                array(
                    'controller' => 'connection_types',
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
                    'value'     => !empty($_SESSION['Search']['ConnectionType']['name'])
                        ? $_SESSION['Search']['ConnectionType']['name']
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
                foreach ($connectionTypes as $connectionType) { ?>
                    
                    <tr>
                        <td><?php echo $connectionType['ConnectionType']['name'] ?></td>
                        <td>
                            <?php echo $this->Html->link(__('Edit'), '/connection_types/edit/'.$connectionType['ConnectionType']['id']) ?> |
                            <?php 
                            echo $this->Html->link(
                                __('Delete'),
                                '#DeleteModal',
                                array(
                                    'class'	=> 'btn-remove-modal',
                                    'data-toggle' => 'modal',
                                    'role'	=> 'button',
                                    'data-uid' => $connectionType['ConnectionType']['id'],
                                    'data-uname' => $connectionType['ConnectionType']['name']
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
		<h3 id="myModalLabel"><?php echo __('Delete Connection Type') ?></h3>
	</div>
	<div class="modal-body">
		<p><?php echo __('Are you sure you want to delete the connection type ') ?><span class="label-uname strong"></span>?</p>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true"><?php echo __('Cancel') ?></button>
		<?php echo $this->Html->link(__('Delete'),'/connection_types/delete/0', array('class' => 'btn btn-danger modal-link')) ?>
	</div>
</div>