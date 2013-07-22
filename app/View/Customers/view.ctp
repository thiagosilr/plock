<?php
# Breadcrumb
$breadcrumb = array(
    array(
        'label' => __('Customers'),
        'link'	=> '/customers/index'
    ),
    array(
        'label' => __('View').' '.$customer['Customer']['name']
    )
);
echo $this->element('breadcrumb', array('links' => $breadcrumb));
?>

<div class="well">
    <fieldset>
        <legend class="box-button">
            <?php 
            echo 
            $customer['Customer']['name'].

            # Button edit customer.
            $this->Html->link(__('Edit'), 
                array(
                    'controller' => 'customers',
                    'action'     => 'edit',
                    $customer['Customer']['id']
                ),
                array(
                    'class' => 'btn btn-primary last',
                    'style' => 'float:right'
                )
            ).
                    
            # Button register domain.
            $this->Html->link(__('Register Domain'), 
                array(
                    'controller' => 'domains',
                    'action'     => 'add',
                    $customer['Customer']['id']
                ),
                array(
                    'class' => 'btn btn-primary',
                    'style' => 'float:right'
                )
            );
            ?>
        </legend>
            
        <div class="row-fluid">
            <strong><?php echo __('Observation') ?></strong>
        </div>
        <div class="row-fluid">
            <?php echo $customer['Customer']['observation'] ?>
        </div>
        <br />


        <legend><?php echo __('Contacts') ?></legend>
        
        <?php
        if (!empty($customer['Contact'])) { ?>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th><i class="icon-user"></i><?php echo __('Name') ?></th>
                        <th><i class="icon-headphones"></i><?php echo __('Phone') ?></th>
                        <th><i class="icon-envelope"></i><?php echo __('E-mail') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($customer['Contact'] as $contact) { ?>
                        <tr>
                            <td><?php echo $contact['name'] ?></td>
                            <td>
                                <?php 
                                if (!empty($contact['phone'])) { ?>
                                    <a class="button-copy" data-clipboard-text="<?php echo $contact['phone'] ?>" title="<?php echo __('Copy') ?>" href="#"><i class="icon-file"></i></a>
                                <?php
                                } 
                                echo $contact['phone'];
                                ?>
                            </td>
                            <td>
                                <?php 
                                if (!empty($contact['email'])) { ?>
                                    <a class="button-copy" data-clipboard-text="<?php echo $contact['email'] ?>" title="<?php echo __('Copy') ?>" href="#"><i class="icon-file"></i></a>
                                <?php
                                }
                                echo $contact['email']; 
                                ?>
                            </td>
                            </td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        <?php
        } ?>

    </fieldset>
</div>

<?php
if (!empty($domains)) { 
    foreach ($domains as $domain) { ?>
        <div class="well">
            <fieldset>
                <legend class="box-button">
                    <?php
                    echo
                    $this->Link->external(
                        $domain['Domain']['url'],
                        $domain['Domain']['url']
                    ).

                    # Button delete domain.
                    $this->Html->link(__('Delete'),
                        '#DeleteModal',
                        array(
                            'class'	=> 'btn-remove-modal btn btn-danger last',
                            'style' => 'float:right',
                            'data-toggle' => 'modal',
                            'role'	=> 'button',
                            'data-uid' => $domain['Domain']['id'],
                            'data-uname' => $domain['Domain']['url']
                        )
                    ).

                    # Button edit domain.
                    $this->Html->link(__('Edit'), 
                        array(
                            'controller' => 'domains',
                            'action'     => 'edit',
                            $customer['Customer']['id'],
                            $domain['Domain']['id'],
                        ),
                        array(
                            'class' => 'btn btn-primary',
                            'style' => 'float:right'
                        )
                    );
                    ?>
                </legend>

                <div class="row-fluid">
                    <strong><?php echo __('Observation') ?></strong>
                </div>
                <div class="row-fluid">
                    <?php echo $domain['Domain']['observation'] ?>
                </div>
                <br />


                <legend><?php echo __('Connections') ?></legend>

                <ul class="filter-connection-<?php echo $domain['Domain']['id'] ?> nav nav-pills">
                    <li class="active">
                        <a class="filter-connection" id="<?php echo $domain['Domain']['id'] ?>-all" href="#"><?php echo __('All') ?></a>
                    </li>
                    <li>
                        <a class="filter-connection" id="<?php echo $domain['Domain']['id'] ?>-server" href="#"><?php echo __('Server') ?></a>
                    </li>
                    <?php
                    if (!empty($connectionTypes)) { 
                        foreach ($connectionTypes as $connectionTypeId => $connectionType) { ?>
                            <li><a class="filter-connection" id="<?php echo $domain['Domain']['id'].'-'.$connectionTypeId ?>" href="#"><?php echo $connectionType ?></a></li>
                    <?php
                        }
                    } ?>
                </ul>
                
                <?php
                if (!empty($domain['Connection']) || !empty($domain['Server']['id'])) { ?>
                    <table id="domain-connection-<?php echo $domain['Domain']['id'] ?>" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th><i class="icon-tags"></i><?php echo __('Type'); ?></th>
                                <th><i class="icon-globe"></i><?php echo __('Host'); ?></th>
                                <th><i class="icon-user"></i><?php echo __('User'); ?></th>
                                <th><i class="icon-asterisk"></i><?php echo __('Password'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($domain['Server']['id'])) { ?>
                                <tr class="connection-type-<?php echo $domain['Domain']['id'].'-server' ?>">
                                    <td><?php echo __('Server') ?></td>
                                    <td>
                                        <?php 
                                        if (!empty($domain['Server']['url'])) { ?>
                                            <a class="button-copy" data-clipboard-text="<?php echo $domain['Server']['url'] ?>" title="<?php echo __('Copy') ?>" href="#"><i class="icon-file"></i></a>
                                        <?php
                                        } 
                                        echo
                                        $this->Link->external(
                                            $domain['Server']['url'],
                                            $domain['Server']['url']
                                        );
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                        if (!empty($domain['Server']['user'])) { ?>
                                            <a class="button-copy" data-clipboard-text="<?php echo $domain['Server']['user'] ?>" title="<?php echo __('Copy') ?>" href="#"><i class="icon-file"></i></a>
                                        <?php
                                        }
                                        echo $domain['Server']['user'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                        if (!empty($domain['Server']['password'])) { ?>
                                            <a class="button-copy" data-clipboard-text="<?php echo $domain['Server']['password'] ?>" title="<?php echo __('Copy') ?>" href="#"><i class="icon-file"></i></a>
                                        <?php
                                        } 
                                        echo $domain['Server']['password']; 
                                        ?>
                                    </td>
                                </tr>
                            <?php
                            } 
                            foreach ($domain['Connection'] as $connection) { ?>
                                <tr class="connection-type-<?php echo $domain['Domain']['id'].'-'.$connection['connection_type_id'] ?>">
                                    <td><?php echo $connectionTypes[$connection['connection_type_id']] ?></td>
                                    <td>
                                        <?php 
                                        if (!empty($connection['host'])) { ?>
                                            <a class="button-copy" data-clipboard-text="<?php echo $connection['host'] ?>" title="<?php echo __('Copy') ?>" href="#"><i class="icon-file"></i></a>
                                        <?php
                                        } 
                                        echo 
                                        $this->Link->external(
                                            $connection['host'],
                                            $connection['host']
                                        );
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                        if (!empty($connection['user'])) { ?>
                                            <a class="button-copy" data-clipboard-text="<?php echo $connection['user'] ?>" title="<?php echo __('Copy') ?>" href="#"><i class="icon-file"></i></a>
                                        <?php
                                        } 
                                        echo $connection['user']; 
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                        if (!empty($connection['password'])) { ?>
                                            <a class="button-copy" data-clipboard-text="<?php echo $connection['password'] ?>" title="<?php echo __('Copy') ?>" href="#"><i class="icon-file"></i></a>
                                        <?php
                                        } 
                                        echo $connection['password']; 
                                        ?>
                                    </td>
                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                <?php
                } ?>

            </fieldset>
        </div>
<?php
    }
} 
?>

<div class="modal hide" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel"><?php echo __('Delete Domain') ?></h3>
	</div>
	<div class="modal-body">
		<p><?php echo __('Are you sure you want to delete the domain ') ?><span class="label-uname strong"></span>?</p>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true"><?php echo __('Cancel') ?></button>
		<?php echo $this->Html->link(__('Delete'),'/domains/delete/0', array('class' => 'btn btn-danger modal-link')) ?>
	</div>
</div>