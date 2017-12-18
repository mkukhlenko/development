<?php
interface TreeActions
{
    public function absorbMoisture();
    public function produceCarbohydratesWithLight();
    public function bearFruit();
}

interface CherryActions
{
    public function absorbMoistureFromLeaves();
}

abstract class Tree implements TreeActions
{
    CONST x = 1;
    CONST y = 1;
    CONST z = 1;

    private $root;
    private $trunk;
    private $branches;
    private $leaves;
    private $fruit;

    private $Sroot;

    public function __construct($Sroot)
    {
        $this->Sroot = $Sroot;
    }

    public function getLeavesCount()
    {
        return $this->Sroot/5 * static::x * static::y * static::z;
    }

    public function absorbMoisture()
    {
        return static::x * $this->Sroot;
    }

    public function produceCarbohydratesWithLight()
    {
        return $this->getLeavesCount();
    }

    public function bearFruit()
    {
        return min($this->produceCarbohydratesWithLight(), $this->absorbMoisture());
    }
}

class CherryTree extends Tree implements CherryActions
{
    CONST x = 2;
    CONST y = 0.9;
    CONST z = 12;

    public function absorbMoistureFromLeaves()
    {
        return 0;
    }

    public function bearFruit()
    {
        return min($this->produceCarbohydratesWithLight(), $this->absorbMoisture() + $this->absorbMoistureFromLeaves());
    }
}

class WalnutTree extends Tree
{
    CONST x = 4;
    CONST y = 1;
    CONST z = 15;

    public function produceCarbohydratesWithLight()
    {
        return parent::produceCarbohydratesWithLight() / 2;
    }
}

class AppleTree extends Tree
{
    CONST x = 4;
    CONST y = 1.1;
    CONST z = 17;
}

$tree1 = new CherryTree(50);
$tree2 = new WalnutTree(50);
$tree3 = new AppleTree(50);

echo $tree1->getLeavesCount().'<br>';
echo $tree2->getLeavesCount().'<br>';
echo $tree3->getLeavesCount().'<br>';

echo $tree1->bearFruit().'<br>';
echo $tree2->bearFruit().'<br>';
echo $tree3->bearFruit().'<br>';