<!DOCTYPE html>
<html lang="en">

<?php

include "config.php";
include "functions.php";    
?>

<body class="bg-gradient-primary">

  <div class="container">
	<div class="row">
		<div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">View Account!</h1>
        </div>
    </div>
  </div>

<?php include "header.php";?>
    <pre>
    <?php view(); ?>
    </pre>

</body>
</html>
 