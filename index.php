<?php

  /////////////////////////////////////
 // index.php for SimpleExample app //
/////////////////////////////////////

// Create f3 object then set various global properties of it
// These are available to the routing code below, but also to any 
// classes defined in autoloaded definitions

$f3 = require('../../AboveWebRoot/fatfree-master/lib/base.php');

// autoload Controller class(es) and anything hidden above web root, e.g. DB stuff
$f3->set('AUTOLOAD','autoload/;../../AboveWebRoot/autoload/');

$db = DatabaseConnection::connect();		// defined as autoloaded class in AboveWebRoot/autoload/
$f3->set('DB', $db);

$f3->set('DEBUG',3);		// set maximum debug level
$f3->set('UI','ui/');		// folder for View templates


  /////////////////////////////////////////////
 // Simple Example URL application routing //
/////////////////////////////////////////////

//home page (index.html) -- actually just shows form entry page with a different title
$f3->route('GET /',
  function ($f3) {
    $f3->set('html_title','Sample Home Page');
    $f3->set('content','sampleHome.html');
    echo Template::instance()->render('layout.html');
  }
);

// When using GET, provide a form for the user to upload an image via the file input type
$f3->route('GET /sampleform',
  function($f3) {
    $f3->set('html_title','Sample Page');
    $f3->set('content','samplePage.html');
    echo template::instance()->render('layout.html');
  }
);

  ////////////////////////
 // Run the FFF engine //
////////////////////////

$f3->run();

?>

