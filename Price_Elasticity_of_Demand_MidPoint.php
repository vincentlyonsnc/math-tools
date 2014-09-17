<?php
// q1 = New Quantity
// q2 = Old Quantity
// p1 = New Price
// p2 = Old Price
if (isset($_GET['q1']) && isset($_GET['q2']) && isset($_GET['p1']) && isset($_GET['p2']) && isset($_GET['dec'])) { //makes sure all variables are set
$q1 = $_GET['q1'];
$q2 = $_GET['q2'];
$p1 = $_GET['p1'];
$p2 = $_GET['p2'];
$dec = $_GET['dec'];
$perc_change_quantity = round(100 * (($q2-$q1)/(($q1+$q2)/2)), $dec); // computes percentage change of quantity
$perc_change_price = round(100 * (($p2-$p1)/(($p1+$p2)/2)), $dec); // computes percentage change of price
$price_elasticity_of_demand = abs($perc_change_quantity) / abs($perc_change_price); //computes price elasticity of demand
echo "<b>Percentage Change in Quantity</b>: " . $perc_change_quantity;
echo "<br><b>Percentage Change in Price</b>: " . $perc_change_price;
echo "<br><b>Final Answer</b>: " . round($price_elasticity_of_demand, $dec);
if ($price_elasticity_of_demand > 1) { // if price elasticity of demand is greater then 1 it is elastic
$elasticity = "Elastic";
}elseif ($price_elasticity_of_demand < 1) { // if price elasticity of demand is less than 1 it is inelastic
$elasticity = "Inelastic";
}elseif ($price_elasticity_of_demand == 1) { // if price elasticity of demand equals 1 it is unit elasticity
$elasticity = "Unit Elasticity";
}
echo "<br><b>Elasticity</b>: " . $elasticity;
}
?>
<p>
<form name="input" action="Price_Elasticity_of_Demand_MidPoint.php" method="get">
Original Quantity: <input type="text" name="q2"><br>
Original Price: <input type="text" name="p2"><br>
New Quantity: <input type="text" name="q1"><br>
New Price: <input type="text" name="p1"><br>
Decimal Points: <input type="number" name="dec" min="0" max="10" value="0"><br>
<input type="submit" value="Submit">
</form>