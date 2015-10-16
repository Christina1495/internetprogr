<?php
/* Подключаем классы */
require_once "pData.php";
require_once "pChart.php";
$DataSet = new pData(); // Создаём объект pData
$DataSet->AddPoint(array(0, 1, 4, 9, 16, 25, 36, 49, 64, 81, 100), "Serie1"); // Загружаем данные графика 1
$DataSet->AddPoint(array(0, 1, 8, 27, 64, 125, 216, 343, 512, 729, 1000), "Serie2"); // Загружаем данные графика 2
$DataSet->AddAllSeries(); // Добавить все данные для построения
$Test = new pChart(700, 230); // Рисуем графическую плоскость
$Test->setFontProperties("Fonts/Tahoma.ttf", 8); // Установка шрифта
$Test->setGraphArea(50, 30, 585, 200); // Установка области графика
$Test->drawFilledRoundedRectangle(7, 7, 693, 223, 5, 240, 240, 240); // Выделяем плоскость прямоугольником
$Test->drawRoundedRectangle(5, 5, 695, 225, 5, 230, 230, 230); // Делаем контур графической плоскости
$Test->drawGraphArea(255, 255, 255, true); // Рисуем графическую плоскость
$Test->drawScale($DataSet->GetData(), $DataSet->GetDataDescription(), SCALE_NORMAL, 150, 150, 150, true, 0, 2); // Рисуем оси и график
$Test->drawGrid(4, true, 230, 230, 230, 50); // Рисуем сетку
$Test->drawLineGraph($DataSet->GetData(),$DataSet->GetDataDescription()); // Соединяем точки графика линиями
$Test->drawPlotGraph($DataSet->GetData(),$DataSet->GetDataDescription(), 3, 2, 255, 255, 255); // Рисуем точки
$Test->drawTitle(50, 22, "Test1", 50, 50, 50, 585); // Выводим заголовок графика
$Test->Stroke(); // Выводим график в окно браузера;
?>

<?php
/*
    Example1 : A simple line chart
*/

// Standard inclusions
require_once "pData.php";
require_once "pChart.php";

// Dataset definition
$DataSet = new pData;
$DataSet->AddPoint(1,"Serie1");
$DataSet->AddPoint(3,"Serie2");
$DataSet->AddPoint(3,"Serie3");
$DataSet->AddPoint("A#~1","Labels");
$DataSet->AddAllSeries();
$DataSet->RemoveSerie("Labels");
$DataSet->SetAbsciseLabelSerie("Labels");
$DataSet->SetSerieName("Alpha","Serie1");
$DataSet->SetSerieName("Beta","Serie2");
$DataSet->SetSerieName("Gama","Serie3");
$DataSet->SetYAxisName("Test Marker");
$DataSet->SetYAxisUnit("µm");

// Initialise the graph
$Test = new pChart(210,230);
$Test->setFontProperties("Fonts/tahoma.ttf",8);
$Test->setGraphArea(65,30,125,200);
$Test->drawFilledRoundedRectangle(7,7,203,223,5,240,240,240);
$Test->drawRoundedRectangle(5,5,205,225,5,230,230,230);
$Test->drawGraphArea(255,255,255,TRUE);
$Test->drawScale($DataSet->GetData(),$DataSet->GetDataDescription(),SCALE_ADDALLSTART0,150,150,150,TRUE,0,2,TRUE);
$Test->drawGrid(4,TRUE,230,230,230,50);

// Draw the 0 line
$Test->setFontProperties("Fonts/tahoma.ttf",6);
$Test->drawTreshold(0,143,55,72,TRUE,TRUE);

// Draw the bar graph
$Test->drawStackedBarGraph($DataSet->GetData(),$DataSet->GetDataDescription(),50);

// Finish the graph
$Test->setFontProperties("Fonts/tahoma.ttf",8);
$Test->drawLegend(135,150,$DataSet->GetDataDescription(),255,255,255);
$Test->setFontProperties("Fonts/tahoma.ttf",10);
$Test->drawTitle(0,22,"Sample size",50,50,50,210);
$Test->Render("SmallStacked.png");
?>