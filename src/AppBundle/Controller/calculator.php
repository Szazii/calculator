<?php


namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
            $this->ConvertPercentToMultiplication();
            $result = eval('return '.$this->operation.';');
            return (string)$result;
        }

    }

    private function CheckDivisionByZeros()
    {
        $positionNumber = strpos($this->operation, '/0');
        return $positionNumber != false and ( strlen($this->operation) == $positionNumber+2 or strpos( '.0123456789', $this->operation[$positionNumber+2]) === false );
    }

    private function ConvertPercentToMultiplication()
    {
        $this->operation = str_replace('%','*0.01',$this->operation);
        return $this;
    }


}