<?php


add_action('init', 'flvcontactform_init');
function flvcontactform_init(){
    if(!is_admin()){
        wp_enqueue_script('flvcontactformjs', THEME_URL . '/assets/shortcodes/flvcontactform.js', array('jquery'));
    }
}

add_shortcode('contactform', 'contactform_func');
add_shortcode('flvcontactform', 'contactform_func');
if(isset($_POST['flvcontact'])){
	
$fields=get_option_tree('contact_fields','',false,true);
  $ymaill=get_option_tree('c_email','',false);
  send_message($fields,$ymaill);
}

function contactform_func($atts) {
    $func_output='';
$url = get_site_url();
$pageURL="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

$val=get_option_tree('contact_fields','',false,true);
$fields=$val;
$rest = substr($pageURL, -10); 
if($rest!="email-sent"){
    $func_output.='<div class="contact_form_holder rapid_contact flvcontactform"><form id="contact" method="post" action="' . $pageURL . '?email-sent" name="contact">';
  if (in_array("name",$fields))     $func_output.='<div data-role="fieldcontain"><label for="name"><strong>Name <em><span class="req">*</span></em></strong></label><input id="name" type="text" value="" size="25" name="sendername" class="rapid_contact inputbox flvname" aria-required="true"/>	</div>'; 
  if (in_array("email",$fields))    $func_output.='<div data-role="fieldcontain"><label for="email"><strong>Email <em><span class="req">*</span></em></strong></label><input id="email" type="text" value="" size="25" name="email" class="rapid_contact inputbox flvemail" aria-required="true"/>	</div>';
  if (in_array("telephone",$fields))$func_output.='<div data-role="fieldcontain"><label for="phone"><strong>Telephone <em><span class="req">*</span></em></strong></label><input id="phone" type="text" value="" size="25" name="phone" class="rapid_contact inputbox flvphone" aria-required="true"/>	</div>';
  if (in_array("subject",$fields))  $func_output.='<div data-role="fieldcontain"><label for="subject"><strong>Subject <em><span class="req">*</span></em></strong></label><input id="subject" type="text" value="" size="25" name="subject" class="rapid_contact inputbox flvsubject" aria-required="true"/>	</div>';
  if (in_array("message",$fields))  $func_output.='<div data-role="fieldcontain"><label for="message"><strong>Message <em><span class="req">*</span></em></strong></label><textarea id="message" rows="4" cols="30" name="message" class="rapid_contact textarea flvmessage" aria-required="true"></textarea>	</div>';
 		  $func_output.='<p class="requiredNote"><em>*</em> Denotes a required field.</p>
                        <p id="btnsubmit"><input id="send" name="flvcontact" type="submit" value="Send" class="btn rapid_contact  flvsubmit button" />  
                            </form>
                        </div>';
}
else
	{$message=get_option_tree("success_msg","",false); 
	$func_output.='<div class="success">'.$message.'</div>';}
    return $func_output;

}
		function send_message($fields,$maill){
       if(in_array("name",$fields))
       $name=$_POST['sendername'];
       if(in_array("email",$fields))
       $mail_from=$_POST['email'];
        if(in_array("subject",$fields))
        $subj=$_POST['subject'];
        if(in_array("message",$fields))
        $msg=$_POST['message'];
		if(in_array("telephone",$fields))
		$phonee=$_POST['phone'];

		$target = $maill;
	
		if (in_array("email",$fields))
        $headers = 'From: Mobile Site <'.$mail_from.'>' ;//else $headers = 'From: Mobile Site <'.$target.'>' ;

		
        $message='';
		 if (in_array("name",$fields)){
        $message.='Sender\'s Name: ';
        $message.=$name;
        $message.="\n\n";
	}
		  if (in_array("telephone",$fields)){
        $message.='Sender\'s Telephone number: ';
        $message.=$phonee;
        $message.="\n\n";
    }
         if (in_array("subject",$fields)){
        $message.='Sender\'s Subject: ';
        $message.=$subj;
        $message.="\n\n";
        }
         if (in_array("message",$fields)){
        $message.='Sender\'s Message: ';
        $message.=$msg;
}
		 
        $subject=$name;
		if (in_array("name",$fields))
        $subject.=$name;
        else{
        	 if(in_array("subject",$fields)) $subject.=$subj; 
        	 elseif(in_array("email",$fields)) $subject.=$mail_from; 
        	 else  $subject.="website";
        	 }

       mail($target,$subject,$message,$headers);

    }

?>