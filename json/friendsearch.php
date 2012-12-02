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

define('INTERNAL', 1);
define('JSON', 1);

require(dirname(dirname(__FILE__)) . '/init.php');
require_once('pieforms/pieform.php');
require_once('searchlib.php');

$query  = param_variable('query', '');
$offset = param_integer('offset', 0);
$limit  = param_integer('limit', 10);
$filter = param_alpha('filter', 'all');

$page = 'myfriends';
if ($extradata = param_variable('extradata', null)) {
    $extradata = json_decode($extradata);
    if ($extradata->page) {
        $page = $extradata->page;
    }
}

if ($page == 'myfriends') {
    $data = search_friend($filter, $limit, $offset);
    $data['filter'] = $filter;
}
else {
    $options = array('exclude' => $USER->get('id'));
    if ($filter == 'myinstitutions') {
        $options['myinstitutions'] = true;
    }
    $data = search_user($query, $limit, $offset, $options);
    $data['query'] = $query;
    if (!empty($options['myinstitutions'])) {
        $data['filter'] = $filter;
    }
}

require_once('group.php');
$admingroups = (bool) group_get_user_admintutor_groups();
build_userlist_html($data, $page, $admingroups);
unset($data['data']);

json_reply(false, array('data' => $data));
