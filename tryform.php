<html>
<?php

$Snorkeling= $_POST['Snorkeling'];
$Scuba_diving= $_POST['Scuba_diving'];
$Parasailing= $_POST['Parasailing'];

echo 'The activities you want to do are' . '<br>';
if (isset($Snorkeling)){
echo 'Snorkeling' . '<br>';
}
if (isset($Scuba_diving)){
echo 'Scuba diving'. '<br>';
}
if (isset($Parasailing)){
echo 'Parasailing' . '<br>';
}
if ((empty($Snorkeling)) && (empty($Scuba_diving))
 && (empty($Parasailing))){
echo 'No activities chosen yet';
}
?>
<form action="tryform.php" method="post">
<input type="checkbox" name="Snorkeling">Snorkeling<br>
<input type="checkbox" name="Scuba_diving">Scuba Diving<br>
<input type="checkbox" name="Parasailing">Parasailing<br>
<input type="submit" name="button"/></form>
</html>