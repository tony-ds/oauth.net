<?php
chdir(__DIR__);
require('./data.php');

$path = $_SERVER['REQUEST_URI'];
if(!preg_match('~/code/([^/]+)/~', $path, $match))
  die();

$lang = $match[1];

if(!isset($languages[$lang])) {
  header('HTTP/1.1 404 Not Found');
  echo 'Not Found';
  die();
}

$data = $languages[$lang];


$page_title = "OAuth Libraries for ".$data['name'];
$page_section = "";
$page_secondary = "";
$page_meta_description = "Find OAuth code and libraries for ".$data['name'];
require('../includes/_header.php');
?>
<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/code/">Code</a></li>
      <li class="breadcrumb-item active"><?= $data['name'] ?></li>
    </ol>
  </nav>
  <div>

    <img src="/images/code/<?= $lang ?>.png" style="float: right; height: 120px;">

    <h2>OAuth Libraries for <?= $data['name'] ?></h2>

    <p><?= $data['name'] ?> OAuth libraries for building clients and servers. If you would like to add a library or see something that should be removed, you can <a href="https://github.com/aaronpk/oauth.net/blob/master/code/<?= $lang ?>/index.php">edit this page</a>.</p>

    <?php if(isset($data['client_libraries'])): ?>
      <h4>Client Libraries</h4>

      <ul>
        <?php foreach($data['client_libraries'] as $lib): ?>
          <li><?= $lib ?></li>
        <?php endforeach ?>
      </ul>
    <?php endif ?>

    <?php if(isset($data['server_libraries'])): ?>
      <h4>Server Libraries</h4>

      <ul>
        <?php foreach($data['server_libraries'] as $lib): ?>
          <li><?= $lib ?></li>
        <?php endforeach ?>
      </ul>
    <?php endif ?>

  </div>
</div>

<?php require('../includes/_footer.php'); ?>
