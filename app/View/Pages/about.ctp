<div class="row-fluid">
    <div class="hero-unit">
        <div class="row-fluid">
            <div class="span12">
                <h1><?php echo Configure::read('Application.name'); ?> v 1.0</h1>
                
                <hr>

                <div>
                    <?php echo __('Plock is a client manager in cakephp done to solve the problem that many software factories and advertising agencies have, which is to store and manage easily and practice data from all its customers.'); ?>
                </div>

                <hr>
                <h3><?php echo __('Themes'); ?></h3>

                <ul class="breadcrumb change-themes-list">
                    <li><a href="javascript:void(0)" class="change-theme" alt="default">Default</a> <span class="divider">/</span></li>
                    <li><a href="javascript:void(0)" class="change-theme" alt="amelia">Amelia</a> <span class="divider">/</span></li>
                    <li><a href="javascript:void(0)" class="change-theme" alt="cerulean">Cerulean</a> <span class="divider">/</span></li>
                    <li><a href="javascript:void(0)" class="change-theme" alt="cyborg">Cyborg</a> <span class="divider">/</span></li>
                    <li><a href="javascript:void(0)" class="change-theme" alt="journal">Journal</a> <span class="divider">/</span></li>
                    <li><a href="javascript:void(0)" class="change-theme" alt="readable">Readable</a> <span class="divider">/</span></li>
                    <li><a href="javascript:void(0)" class="change-theme" alt="simplex">Simplex</a> <span class="divider">/</span></li>
                    <li><a href="javascript:void(0)" class="change-theme" alt="slate">Slate</a> <span class="divider">/</span></li>
                    <li><a href="javascript:void(0)" class="change-theme" alt="spacelab">Spacelab</a> <span class="divider">/</span></li>
                    <li><a href="javascript:void(0)" class="change-theme" alt="spruce">Spruce</a> <span class="divider">/</span></li>
                    <li><a href="javascript:void(0)" class="change-theme" alt="superhero">Superhero</a> <span class="divider">/</span></li>
                    <li><a href="javascript:void(0)" class="change-theme" alt="united">United</a> </li> 
                </ul>

                <hr>

                <h3><?php echo __('Features'); ?></h3>
                <ul>
                    <li>
                        <strong><?php echo __('Front-end'); ?></strong>
                        <ul>
                            <li><i class="icon-ok"></i> <a href="http://html5boilerplate.com/" target="_blank">HTML5 Boilerplate</a> </li>
                            <li><i class="icon-ok"></i> <a href="http://twitter.github.com/bootstrap/" target="_blank"> Twitter Bootsrap 2.1.0</a> </li>
                            <li><i class="icon-ok"></i> <a href="http://www.modernizr.com/" target="_blank"> Modernizr</a> </li>				
                            <li><i class="icon-ok"></i> <a href="http://bootswatch.com/#gallery" target="_blank"> <?php echo __('Custom themes'); ?> (bootswatch)</a> </li>
                        </ul>
                    </li>
                    <li>
                        <strong><?php echo __('Back-end'); ?></strong>
                        <ul>
                            <li> <i class="icon-ok"></i> <a href="http://cakephp.org/" target="_blank">CakePHP</a> 2.2.0 Security Login</li>
                            <li> <i class="icon-ok"></i> <?php echo __('Users'); ?> <a href="http://en.wikipedia.org/wiki/Crud" target="_blank">CRUD</a></li>
                        </ul>
                    </li>
                </ul>
                
                <hr>

                <h3><?php echo __('Languages'); ?></h3>
                <ul>
                    <li>
                        <strong><?php echo __('English'); ?></strong>
                    </li>
                    <li>
                        <strong><?php echo __('Portuguese'); ?></strong>
                    </li>
                </ul>
                
                <hr>

                <h3><?php echo __('Ready Scripts'); ?></h3>
                <div class="checkscripts">
                    <?php echo __('Loading scripts'); ?>...
                </div>

                <hr>

                <h3><?php echo __('Browser features'); ?></h3>
                <div class="checkmodernizr">
                    <?php echo __('Verifying browser features'); ?>...
                </div>
            </div>
        </div>
    </div>
</div>