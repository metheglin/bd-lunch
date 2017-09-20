
    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
            <h3>General</h3>
            <ul class="nav side-menu">
                <li>
                   <?php echo $this->Html->link(__('<i class="fa fa-home"></i> Home '), ['controller' => 'Meals', 'action' => 'dashboard'],['escape'=>false]) ?>
                </li>
                <!-- <li>
                   <?php echo $this->Html->link(__('<i class="fa fa-user"></i> Users '), ['controller' => 'Users', 'action' => 'index'],['escape'=>false]) ?>
                </li> -->
            </ul>
        </div>

    </div>
    <!-- /sidebar menu -->