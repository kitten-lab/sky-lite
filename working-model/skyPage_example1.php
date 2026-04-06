<?php include 'skyLite_core.php'; ?>

<?php
openSky("This is the Title of Your Page!");
nameSelf("PUBLIC_USER");
bigHeading("Welcome to SKYLINE On INTERA.");

leaf("Thank you for entering our sight. We see you. 
$BR We feel you. We know you.");

medHeading("Consider submitting a vision report.
We see what you see. Let us know.");

section($left,"width: 50%; background-color:green;","");

bigHeading("This is a Heading also.");

close_section();

closeSky();
?>


<html><head><title><?= $pageTitle ?></title></head><body>
<?php 

foreach ($GLOBALS['GETS']['set'] as $fn) {
    echo $fn();
} 

?>