<?php
/**
 * Pieforms: Advanced web forms made easy
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
 * @package    pieforms
 * @subpackage element
 * @author     Nigel McNie <nigel@catalyst.net.nz>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL version 3 or later
 * @copyright  For copyright information on Mahara, please see the README file distributed with this software.
 *
 */

global $_PIEFORM_FIELDSETS;
$_PIEFORM_FIELDSETS = array();

/**
 * Renders a fieldset. Fieldsets contain other elements, and do not count as a
 * "true" element, in that they do not have a value and cannot be validated.
 *
 * @param Pieform $form    The form to render the element for
 * @param array   $element The element to render
 * @return string          The HTML for the element
 */
function pieform_element_fieldset(Pieform $form, $element) {/*{{{*/
    global $_PIEFORM_FIELDSETS;
    $result = "\n<fieldset";
    $classes = array('pieform-fieldset');
    if (!empty($element['class'])) {
        $classes[] = Pieform::hsc($element['class']);
    }
    if (!empty($element['collapsible'])) {
        if (!isset($element['legend']) || $element['legend'] === '') {
            Pieform::info('Collapsible fieldsets should have a legend so they can be toggled');
        }
        $classes[] = 'collapsible';
        $formname = $form->get_name();
        if (!isset($_PIEFORM_FIELDSETS['forms'][$formname])) {
            $_PIEFORM_FIELDSETS['forms'][$formname] = array('formname' => $formname);
        }
        if (isset($element['name'])) {
            $openparam = $formname . '_' . $element['name'] . '_open';
        }
        // Work out whether any of the children have errors on them
        $error = false;
        foreach ($element['elements'] as $subelement) {
            if (isset($subelement['error'])) {
                $error = true;
                break;
            }
        }
        if (!empty($element['collapsed']) && !$error
            && (!isset($element['name'])
                || (param_alphanumext('fs', null) != $element['name'] && !param_boolean($openparam, false)))) {
            $classes[] = 'collapsed';
        }
    }
    $result .= ' class="' . implode(' ', $classes) . '"';
    $result .= ">\n";
    if (isset($element['legend'])) {
        $result .= '<legend><h4>';
        if (!empty($element['collapsible'])) {
            $result .= '<a href="">' . Pieform::hsc($element['legend']) . '</a>';
            if (isset($openparam)) {
                $result .= '<input type="hidden" name="' . hsc($openparam) . '" class="open-fieldset-input" '
                    . 'value="' . intval(!in_array('collapsed', $classes)) . '">';
            }
        }
        else {
            $result .= Pieform::hsc($element['legend']);
        }
        // Help icon
        if (!empty($element['help'])) {
            $function = $form->get_property('helpcallback');
            if (function_exists($function)) {
                $result .= $function($form, $element);
            }
            else {
                $result .= '<span class="help"><a href="" title="' . Pieform::hsc($element['help']) . '" onclick="return false;">?</a></span>';
            }
        }
        $result .= "</h4></legend>\n";
    }

    if (!empty($element['renderer']) && $element['renderer'] == 'multicolumnfieldsettable') {
        $result .= _render_elements_as_multicolumn($form, $element);
    }
    else {
        foreach ($element['elements'] as $subname => $subelement) {
            if ($subelement['type'] == 'hidden') {
                throw new PieformException("You cannot put hidden elements in fieldsets");
            }
            $result .= "\t" . pieform_render_element($form, $subelement);
        }
    }

    $result .= "</fieldset>\n";
    return $result;
}/*}}}*/

function _render_elements_as_multicolumn($form, $element) {
        // we want to render the elements as div within each table cell
        // so we record the old renderer and switch to div and switch back afterwards
        $oldrenderer = $form->get_property('renderer');
        $form->set_property('renderer', 'div');
        $form->include_plugin('renderer', 'div');
        // We have a list of which elements are going to be the coulmn headings
        $columns = $element['columns'];
        $count = 0;
        $result = '';
        // If we want a description above the table we can add it as 'comment' to the fieldset element
        if (!empty($element['comment'])) {
            $result .= "\t<tr colspan='" . count($columns) . "'";
            $result .= ">\n\t\t";
            $result .= '<td';
            if (isset($element['class'])) {
                $result .= ' class="' . Pieform::hsc($element['class']) . '"';
            }
            $result .= '>' . Pieform::hsc($element['comment']) . '</td>';
            $result .= "</tr>\n";
        }
        // Now we loop through the elements chuncking them into rows based on the columns count
        // but we include the labelhtml as the first column to describe what the row is about.
        foreach ($element['elements'] as $name => $data) {
            if (empty($count)) {
                $result .= "\t<tr";
                // Set the class of the enclosing <tr> to match that of the element
                if (isset($data['class'])) {
                    $result .= ' class="' . Pieform::hsc($data['class']) . '"';
                }
                $result .= ">\n\t\t";
            }
            if (array_search($name, $columns) !== false) {
                if (empty($count)) {
                    $result .= "<th></th>\n\t";
                }
                $result .= '<th>';
                $result .= Pieform::hsc($data['value']);
                if ($form->get_property('requiredmarker') && !empty($data['rules']['required'])) {
                    $result .= ' <span class="requiredmarker">*</span>';
                }
                $result .= "</th>\n\t";
            }
            else {
                if (empty($count)) {
                    $result .= '<th>';
                    if (isset($data['labelhtml'])) {
                        $result .= $data['labelhtml'];
                    }
                    $result .= "</th>\n\t";
                }
                unset($data['labelhtml']);
                $result .= "\t<td";
                if (isset($data['name'])) {
                    $result .= " id=\"" . $form->get_name() . '_' . Pieform::hsc($data['name']) . '_container"';
                }
                if ($data['class']) {
                    $result .= ' class="' . Pieform::hsc($data['class']) . '"';
                }
                $result .= '>';

                $result .= pieform_render_element($form, $data);

                // Contextual help
                if (isset($data['helphtml'])) {
                    $result .= ' ' . $data['helphtml'];
                }
                $result .= "</td>\n\t";
            }
            $count++;
            if ($count == count($columns)) {
                $result .= "</tr>\n";
                $count = 0;
            }
        }
        $form->set_property('renderer', $oldrenderer);
        return $result;
}

function pieform_element_fieldset_js() {/*{{{*/
    return <<<EOF
function pieform_update_legends(element) {
    if (!element) {
        element = getFirstElementByTagAndClassName('body');
    }
    forEach(getElementsByTagAndClassName('fieldset', 'collapsible', element), function(fieldset) {
        if (!hasElementClass(fieldset, 'pieform-fieldset')) {
            return;
        }
        var legend = getFirstElementByTagAndClassName('legend', null, fieldset);
        var legendh4 = getFirstElementByTagAndClassName('h4', null, legend);
        if (legendh4.firstChild.tagName == 'A') {
            connect(legendh4.firstChild, 'onclick', function(e) {
                toggleElementClass('collapsed', fieldset);
                var isCollapsed = hasElementClass(fieldset, 'collapsed');
                if (!isCollapsed) {
                    jQuery(fieldset).find(':input').not('.open-fieldset-input').first().focus();
                }
                var input = getFirstElementByTagAndClassName('input', 'open-fieldset-input', legendh4);
                if (input) {
                    input.value = !isCollapsed;
                }
                e.stop();
            });
        }
    });
}
EOF;
}/*}}}*/

function pieform_element_fieldset_get_headdata() {/*{{{*/
    global $_PIEFORM_FIELDSETS;

    $result = '<script type="application/javascript">';
    $result .= pieform_element_fieldset_js();
    foreach ($_PIEFORM_FIELDSETS['forms'] as $fieldsetform) {
        $result .= "\nPieformManager.connect('onload', '{$fieldsetform['formname']}', partial(pieform_update_legends, '{$fieldsetform['formname']}'));";
    }
    $result .= "\n</script>";

    // Used below to try to work out whether pieform_update_legends is defined
    $_PIEFORM_FIELDSETS['head'] = true;

    return array($result);
}/*}}}*/


/**
 * Extension by Mahara. This api function returns the javascript required to
 * set up the element, assuming the element has been placed in the page using
 * javascript. This feature is used in the views interface.
 *
 * In theory, this could go upstream to pieforms itself
 *
 * @param Pieform $form     The form
 * @param array   $element  The element
 */
function pieform_element_fieldset_views_js(Pieform $form, $element) {
    global $_PIEFORM_FIELDSETS;

    $result = '';
    if (!isset($_PIEFORM_FIELDSETS['head'])) {
        $result .= pieform_element_fieldset_js();
    }
    $result .= "pieform_update_legends('instconf');";

    foreach ($element['elements'] as $subelement) {
        $function = 'pieform_element_' . $subelement['type'] . '_views_js';
        if (is_callable($function)) {
            $result .= "\n" . call_user_func_array($function, array($form, $subelement));
        }
    }

    return $result;
}
