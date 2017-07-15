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
 * Question behaviour that is like the deferred feedback model, but with
 * a group grade, ie the average of the scores of all members of the group in which the student is a member
 *
 * @package    qbehaviour
 * @subpackage deferredgroup
 * @copyright  2017 Dr Bean
 * @license  http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


defined('MOODLE_INTERNAL') || die();

require_once(__DIR__ . '/../deferredfeedback/behaviour.php');


/**
 * Question behaviour for deferred feedback with group.
 *
 * Award a group grade, ie the average of the scores of all members of the group in which the student is a member
 * After the last member of the group finishes the quiz, award a group grade,
 * the average of the scores of all members of the group in which the student is a member
 *
 * @copyright  2017 Dr Bean
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class qbehaviour_deferredgroup extends qbehaviour_deferredfeedback {

    const IS_ARCHETYPAL = true;
}
