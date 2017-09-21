<div class="page-title">
    <div class="title_left">
        <h3>Go Lunch</h3>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <h2>Meal</h2>
                <ul style="font-size: 3rem;">
                    <?php foreach ( $menues as $menu ) : ?>
                        <li>
                            <?php echo $menu->name . " (" . $menu->kind . ")"; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <h2>Dessert</h2>
                <ul style="font-size: 3rem;">
                    <?php foreach ( $desserts as $dessert ) : ?>
                        <li>
                            <?php echo $dessert->name . " (" . $dessert->kind . ")"; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <h2>Drink</h2>
                <ul style="font-size: 3rem;">
                    <?php foreach ( $drinks as $drink ) : ?>
                        <li>
                            <?php echo $drink->name . " (" . $drink->kind . ")"; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <h2>Instrument</h2>
                <ul style="font-size: 3rem;">
                    <?php foreach ( $instruments as $instrument ) : ?>
                        <li>
                            <?php echo $instrument->name . " (" . $instrument->kind . ")"; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>