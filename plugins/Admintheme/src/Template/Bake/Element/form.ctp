<%
use Cake\Utility\Inflector;
%>
<div class="page-title">
    <div class="title_left">
        <h3><%= $singularHumanName %></h3>
    </div>

    <div class="title_right">
        <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right top_search">
            <?= $this->Html->link(__('<i class="fa fa-dashboard"></i> Back'), ['action' => 'index'], ['class'=>'btn btn-success pull-right','escape'=>false]) ?>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><?= __('<%= Inflector::humanize($action) %>') ?></h2>
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
                <?= $this->Form->create($<%= $singularVar %>, ['role' => 'form', 'class' => 'form-horizontal form-label-left', 'id' => 'form','align' => [
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
            ]]) ?>

                <?php
                <%
                foreach ($fields as $field) {
                    if (in_array($field, $primaryKey)) {
                        continue;
                    }
                    if (isset($keyFields[$field])) {
                        $fieldData = $schema->column($field);
                        if (!empty($fieldData['null'])) {
                            %>
                echo $this->Form->control('<%= $field %>', ['options' => $<%= $keyFields[$field] %>, 'empty' => true]);
                            <%
                        } else {
                            %>
                echo $this->Form->control('<%= $field %>', ['options' => $<%= $keyFields[$field] %>]);
                            <%
                        }
                        continue;
                    }
                    if (!in_array($field, ['created', 'modified', 'updated','isactive','isdel','modified_by','','created_by'])) {
                        $fieldData = $schema->column($field);
                        if (($fieldData['type'] === 'date') && (!empty($fieldData['null']))) {
                            %>
                echo $this->Form->control('<%= $field %>', ['empty' => true, 'default' => '']);
                            <%
                        } else {
                            %>
                echo $this->Form->control('<%= $field %>');
                            <%
                        }
                    }
                }
                if (!empty($associations['BelongsToMany'])) {
                    foreach ($associations['BelongsToMany'] as $assocName => $assocData) {
                        %>
                echo $this->Form->control('<%= $assocData['property'] %>._ids', ['options' => $<%= $assocData['variable'] %>]);
<%
      }
                }
                %>
                ?>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <?= $this->Form->button(__('Save'), ['class' => 'btn btn-success']) ?>
                    </div>
                </div>

                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>