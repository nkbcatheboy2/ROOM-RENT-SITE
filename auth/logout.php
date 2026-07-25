<?php
// auth/logout.php
session_start(); // सेशन शुरू करें

// सभी सेशन वेरिएबल्स को खाली करें
$_SESSION = array();

// यदि सेशन कुकी का उपयोग किया गया है, तो उसे भी डिलीट करें
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// अंत में सेशन को पूरी तरह नष्ट (Destroy) कर दें
session_destroy();

// यूजर को सीधे होम पेज पर रीडायरेक्ट करें
header("Location: ../index.php");
exit();
?>