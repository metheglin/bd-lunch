<?php 
use Cake\Core\Configure;
if (!$this->fetch('html')) {
    $this->start('html');
    printf('<html lang="%s">', Configure::read('App.language'));
    $this->end();
}

if(isset($title_for_layout)){    
    $this->start('title');
    echo $title_for_layout;
    $this->end();
}

if (!$this->fetch('title') && Configure::read('App.title')) {
    $this->start('title');
    echo Configure::read('App.title');
    $this->end();
}
// Always append App.title to current page title
elseif ($this->fetch('title') && Configure::read('App.title')) {
    $this->append('title', sprintf(' | %s', Configure::read('App.title')));
}



// Prepend some meta tags
$this->prepend('meta', $this->Html->meta('icon'));
$this->prepend('meta', $this->Html->meta('viewport', 'width=device-width, initial-scale=1'));
if (Configure::read('App.author')) {
    $this->prepend('meta', $this->Html->meta('author', null, [
        'name'    => 'author',
        'content' => Configure::read('App.author')
    ]));
}

// Prepent CSS 
$this->prepend('css', $this->Html->css([
      'Admintheme./vendors/bootstrap/dist/css/bootstrap.min',
      'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css',
      'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
      'Admintheme./vendors/iCheck/skins/flat/green',
      'Admintheme./vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min',
      'Admintheme./css/maps/jquery-jvectormap-2.0.3',
      '/plugins/tooltipster/css/tooltipster.bundle.min',
      'Admintheme./build/css/custom',
      ]));

// Prepend scripts required by the navbar
/*$this->prepend('script', $this->Html->script([
    'jquery-3.2.1.min',
    '/bootstrap/js/bootstrap.min'
]));*/

$bodyClass = strtolower($this->request->params['controller']).'-'.$this->request->params['action']; 

 ?>
<!DOCTYPE html>
<?= $this->fetch('html'); ?>
<head>
    <?= $this->Html->charset(); ?>
    <title>
        <?= $this->fetch('title'); ?>
    </title>

    <?php
        echo $this->fetch('meta');

        // Styles       
        echo $this->fetch('css');
        // cusotm css load
        echo $this->Html->css('custom');
        echo $this->Html->css('flag-icon.min');
        // Sometimes we'll want to send scripts to the top (rarely..)
        echo $this->fetch('script.top');
    ?>

</head>
<body class="nav-md  footer_fixed">
<div class="container body">
    <div class="main_container">
        <!-- Left side column. contains the sidebar -->
        <?php echo $this->element('aside-main-sidebar'); ?>

        <!-- Header Navbar: style can be found in header.less -->
        <?php echo $this->element('nav-top') ?>
        <!-- page content -->
        <div class="right_col" role="main">
            <?php echo $this->Flash->render(); ?>
            <?php echo $this->Flash->render('auth'); ?>
            <?php echo $this->fetch('content'); ?>
        </div>
        <!-- /page content -->
        <div id="busy-indicator">
            <i class="fa fa-spinner fa-spin"></i>
        </div>
        <!-- footer content -->
        <?php #echo $this->element('footer'); ?>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery 2.1.4 -->
<?php echo $this->Html->script('Admintheme./vendors/jquery/dist/jquery.min'); ?>
<!-- Bootstrap 3.3.5 -->
<?php echo $this->Html->script('Admintheme./vendors/bootstrap/dist/js/bootstrap.min'); ?>
<!-- SlimScroll -->
<?php echo $this->Html->script('Admintheme./vendors/fastclick/lib/fastclick'); ?>
<!-- FastClick -->
<?php echo $this->Html->script('Admintheme./vendors/nprogress/nprogress'); ?>
<!-- jQuery 2.1.4 -->
<?php echo $this->Html->script('Admintheme./vendors/Chart.js/dist/Chart.min'); ?>
<!-- Bootstrap 3.3.5 -->
<?php #echo $this->Html->script('Admintheme./vendors/bernii/gauge.js/dist/gauge.min'); ?>
<!-- SlimScroll -->
<?php echo $this->Html->script('Admintheme./vendors/bootstrap-progressbar/bootstrap-progressbar.min'); ?>
<!-- FastClick -->
<?php echo $this->Html->script('Admintheme./vendors/iCheck/icheck.min'); ?>
<?php echo $this->Html->script('Admintheme./vendors/skycons/skycons'); ?>
<?php echo $this->Html->script('Admintheme./vendors/Flot/jquery.flot'); ?>
<?php echo $this->Html->script('Admintheme./vendors/Flot/jquery.flot.pie'); ?>
<?php echo $this->Html->script('Admintheme./vendors/Flot/jquery.flot.time'); ?>
<?php echo $this->Html->script('Admintheme./vendors/Flot/jquery.flot.stack'); ?>
<?php echo $this->Html->script('Admintheme./vendors/Flot/jquery.flot.resize'); ?>
<?php echo $this->Html->script('Admintheme./js/flot/jquery.flot.orderBars'); ?>
<?php echo $this->Html->script('Admintheme./js/flot/date'); ?>
<?php echo $this->Html->script('Admintheme./js/flot/jquery.flot.spline'); ?>
<?php echo $this->Html->script('Admintheme./js/maps/jquery-jvectormap-2.0.3.min'); ?>
<?php echo $this->Html->script('Admintheme./js/moment/moment.min'); ?>
<?php echo $this->Html->script('Admintheme./js/datepicker/daterangepicker'); ?>
<?php echo $this->Html->script('/plugins/tooltipster/js/tooltipster.bundle.min'); ?>
<?php echo $this->Html->script('Admintheme./build/js/custom.min'); ?>

<?php echo $this->fetch('script'); ?>
<?php echo $this->fetch('scriptBottom'); ?>
<!-- Flot -->
<script>
    $(document).ready(function() {
        var data1 = [
            [gd(2012, 1, 1), 17],
            [gd(2012, 1, 2), 74],
            [gd(2012, 1, 3), 6],
            [gd(2012, 1, 4), 39],
            [gd(2012, 1, 5), 20],
            [gd(2012, 1, 6), 85],
            [gd(2012, 1, 7), 7]
        ];

        var data2 = [
            [gd(2012, 1, 1), 82],
            [gd(2012, 1, 2), 23],
            [gd(2012, 1, 3), 66],
            [gd(2012, 1, 4), 9],
            [gd(2012, 1, 5), 119],
            [gd(2012, 1, 6), 6],
            [gd(2012, 1, 7), 9]
        ];
        $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
            data1, data2
        ], {
            series: {
                lines: {
                    show: false,
                    fill: true
                },
                splines: {
                    show: true,
                    tension: 0.4,
                    lineWidth: 1,
                    fill: 0.4
                },
                points: {
                    radius: 0,
                    show: true
                },
                shadowSize: 2
            },
            grid: {
                verticalLines: true,
                hoverable: true,
                clickable: true,
                tickColor: "#d5d5d5",
                borderWidth: 1,
                color: '#fff'
            },
            colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
            xaxis: {
                tickColor: "rgba(51, 51, 51, 0.06)",
                mode: "time",
                tickSize: [1, "day"],
                //tickLength: 10,
                axisLabel: "Date",
                axisLabelUseCanvas: true,
                axisLabelFontSizePixels: 12,
                axisLabelFontFamily: 'Verdana, Arial',
                axisLabelPadding: 10
            },
            yaxis: {
                ticks: 8,
                tickColor: "rgba(51, 51, 51, 0.06)",
            },
            tooltip: false
        });

        function gd(year, month, day) {
            return new Date(year, month - 1, day).getTime();
        }
    });
</script>
<?php echo $this->Html->script('Admintheme./js/maps/jquery-jvectormap-world-mill-en'); ?>
<?php echo $this->Html->script('Admintheme./js/maps/jquery-jvectormap-us-aea-en'); ?>
<?php echo $this->Html->script('Admintheme./js/maps/gdp-data'); ?>
<script>
    /*$(document).ready(function(){
        $('#world-map-gdp').vectorMap({
            map: 'world_mill_en',
            backgroundColor: 'transparent',
            zoomOnScroll: false,
            series: {
                regions: [{
                    values: gdpData,
                    scale: ['#E6F2F0', '#149B7E'],
                    normalizeFunction: 'polynomial'
                }]
            },
            onRegionTipShow: function(e, el, code) {
                el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
            }
        });
    });*/
</script>
<!-- /jVectorMap -->

<!-- Skycons -->
<script>
    $(document).ready(function() {
        var icons = new Skycons({
                "color": "#73879C"
            }),
            list = [
                "clear-day", "clear-night", "partly-cloudy-day",
                "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                "fog"
            ],
            i;

        for (i = list.length; i--;)
            icons.set(list[i], list[i]);

        icons.play();
    });
</script>
<!-- /Skycons -->

<!-- bootstrap-daterangepicker -->
<script>
    $(document).ready(function() {

        var cb = function(start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        };

        var optionSet1 = {
            startDate: moment().subtract(29, 'days'),
            endDate: moment(),
            minDate: '01/01/2012',
            maxDate: '12/31/2015',
            dateLimit: {
                days: 60
            },
            showDropdowns: true,
            showWeekNumbers: true,
            timePicker: false,
            timePickerIncrement: 1,
            timePicker12Hour: true,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            opens: 'left',
            buttonClasses: ['btn btn-default'],
            applyClass: 'btn-small btn-primary',
            cancelClass: 'btn-small',
            format: 'MM/DD/YYYY',
            separator: ' to ',
            locale: {
                applyLabel: 'Submit',
                cancelLabel: 'Clear',
                fromLabel: 'From',
                toLabel: 'To',
                customRangeLabel: 'Custom',
                daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                firstDay: 1
            }
        };
        $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
        $('#reportrange').daterangepicker(optionSet1, cb);
        $('#reportrange').on('show.daterangepicker', function() {
            console.log("show event fired");
        });
        $('#reportrange').on('hide.daterangepicker', function() {
            console.log("hide event fired");
        });
        $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
            console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
        });
        $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
            console.log("cancel event fired");
        });
        $('#options1').click(function() {
            $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
        });
        $('#options2').click(function() {
            $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
        });
        $('#destroy').click(function() {
            $('#reportrange').data('daterangepicker').remove();
        });
    });
</script>
<!-- /bootstrap-daterangepicker -->


<?= $this->Html->script('custom') ?> 
<?= $this->fetch('scriptInline'); ?>
</body>
</html>
