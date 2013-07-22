<?php 
if ($this->Paginator->numbers()) { ?>
    <div class="pagination">
        <ul>
            <?php 
            echo 
            # Prev
            $this->Paginator->prev(
                '«', 
                array('tag' => 'li'), 
                null, 
                array(
                    'tag'         => 'li', 
                    'disabledTag' => 'a', 
                    'class'       => 'disabled'
                )
            ).

            # Number
            $this->Paginator->numbers(array(
                'separator'    => false,
                'tag'          => 'li',
                'currentClass' => 'active',
                'currentTag'   => 'a'
            )).
   
            # Next
            $this->Paginator->next(
                '»', 
                array('tag' => 'li'), 
                null, 
                array(
                    'tag'         => 'li', 
                    'disabledTag' => 'a', 
                    'class'       => 'disabled'
                )
            ); 
            ?>
        </ul>
    </div>
<?php 
} ?>