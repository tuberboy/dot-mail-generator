<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="index, follow">
    <meta name="author" content="Tuber Boy">
    <title>DOT MAIL GENERATOR - MC</title>
    <meta name="msapplication-TileColor" content="#786fff">
    <meta name="theme-color" content="#786fff">
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="header"><a href="">TUBER BOY</a></div>
<?php
set_time_limit(0);

if(isset($_POST['email']))
{
    $mail = explode('@', $_POST['email']);
    $email = $mail[0];
    $domain = '@'.$mail[1];
    $email = ltrim($email);
    $domain = ltrim($domain);
    $email = rtrim($email);
    $domain = rtrim($domain);
    $email = stripslashes($email);
    $domain = stripslashes($domain);
    $email = htmlentities($email);
    $domain = htmlentities($domain);
    $res = addDOT($email);
    echo '<div class="box"><div class="title">Total: '.sizeof($res).'</div><textarea type="text">';
    foreach($res as $mcMails)
	{
		echo nl2br($mcMails.$domain).PHP_EOL;
	}
	echo '</textarea></div>';
}

function addDOT($str){ 
    if(strlen($str) > 1)
    {
        $ca = preg_split("//",$str); 
        array_shift($ca); 
        array_pop($ca); 
        $head = array_shift($ca); 
        $res = addDOT(join('',$ca)); 
        $result = array(); 
        foreach($res as $val)
        { 
          $result[] = $head . $val; 
          $result[] = $head . '.' .$val; 
        } 
        return $result; 
    } 
    return array($str); 
}
?>
    <div class="box">
    <div class="title">DOT MAILS GENERATOR</div>
    <form method="post">
        <input type="email" name="email" placeholder="Enter A Gmail/E-mail Address *" autocomplete="off" required>
        <button name="send">GENERATE</button>
    </form>
    </div>
<div class="footer">&copy; Copyright <?php echo date('Y'); ?> - <a href="https://github.com/tuberboy">Tuber Boy</a></div>
</body>
</html>