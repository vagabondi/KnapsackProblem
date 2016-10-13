<?php
namespace App\Controller;

use \App\Model as Model;

class KnapSackController {

    public static function getResults()
    {
        if(isset($_POST['algorithm']) && isset($_POST['path'])) {
            $algorithm = $_POST['algorithm'];
            $path = $_POST['path'];
            $size = (int)$_POST['size'];

            if($algorithm === 'greedy_decide') {
                $crv = new Model\GreedyDecideKnapsackClass($path, $size);
                $result = $crv->algorithm();

                return $result;
            }
        }
        return false;
    }
}



