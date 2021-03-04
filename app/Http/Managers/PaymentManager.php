<?php

namespace App\Http\Managers;

class PaymentManager
{
    public function getInstructorPart($total)
    {
        $percent = 65;
        $percentDecimal = $percent / 100;
        $part = $percentDecimal * $total;

        return $part;
    }

    public function getKahierPart($total)
    {
        $percent = 15;
        $percentDecimal = $percent / 100;
        $part = $percentDecimal * $total;

        return $part;
    }

    public function getTVA($total)
    {
        $percent = 20;
        $percentDecimal = $percent / 100;
        $part = $percentDecimal * $total;

        return $part;
    }
}
