<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use \yii\widgets\LinkPager;

$this->title = 'Escalator';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <h1><?= 'Escalator Maintenance Schedule' ?></h1>
<table style="width:100%" border=1 frame=void rules=rows >
  <tr>
    <th>Sl. No.</th>
    <th>Type of Check</th>
    <th>Checks</th>
    <th>Schedule</th>
  </tr>
  <tr>
   <th rowspan="9">1</th>
   <th rowspan="9">Cleaning:</th>
    <td>Track</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Pit (Top and bottom)</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Steps</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Floor Plate</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Handrail</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Control panels (MCC, bottom Controller, power panel and PES)</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Antistatic rollers</td>
    <td>M</td>
  </tr>
   <tr>
    <td>Sprockets</td>
    <td>M</td>
  </tr>
   <tr>
    <td>Exhaust fan</td>
    <td>M</td>
  </tr>
  <tr>
   <th rowspan="3">2</th>
   <th rowspan="3">Lubrication:</th>
    <td>Drive Chain</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Handrail drive chain</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Step Chain</td>
    <td>M</td>
  </tr>
  <tr>
   <th rowspan="3">3</th>
   <th rowspan="3">Greasing:</th>
    <td>Main drive shaft</td>
    <td>H</td>
  </tr>
  <tr>
    <td>Bearing of handrail drive shaft</td>
    <td>H</td>
  </tr>
  <tr>
    <td>Step bushes</td>
    <td>H</td>
  </tr>
  <tr>
   <th rowspan="8">4</th>
   <th rowspan="8">Visual Checks:</th>
    <td>Relays and contactors</td>
    <td>Q</td>
  </tr>
  <tr>
    <td>All escalator parts (Handrail, cladding, decking, bollard, signage, floor plates, handrail entry)</td>
    <td>H</td>
  </tr>
  <tr>
    <td>All stickers and labels</td>
    <td>H</td>
  </tr>
  <tr>
    <td>Skirt brush</td>
    <td>H</td>
  </tr>
  <tr>
    <td>Step guard</td>
    <td>H</td>
  </tr>
  <tr>
    <td>Truss and Intermediate support</td>
    <td>A</td>
  </tr>
  <tr>
    <td>Controllers, Power panel and earthing</td>
    <td>A</td>
  </tr>
   <tr>
    <td>Terminals condition and connections</td>
    <td>A</td>
  </tr>
  <tr>
   <th rowspan="4">5</th>
   <th rowspan="4">Inspection of Steps:</th>
    <td>Step teeth</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Step-Skirt gap</td>
    <td>Q</td>
  </tr>
  <tr>
    <td>Step locking bolt</td>
    <td>H</td>
  </tr>
  <tr>
    <td>Step nylon pad</td>
    <td>A</td>
  </tr>
  <tr>
   <th rowspan="4">6</th>
   <th rowspan="4">Inspection of Step chain:</th>
    <td>Step chain tension</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Step chain roller</td>
    <td>H</td>
  </tr>
  <tr>
    <td>Step chain link</td>
    <td>A</td>
  </tr>
  <tr>
    <td>Step chain circlip</td>
    <td>A</td>
  </tr>
  <tr>
   <th rowspan="3">7</th>
   <th rowspan="3">Inspection of Comb:</th>
    <td>Comb plate teeth</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Step-comb meshing</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Comb plate discolorisation</td>
    <td>A</td>
  </tr>
  <tr>
   <th rowspan="2">8</th>
   <th rowspan="2">Inspection of Handrail:</th>
    <td>Handrail tension</td>
    <td>Q</td>
  </tr>
  <tr>
    <td>Handrail tension spring</td>
    <td>Q</td>
  </tr>
  <tr>
   <th rowspan="2">9</th>
   <th rowspan="2">Inspection of Drive chains:</th>
    <td>Main drive chain sag</td>
    <td>Q</td>
  </tr>
  <tr>
    <td>Handrail drive chain sag</td>
    <td>Q</td>
  </tr>
  <tr>
   <th rowspan="5">10</th>
   <th rowspan="5">Inspection of Machinery unit:</th>
    <td>Oil leakage</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Noise</td>
    <td>Q</td>
  </tr>
  <tr>
    <td>Main drive shaft</td>
    <td>A</td>
  </tr>
  <tr>
    <td>Handrail drive shaft</td>
    <td>A</td>
  </tr>
  <tr>
    <td>Reduction gear condition</td>
    <td>A</td>
  </tr>
  <tr>
   <th rowspan="2">11</th>
   <th rowspan="2">Inspection of Brake:</th>
    <td>Brake tension</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Brake liners</td>
    <td>H</td>
  </tr>
   <th rowspan="18">12</th>
   <th rowspan="18">Functional checks of safety devices:</th>
    <td>Floor plate switches (Top and bottom)</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Emergency stop (Top, Middle and bottom)</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Stop switch (Top and bottom pit)</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Auxiliary brake</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Drive chain switch</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Anti-reverse sensor</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Handril entry switch (Top-left and right, bottom-left and right)</td>
    <td>M</td>
  </tr>
   <tr>
    <td>Comb plate switches (top right, left and bottom right, left)</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Step sap switch (Top and bottom)</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Step missing sensor</td>
    <td>M</td>
  </tr>
   <tr>
    <td>Handrail speed monitor</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Motor speed monitor</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Float switch</td>
    <td>M</td>
  </tr>
   <tr>
    <td>Step chain switch (Left and right)</td>
    <td>M</td>
  </tr>
   <tr>
    <td>Skirt switches (Top-left and right, middile - left and right, bottom - left and right)</td>
    <td>H</td>
  </tr>
  <tr>
    <td>Step upthrust switches (Top and bottom)</td>
    <td>H</td>
  </tr>
  <tr>
    <td>Handrail broken switch (left and right)</td>
    <td>H</td>
  </tr>
   <tr>
    <td>SAnti static brush</td>
    <td>H</td>
  </tr>
   <th rowspan="16">13</th>
   <th rowspan="16">Functional checks of operative devices:</th>
    <td>Start key switch (Top and bottom)</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Inspection pandent</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Star delta mode</td>
    <td>M</td>
  </tr>
   <tr>
    <td>Traffic sensor</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Traffic indicator</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Buzzer</td>
    <td>M</td>
  </tr>
   <tr>
    <td>Automatic lubrication system</td>
    <td>M</td>
  </tr>
   <tr>
    <td>UPS operation</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Traffic indicator</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Step gap light (top and bottom)</td>
    <td>M</td>
  </tr>
   <tr>
    <td>Comb light (top and bottom)</td>
    <td>M</td>
  </tr>
   <tr>
    <td>Pit light (top and bottom)</td>
    <td>M</td>
  </tr>
   <tr>
    <td>Fault display (top, bottom and controller)</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Exhaust fan</td>
    <td>M</td>
  </tr>
  <tr>
    <td>Flywheel condition</td>
    <td>H</td>
  </tr>
   <tr>
    <td>RMS Operation</td>
    <td>A</td>
  </tr>
 </table>
</div>

