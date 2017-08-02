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
class qbehaviour_deferredfeedbackgroup extends qbehaviour_deferredfeedback {

    const IS_ARCHETYPAL = true;

    /*
     * question_attempt is needed to find group to grade group response
     */
    public function process_finish(question_attempt_pending_step $pendingstep) {
            if ($this->qa->get_state()->is_finished()) {
                return question_attempt::DISCARD;
            }

            $response = $this->qa->get_last_step()->get_qt_data();
            if (!$this->question->is_gradable_response($response)) {
                $pendingstep->set_state(question_state::$gaveup);
            } else {
                list($fraction, $state) = $this->question->grade_response_group($this->qa, $response);
                $pendingstep->set_fraction($fraction);
                $pendingstep->set_state($state);
            }
            $pendingstep->set_new_response_summary($this->question->summarise_response($response));
            return question_attempt::KEEP;
        }
}
