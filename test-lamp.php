<!DOCTYPE html>
<html lang="en-us">
  <head>
    <meta charset="UTF-8">
    <title>Simplephp by julianfoi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="stylesheets/normalize.css" media="screen">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="stylesheets/stylesheet.css" media="screen">
    <link rel="stylesheet" type="text/css" href="stylesheets/github-light.css" media="screen">
  </head>
  <body>
    <section class="page-header">
      <h1 class="project-name">Simplephp</h1>
      <h2 class="project-tagline">This is a simple PHP site with connection to Mysql Server</h2>
      <a href="https://github.com/julianfoi/SimplePHP" class="btn">View on GitHub</a>
    </section>

    <section class="main-content">
      <h3>

<p> Welcome to Simple PHP </p>

<h3>
<p> Congratulations, This is your PHP/Apache server conntected to Mysql Server </p>
<?php include_once("./config/linked-db-config.php") ?>
<?php 
   master = DB::getConnection('write')
   slave = DB::getConnection('read')
?>
</h3>
<h3>
<a id="authors-and-contributors" class="anchor" href="#authors-and-contributors" aria-hidden="true"><span class="octicon octicon-link"></span></a>Authors and Contributors
</h3>

    </section>
  </body>
</html>

