<?php
/**
 * Created by PhpStorm.
 * User: quentin
 * Date: 04/11/18
 * Time: 13:08
 */

namespace TimeTravel;


class TimeTravel
{
    private $start;

    private $end;

    public function getTravelInfo()
    {

        $start = $this->getStart();
        $end = $this->getEnd();
        $result = $start->diff($end);


        return "il y a " . $result->format('%Y années, %m mois, %d jours, %h heures %i minutes, %s secondes') . " entre les deux dates";
    }

    public function setStart()
    {
        $this->start = new \DateTime('1985-12-31');;
    }

    public function getStart()
    {
        return $this->start;
    }

    public function getEnd()
    {
        return $this->end;
    }

    public function findDate($interval)
    {
        $jump = new \DateInterval('PT' . $interval . 'S');
        $end = new \DateTime();
        $end = clone $this->start;
        $end = $end->sub($jump);
        $this->end = $end;
        return $this->end;
    }

    public function backToFutureStepByStep($jump)
    {
        $result = [];
        $start = $this->getStart();
        $end = $this->getEnd();
        $steps = new \DatePeriod($end, $jump, $start, \DatePeriod::EXCLUDE_START_DATE);
        foreach ($steps as $step) {
            $result[] = $step->format('M - d - Y -  H - i');
        }

        return $result;
    }

}




