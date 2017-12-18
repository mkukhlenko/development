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
    private $root;
    private $trunk;
    private $branches;
    private $leaves;
    private $fruit;

    public function absorbMoisture()
    {
    }

    public function produceCarbohydratesWithLight()
    {
    }

    public function bearFruit()
    {
    }
}

class CherryTree extends Tree implements CherryActions
{
    public function absorbMoistureFromLeaves()
    {
        return 0;
    }
}

class WalnutTree extends Tree
{
    public function produceCarbohydratesWithLight()
    {
        return parent::produceCarbohydratesWithLight() / 2;
    }
}

class AppleTree extends Tree
{

}
