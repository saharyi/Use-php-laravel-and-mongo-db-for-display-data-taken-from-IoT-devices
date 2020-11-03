<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use MongoDB\Client as Mongo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

      $m = new Mongo();
      $db = $m->database->test_collection;
      $t_Query = array();
      $c = $db->find($t_Query)->toArray();
      $end=sizeof($c);
      $numbers = array();
      $Tim= array();
    for ($i=0; $i <$end ; $i++) {

      $json=json_encode($c[$i],JSON_FORCE_OBJECT);
      $res = substr($json, 43,58);
      $res="{".$res;
      $manage = json_decode($res, true);
     foreach($manage as $key=>$value)
     {
        if($key=='time')
        {

          $Tim[$i]=$value;

        }
        if($key=='Temperature')
        {
          $num=number_format($value);
          $numbers[$i]=$value;
        }
      }

}

$data = collect([]); // Could also be an array

for ($days_backwards = 2; $days_backwards >= 0; $days_backwards--) {
    // Could also be an array_push if using an array rather than a collection.
    $data->push($days_backwards);
}
$ch1 = $request->input('ch');
$chart = Charts::multi($ch1,'material');
$chart->labels($Tim);
$chart->dataset('My dataset', $numbers);

$year = $request->input('q');
$month = $request->input('p');
$day = $request->input('d');
$from = $day.'-'.$month.'-'.$year;
$year1 = $request->input('q1');
$month1 = $request->input('p1');
$day1 = $request->input('d1');
$to = $day1.'-'.$month1.'-'.$year1;
$yy = $request->input('yy');
$mm= $request->input('mo');
$dd = $request->input('dd');
$hh = $request->input('hh');
$mm1 = $request->input('mi');
$v = $dd.'-'.$mm.'-'.$yy.' '.'('.$hh.':'.$mm1.':';
$end31=sizeof($Tim);
$first1 = 0;
$last1 = $end31-1;
$flag1 = true;
$status="0";
$found=false;
for ($p=0; $p < $end31; $p++) {
  $mongoday = $Tim[$p][0].$Tim[$p][1];
  $mongomonth = $Tim[$p][3].$Tim[$p][4];
  $mongoyear = $Tim[$p][6].$Tim[$p][7].$Tim[$p][8].$Tim[$p][9];
  $mongohour = $Tim[$p][12].$Tim[$p][13];
  $mongominute = $Tim[$p][15].$Tim[$p][16];

  if ($mongoday == $dd && $mongomonth == $mm && $mongoyear == $yy && $mongohour == $hh && $mongominute == $mm1)
  {
    if ($flag1 == true)
    {
      $first1 = $p;
      $flag1 = false;
      $found=true;
    }
    $last1 = $p;
  }
  if($mongomonth == $mm && $mongoyear == $yy)
  {
    if ($flag1 == true)
    {
      $first1 = $p;
      $flag1 = false;
      $found=true;
    }
    $last1 = $p;

  }
  if($mongoyear == $yy)
  {
    if ($flag1 == true)
    {
      $first1 = $p;
      $flag1 = false;
      $found=true;
    }
    $last1 = $p;

  }
}
if($found==true)
{
  $status="0";
}
else {
  $status="1";
}

$no1=array();
for ($l1=$first1; $l1 <= $last1 ; $l1++) {
  array_push($no1, $numbers[$l1]);
}

$js1=json_encode($no1,JSON_FORCE_OBJECT);

$end3=sizeof($Tim);
$first = 0;
$last = $end3-1;
$flag = true;

for ($l=0; $l < $end3; $l++) {
  if($Tim[$l]>$from&&$flag==true)
  {
    $first=$l;
    $flag=false;
  }
  if($Tim[$l]<$to)
  {
    $last=$l;
  }
}

$no=array();
for ($l=$first; $l <= $last ; $l++) {
  array_push($no, $numbers[$l]);
}
$js=json_encode($no,JSON_FORCE_OBJECT);
  return view('test1')->with('chart',$chart)->with('js',$js)->with('js1',$js1)->with('status', $status);
    }
}
