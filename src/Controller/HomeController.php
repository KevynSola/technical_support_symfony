<?php

namespace App\Controller;

use App\Entity\ComponentUx;
use App\Repository\ComponentUxRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

#[Route('/home', name: 'app_')]
class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ComponentUxRepository $componentUxRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'components' => $componentUxRepository->findAll(),
        ]);
    }

    #[Route('/chartJs', methods: ['GET'], name: 'chartjs')]
    public function showChart(ChartBuilderInterface $chartBuilder)
    {
        $chart = $chartBuilder->createChart(Chart::TYPE_LINE); //Différent type de Chart à voir sur la Doc!

        $chart->setData([
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            'datasets' => [
                [
                    'label' => 'My First dataset',
                    'backgroundColor' => 'rgb(255, 99, 132)',
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => [0, 10, 5, 2, 20, 30, 45],
                ],
            ],
        ]);
        // Différentes options sont possible à voir sur la doc!
        $chart->setOptions([/* 
            'scales' => [
                'y' => [
                    'suggestedMin' => 0,
                    'suggestedMax' => 100,
                ],
            ],
         */]);

        return $this->render('component/chartjs.html.twig', [
            'chart' => $chart,
        ]);
    }
}
