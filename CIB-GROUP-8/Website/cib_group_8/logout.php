<?php
// Initialize the session.
session_start();

// Remove all session variables
session_unset();

// Destroy the session.
session_destroy();

// Redirect to index file
header("Location: index.php");
?>