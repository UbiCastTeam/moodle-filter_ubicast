<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Settings for component "filter_ubicast".
 *
 * @package    filter_ubicast
 * @copyright  2024 Université de Laussanne {@link https://www.unil.ch}
 * @author     Nicolas Dunand <nicolas.dunand@unil.ch>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {

    // Introductory explanation.
    $settings->add(new admin_setting_heading(
        'filter_ubicast/pluginname',
        new lang_string('filtersettings', 'filter_ubicast'),
        new lang_string('filtersettings_desc', 'filter_ubicast')));

    $settings->add(new admin_setting_configcheckbox(
        'filter_ubicast/createplaylists',
        get_string('createplaylists', 'filter_ubicast'),
        get_string('createplaylists_desc', 'filter_ubicast'), 0));
    $settings->add(new admin_setting_configtext(
        'filter_ubicast/apilocation',
        get_string('apilocation', 'filter_ubicast'),
        get_string('apilocation_desc', 'filter_ubicast'),
        '', PARAM_URL, 30));
    $settings->add(new admin_setting_configpasswordunmask(
        'filter_ubicast/apikey',
        get_string('apikey', 'filter_ubicast'),
        get_string('apikey_desc', 'filter_ubicast'),
        '', PARAM_ALPHANUMEXT, 30));
    $settings->add(new admin_setting_configtext(
        'filter_ubicast/defaultapitimeoutsecs',
        get_string('defaultapitimeoutsecs', 'filter_ubicast'),
        get_string('defaultapitimeoutsecs_desc', 'filter_ubicast'),
        1, PARAM_INT, 10));
}
