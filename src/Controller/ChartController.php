<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class ChartController extends AbstractController
{
    #[Route('/chartjs', methods: ['GET'], name: 'app_chartjs')]
    public function showChart(ChartBuilderInterface $chartBuilder): Response
    {
        $chart = $chartBuilder->createChart(Chart::TYPE_POLAR_AREA); //Différent type de Chart à voir sur la Doc!

        $chart->setData([
            'labels' => ['HTML', 'CSS', 'JS', 'SCSS', 'Twig', 'PHP', 'Bootstrap', 'Symfony'],
            'datasets' => [
                [
                    'label' => 'Mon niveau',
                    'data' => [18, 15, 5, 13, 18, 19, 17, 15],
                    'backgroundColor' => [
                        'rgb(0, 66, 44)',
                        'rgb(66, 135, 245)',
                        'rgb(69, 199, 26)',
                        'rgb(164, 26, 199)',
                        'rgb(199, 26, 35)',
                        'rgb(212, 203, 32)',
                        'rgb(184, 105, 20)',
                        'rgb(20, 173, 184)',
                    ],
                ],
            ],
        ]);
        // Différentes options sont possible à voir sur la doc!
        $chart->setOptions([/* ... */]);

        return $this->render('chart/index.html.twig', [
            'chart' => $chart,
        ]);
    }
}
