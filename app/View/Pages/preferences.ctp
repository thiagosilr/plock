<?php
# Breadcrumb
$breadcrumb = array(
    array(
        'label' => __('Preferences'),
    )
);
echo $this->element('breadcrumb', array('links' => $breadcrumb)); 


# Open form.
echo $this->Form->create(
    'Preference',
    array(
        'class' => 'well',
        'inputDefaults' => array(
            'error' => false
        )
    )
);
?>

    <fieldset>
        <legend><?php echo __('Preferences'); ?></legend>
        
        <div class="row-fluid">
            <?php
            # Input language.
            echo $this->Form->input('language', array(
                'class'    => 'span4',
                'label'    => '*'.__('Language'),
                'tabindex' => 1,
                'options'  => array(
                    'eng' => __('English'), 
                    'por' => __('Portuguese')
                ),
                'selected' => Configure::read('Config.language')
            ));
            ?>
        </div>
        
        <div class="row-fluid">
            <?php
            # Input theme.
            echo $this->Form->input('theme', array(
                'class'    => 'span4',
                'label'    => '*'.__('Theme'),
                'tabindex' => 2,
                'options'  => array(
                    'default'   => 'Default',
                    'amelia'    => 'Amelia',
                    'cerulean'  => 'Cerulean',
                    'cyborg'    => 'Cyborg',
                    'journal'   => 'Journal',
                    'readable'  => 'Readable',
                    'simplex'   => 'Simplex',
                    'slate'     => 'Slate',
                    'spacelab'  => 'Spacelab',
                    'spruce'    => 'Spruce',
                    'superhero' => 'Superhero',
                    'united'    => 'United'
                ),
                'selected' => Configure::read('Layout.theme')
            ));
            ?>
        </div>
    </fieldset>

    <div class="box-button-form">
        <?php
        echo 
        # Button save.
        $this->Form->button(__('Save'), array(
            'class'    => 'btn btn-primary btn-large',
            'tabindex' => 3
        )).

        # Button cancel.
        $this->Html->link(__('Cancel'), 
            array(
                'controller' => 'preferences',
                'action'     => 'index'
            ),
            array(
                'class'    => 'btn btn-large',
                'tabindex' => 4
            )
        );
        ?>
    </div>
</form>