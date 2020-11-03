

  <!--<link href="{{ url('css/mycss.css') }}" rel="stylesheet" media="all" type="text/css" />-->
  <!--<link rel="stylesheet" href="{{ url('/resources/views/css/mycss.css') }}"/>-->



<body>



@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">


                <div class="panel-body">

                </br>
              </br>
                    {!! $chart->html() !!}

                </div>
              </br>
              </br>
<div class="explain">

          <div class="select">
            <form action="{{url('home')}}" method="get" role="sendchartname">
              <div class="input200">
                  <input type="text"  name="ch" placeholder="Insert your favorite chart">
              </div>
                   <div class="btn">
                  <button class="b" type="submit" name="search" value="search">
                    OK
                  </button>
                </div>
             </form>
          </div>
          <div class="ex">
               1-bar
             </br>
             2-line
             </br>
          </div>
</div>

<div class="twotext" >

<div class="bazei">
  <h3 style="font-family:tahoma">
Please enter the two date that  you want to view data between them</h3>
  <p>Note: Enter months in the following format:</p>
  <p>
    01-Jan
    </br>
    02-Feb
    </br>
    03-Mar
    </br>
    04-Apr
    </br>
    05-May
    </br>
    06-Jun
    </br>
    07-Jul
    </br>
    08-Aug
    </br>
    09-Sep
    </br>
    10-Oct
    </br>
    11-Nov
    </br>
    12-Dec
    </br>
  </p>
  <form action="{{url('home')}}" method="get" role="search">
    {{ csrf_field() }}
    From:	<input class="input100" type="text" name="q"  placeholder="Year">
    </br>
    <input class="input100" type="text" name="p" placeholder="Month">
    </br>
    <input class="input100" type="text" name="d"  placeholder="Day">
    </br>
    </br>
To:	 <input class="input100" type="text" name="q1"  placeholder="Year">
       </br>
<input class="input100" type="text" name="p1"  placeholder="Month">
      </br>
<input class="input100" type="text" name="d1"  placeholder="Day">
        </br>
          </br>
          <button id="login"  class="login100-form-btn"  >

            search
          </button>
          </form>
   </div>
<div class="spday">
  <h3 style="font-family:tahoma">
Please enter the date and time when you want to view data about it</h3>
  <p>Note: Enter months in the following format:</p>
  <p>
    01-Jan
    </br>
    02-Feb
    </br>
    03-Mar
    </br>
    04-Apr
    </br>
    05-May
    </br>
    06-Jun
    </br>
    07-Jul
    </br>
    08-Aug
    </br>
    09-Sep
    </br>
    10-Oct
    </br>
    11-Nov
    </br>
    12-Dec
    </br>
  </p>
  <form action="{{url('home')}}" method="get" role="searchforaday">
    Date:	<input class="input100" type="text" name="yy" placeholder="Year">
    </br>
    <input class="input100" type="text" name="mo"  placeholder="Month">
    </br>
    <input class="input100" type="text" name="dd"  placeholder="Day">
    </br>
    </br>
Time:	 <input class="input100" type="text" name="hh" placeholder="Hour">
       </br>
<input class="input100" type="text" name="mi" placeholder="Minute">

        </br>
          </br>
          <button id="login"  class="login100-form-btn"  >

            search
          </button>
    </form>
</div>
</div>

<div class="tbl">

  <div class="tbl1">
  <table style=" width: 500px;
border-collapse: collapse;
overflow: hidden;
box-shadow: 0 0 20px rgba(0, 0, 0, 0.1)">

    <tr >
    <center><th style="padding: 15px;background-color: rgba(255, 255, 255, 0.2);
color: white ;text-align: left ; background-color: #55608f ;" >Row</th></center>
      <th style="padding: 15px;background-color: rgba(255, 255, 255, 0.2);
color: white ; text-align: left; background-color: #55608f">Temperature</th>
    </tr>
    <?php $h1=json_decode($js, true); ?>
    <?php foreach ( $h1 as $key => $value): ?>
    <tr>
      <td style="padding: 15px;background-color: rgba(255, 255, 255, 0.2);
color: black;">
        <?php echo $key+1; ?>
      </td>
      <td style="padding: 15px;background-color: rgba(255, 255, 255, 0.2);
color: black">
        <?php echo $value; ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>

</div>
<?php $x="1"; ?>
<?php if ($status=="1"){ ?>
  <h3>Error:Please insert date in following format:</h3>
</br>
<p>
  1-Year and Month and Day and Hour and Minute
</br>
  or
</br>
2-Year and Month
</br>
or
</br>
3- Year
</p>

<?php }else{ ?>

<div class="tbl2">

      <table style=" width: 500px;
  border-collapse: collapse;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1)">

        <tr >
        <center><th style="padding: 15px;background-color: rgba(255, 255, 255, 0.2);
  color: white ;text-align: left ; background-color: #55608f ;" >Row</th></center>
          <th style="padding: 15px;background-color: rgba(255, 255, 255, 0.2);
  color: white ; text-align: left; background-color: #55608f">Temperature</th>
        </tr>
        <?php $h=json_decode($js1, true); ?>
        <?php foreach ( $h as $key => $value): ?>
        <tr>
          <td style="padding: 15px;background-color: rgba(255, 255, 255, 0.2);
  color: black;">
            <?php echo $key+1; ?>
          </td>
          <td style="padding: 15px;background-color: rgba(255, 255, 255, 0.2);
  color: black">
            <?php echo $value; ?>
          </td>
        </tr>
        <?php endforeach; ?>
      </table>
    </div>
<?php } ?>
</div>

{!! Charts::scripts() !!}
{!! $chart->script() !!}
@endsection
</body>
