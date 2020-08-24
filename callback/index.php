<?php
file_put_contents(preg_replace('/0\.(\d+) (\d+)/', '\2_\1', microtime()).'.txt', file_get_contents('php://input'));
?>