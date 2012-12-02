<?php
/**
 * Mahara: Electronic portfolio, weblog, resume builder and social networking
 * Copyright (C) 2011 Catalyst IT Ltd and others; see:
 *                    http://wiki.mahara.org/Contributors
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
 * @author     Richard Mansfield
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 *
 */

define('INTERNAL', 1);
define('PUBLIC', 1);
require('init.php');
require_once('file.php');

$type = param_alpha('type', null);

if ($type == 'sitemap') {
    if (!get_config('generatesitemap')) {
        throw new NotFoundException(get_string('filenotfound'));
    }
    if ($name = param_alphanumext('name', null)) {
        if (!preg_match('/^sitemap_[a-z0-9_]+\.xml(\.gz)?$/', $name, $m)) {
            throw new NotFoundException(get_string('filenotfound'));
        }
        $mimetype = empty($m[1]) ? 'text/xml' : 'application/gzip';
    }
    else {
        $name = 'sitemap_index.xml';
        $mimetype = 'text/xml';
    }
    $path = get_config('dataroot') . 'sitemaps/' . $name;
}
else {
    $data = $SESSION->get('downloadfile');

    if (!$USER->is_logged_in() || empty($data) || empty($data['file'])) {
        throw new NotFoundException(get_string('filenotfound'));
    }

    $path = get_config('dataroot') . 'export/' . $USER->get('id') . '/' . $data['file'];
    $name = $data['name'];
    $mimetype = $data['mimetype'];
}

if (!file_exists($path)) {
    throw new NotFoundException(get_string('filenotfound'));
}

serve_file($path, $name, $mimetype);
