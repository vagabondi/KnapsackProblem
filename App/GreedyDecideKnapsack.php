<?php
namespace App\Model;

include 'Algoritm.php';

class GreedyDecideKnapsackClass extends Algorithm
{
    public function __construct($path, $capacity)
    {
        parent::__construct($path, $capacity);
    }

    public function algorithm()
    {
        $data = $this->createDataArray();
        $values = $data['values'];
        $weights = $data['weights'];
        $balances = [];

        foreach ($values as $id => $value) {
            $balances[$id] = $value/$weights[$id];
        }

        arsort($balances);

        $sum = 0;
        $capacity = $this->getCapacity();
        $totalPrice = 0;
        $chosen_items = [];

        foreach($balances as $key => $balance) {
            $sum += $weights[$key];
            if ($sum > $capacity) {
                $sum -= $weights[$key];
            } else {
                $totalPrice += $values[$key];
                $chosen_items[] = $key;
            }
        }

        return $results = [
            'chosen_items' => $chosen_items,
            'total_value' => $totalPrice,
            'total_weight' => $sum
        ];
    }
}
