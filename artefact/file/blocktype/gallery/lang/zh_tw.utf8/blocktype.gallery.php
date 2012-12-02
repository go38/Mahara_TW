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
 * @subpackage blocktype-gallery
 * @author     Catalyst IT Ltd
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2006-2009 Catalyst IT Ltd http://catalyst.net.nz
 * @copyright  (C) 2011 Gregor Anzelj <gregor.anzelj@gmail.com>
 *
 */

defined('INTERNAL') || die();

$string['title'] = '影像藝廊';
$string['description'] = '從您的檔案區選擇收集的影像';

$string['select'] = '影像選擇';
$string['selectfolder'] = 'Display all images from one of my folders (will include images uploaded later)';
$string['selectimages'] = 'I will choose individual images to display';
$string['selectexternal'] = 'Display images from external gallery';
$string['externalgalleryurl'] = '藝廊網址或RSS';
$string['externalgalleryurldesc'] = 'You can embed the following external galleries:';
$string['width'] = 'Width';
$string['widthdescription'] = 'Specify the width for your images (in pixels). The images will be scaled to this width.';
$string['style'] = 'Style';
$string['stylethumbs'] = '縮圖呈現';
$string['stylesquares'] = '縮圖 (矩形)';
$string['styleslideshow'] = '幻燈片展示';

$string['cannotdisplayslideshow'] = '無法顯示幻燈片.';

$string['gallerysettings'] = '藝廊設定';
$string['useslimbox2'] = 'Use Slimbox 2?';
$string['useslimbox2desc'] = 'Slimbox 2 (visual clone of Lightbox 2) is a simple, unobtrusive script used to overlay images on the current page.';
$string['photoframe'] = 'Use photo frame?';
$string['photoframedesc'] = 'If enabled, than the frame will be rendered around the thumbnail of each photo in the gallery.';
$string['previewwidth'] = 'Maximum photo width';
$string['previewwidthdesc'] = 'Set the maximum width to which the photos will be resized, when viewed with Slimbox2.';

// Flickr
$string['flickrsettings'] = 'Flickr Settings';
$string['flickrapikey'] = 'Flickr API key';
$string['flickrapikeydesc'] = 'To show photo sets from Flickr, you\'ll need a valid Flickr API key. <a href="http://www.flickr.com/services/api/keys/apply/" target="_blank">Apply for your key online</a>.';
$string['flickrsets'] = 'Flickr Sets';

// Photobucket
$string['pbsettings'] = 'Photobucket Settings';
$string['pbapikey'] = 'Photobucket API key';
$string['pbapikeydesc'] = 'To show photo albums from Photobucket, you\'ll need a valid API key and API private key.<br>Go to the <a href="http://developer.photobucket.com/" target="_blank">Photobucket developer web site</a>, agree to the terms of service, sign up, and get the API keys.';
$string['pbapiprivatekey'] = 'Photobucket API private key';
$string['photobucketphotosandalbums'] = 'Photobucket user photos and albums';

// Panoramio
$string['Photo'] = '相片';
$string['by'] = 'by';
$string['panoramiocopyright'] = 'Photos provided by Panoramio are under the copyright of their owners.';
$string['panoramiouserphotos'] = 'Panoramio user photos';

$string['picasaalbums'] = 'Picasa 相本';

$string['windowslivephotoalbums'] = 'Windows Live Photo Gallery albums';

$string['externalnotsupported'] = 'The external URL you provided is not supported';
