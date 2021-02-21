<?php
session_start();
session_destroy();
echo "<script type='text/javascript'>alert('CLOSE SESSION'); location.href='../index.html';</script>";
?>