<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 25/09/2019
 * Time: 19:21
 */

namespace Hackathon\PlayerIA;


class JuxtaliasPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function getChoice()
    {
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Choice           ?    $this->result->getLastChoiceFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Choice ?    $this->result->getLastChoiceFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get all the Choices          ?    $this->result->getChoicesFor($this->mySide)
        // How to get the opponent Last Choice ?    $this->result->getChoicesFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get the stats                ?    $this->result->getStats()
        // How to get the stats for me         ?    $this->result->getStatsFor($this->mySide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // How to get the stats for the oppo   ?    $this->result->getStatsFor($this->opponentSide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // -------------------------------------    -----------------------------------------------------
        // How to get the number of round      ?    $this->result->getNbRound()
        // -------------------------------------    -----------------------------------------------------
        // How can i display the result of each round ? $this->prettyDisplay()
        // -------------------------------------    -----------------------------------------------------

        if ($this->result->getNbRound() == 0) {
            return $this->scissorsChoice();
        }

        $o_choice_list = $this->result->getChoicesFor($this->opponentSide);
        $m_choice_list = $this->result->getChoicesFor($this->mySide);

        $paper_count = 0;
        $rock_count = 0;
        $scissors_count = 0;

        foreach ($o_choice_list as $o) {
            if ($o == $this->paperChoice())
                ++$paper_count;
            else if ($o == $this->rockChoice())
                ++$rock_count;
            else if ($o == $this->scissorsChoice())
                ++$scissors_count;
        }
        echo $paper_count . ' ' . $rock_count . ' ' . $scissors_count . ' ' . PHP_EOL;

        if ($paper_count == 0 && $rock_count == 0)
            return $this->rockChoice();
        else if ($rock_count == 0 && $scissors_count == 0)
            return $this->scissorsChoice();
        else if ($paper_count == 0 && $scissors_count == 0)
            return $this->paperChoice();

        return parent::getChoice();
    }
}