<?php
    $json = file_get_contents('./rooms.json');
    $rooms = json_decode($json, true);
?>

<h1>ROOMS</h1>
<pre> 
    <?php print_r($rooms) ?>
</pre>