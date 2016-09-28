<?php

class GreedyDecideKnapsackClass {
    private $path;
    private $capacity;
    private $weights=[];
    private $values=[];

    /**
     * GreedyGeneralKnapsackClass constructor.
     * @param $path
     * @param $capacity
     */
    public function __construct($path, $capacity)
    {
        $this->path = $path;
        $this->capacity = $capacity;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @return mixed
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * @param mixed $capacity
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
    }

    /**
     * @return mixed
     */
    public function getWeights()
    {
        return $this->weights;
    }

    /**
     * @param mixed $weights
     */
    public function setWeights($weights)
    {
        $this->weights = $weights;
    }

    /**
     * @return mixed
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * @param mixed $values
     */
    public function setValues($values)
    {
        $this->values = $values;
    }

    public function getDataFromCrv()
    {
        $path = $this->getPath();
        $crvFile = fopen($path, "r");
        $items = [];
        while (!feof($crvFile)) {
            $itemInfo = fgetcsv($crvFile, 1000, ';');
            array_push($items, $itemInfo);
        }
        fclose($crvFile);
        array_shift($items);
        return $items;
    }

    public function createArrays() {
        $weights = $this->getWeights();
        $values = $this->getValues();
        $items = $this->getDataFromCrv();
        foreach ($items as $item) {
            $weights[(int)$item[0]]=(int)$item[1];
            $values[(int)$item[0]]=(int)$item[2];
        }
        $this->setValues($values);
        $this->setWeights($weights);
    }

    public function putItemsIntoSack () {
        $balances=[];
        $weights=$this->getWeights();
        $values=$this->getValues();
        foreach ($values as $key => $value) {
            $balances[$key] = $value/$weights[$key];
        }
        arsort($balances);
        $sum=0;
        $capacity = $this->getCapacity();
        $totalPrice=0;
        $items='';
        foreach($balances as $key => $balance) {
            $sum+=$weights[$key];
            if($sum>$capacity) {
                $sum-=$weights[$key];
            } else {
                $totalPrice+=$values[$key];
                $items.=$key . ' ';
            }
        }
        return 'Chosen items id: ' . $items .
                '<br> Total value: ' . $totalPrice .
                '<br> Total weight: ' . $sum;
    }
}