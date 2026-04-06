<?php include 'skyLite_core.php'; ?>

<?php
openSky("This is the Title of Your Page!");
section($center, "background-color:blue","MAIN");
section($center, "background-color:red; width:50%","MAIN");

nameSelf("PUBLIC_USER");
bigHeading("Welcome to SKYLINE On INTERA.");

leaf("Thank you for entering our sight. We see you. 
$BR We feel you. We know you.");

medHeading("Consider submitting a vision report.
We see what you see. Let us know.");

section($left,"width: 50%; background-color:green;","");
getImg("images","check-it-out","gif");
bigHeading("This is a Heading also.");

close_section();

closeSky();
?>


<?php 

echo "<html><head><title>";
echo $pageTitle;
echo "</title>";
getA_Style("skyStyles","css");
echo "</head><body>";

foreach ($GLOBALS['GETS']['set'] as $fn) {
    echo $fn();
} 

?>