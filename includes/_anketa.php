<?php
// NASTAVENI ANKETY
$Otazka="Máte záujem o kalendár 2.SQN pre rok 2013?"; // Anketni otazka
$Odpovedi=array(
				"Určite áno",            
				"Ani nie",
				); // Pole odpovedi. Pocet odpovedi je promenny, staci do pole pridat nebo odebrat odpoved...
$CisloAnkety=6; // Chcete-li zmenit otazku ankety a odpovedi, zmente i  cislo ankety...
// KONEC NASTAVENI



require "includes/_dba.php";
// byl odeslan formular ?
if(isset($_POST['sent'])){      
	$odp = (int)$_POST['odp']; //postneme si co zadal
	$CisloAnkety=(int)$CisloAnkety;
	
	$ip = $_SERVER["REMOTE_ADDR"]; // IP adresa návštěvníka
	$ip_cele = gethostbyaddr($_SERVER['REMOTE_ADDR']); // cela IP adresa návštěvníka
		
	$vysledekIP = mysql_query("SELECT COUNT(ip) FROM anketa WHERE `ip`= '$ip' AND `ip_cele`='$ip_cele' AND `anketa`='".$CisloAnkety."'"); //podivame se do databaze jestli uz se z IP navstevnika nehlasovalo
			if (mysql_result($vysledekIP,0) == 0){ // pokud v db ip neni, navstevnik nehlasoval
				mysql_query("INSERT INTO anketa (`odp`,`anketa`,`ip`,`ip_cele`,`cas`) VALUES ('$odp', '$CisloAnkety', '$ip', '$ip_cele', NOW() )");	// vlozime tedy hlas spolecne s IP do db
			}else{
				echo "<script language='javascript' type='text/javascript'>alert('Už ste hlasovali.');</script>"; // jinak jestli je v db tak chodime alert ze uz hlasoval
			}
}
?>
	<form action="#" method="post"> <!-- zpracuje skript a vrati na aktualni stranku z ktere se hlasovalo  --> 
		<input type="hidden" name="sent" value="" />
            <p class="otazka"><?php echo $Otazka; ?></p>
			
			<?php
			$PocetOdpovedi=count($Odpovedi); // Spocitame kolik anketa ma odpovedi.
			$PocetHlasu=0; // Nastavime pocet celkovych hlasu na 0, postupne budeme pricitat s odpovedmi			
			$PocetHlasu=mysql_result(mysql_query("SELECT COUNT(odp) FROM anketa WHERE anketa='".$CisloAnkety."'"),0);
			//echo $PocetHlasu;

			for($i=1;$i<=$PocetOdpovedi;$i++){ // Spocitame pocet odpovedi a pro kazdou z nich vypiseme input pro voleni, obrazek a pocet procent hlasu.
				$odp = mysql_result(mysql_query("SELECT COUNT(odp) FROM `anketa` WHERE `odp` = '".$i."' AND `anketa`='".$CisloAnkety."'"),0);	
				
				//$odpSize= round(($odp / $PocetHlasu ) * 95 );			// nasobim mensim cislem, aby posuvnik znazornujici pocet hlasu nebyl tak dlouhy
				$odpProcent=round(($odp / $PocetHlasu) * 100 );		// Pocet procent zastoupeni odpovedi
				?>
				<dl>
					<dt> <input type="radio" name="odp" value="<?php echo $i; ?>"> <?php echo $Odpovedi[$i-1]; ?></dt>
					<dd> <i style="width: <?php echo $odpProcent; ?>%"><?php echo $odpProcent; ?> %</i></dd>
				</dl>
			<?php 
			} // end FOR
			?>

        <input type="submit" value="HLASUJ!" class="button small secondary radius">	<br>			
		Celkom hlasov: <?php echo $PocetHlasu; ?>
	</form>
