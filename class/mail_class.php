<?php
class eMail {
    var $to;
    var $subject;
    var $content;
    var $headers;
    var $marker;
    var $type;
    var $xMailer = "Mailing Service Panel";

    function __construct($type, $from, $replyto)
    {
        $this->type = $type;
        $this->headers .= "From: " . $from . "\n";
        $this->headers .= "Reply-to: " . $replyto . "\n";
        $this->headers .= "X-Mailer: " . $this->xMailer . "\n";
        $this->headers .= "MIME-Version: 1.0\n";
        if ($type == 0) //email z zalacznikiem
        {
            srand((double)microtime() * 1000000);
            $this->marker = md5(uniqid(rand()));
            $this->headers .= "Content-Type: multipart/mixed;\n";
            $this->headers .= "\tboundary=\"___" . $this->marker . "==\"\n\n";
            $this->content = "--___" . $this->marker . "==\n";
            $this->content .= "Content-Type: text/html; charset=utf-8\n";
            $this->content .= "Content-Transfer-Encoding: 8bit\n\n";
        } 
        elseif ($type == 1) //email bez zalacznika
        {
            $this->headers .= "Content-Type: text/html; charset=utf-8\n";
        }
        elseif ($type == 2) { // email z za��cznikiem i potwierdzeniem odbioru
				$grupy= new sql();
				$grupy->set_table('user');
				$grupy->set('email',"");
				$filter=" login='".$_SESSION['login']."'";	
				$wyswietl=$grupy->load_db2($filter);
            srand((double)microtime() * 1000000);
            $this->marker = md5(uniqid(rand()));
            $this->headers .= "Disposition-Notification-To: ".$wyswietl['email']."\n";
            $this->headers .= "Content-Type: multipart/mixed;\n";
            $this->headers .= "\tboundary=\"___" . $this->marker . "==\"\n\n";
            $this->content = "--___" . $this->marker . "==\n";
            $this->content .= "Content-Type: text/html; charset=utf-8\n";
            $this->content .= "Content-Transfer-Encoding: 8bit\n\n";
            }
        elseif ($type == 3) //email bez zalacznika z potwierdzeniem odbioru
        {
				$grupy= new sql();
				$grupy->set_table('user');
				$grupy->set('email',"");
				$filter=" login='".$_SESSION['login']."'";	
				$wyswietl=$grupy->load_db2($filter);
        	   $this->headers .= "Disposition-Notification-To: ".$wyswietl['email']."\n";
        	   $this->headers .= "Content-Type: text/html; charset=utf-8\n";
        }
        elseif ($type == 5) //email bez zalacznika
        {
            $this->headers .= "Content-Type: text/html; charset=utf-8\n";
        }
        elseif ($type == 6) //email z zalacznikiem
        {
            srand((double)microtime() * 1000000);
            $this->marker = md5(uniqid(rand()));
            $this->headers .= "Content-Type: multipart/mixed;\n";
            $this->headers .= "\tboundary=\"___" . $this->marker . "==\"\n\n";
            $this->content = "--___" . $this->marker . "==\n";
            $this->content .= "Content-Type: text/html; charset=utf-8\n";
            $this->content .= "Content-Transfer-Encoding: 8bit\n\n";
        } 
    } 

    function eMailAttachment($mimeType, $fileName, $data)
    {
        if ($this->type == 0 or $this->type == 2) {
            $this->content .= "\n\n--___" . $this->marker . "==\n";
            $this->content .= "Content-Type: " . $mimeType . "; name=\"" . $fileName . "\"\n";
            $this->content .= "Content-Transfer-Encoding: base64\n";
            $this->content .= "Content-Disposition: attachment; filename=\"" . $fileName . "\"\n\n";
            $this->content .= chunk_split(base64_encode($data));
        } 
    } 

    function eMailSend($to)
    {
        if ($this->type == 0 or $this->type == 2) {
            $this->content .= "--___" . $this->marker . "==--\n\n"; // close marker
        } 
        mail ($to, $this->subject, $this->content, $this->headers);
    } 

    function eMailContent($subject, $content)
    {
        $this->subject = $subject;
        $this->content .= $content;
    } 
} 

?>
