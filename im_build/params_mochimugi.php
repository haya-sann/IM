<?php
/**
 * INTER-Mediator
 * Copyright (c) INTER-Mediator Directive Committee (http://inter-mediator.org)
 * This project started at the end of 2009 by Masayuki Nii msyk@msyk.net.
 *
 * INTER-Mediator is supplied under MIT License.
 * Please see the full license for details:
 * https://github.com/INTER-Mediator/INTER-Mediator/blob/master/dist-docs/License.txt
 *
 * @copyright     Copyright (c) INTER-Mediator Directive Committee (http://inter-mediator.org)
 * @link          https://inter-mediator.com/
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

/*
 * database connection (PDO or FileMaker_FX)
 */
$dbClass = 'PDO';

/*
 * common settings for DB_FileMaker_FX and DB_PDO:
 */
$dbUser = 'mochimugi';
$dbPassword = 'hayaTanaka3';
// $dbUser = 'web';
// $dbPassword = 'password';

/* DB_FileMaker_FX aware below:
 */
$dbServer = '127.0.0.1';
$dbPort = '80';
$dbDataType = 'FMPro12';
$dbDatabase = 'TestDB';
$dbProtocol = 'HTTP';

/* DB_PDO awares below:
 */
$dbDSN = 'mysql:host=mysql714.db.sakura.ne.jp;dbname=mochimugi_field;charset=utf8';
//$dbDSN = 'mysql:host=mysql700.db.sakura.ne.jp;dbname=mochimugi_test_db;charset=utf8';
// $dbDSN = 'mysql:unix_socket=/tmp/mysql.sock;dbname=test_db;charset=utf8';
//$dbDSN = 'mysql:unix_socket=/tmp/mysql.sock;dbname=test_db;charset=utf8mb4';
$dbOption = array();


/* Security
 * Please change the value of $webServerName and $generatedPrivateKey.
 */
/* FQDN or domain name of your web server for protecting CSRF
 * Example:
 *  $webServerName = array('www.inter-mediator.com');
 *  $webServerName = array('inter-mediator.com', 'example.jp');
 */
$webServerName = array('');

/*
Command to generate the following RSA key:
$ openssl genrsa -out gen.key 2048
 */
$passPhrase = '';
$generatedPrivateKey = <<<EOL
-----BEGIN RSA PRIVATE KEY-----
MIIEpQIBAAKCAQEAwMsa1b7vF798Cvh63LVO/fm7N9uhdYEGE0QGvW4R/hz9Hywl
FjqDInvw2HpYBgp1fdHVRn8iQ9dFTUfodOEowXF+ipnoldPSNfO6Hy/qQpzz7wU5
4wmenUwz+wfO8tUYhdN74UUamZloSbOfFA7OI265kgE7M8Q0SNzitbvNzTP+Y734
kouYcJRWGGpUGkuCcQuMaoUWY0mnOssvlmdu9mXX63APwftkkJY+S9X8mwkKI2Je
xxjJJ3RxDXnFRYXLWqO+QEo19ZZhatBdiIsf6bFN+jQAJ+nis+4rb5DtWK+DqGKF
pv4+LlnRTnQU+OAHpLQfgCRYWfBRNvEhbI/BtQIDAQABAoIBAQCFMYyXkTKjiIIN
Hj/bjVNGearTW2Q/xuTImJ3Db3D0y1hAmgIBSmlggJoTJOr9OWqUg0xCSQEGN4pE
auJ5JTk/88YFwXEDWfUHmxvCAhto7ABG6KhmZzXy3DupOWrLL1ei1UnnhxNqfKal
DHhhphzaM9v2t+0LxYiNsjTacyYqlocs5wpDpCzO4x/64KygTMkWBxof/NtG7x8I
q759y8i3EP3aFkyerLtKnQTKmizucTa+UDv2A7+Hzfdr5dDlyydesp+VNm6Ludal
vLyhgykdr3RJ3HeQRCoMhnL7wyNjKCRXBX0ucyPF7mSHSMwFEnhNAUrV9OghtJYA
tEFVk0VBAoGBAOIMUXj+3i+D9Mpd4Mmyyj5xTBMreizdvLmnM79dFlfA4wF2RILX
KGiCnetBpd81s4sIUtxH5ePNDtimumgBfwDtWNZUB2IzZOTBCo64s3uFFrx+KMEo
Edzass+Jpn78TmeuNOT31YEGA2XomfkH0Tm3asAAU3HdOOv93PTJuV9lAoGBANpW
xEhgudc09kNlXEVstFHgDNIVLg0DeGpKM+oMpd7q9T4xV8XQghBCpEee5W7CoZaP
v+1NFpr+PPVIIoynol4bV6MqHGopd/ltuWDLFTHTO+nVX8t86eqO3GJqg8CHrlR4
0cO9aUjgEO2f46shz2uFQPXuMk70SPBYgibY5fwRAoGBAKRRgAgMfUbdDVzt0THN
nea2RS7KNA3ZQg9S0/MPn+Y6eMnfRv41mVIfYNxa5FDVoKY4bsNiIGLv9RLYYDiq
nb/2yNVET/m6kmUXTq1g5ler71MmAkom7pU1BTaIQVed4QDNSfYHklQwItg5tXOp
kxX5lsfrdL0YqwAhkjT/TplhAoGAdID794r1Xyo5hbjeRYU9qrqc3LTEf9ksNbsm
fGsHTy2ccvUtWrZp0Hde5YCZ+EIOqyJFTUBnIYkryc4V8Wu5rfF1D/F2fAdop0Wv
N0DmLFIElD9xAEnFH43fdvxTFTbRBO37MDEvrt0w6zr35ucBoOPXx+K0IYEkMmtn
94ahIaECgYEAibt8tPs4BC3WC3W01CNpkL5vTlwOCk6YsxxxYXVL+FgJMXCjOt+i
eV7Y7JAPsTnLAEx1ruuCaxu/z3Rcps/tuqhv51O9LmUDq0tuUlqXISPofx9bVUc8
OMtnwzpRWgp0gbj4PGjrnK76w4J0JWbVIRqFE0Ltv2MhL2zpFpHAAOM=
-----END RSA PRIVATE KEY-----
EOL;


/* Browser Compatibility Check:
 */
$browserCompatibility = array(
    'Edge' => '12+',
    // Edge/12.0(Microsoft Edge 20)
    'Trident' => '4+',
    // Trident/4.0(Internet Explorer 8)
    // Trident/5.0(Internet Explorer 9)
    // Trident/6.0(Internet Explorer 10)
    // Trident/7.0(Internet Explorer 11)
    // Before IE 7, 'Trident' token doesn't exist.
    'Chrome' => '1+',
    'Firefox' => '2+',
    'Safari' => '4+',
    //'Safari'=>array('Mac'=>'4+','Win'=>'4+'), // Sample for dividing with OS
    'Opera' => '1+',
);

/*
 * The id attribute for the Non support browser message.
 * The default value is "nonsupportmessage."
 */
//$nonSupportMessageId = "nonsupport";

/*
 * The list of User Agents, it's a wonderful site!
 * http://www.openspc2.org/userAgent/
 */

/* This statement set debug to false forcely. */
$prohibitDebugMode = false;


// The DOCUMENT_ROOT isn't full path on a rental server, this variable
// is set before the result of DOCUMENT_ROOT.
//$documentRootPrefix = "/usr/local/chroot";

//$httpAccounts = array('user'=>'testtest');
//$httpRedirectURL = "http://10.0.1.226/im/Sample_products/products_MySQL.html";

// in case of $_SERVER['SCRIPT_NAME'] didn't return the valid path.
// These are added before/after the path.
//$scriptPathPrefix = "";
//$scriptPathSuffix = "";

// INTER-Mediator client should call the definition file to work fine.
// Usually $_SERVER['SCRIPT_NAME'] is the url to request from client.
// In case of using INTER-Mediator with other frameworks, you might specify any special URL to call.
// So you can set the another url to the $callURL variables and it can be replaced with $_SERVER['SCRIPT_NAME'].
//$callURL = "http://yourdomai/your/path/to/definition-file.php"

// If you don't set the default timezone in the php.ini file,
//      activate the line below and specify suitable timezone name.
//$defaultTimezone = 'Asia/Tokyo';

// The 'issuedhash' table for storing challenges of authentication can be use another database.
//$issuedHashDSN = 'sqlite:/var/db/im/sample.sq3';

//$emailAsAliasOfUserName = true;
//$passwordPolicy = "useAlphabet useNumber useUpper useLower usePunctuation length(10) notUserName";

$customLoginPanel = '';

/*
 * If you want to specify the smtp server info, set them below.
$sendMailSMTP = array(
    'server' => 'string',
    'port' => 'integer',
    'username' => 'string',
    'password' => 'string',
);
*/

/*
 * If you want to specify the Pusher information, set them below.
$pusherParameters = array(
    'app_id' => '',
    'key' => '',
    'secret' => '',
);
*/

/* LDAP Support */
// $ldapServer = "ldap://homeserver.msyk.net";
// $ldapPort = 389;
// $ldapBase = "dc=homeserver,dc=msyk,dc=net";
// $ldapContainer = "cn=users";
// $ldapAccountKey = "uid";
//$ldapExpiringSeconds = 1800;

/* OAuth Support */
// $oAuthProvider = 'Google';
// $oAuthClientID = '';
// $oAuthClientSecret = '';
// $oAuthRedirect = 'http://localhost:7001/Auth_Support/OAuthCatcher.php';

/* Initial values for local context with their keys. */
//$valuesForLocalContext = array(
//    "pagetitle" => "INTER-Mediator Samples",
//    "copyright" => "INTER-Mediator Directive Committee",
//);

/* Customize the X-Frame-Options header
 *
 * Possible values are "SAMEORIGIN", "DENY", "ALLOW-FROM <uri>" or ""
 * For "" string, the X-Frame-Options header won't be included in headers.
 * If you don't specify the $xFrameOptions variable, the header will be included
 * with value "SAMEORIGIN".
 */
//$xFrameOptions = "SAMEORIGIN";

/* Customize the Content-Security-Policy header
 *
 * The Content-Security-Policy header contains with the value of variable $contentSecurityPolicy.
 * If this variable isn't specified or "", the Content-Security-Policy header doesn't contains.
 * See below about Content-Security-Policy header.
 * https://developer.mozilla.org/ja/docs/Web/Security/CSP/Using_Content_Security_Policy
 */
//$contentSecurityPolicy = "";

/* Customize the path generation in uploading file
 *
 * The value "assjis" and "asucs4" are supported. This is not convert path string from key
 * field and value, but the string encoding is convert to sjis or ucs-4 and back to utf-8.
 * As the default, the string is going to be encoded with the urlencode function.
 */
$uploadFilePathMode = "";

/* Append the Access-Control-Allow-Origin header
 *
 * This header will be appended other server url than the origin.
 */
//$accessControlAllowOrigin = "https://server.msyk.net";

//$altThemePath = "/var/www/thmeme";    //Your original thmeme directory.
//$themeName = "blackbird;      //Default theme name.