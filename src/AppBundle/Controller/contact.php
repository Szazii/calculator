<?php


namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;


class contact extends Controller
{
    /**
     * @Route("/contact", name="contact")
     */

    public function SetRandomData()
    {
        $name = $this->GetRandomName();
        $surname = $this->GetRandomSurname();
        $street = $this->GetRandomStreet();
        $city = $this->GetRandomCity();
        $phoneNumber = $this->GetRandomPhoneNumber();

        return $this->render('contact.html.twig', ['name' => $name, 'surname' => $surname, 'street' => $street, 'city' => $city, 'phoneNumber' => $phoneNumber]);
    }

    private function GetRandomName()
    {
        return 'Piotr';
    }

    private function GetRandomSurname()
    {
        return 'Prusaczyk';
    }

    private function GetRandomStreet()
    {
        return 'XXX 24';
    }

    private function GetRandomCity()
    {
        return 'Ostrołęka';
    }

    private function GetRandomPhoneNumber()
    {
        return 788588271;
    }

}