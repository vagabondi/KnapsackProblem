<?php
namespace App\Model;

abstract class Algorithm {
    private $path;
    private $capacity;

    public function __construct($path, $capacity)
    {
        $this->path = $path;
        $this->capacity = $capacity;
    }

    public function getCapacity()
    {
        return $this->capacity;
    }

    protected function getDataFromCrv()
    {
        $path = $this->path;
        $items = [];

        foreach (file($path) as $data) {
            $items[] = str_getcsv($data, ';');
        }

        array_shift($items);

        return $items;
    }

    /**
     * @return array
     * Returns array with two keys: 'weights' and 'values'
     * under each key is array with items id as keys and items properity as values
     */
    protected function createDataArray()
    {
        $items = $this->getDataFromCrv();
        $items_weights = [];
        $items_values = [];

        foreach ($items as $item) {
            $items_weights[(int)$item[0]]=(int)$item[1];
            $items_values[(int)$item[0]]=(int)$item[2];
        }

        return $data = [
            'weights' => $items_weights,
            'values' => $items_values
        ];
    }

    abstract public function algorithm();
}
