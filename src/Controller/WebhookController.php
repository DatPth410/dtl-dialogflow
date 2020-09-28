<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class WebhookController extends AbstractController
{
    /**
     * @Route("/", name="webhook")
     */
    public function index()
    {
        $data = json_decode(file_get_contents('php://input'), true);


        $response["fulfillmentText"]='Hello from API';
        $intent =  $data['queryResult']['intent']['displayName'];
        switch ($intent){
            case "testIntent":
                $response["fulfillmentText"]='this intent is'.$intent;
                break;

        }


        header('Content-type:application/json;charset=utf-8');
        echo json_encode($response);
        return $this->json([
        ]);
    }
}
