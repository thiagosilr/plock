<ul class="breadcrumb">
    <?php 
    foreach ($links as $link) { ?>
        <li class="<?php echo (empty($link['link']) ? 'active' : '' ); ?>">
            <?php 
            if (!empty($link['link'])) { 
                echo $this->Html->link(
                    $link['label'],
                    $link['link']
                );
                ?>

                <span class="divider">/</span>

                <?php 
            } else {
                echo $link['label'];
            } 
            ?>
        </li>
	<?php 
    } ?>
</ul>