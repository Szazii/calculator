<?php


namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class calculator extends Controller
{
    public $operation;
    public $error;
    
    public function GetResult()
    {

        if ($this->CheckDivisionByZeros()) {
            $this->error = 'Nie dzieli się przez zero!!!';
            return $this->error;
        }
        else{
            $result = eval('return '.$this->operation.';');
            return (string)$result;
        }

    }

    private function CheckDivisionByZeros()
    {
        $positionNumber = strpos($this->operation, '/0');
        return $positionNumber != false and ( strlen($this->operation) == $positionNumber+2 or strpos( '.0123456789', $this->operation[$positionNumber+2]) === false );
    }


}