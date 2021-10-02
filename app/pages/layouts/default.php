<!DOCTYPE html>
<html>
<head>
<?=$this->getMeta();?>
</head>
<body>

<h1>Default template</h1>
<?=$age?>

<?=$content?>
<?php

$logs = \R::getDatabaseAdapter()
            ->getDatabase()
            ->getLogger();

debug( $logs->grep( 'SELECT' ) );

?>
<script src="app.js"></script>
</body>
</html>
