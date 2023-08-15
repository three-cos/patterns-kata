<?php

namespace Warden\Patterns\ChainOfResponsibility\RealWorld;

use DateTime;

interface Approver
{
    public function approve(WorkProject $project): bool;

    public function setNextApprover(?Approver $nextApprover): self;
}

abstract class BaseApprover implements Approver
{
    protected ?Approver $nextApprover = null;

    public function setNextApprover(?Approver $nextApprover): self
    {
        $this->nextApprover = $nextApprover;

        return $this;
    }

    public function approve(WorkProject $project): bool
    {
        return 
            $this->approveByDivision($project) 
            && ($this->nextApprover?->approve($project) ?? true);
    }

    abstract public function approveByDivision(WorkProject $project): bool;
}

class Manager extends BaseApprover
{
    public function approveByDivision(WorkProject $project): bool
    {
        if ($project->completion_date > new DateTime('next week')) {
            var_dump('We do not have much time!');

            return false;
        }

        return true;
    }
}

class Accountant extends BaseApprover
{
    public function approveByDivision(WorkProject $project): bool
    {
        if ($project->budget > 5_000) {
            var_dump('We have insufficient funds!');

            return false;
        }

        return true;
    }
}

class CEO extends BaseApprover
{
    public function approveByDivision(WorkProject $project): bool
    {
        $ceoDesidion = (bool) rand(0, 1);

        if ($ceoDesidion === false) {
            var_dump('Project is not aligned with our Company Values');
        }

        return $ceoDesidion;
    }
}

class WorkProject
{
    public function __construct(
        public string $title,
        public int $budget,
        public DateTime $completion_date
    )
    {
    }
}

$project = new WorkProject(
    'To herd cats', 
    rand(1_000, 10_000), 
    new DateTime(rand(0,1) ? 'next day' : 'next month')
);

$manager = new Manager();
$accountant = new Accountant();
$ceo = new Ceo();

$manager->setNextApprover(
    $accountant->setNextApprover(
        $ceo
    )
);

var_dump(
    $manager->approve($project) 
        ? 'Project is approved!' 
        : 'Project goes to trash bin'
);