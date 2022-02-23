<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Lift';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <h1><?= 'Lift Maintenance Schedule' ?></h1>
<table style="width:100%" border=1 frame=void rules=rows >
  <tr>
    <th>Sl. No.</th>
    <th>Type of Check</th>
    <th>Checks</th>
    <th>Schedule</th>
  </tr>
  <tr>
   <th rowspan="13">1</th>
   <th rowspan="13">Cleaning:</th>
    <td>Head room and equipments</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Brackets, cleats and channels</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Landing door header, Track and sills</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Car top and the Car top equipments</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Car door header, Operator, Track and sill</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Pit and Pit equipments</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Car Cabin and doors</td>
    <td>M</td>
  </tr>
   <tr>
    <td>Car and Counter weight safety wedge blocks</td>
    <td>M</td>
  </tr>
   <tr>
    <td>Control panels</td>
    <td>Q</td>
  </tr>
   <tr>
    <td>Guide rails</td>
    <td>H</td>
  </tr>
   <tr>
    <td>VVVF drive</td>
    <td>H</td>
  </tr>
   <tr>
    <td>Main power cables and its terminals</td>
    <td>H</td>
  </tr>
   <tr>
    <td>Controller PCBs</td>
    <td>H</td>
  </tr>
  <tr>
  <th rowspan="3">2</th>
   <th rowspan="3">Lubrication:</th>
    <td>Guide rails</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Fill the Car top lube oil tank</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Fill the Counter weight top lube oil tank</td>
    <td>M</td>
  </tr>
   <tr>
   <th rowspan="8">3</th>
   <th rowspan="8">Visual Checks:</th>
    <td>CAR interior</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Signage (Load Plate, Instruction plate, Landing signs etc.)</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Push buttons, Car and Landing Displays, Gongs etc.</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Frames, Architrave, Car and Landing Doors</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Diverter pulleys</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Wires in the relays and contactors</td>
    <td>H</td>
  </tr>
  <tr>
    <td>Brake liner</td>
    <td>A</td>
  </tr>
   <tr>
    <td>Sheave grooves</td>
    <td>A</td>
  </tr>
  <tr>
   <th rowspan="21">4</th>
   <th rowspan="21">Inspection in Hoistway:</th>
    <td>Bulk head lights</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Counter weight top and bottom shoe play</td>
    <td>M</td>
  </tr>
   <tr>
    <td>Fixing of toe guards</td>
    <td>Q</td>
  </tr>
  <tr>
    <td>Tightness in the limit switches</td>
    <td>Q</td>
  </tr>
  <tr>
    <td>Clearance between skate/door coupler to landing sill</td>
    <td>Q</td>
  </tr>
  <tr>
    <td>Clearance between landing door rollers and car sill</td>
    <td>Q</td>
  </tr>
  <tr>
    <td>Tightness of all the fasteners</td>
    <td>Q</td>
  </tr>
  <tr>
    <td>Tension of the Main ropes</td>
    <td>Q</td>
  </tr>
  <tr>
    <td>Guide shoe Liners of Car and cwt</td>
    <td>Q</td>
  </tr>
  <tr>
    <td>Condition of the Diverter pulley and Rope guards</td>
    <td>Q</td>
  </tr>
  <tr>
    <td>Engagement of vanes and reed switch</td>
    <td>Q</td>
  </tr>
  <tr>
    <td>Car and counter weights buffer clearance</td>
    <td>Q</td>
  </tr>
  <tr>
    <td>Limits roller engagement and clearance in the ramp</td>
    <td>Q</td>
  </tr>
  <tr>
    <td>Guide rails</td>
    <td>H</td>
  </tr>
  <tr>
    <td>Condition of the main and OSG ropes</td>
    <td>H</td>
  </tr>
  <tr>
    <td>Over travel clearance</td>
    <td>H</td>
  </tr>
  <tr>
    <td>Tightness in the rope fixing clamps</td>
    <td>H</td>
  </tr>
  <tr>
    <td>Condition of the travelling cables</td>
    <td>H</td>
  </tr>
  <tr>
    <td>Motor and braking resistance terminals</td>
    <td>H</td>
  </tr>
  <tr>
    <td>Over speed governor fixing in car and counter weight</td>
    <td>H</td>
  </tr>
  <tr>
    <td>Over speed governor tension weight and clearance</td>
    <td>H</td>
  </tr>
  <tr>
   <th rowspan="8">5</th>
   <th rowspan="8">Inspection of Doors</th>
    <td>Electrical and mechanical function of the door locks</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Wear and alignment of the track rollers and antilift rollers</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Clearance between the doors and the door sills</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Condition and alignment of door slippers</td>
    <td>M</td>
  </tr>
  <tr>
    <td> Door Operation for any noise</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Wear of track rollers and anti lift rollers</td>
    <td>Q</td>
  </tr>
  <tr>
    <td>condition of all the door open device/ keys</td>
    <td>Q</td>
  </tr>
  <tr>
    <td>door operator and door belts</td>
    <td>Q</td>
  </tr>
  <tr>
   <th rowspan="3">6</th>
   <th rowspan="3">Inspection of car cabin</th>
    <td>Car lighting</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Cabin fans</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Cabin bolt and nuts</td>
    <td>A</td>
  </tr>
  <th rowspan="23">7</th>
   <th rowspan="23">Functional and safety checks</th>
    <td>Car and Counter weight Over speed governor mechanism and electrical contacts</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Levelling accuracy</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Function of car and landing displays</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Function of arrival gongs</td>
    <td>M</td>
  </tr>
  <tr>
    <td>ARD operation</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Function of Emergency lights and its Batteries</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Function of Emergency Alarm/ Siren</td>
    <td>M</td>
  </tr>
   <tr>
    <td>Manual brake release system</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Function of Intercom system</td>
    <td>M</td>
  </tr>
  <tr>
    <td>UPS system</td>
    <td>M</td>
  </tr>
   <tr>
    <td>Overload function</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Fault codes if any</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Function of all stop switches in car top and pit</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Function of all limit switches and safety switches in the car top, pit and Lift shaft</td>
    <td>M</td>
  </tr>
   <tr>
    <td>Infra red 2D and 3D door sensors</td>
    <td>H</td>
  </tr>
  <tr>
    <td>Running clearance 25mm to 30mm.(btw car and landing sill)</td>
    <td>Q</td>
  </tr>
  <tr>
    <td>Earthing and electrical connections</td>
    <td>Q</td>
  </tr>
   <tr>
    <td>Safety gear mechanism</td>
    <td>Q</td>
  </tr>
     <tr>
    <td>Complete over load device function</td>
    <td>A</td>
  </tr>
     <tr>
    <td>Relevelling device function</td>
    <td>A</td>
  </tr>
     <tr>
    <td>function of limit switches</td>
    <td>A</td>
  </tr>
     <tr>
    <td>RMS operation</td>
    <td>A</td>
  </tr>
  
 </table>
</div>

