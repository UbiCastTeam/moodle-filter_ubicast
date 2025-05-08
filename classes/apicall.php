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
 * Module to handle requests on Nudgis API.
 *
 * @package    filter_ubicast
 * @copyright  2024 Université de Laussanne {@link https://www.unil.ch}
 * @author     Nicolas Dunand <nicolas.dunand@unil.ch>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * API calling class.
 */
class filter_ubicast_apicall {

    /**
     * Sends an API request
     *
     * @param       $path
     * @param array $params
     * @param int   $timeout
     *
     * @return false|mixed
     * @throws dml_exception
     * @throws moodle_exception
     */
    public static function send_request($path, $params = [], $timeout = 0, $method = 'GET') {

        if (!get_config('filter_ubicast', 'apilocation') || !get_config('filter_ubicast', 'apikey')) {
            return null;
        }

        $apikey = get_config('filter_ubicast', 'apikey');
        $url = trim(get_config('filter_ubicast', 'apilocation'), '/') .
            '/' . trim($path, '/') . '/' . '?api_key=' . $apikey;
        if (!$timeout) {
            $timeout = get_config('filter_ubicast', 'defaultapitimeoutsecs');
        }
        $timeoutms = 1e3 * (int)$timeout;

        if ($method === 'GET') {
            foreach ($params as $key => $value) {
                $url .= '&' . $key . '=' . $value;
            }
        }

        libxml_use_internal_errors(true);

        $req = curl_init();
        curl_setopt($req, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($req, CURLOPT_CUSTOMREQUEST, $method);
        if ($method === 'POST') {
            curl_setopt($req, CURLOPT_POSTFIELDS, $params);
        }
        curl_setopt($req, CURLOPT_TIMEOUT_MS, $timeoutms);
        curl_setopt($req, CURLOPT_SSL_VERIFYPEER, true);

        curl_setopt($req, CURLOPT_URL, $url);

        $output = curl_exec($req);
        $errno = curl_errno($req); // 0 if fine
        curl_getinfo($req);

        curl_close($req);

        if ($output === false) {
            if ($errno) {
                mtrace('CURL REQUEST ERROR ' . $errno . ' while calling ' . $path . ' ' . json_encode($params));
            }

            return false;
        }

        try {
            $return = json_decode($output);
        } catch (Exception $e) {
            throw new \moodle_exception('api_fail', 'exam', null, $e->getMessage() . $e->getCode());

            return false;
        }

        return $return;
    }
}
