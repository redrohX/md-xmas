<?php
  function wrapMailMessage($string, $length=980, $splitchar="\n ") {
    if (strlen($string) <= $length) {
        $output = $string; //do nothing
    } else {
        $output = wordwrap($string, $length, $splitchar);
    }
    return $output;
  }

  $protocol  = empty($_SERVER['HTTPS']) ? 'http' : 'https';
  $domain = $_SERVER['SERVER_NAME'];
  $domain_url = "${protocol}://${domain}";

  $message_header = '';
  $message_contact_details = '';
  $message_footer = '';
  $message_sender = '';
  $message = '';

  $title = htmlspecialchars(strip_tags($_POST['title']));
  $first_name = htmlspecialchars(strip_tags($_POST['first_name']));
  $surname = htmlspecialchars(strip_tags($_POST['surname']));
  $email = htmlspecialchars(strip_tags($_POST['email']));
  $dietary_wishes = htmlspecialchars(strip_tags($_POST['dietary_wishes']));
  $food_allergies = htmlspecialchars(strip_tags($_POST['food_allergies']));

  // RSVP MAIL DATA
  $mail_sender = 'Minddistrict Santa';
  $mail_sender_email = 'santa@minddistrict.com';
  $subject = 'RSVPed to the Minddistrict Bowtie Bash 2017';

  // GENERAL MAIL DATA
  // Header
  $message_header .= '<!DOCTYPE html>';
  $message_header .= '<html>';
  $message_header .= '<body bgcolor="#ffffff" style="background-color:#ffffff; margin:0; padding:0;">';
  $message_header .= '<center>';
  $message_header .= '<table width="600" bgcolor="#F4F3F0" align="center" border="0" cellpadding="15" cellspacing="0" ';
  $message_header .= 'style="background-color:#F4F3F0; border:10px dashed #F43B3B; border-radius:15px; border-collapse:collapse;">';
  $message_header .= '<tbody>';
  $message_header .= '<tr>';
  $message_header .= '<td>';
  $message_header .= '<table width="550" border="0" cellpadding="0" cellspacing="0">';
  $message_header .= '<thead>';
  $message_header .= '<tr>';
  $message_header .= '<th valign="top" align="center">';
  $message_header .= '<p style="color:#333333; font-family:Tahoma, sans-serif; font-size:13px; text-align:center; text-transform:uppercase;">';
  $message_header .= 'Thank you for joining the';
  $message_header .= '</p>';
  $message_header .= '</th>';
  $message_header .= '</tr>';
  $message_header .= '<tr>';
  $message_header .= '<th valign="top" align="center">';
  $message_header .= '<h1 style="color:#F43B3B; font-family: Georgia, Times New Roman, Times, cursive; font-size:31px; margin:0; text-align:center;">';
  $message_header .= '<img src="'.$domain_url.'/xmas/img/bow-tie-bash-title.png" alt="Minddistrict Bowtie Bash 2017" style="width:350px;"/>';
  $message_header .= '</h1>';
  $message_header .= '</th>';
  $message_header .= '</tr>';
  $message_header .= '</thead>';
  $message_header .= '</table>';
  $message_header .= '</td>';
  $message_header .= '</tr>';

  // Contact details
  $message_contact_details .= '<tr>';
  $message_contact_details .= '<td style="color:#333333; font-family:Tahoma, sans-serif; font-size:17px; margin-bottom:30px;">';
  $message_contact_details .= '<table width="550" border="0" cellpadding="0" cellspacing="0">';
  $message_contact_details .= '<tbody>';
  $message_contact_details .= '<tr>';
  $message_contact_details .= '<th align="left" style="width:40%" valign="top"><strong>Title:</strong></th>';
  $message_contact_details .= '<td align="left" valign="top">'.$title.'</td>';
  $message_contact_details .= '</tr>';
  $message_contact_details .= '<tr>';
  $message_contact_details .= '<th align="left" style="width:40%" valign="top"><strong>First name:</strong></th>';
  $message_contact_details .= '<td align="left" valign="top">'.$first_name.'</td>';
  $message_contact_details .= '</tr>';
  $message_contact_details .= '<tr>';
  $message_contact_details .= '<th align="left" style="width:40%" valign="top"><strong>Surname:</strong></th>';
  $message_contact_details .= '<td align="left" valign="top">'.$surname.'</td>';
  $message_contact_details .= '</tr>';
  $message_contact_details .= '<tr>';
  $message_contact_details .= '<th align="left" style="width:40%" valign="top"><strong>Email:</strong></th>';
  $message_contact_details .= '<td align="left" valign="top">'.$email.'</td>';
  $message_contact_details .= '</tr>';
  $message_contact_details .= '<tr>';
  $message_contact_details .= '<th align="left" style="width:40%" valign="top"><strong>Dietary wishes:</strong></th>';
  $message_contact_details .= '<td align="left" valign="top">'.$dietary_wishes.'</td>';
  $message_contact_details .= '</tr>';
  $message_contact_details .= '<tr>';
  $message_contact_details .= '<th align="left" style="width:40%" valign="top"><strong>Food allergies:</strong></th>';
  $message_contact_details .= '<td align="left" valign="top">'.$food_allergies.'</td>';
  $message_contact_details .= '</tr>';
  $message_contact_details .= '</tbody>';
  $message_contact_details .= '</table>';
  $message_contact_details .= '</td>';
  $message_contact_details .= '</tr>';

  // Footer
  $message_footer .= '<tr>';
  $message_footer .= '<td style="color:#333333; font-family:Tahoma, sans-serif; font-size:13px; padding-bottom:15px; padding-top:15px;">';
  $message_footer .= '<table width="550" border="0" cellpadding="0" cellspacing="0">';
  $message_footer .= '<tfoot>';
  $message_footer .= '<tr>';
  $message_footer .= '<td align="center" valign="top" style="color:#3B8686; text-align:center;">';
  $message_footer .= '&copy; 2017 Minddistrict North Pole';
  $message_footer .= '</td>';
  $message_footer .= '</tr>';
  $message_footer .= '</tfoot>';
  $message_footer .= '</table>';
  $message_footer .= '</td>';
  $message_footer .= '</tr>';
  $message_footer .= '</td>';
  $message_footer .= '</tr>';
  $message_footer .= '</tbody>';
  $message_footer .= '</table>';
  $message_footer .= '</center>';
  $message_footer .= '</body>';
  $message_footer .= '</html>';

  // SENDER MAIL DATA
  $to_sender = $mail_sender_email;
  $headers_sender  = 'MIME-Version: 1.0' . "\r\n";
  $headers_sender .= 'Content-type: text/html; charset=utf-8' . "\r\n";
  $headers_sender .= 'From: '.$mail_sender.' <'.$mail_sender_email.'>' . "\r\n";
  $headers_sender .= 'Cc: v.stuurland@minddistrict.com' . "\r\n";
  $message_sender .= $message_header;
  $message_sender .= '<tr>';
  $message_sender .= '<td>';
  $message_sender .= '<table width="550" border="0" cellpadding="0" cellspacing="0">';
  $message_sender .= '<tbody>';
  $message_sender .= '<tr>';
  $message_sender .= '<td>';
  $message_sender .= '<p style="color:#333333; font-family:Tahoma, sans-serif; font-size:17px;">';
  $message_sender .= 'The following person ';
  $message_sender .= $title.' '.$first_name.' '.$surname;
  $message_sender .= ' has RSVPed to the Minddistrict Bowtie Bash 2017:';
  $message_sender .= '</p>';
  $message_sender .= '</td>';
  $message_sender .= '</tr>';
  $message_sender .= '</tbody>';
  $message_sender .= '</table>';
  $message_sender .= '</td>';
  $message_sender .= '</tr>';
  $message_sender .= $message_contact_details;
  $message_sender .= $message_footer;

  // RECEIVER MAIL DATA
  $to = $email;
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
  $headers .= 'From: '.$mail_sender.' <'.$mail_sender_email.'>' . "\r\n";
  $headers .= 'Bcc: santa@minddistrict.com, v.stuurland@minddistrict.com' . "\r\n";
  $message .= $message_header;
  $message .= '<tr>';
  $message .= '<td>';
  $message .= '<table width="550" border="0" cellpadding="0" cellspacing="0">';
  $message .= '<tbody>';
  $message .= '<tr>';
  $message .= '<td>';
  $message .= '<p style="color:#333333; font-family:Tahoma, sans-serif; font-size:17px; margin:0;">';
  $message .= 'Dear '.$title.' '.$first_name.' '.$surname.',<br/><br/>';
  $message .= 'Thank you for joining the Minddistrict Bowtie Bash!<br/>';
  $message .= 'You have sent us the following information:';
  $message .= '</p>';
  $message .= '</td>';
  $message .= '</tr>';
  $message .= '</tbody>';
  $message .= '</table>';
  $message .= '</td>';
  $message .= '</tr>';
  $message .= $message_contact_details;
  $message .= '<tr>';
  $message .= '<td style="color:#333333; font-family:Tahoma, sans-serif; font-size:17px; text-align:center;">';
  $message .= '<table width="550" border="0" cellpadding="0" cellspacing="0">';
  $message .= '<tbody>';
  $message .= '<tr>';
  $message .= '<td align="center" valign="top">';
  $message .= '<br/>';
  $message .= '<img src="'.$domain_url.'/xmas/img/gingerbread_bow-tie_transparent.gif" style="width:80px;"/>';
  $message .= '<br/><br/>';
  $message .= '<h2 style="color:#F43B3B; font-family:Tahoma, sans-serif; font-size:29px; font-weight:bold; margin:0 0 10px 0; text-align:center;">';
  $message .= 'Friday, December 15th';
  $message .= '</h2>';
  $message .= '<h3 style="font-family:Tahoma, sans-serif; font-size:20px; font-weight:bold; margin:0; text-align:center;">';
  $message .= 'The Bash will start at 7:00 pm and end at 1:00 am';
  $message .= '</h3>';
  $message .= '<br/><br/>';
  $message .= '<span style="color:#F43B3B; font-size:15px;">';
  $message .= '<strong>';
  $message .= 'What’s the dress code again?';
  $message .= '</strong>';
  $message .= '</span>';
  $message .= '<br/>';
  $message .= 'We already told you this. ';
  $message .= '<strong>It’s bow ties. BOW TIES.</strong>';
  $message .= '<br/><br/>';
  $message .= '<span style="color:#F43B3B; font-size:15px;">';
  $message .= '<strong>';
  $message .= 'Where are we going again? Well, here:';
  $message .= '</strong>';
  $message .= '</span>';
  $message .= '<br/><br/>';
  $message .= '<a href="https://www.nelisoost.nl" title="NELIS Oost" target="_blank">';
  $message .= '<img src="'.$domain_url.'/xmas/img/logo-nelis.svg" width="130"/>';
  $message .= '</a>';
  $message .= '<br/><br/>';
  $message .= '<strong>';
  $message .= '<a style="color:#F43B3B;" href="https://www.nelisoost.nl" title="NELIS Oost" target="_blank">';
  $message .= 'NELIS Oost';
  $message .= '</a>';
  $message .= '</strong>';
  $message .= '<br/>';
  $message .= 'Sumatrastraat 28H,<br/>';
  $message .= '1094 ND Amsterdam';
  $message .= '</td>';
  $message .= '</tr>';
  $message .= '</tbody>';
  $message .= '</table>';
  $message .= '</td>';
  $message .= '</tr>';
  $message .= $message_footer;

  $message_sender = wrapMailMessage($message_sender);
  $message = wrapMailMessage($message);

  $result_sender = mail($to_sender, $subject, $message_sender, $headers_sender);
  $result = mail($to, $subject, $message, $headers);

  if(!$result_sender) {
    echo '<span style="color: #F43B3B">';
      echo "Dear " . $title . " " . $first_name . " " . $surname . ", <br/><br/>
      Oops, something went wrong! <br/>Please refresh your page and fill out Santa’s RSVP form again.
      <br/><br/>
      Ho ho ho, Santa!";
    echo '</span>';
  } else {
    if(!$result) {
      echo '<span style="color: #F43B3B">';
        echo "Dear " . $title . " " . $first_name . " " . $surname . ", <br/><br/>
        Oops, something went wrong! <br/>Please refresh your page and fill out Santa’s RSVP form again.
        <br/><br/>
        Ho ho ho, Santa!";
      echo '</span>';
    } else {
      echo '<span style="color: #3B8686">';
        echo "Dear " . $title . " " . $first_name . " " . $surname . ", <br/><br/>
        Thank you voor RSVPing. <br/>We’re looking forward to seeing you… and remember: bow ties all around please!
        <br/><br/>
        Ho ho ho, Santa!";
      echo '</span>';
    }
  }
?>
