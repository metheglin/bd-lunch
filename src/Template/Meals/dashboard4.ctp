
<div class="page-title">
    <div class="title_left">
        <h1>Time to Lunch</h1>
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
                <br/>
                <?= $this->Form->create(null, [
                  'url' => '/meals/request', 
                  'role' => 'form', 
                  'class' => 'form-horizontal form-label-left', 
                  'id' => 'form',
                  'align' => [
                    'sm' => [
                    'left' => 3,
                    'middle' => 9,
                    'right' => 12
                    ],
                    'md' => [
                    'left' => 3,
                    'middle' => 6,
                    'right' => 12
                    ]
                    ]
                  ]) 
                ?>

                <h2>
                    Meal
                </h2>
                <div style="margin-bottom: 40px;">
                    <h3>
                        <label for="meal_bd">
                            <input type="radio" name="meal_country" value="bd" id="meal_bd" />
                            <span class="flag-icon flag-icon-bd"></span>
                        </label>
                    </h3>
                    <h3>
                        <label for="meal_jp">
                            <input type="radio" name="meal_country" value="jp" id="meal_jp" />
                            <span class="flag-icon flag-icon-jp"></span>
                        </label>
                    </h3>
                    <h3>
                        <label for="meal_in">
                            <input type="radio" name="meal_country" value="in" id="meal_in" />
                            <span class="flag-icon flag-icon-in"></span>
                        </label>
                    </h3>
                    <h3>
                        <label for="meal_vn">
                            <input type="radio" name="meal_country" value="vn" id="meal_vn" />
                            <span class="flag-icon flag-icon-vn"></span>
                        </label>
                    </h3>

                    <div>
                        <label for="meal_nonchili">
                            <input type="checkbox" name="meal_nonchili" id="meal_nonchili" />
                            <span style="font-size: 2rem;">Non Green Chili</span>
                        </label>
                    </div>
                </div>

                <h2>
                    Dessert
                </h2>
                <div style="margin-bottom: 40px;">
                    <h3>
                        <label for="dessert_bd">
                            <input type="radio" name="dessert_country" value="bd" id="dessert_bd" />
                            <span class="flag-icon flag-icon-bd"></span>
                        </label>
                    </h3>
                    <!-- <h3>
                        <label for="dessert_jp">
                            <input type="radio" name="dessert_country" value="jp" id="dessert_jp" />
                            <span class="flag-icon flag-icon-jp"></span>
                        </label>
                    </h3> -->
                    <h3>
                        <label for="dessert_in">
                            <input type="radio" name="dessert_country" value="in" id="dessert_in" />
                            <span class="flag-icon flag-icon-in"></span>
                        </label>
                    </h3>
                    <h3>
                        <label for="dessert_vn">
                            <input type="radio" name="dessert_country" value="vn" id="dessert_vn" />
                            <span class="flag-icon flag-icon-vn"></span>
                        </label>
                    </h3>
                </div>

                <h2>
                    Drink
                </h2>
                <div style="margin-bottom: 40px;">
                    <h3>
                        <label for="drink_bd">
                            <input type="radio" name="drink_country" value="bd" id="drink_bd" />
                            <span class="flag-icon flag-icon-bd"></span>
                        </label>
                    </h3>
                    <h3>
                        <label for="drink_jp">
                            <input type="radio" name="drink_country" value="jp" id="drink_jp" />
                            <span class="flag-icon flag-icon-jp"></span>
                        </label>
                    </h3>
                    <h3>
                        <label for="drink_in">
                            <input type="radio" name="drink_country" value="in" id="drink_in" />
                            <span class="flag-icon flag-icon-in"></span>
                        </label>
                    </h3>
                    <h3>
                        <label for="drink_vn">
                            <input type="radio" name="drink_country" value="vn" id="drink_vn" />
                            <span class="flag-icon flag-icon-vn"></span>
                        </label>
                    </h3>

                    <div >
                        <label for="drink_nonsugar">
                            <input type="checkbox" name="drink_nonsugar" id="drink_nonsugar" />
                            <span style="font-size: 2rem;">Non Sugar</span>
                        </label>
                    </div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <?= $this->Form->button(__('Send'), ['class' => 'btn btn-success']) ?>
                    </div>
                </div>

                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
