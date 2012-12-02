<?php
/**
 * Mahara: Electronic portfolio, weblog, resume builder and social networking
 * Copyright (C) 2006-2008 Catalyst IT Ltd (http://www.catalyst.net.nz)
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
 * @subpackage lang/zh_tw.utf8
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @author     Hsin Wen-Yi
 * @copyright  Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License.
 *
 */

defined('INTERNAL') || die();

$string['addauthority'] = 'Add an Authority';
$string['application'] = 'Application';
$string['authloginmsg'] = 'Enter a message to display when a user tries to log in via Mahara\'s login form';
$string['authname'] = 'Authority name';
$string['cannotjumpasmasqueradeduser'] = 'You cannot jump to another application whilst masquerading as another user.';
$string['cannotremove'] = 'We can\'t remove this auth plugin, as it\'s the only 
plugin that exists for this institution.';
$string['cannotremoveinuse'] = 'We can\'t remove this auth plugin, as it\'s being used by some users.
You must update their records before you can remove this plugin.';
$string['cantretrievekey'] = 'An error occurred while retrieving the public key from the remote server.<br>Please ensure that the Application and WWW Root fields are correct, and that networking is enabled on the remote host.';
$string['changepasswordurl'] = '可以變更密碼的網址';
$string['duplicateremoteusername'] = 'This external authentication username is already in use by the user %s. External authentication usernames must be unique within an authentication method.';
$string['duplicateremoteusernameformerror'] = 'External authentication usernames must be unique within an authentication method.';
$string['editauthority'] = 'Edit an Authority';
$string['errnoauthinstances'] = 'We don\'t seem to have any authentication plugin instances configured for the host at %s';
$string['errnoxmlrpcinstances'] = 'We don\'t seem to have any XMLRPC authentication plugin instances configured for the host at %s';
$string['errnoxmlrpcuser'] = 'We were unable to authenticate you at this time. Possible reasons might be:

    * Your SSO session might have expired. Go back to the other application and click the link to sign into Mahara again.
    * You may not be allowed to SSO to Mahara. Please check with your administrator if you think you should be allowed to.';
$string['errnoxmlrpcwwwroot'] = 'We don\'t have a record for any host at %s';
$string['errorcertificateinvalidwwwroot'] = 'This certificate claims to be for %s, but you are trying to use it for %s.';
$string['errorcouldnotgeneratenewsslkey'] = 'Could not generate a new SSL key. Are you sure that both openssl and the PHP module for openssl are installed on this machine?';
$string['errornotvalidsslcertificate'] = '這不是一個有效的SSL憑證';
$string['host'] = '主機名或網址';
$string['hostwwwrootinuse'] = 'WWW root already in use by another institution (%s)';
$string['ipaddress'] = 'IP 位址';
$string['name'] = '網站名稱';
$string['noauthpluginconfigoptions'] = 'There are no configuration options associated with this plugin';
$string['nodataforinstance'] = 'Could not find data for auth instance';
$string['parent'] = 'Parent authority';
$string['port'] = '連接埠號';
$string['protocol'] = '通訊協定';
$string['requiredfields'] = 'Required profile fields';
$string['requiredfieldsset'] = 'Required profile fields set';
$string['saveinstitutiondetailsfirst'] = 'Please save the institution details before configuring authentication plugins.';
$string['shortname'] = '您的網站的簡稱';
$string['ssodirection'] = 'SSO 方向';
$string['theyautocreateusers'] = '他們自動建立用戶';
$string['theyssoin'] = 'They SSO in';
$string['unabletosigninviasso'] = 'Unable to sign in via SSO';
$string['updateuserinfoonlogin'] = '登入時更新用戶資訊';
$string['updateuserinfoonlogindescription'] = 'Retrieve user info from the remote server and update your local user record each time the user logs in.';
$string['weautocreateusers'] = '我們自動建立用戶';
$string['weimportcontent'] = 'We import content (some applications only)';
$string['weimportcontentdescription'] = '(some applications only)';
$string['wessoout'] = 'We SSO out';
$string['wwwroot'] = '萬維網根目錄';
$string['xmlrpccouldnotlogyouin'] = '抱歉，無法讓您登入 :(';
$string['xmlrpccouldnotlogyouindetail'] = 'Sorry, we could not log you into Mahara at this time. Please try again shortly, and if the problem persists, contact your administrator';
$string['xmlrpcserverurl'] = 'XML-RPC 伺服器網址';
