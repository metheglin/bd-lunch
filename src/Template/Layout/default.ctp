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
      '/bootstrap/css/bootstrap.min.css',
      '/plugins/font-awesome/css/font-awesome.min.css',
      ]));

// Prepend scripts required by the navbar
$this->prepend('script', $this->Html->script([
    'jquery-3.2.1.min',
    '/bootstrap/js/bootstrap.min'
]));

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
        // Sometimes we'll want to send scripts to the top (rarely..)
        echo $this->fetch('script.top');
    ?>

<script type="text/javascript">
  var baseURL = '<?php echo $this->Url->build('/',true) ?>';
</script>
</head>

<body class="hold-transition skin-blue sidebar-mini <?php echo $bodyClass; ?>">
<div class="wrapper">

<div class="content-wrapper">
<?php echo $this->element('top-header'); ?>
  <div class="row">
    <?php echo $this->element('left-sidebar'); ?>
    <div class="col-md-9">
       <?= $this->Flash->render() ?>
      <section class="content-header no-print">
        <h1><?php echo isset($title_for_layout) ? $title_for_layout : ''; ?></h1>      
        
      </section>    
      <!-- Main content -->
      <section class="content box">
        <?= $this->fetch('content'); ?>
      </section>
    </div>
  </div>
</div>
  <!-- /.content-wrapper -->
  <?php echo $this->element('footer'); ?>

</div>
<!-- ./wrapper -->
<?= $this->fetch('script'); ?>

<?= $this->Html->script('custom') ?> 

<?= $this->fetch('scriptInline'); ?>

</body>
</html>