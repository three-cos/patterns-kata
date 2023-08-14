<?php

namespace Warden\Patterns\Behavioral\TemplateMethod\RealWorld;

abstract class ReportGenerator
{
    public abstract function generate(): Report;
    
    public function prepareData(): void
    {
    }

    public function writeToFile(): void
    {
    }
}

abstract class Report
{
}

class PdfReport extends Report
{
}

class ExcelReport extends Report
{
}

class PdfReportGenerator extends ReportGenerator
{
    public function generate(): Report
    {
        return new PdfReport;
    }
}

class ExcelReportGenerator extends ReportGenerator
{
    public function generate(): Report
    {
        return new ExcelReport;
    }
}

$generator = new PdfReportGenerator;
var_dump($generator->generate());