<?php
define('_JEXEC', 1);
define('JPATH_BASE', __DIR__);
define('DS', DIRECTORY_SEPARATOR);

/* Required Files */
require_once(JPATH_BASE . DS . 'includes' . DS . 'defines.php');
require_once(JPATH_BASE . DS . 'includes' . DS . 'framework.php');
$app = JFactory::getApplication('site');
$app->initialise();

require_once(JPATH_BASE . DS . 'components' . DS . 'com_users' . DS . 'models' . DS . 'registration.php');

$model = new UsersModelRegistration();

jimport('joomla.mail.helper');
jimport('joomla.user.helper');
$language = JFactory::getLanguage();
$language->load('com_users', JPATH_SITE);

$jinput = JFactory::getApplication()->input;

$type       = 0;
$name       = $jinput->get('name', '', 'string');
$username   = $jinput->get('username', '', 'string');
$email      = $jinput->get('email', '', 'email');
$password   = $jinput->get('password', '', 'string');
$alias      = strtr($name, array(' ' => '-'));
$sendEmail  = 1;
$activation = 0;

$data = array(
    'username'   => $username,
    'name'       => $name,
    'email1'     => $email,
    'password1'  => $password, // First password field
    'password2'  => $password, // Confirm password field
    'sendEmail'  => $sendEmail,
    'activation' => $activation,
    'block'      => "0", 
    'groups'     => array("2", "10")
);

$response = $model->register($data);

//print_r($data); //tested
$model->register($data);
?>
