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
 * Strings for component "filter_ubicast".
 *
 * @package    filter_ubicast
 * @copyright  2024 UbiCast {@link https://www.ubicast.eu}
 * @author     Nicolas Dunand <nicolas.dunand@unil.ch>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['filtername'] = 'Filtre ad-hoc pour le plugin UbiCast Atto';
$string['createplaylists'] = 'Créer des listes de lecture';
$string['createplaylists_desc'] = 'Si activé, lorsque plusieurs médias sont embarqués les uns à la suite des autres dans le même texte, une liste de lecture sera affichée pour présenter les médias. <br/>Si du contenu est présent entre les médias, aucune liste de lecture ne sera affichée.';
$string['defaultapitimeoutsecs'] = 'Délai d\'attente maximal de l\'API [s]';
$string['defaultapitimeoutsecs_desc'] = 'Délai d\'attente maximal en secondes pour les requêtes sur l\'API de Nudgis.';
$string['apikey'] = 'Clé d\'API';
$string['apikey_desc'] = 'Clé d\'API utilisée pour obtenir les informations sur les médias du service Nudgis. <br/>Ceci est nécessaire pour l\'affichage des listes de lecture. <br/><strong>Note :</strong> Le compte lié à la clé d\'API doit avoir la permission d\'accéder à tous les médias dans le service Nudgis.';
$string['apilocation'] = 'URL de l\'API';
$string['apilocation_desc'] = 'l\'URL de base de l\'API du service Nudgis. par exemple : <code>https://votre-nudgis.portail/api/v2/</code>.';
$string['filtersettings'] = 'Fonctionnalité : Affichage avec des listes de lecture';
$string['filtersettings_desc'] = 'Les autres paramètres sont requis uniquement si la fonctionnalité est activée et si vous souhaitez que les titres soit affichés dans les listes de lecture. Si la fonctionnalité est activée et que les paramètres ne sont pas remplis, les listes de lecture présenteront les médias avec des nombres, par exemple <code>1., 2., ...</code>.';
$string['privacy:metadata'] = 'Le plugin de filtre UbiCast ne stocke aucune information personnelle.';
