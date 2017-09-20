
    <!-- top navigation -->
    <div class="top_nav">
        <div class="nav_menu">
            <nav class="" role="navigation">
                <div class="nav toggle">
                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>

                <ul class="nav navbar-nav navbar-right">
                    <li class="">
                        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <?php echo $this->Html->image('Admintheme./images/img.jpg')?>
                            <?php
                                echo $this->request->session()->read('Auth.User.name') ? $this->request->session()->read('Auth.User.username') : 'John Doe';

                                ?>
                            <span class=" fa fa-angle-down"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-usermenu pull-right">
                            <!-- <li>
                                <a href="<?= $this->Url->build(['controller'=>'users','action'=>'settins'])?>">
                                    <span class="badge bg-red pull-right">50%</span>
                                    <span><?= __('Settings')?></span>
                                </a>
                            </li> -->
                            <li><a href="<?= $this->Url->build(['controller'=>'Users','action'=>'profile'])?>"><?= __('Profile')?></a></li>
                            <li><a href="<?= $this->Url->build(['controller'=>'Users','action'=>'profileUpdate'])?>"><?= __('Update Profile')?></a></li>
                            <li><a href="<?= $this->Url->build(['controller'=>'users','action'=>'logout'])?>"><i class="fa fa-sign-out pull-right"></i> <?= __('Log Out')?></a></li>
                        </ul>
                    </li>
                    <?php echo $this->element('notification-area') ?>
                </ul>
            </nav>
        </div>
    </div>
    <!-- /top navigation -->