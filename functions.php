<?php
require 'connection.php'; 

// Regex Patterns
/**
 * Regular expression patterns for various fields.
 *
 * @var array
 */
$pattern ['fullname']='/^[A-Za-z\s]+$/';
$pattern ['name']='/^[a-zA-Z]+$/';
$pattern ['surname']="/^[a-zA-Z]+$/";
$pattern ['email']='/^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,4})(\.[a-z]{2,4})?$/';
$pattern ['password']="/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[a-zA-Z\d@$!%*?&]{8,}$/";
$pattern ['subject']='/^[a-z A-Z\d]{5,30}$/';
$pattern ['contactnumber']='/^\d{8}$/';

?>