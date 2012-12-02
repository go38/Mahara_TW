<?php
/**
 * Mahara: Electronic portfolio, weblog, resume builder and social networking
 * Copyright (C) 2006-2009 Catalyst IT Ltd and others; see:
 *                         http://wiki.mahara.org/Contributors
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package    mahara
 * @subpackage core
 * @author     Catalyst IT Ltd
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2006-2009 Catalyst IT Ltd http://catalyst.net.nz
 *
 */

//
// MAHARA CONFIGURATION FILE
//
// Copy this file from config-dist.php to config.php, and change the values in 
// it to suit your environment.
//
// Information about this file is available on the Mahara wiki:
// http://wiki.mahara.org/System_Administrator's_Guide/Installing_Mahara#Create_Mahara's_config.php
//

$cfg = new StdClass;


// database connection details
// valid values for dbtype are 'postgres8' and 'mysql5'
$cfg->dbtype   = 'mysql5';
$cfg->dbhost   = 'localhost';
$cfg->dbport   = null;
$cfg->dbname   = 'mahara';
$cfg->dbuser   = 'root';
$cfg->dbpass   = 'mysql38';

// Note: database prefix is NOT required, you don't need to set one except if 
// you're installing Mahara into a database being shared with other 
// applications (this happens most often on shared hosting)
$cfg->dbprefix = '';

// wwwroot - the web-visible path to your Mahara installation
// Normally, this is automatically detected - if it doesn't work for you
// then try specifying it here.
// This value must end with a /
//$cfg->wwwroot = 'http://myhost.com/mahara/';
// If you want to serve all of your Mahara content via HTTPS, just set
// $cfg->wwwroot to use HTTPS.
$s_ip = getenv('SERVER_ADDR');
$c_ip = getenv('REMOTE_ADDR');
//uri start  :::1
if ($c_ip=="127.0.0.1" or $c_ip=="::1") {
		$ip = 'localhost';
	} else {
		$ip = $s_ip;
	}
//uri end	
$path = getenv('DOCUMENT_ROOT'); 
$drive = $path {0}; 
$cfg->wwwroot = 'http://'.$ip.'/mahara';

// If you are using a proxy to force HTTPS connections, you will need to
// enable the next line. If you have set this to true, ensure your wwwroot
// is a HTTPS address.
//$cfg->sslproxy = true;

// dataroot - uploaded files are stored here
// This is a ABSOLUTE FILESYSTEM PATH. This is NOT a URL.
// For example, valid paths are:
//  * /home/user/maharadata
//  * /var/lib/mahara
//  * c:\maharadata
// INVALID paths:
//  * http://yoursite/files
//  * ~/files
//  * ../data
//
// This path must be writable by the webserver and outside document root (the 
// place where the Mahara files like index.php have been installed).
// Mahara will NOT RUN if this is inside your document root, because
// this is a big security hole.
if (substr(php_uname(), 0, 7) == "Windows") {//for Windows
  $cfg->dataroot =$drive.':\\xampplite\\maharadata';
}else{// for UNIX
  $cfg->dataroot = '/var/maharadata';
}


// If set, this email address will be displayed in the error message if a form
// submission is suspected of being spam. This reduces the frustration for the
// user in the event of a false positive.
$cfg->emailcontact = '';

// Set this to enable a secondary hash that is only present in the config file
$cfg->passwordsaltmain = 'asdfasdflaks ^$^$&Jvh&*&B^KJGBJ<SB<SDLKS*&*(&S%&%&%&%';

// When changing the salt (or disabling it), you will need to set the current salt as an alternate salt
// There are up to 20 alternate salts
//$cfg->passwordsaltalt1 = 'HJHJ@sss%%jhj_000&DH<<';

// Uncomment the following line if this server is not a production system.
// This will put a line up the top of the page saying that it isn't a production
// site, and that files may not be present.
//$cfg->productionmode = false;

// closing php tag intentionally omitted to prevent whitespace issues
$cfg->pathtounzip = $drive.':\\xampplite\\tools\\unzip.exe';
$cfg->pathtozip   = $drive.':\\xampplite\\tools\\zip.exe';