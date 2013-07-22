<?php
# Breadcrumb
$breadcrumb = array(
    array(
        'label' => __('Servers')
    )
);
echo $this->element('breadcrumb', array('links' => $breadcrumb)); 


# Open form search.
echo $this->Form->create(
    'SearchServer',
    array(
        'url' => array(
            'controller' => 'servers',
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
            __('Search Servers').
                    
            # Button register server.
            $this->Html->link(__('Register Server'), 
                array(
                    'controller' => 'servers',
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
                    'value'     => !empty($_SESSION['Search']['Server']['name'])
                        ? $_SESSION['Search']['Server']['name']
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
                    <th><?php echo __('Host') ?></th>
                    <th><?php echo __('User') ?></th>
                    <th><?php echo __('Password') ?></th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($servers as $server) { ?>
                    
                    <tr>
                        <td><?php echo $server['Server']['name'] ?></td>
                        <td>
                            <?php 
                            if (!empty($server['Server']['url'])) { ?>
                                <a class="button-copy" data-clipboard-text="<?php echo $server['Server']['url'] ?>" title="<?php echo __('Copy') ?>" href="#"><i class="icon-file"></i></a>
                            <?php
                            } 
                            echo
                            $this->Link->external(
                                $server['Server']['url'],
                                $server['Server']['url']
                            );
                            ?>
                        </td>
                        <td>
                            <?php 
                            if (!empty($server['Server']['user'])) { ?>
                                <a class="button-copy" data-clipboard-text="<?php echo $server['Server']['user'] ?>" title="<?php echo __('Copy') ?>" href="#"><i class="icon-file"></i></a>
                            <?php
                            } 
                            echo $server['Server']['user'];
                            ?>
                        </td>
                        <td>
                            <?php 
                            if (!empty($server['Server']['password'])) { ?>
                                <a class="button-copy" data-clipboard-text="<?php echo $server['Server']['password'] ?>" title="<?php echo __('Copy') ?>" href="#"><i class="icon-file"></i></a>
                            <?php
                            } 
                            echo $server['Server']['password'];
                            ?>
                        </td>
                        <td>
                            <?php echo $this->Html->link(__('Edit'), '/servers/edit/'.$server['Server']['id']) ?> |
                            <?php 
                            echo $this->Html->link(
                                __('Delete'),
                                '#DeleteModal',
                                array(
                                    'class'	=> 'btn-remove-modal',
                                    'data-toggle' => 'modal',
                                    'role'	=> 'button',
                                    'data-uid' => $server['Server']['id'],
                                    'data-uname' => $server['Server']['name']
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
		<h3 id="myModalLabel"><?php echo __('Delete Server') ?></h3>
	</div>
	<div class="modal-body">
		<p><?php echo __('Are you sure you want to delete the server ') ?><span class="label-uname strong"></span>?</p>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true"><?php echo __('Cancel') ?></button>
		<?php echo $this->Html->link(__('Delete'),'/servers/delete/0', array('class' => 'btn btn-danger modal-link')) ?>
	</div>
</div>