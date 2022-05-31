<?php
// require get_template_directory() . '/inc/email-template.php';

add_action('wp_ajax_ipledgerform', 'ipledger_send_form');
add_action('wp_ajax_nopriv_ipledgerform', 'ipledger_send_form');

function ipledger_send_form()
{
    // Captcha
    $captcha = "";
    if (isset($_POST['token'])) {
        $captcha = $_POST['token'];
    }

    $secretKey = carbon_get_theme_option('ipledger_captcha_secret_key');
    $url       = "https://www.google.com/recaptcha/api/siteverify?secret=" . $secretKey . "&response=" . $captcha;

    $responce     = file_get_contents($url);
    $responceKeys = json_decode($responce, true);
    header('Content-type: application/json');
    // Captcha

    $res = ['res' => false, 'error' => '', 'keys' => ''];

    $userName  = "";
    $userEmail = "";
    $classes   = "";
    $countries = "";
    $claims    = "";

    $name     = $_POST['user_name'];
    $email    = $_POST['user_email'];
    $pageName = $_POST['page-name'];
    $formName = $_POST['form-name'];

    // Email config
    $mailSendTo   = get_bloginfo("admin_email");
    $mailSubject  = "IP Ledger - New message from site";
    $mailHeaders  = "MIME-Version: 1.0" . "\r\n";
    $mailHeaders .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
    $mailHeaders .= "From: <wordpress@ipledger.uk>" . "\r\n";
    $mailBody     = "";

    if (!empty($name)) {
        $userName = $name;
				$mailBody  = '<p style="font-size: 1.25em"><b style="color: #3c3c5d;">User name:</b> ' . $userName . '</p>';
    } else {
        $res['error'] .= 'Field Name is empty. Please fill this field.';
    }

    if (!empty($email)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $userEmail = $email;
						$mailBody .= '<p style="font-size: 1.25em"><b style="color: #3c3c5d;">User email:</b> ' . $userEmail . '</p>';
        } else {
            $res['error'] .= 'Invalid email format.';
        }
    } else {
        $res['error'] .= 'Field Email is empty. Please fill this field.';
    }

    if (isset($_POST['selected-class'])) {
        $classes = $_POST['selected-class'];
        $countries = $_POST['selected-countries'];

        if (!empty($classes) && !empty($countries)) {
            $mailBody .= '<hr style="background-color: lightgray; height: 1px; border: none;">';
            $mailBody .= '<p style="font-size: 1.25em"><b style="color: #3c3c5d;">Classes:</b> ' . $classes . '</p>';
            $mailBody .= '<p style="font-size: 1.25em"><b style="color: #3c3c5d;">Countries:</b> ' . $countries . '</p>';
        }
    } else {
				$countries = $_POST['selected-countries'];
				$claims = $_POST['selected-patents-numbers'];

        if (!empty($countries)) {
					$mailBody .= '<hr style="background-color: lightgray; height: 1px; border: none;">';
					$mailBody .= '<p style="font-size: 1.25em"><b style="color: #3c3c5d;">Countries:</b> ' . $countries . '</p>';
					$mailBody .= '<p style="font-size: 1.25em"><b style="color: #3c3c5d;">Patent claims:</b> ' . $claims . '</p>';
        }
    }

    if ($responceKeys["success"] && $responceKeys["score"] >= 0.5) {
				$mailBody .= '<hr style="background-color: lightgray; height: 1px; border: none;">';
				$mailBody .= '<p style="font-size: 1.25em"><strong>Additional information</strong></p>';
				$mailBody .= '<p style="font-size: 1.25em"><b style="color: #3c3c5d;">Page name:</b> ' . $pageName . '</p>';
				$mailBody .= '<p style="font-size: 1.25em"><b style="color: #3c3c5d;">Form name:</b> ' . $formName . '</p>';
        mail($mailSendTo, $mailSubject, $mailBody, $mailHeaders);
        $res['res'] = true;
        $res['keys'] = $responceKeys;
    } else {
        $res['error'] = 'Error! You not a human.';
    }

    echo json_encode($res, true);
    wp_die();
}
