<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB\Client as Mongo;

class MongoTest extends Controller
{
    //
    function mongoConnect()
    {
        $m = new Mongo();
        $db = $m->database->test_collection;
        $t_Query = array('Temperature' => '10');
        $c = $db->find($t_Query)->toArray();
        $end=sizeof($c);
      for ($i=0; $i <$end ; $i++) {

        $json=json_encode($c[$i],JSON_FORCE_OBJECT);
        $res = substr($json, 43,58);
        $res="{".$res;
        $manage = json_decode($res, true);
       foreach($manage as $key=>$value)
       {
          if($key=='time')
          {



          echo  $value . "<br>";
          }
          if($key=='Temperature')
          {
            $num=number_format($value);

          }
      }

}






     }
}
