<?php
/**
 * @author Dominik Mach
 * This file is for global constants, that are used more often on more places around the web
 */

// Lang constants
define('NO_RIGHTS', 'Nemáš dostatečná práva pro tuto akci');
define('UNEXPECTED_ERROR', 'Unexpected error occurred, user did not update');
define('UNEXPECTED_ERROR_FLASH', 'Naskytla se neočekávaná chyba, kontaktujte prosím správce webu');

// Config constants
define('FLASH_DANGER', 'danger'); // In case data doesnt fetch
define('FLASH_WARNING', 'warning'); // In case data fetch but it was work with sensitive data
define('FLASH_SUCCESS', 'success'); // In case data fetch to database

define('LOGGER_TYPE_FAILED', 'failed'); // In case data fetch to database
define('LOGGER_TYPE_SUCCESS', 'success'); // In case data doesnt fetch

// ROLES
define('SUPER_ADMIN', 'ROLE_SUPER_ADMIN'); // Manage everything and can controll everything
define('ADMIN', 'ROLE_ADMIN'); // Manage everything except sensitive data ( like deleting )
define('COORDINATOR', 'ROLE_COORDINATOR'); //Manage tourneys, cannot controll news and sensitive data
define('EDITOR', 'ROLE_EDITOR'); //Manage news, cannot controll tourneys and sensitive data

define('USER', 'ROLE_USER'); //Manage news, cannot controll tourneys and sensitive data

// Editor modules
define('MODULE_UNDEFIED', 'Undefied module');
define('MODULE_USERS', 'Users');
define('MODULE_PAGES', 'Pages');
define('MODULE_NEWS', 'News');
define('MODULE_NEWS_CATEGORIES', 'News categories');
define('MODULE_GALLERY', 'Gallery');
define('MODULE_GALLERY_CATEGORIES', 'Gallery categories');
define('MODULE_FORM_ANSWERS', 'Form answers');
define('MODULE_LOG', 'Log');
define('MODULE_CONSTANTS', 'Constants');
define('MODULE_BADGES', 'Badges');
define('MODULE_HDMS', 'Hdm');
define('MODULE_ACCOUNT', 'Account');
define('MODULE_TOURNAMENT', 'Tournamet');

// Google ReCAPTCHA NENAČÍTÁ SE ODSUD
define('SITE_KEY', '6Lf7_UwaAAAAANAhJ2-ZHDpsGTikaCilEzWhs7Rt');
define('SECRET_KEY', '6Lf7_UwaAAAAAHZfaEWmwI85R2-h30UJNEBERKlg');