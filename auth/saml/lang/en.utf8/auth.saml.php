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
 * @subpackage auth-internal
 * @author     Piers Harding <piers@catalyst.net.nz>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2006-2008 Catalyst IT Ltd http://catalyst.net.nz
 *
 */

defined('INTERNAL') || die();

//$string['defaultidpidentity'] = 'Default IdP identity service';
$string['defaultinstitution'] = 'Default institution';
$string['description'] = 'Authenticate against a SAML 2.0 IdP service';
$string['errorbadinstitution'] = 'Institution for connecting user not resolved';
$string['errorbadssphp'] = 'Invalid SimpleSAMLphp session handler - must not be phpsession';
$string['errorbadssphplib'] = 'Invalid SimpleSAMLphp library configuration';
$string['errorretryexceeded'] = 'Maximum number of retries exceeded (%s) - there must be a problem with the identity service';
$string['errnosamluser'] = 'No user found';
$string['errorbadlib'] = 'SimpleSAMLPHP lib directory %s is not correct.';
$string['errorbadconfig'] = 'SimpleSAMLPHP config directory %s is incorrect.';
$string['errorbadcombo'] = 'You can only choose user auto-creation if you have not selected remoteuser.';
$string['errorbadinstitutioncombo'] = 'There is already an existing authentication instance with this institution attribute and institution value combination.';
$string['errormissinguserattributes1'] = 'You seem to be authenticated, but we did not receive the required user attributes. Please check that your Identity Provider releases the first name, surname, and email fields for SSO to %s or inform the administrator.';
$string['errorregistrationenabledwithautocreate'] = 'An institution has registration enabled. For security reasons this excludes user auto-creation.';
$string['errorremoteuser'] = 'Matching on remoteuser is mandatory if usersuniquebyusername is turned off.';
$string['institutionattribute'] = 'Institution attribute (contains "%s")';
$string['institutionvalue'] = 'Institution value to check against attribute';
$string['link'] = 'Link accounts';
$string['linkaccounts'] = 'Do you want to link remote account %s with local account %s?';
$string['loginlink'] = 'Allow users to link own account';
$string['logintolink'] = 'Local login to %s to link to remote account';
$string['logintolinkdesc'] = '<p><b>You are currently connected with remote user %s. Please log in with your local account to link them together or register if you do not currently have an account on %s.</b></p>';
$string['institutionregex'] = 'Do partial string match with institution shortname';
$string['login'] = 'SSO';
$string['notusable'] = 'Please install the SimpleSAMLPHP SP libraries';
$string['samlfieldforemail'] = 'SSO field for email';
$string['samlfieldforfirstname'] = 'SSO field for first name';
$string['samlfieldforsurname'] = 'SSO field for surname';
$string['title'] = 'SAML';
$string['updateuserinfoonlogin'] = 'Update user details on login';
$string['userattribute'] = 'User attribute';
$string['simplesamlphplib'] = 'SimpleSAMLPHP lib directory';
$string['simplesamlphpconfig'] = 'SimpleSAMLPHP config directory';
$string['weautocreateusers'] = 'We auto-create users';
$string['remoteuser'] = 'Match username attribute to remote username';
