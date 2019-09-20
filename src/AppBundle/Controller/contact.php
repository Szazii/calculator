<?php


namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
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
        return 'Daniel';
    }

    private function GetRandomSurname()
    {
        return 'Nowak';
    }

    private function GetRandomStreet()
    {
        return 'Nowa 24';
    }

    private function GetRandomCity()
    {
        return 'Poznań';
    }

    private function GetRandomPhoneNumber()
    {
        return 1123789456;
    }

    /**
     * @Route("/test", name="test")
     */
    public function Testowa()
    {
        $siema = "teeeeeest";
        return $this->render('test.html.twig', ['siema' => $siema]);
    }

}