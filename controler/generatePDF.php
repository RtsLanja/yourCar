<?php
require('../pdf/fpdf.php');
require('config.php');
require('numberChange.php');
class PDF extends FPDF
{
// Tableau am�lior�

function TitleInvoice($libelle)
{
    $this->SetFont('Arial','B',15);
    // Décalage à droite
    $this->Cell(80);
    // Titre
    $this->Cell(60,10,"Facture N# $libelle",1,0,'C');
    // Saut de ligne
    $this->Ln(20);
}
function corps($txt1,$txt2,$txt3)
{
    // Times 12
    $this->SetFont('Times','',12);
    // Sortie du texte justifié
    $this->Cell(0,10,"Nom du Client : $txt1",'');
    // Saut de ligne
    $this->Ln();
	$this->Cell(0,10,"Date de Facturation : $txt2",'');
	$this->Ln();
	$this->Cell(0,10,"Contact : $txt3",'');
	$this->Ln();
    // Mention en italique
    $this->SetFont('','I');
}
function ImprovedTable($header, $design,$pu,$quantity,$total,$toPay)
{
	$this->SetFillColor(0,255,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
	// Largeurs des colonnes
	$w = array(40, 35, 45, 40);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Restauration des couleurs et de la police
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
	// Donn�es
	for($i = 0 ; $i < count($design) ; $i++)
	{
		$this->Cell($w[0],6,$design[$i],1,0,'LR');
		$this->Cell($w[1],6,$quantity[$i],1,0,'LR');
		$this->Cell($w[2],6,number_format($pu[$i],0,',','.'),1,0,'LR');
		$this->Cell($w[3],6,number_format($total[$i],0,',','.'),1,0,'LR');
		$this->Ln();	
	}
	// Trait de terminaison
    $this->Cell($w[0] + $w[1]+ $w[2], 7, 'Total', 1, 0, 'LR');
    $this->Cell($w[3], 7, number_format($toPay,0,',','.'),1,1,'LR');
    $this->Cell(array_sum($w),0,'','T');
}

}
if(isset($_GET['buyId'])) {
$invoiceNumber=$_GET['buyId'];
$request = mysqli_query($con,"SELECT qte,idVoit,idCli,date_format(date,'%d %M %Y') as date FROM achat WHERE numFact = '$invoiceNumber'");
$mois_anglais = array(
    'January' => 'janvier',
    'February' => 'février',
    'March' => 'mars',
    'April' => 'avril',
    'May' => 'mai',
    'June' => 'juin',
    'July' => 'juillet',
    'August' => 'août',
    'September' => 'septembre',
    'October' => 'octobre',
    'November' => 'novembre',
    'December' => 'décembre'
    );
$design = [];
$pu = [];
$quantity = [];
$total = [];
$carId = [];
$count = 0 ;

while($row =  mysqli_fetch_assoc($request)){
	$clientId=$row["idCli"];
	$date=$row["date"];
    $quantity[$count] = $row["qte"];
    $carId[$count] = $row["idVoit"];
    $request1 = mysqli_query($con,"SELECT design,prix FROM voiture WHERE idVoit = '$carId[$count]'");
    while($row1 = mysqli_fetch_assoc($request1)){
        $design[$count]=$row1["design"];
        $pu[$count] = $row1["prix"];
        $total[$count]=$quantity[$count] * $pu[$count];
    }
    $count++;
}
$toPay = 0 ;
for($i = 0 ; $i < $count ; $i++){
    $toPay = $toPay + $total[$i];
}
$requestClient=mysqli_query($con,"SELECT nom,contact FROM client WHERE idCli='$clientId'");
$clientRow=mysqli_fetch_assoc($requestClient);
$client=$clientRow['nom'];
$contact=$clientRow['contact'];
$parts=explode(' ',$date);
$day=$parts[0];
$month=$mois_anglais[$parts[1]];
$year=$parts[2];
$date_fr=$day.' '.$month.' '.$year;
$numberToLetter=nombreEnLettres($toPay);
$pdf = new PDF();
// Titres des colonnes
$header = array('Design', 'Quantite', 'Prix Unitaire', 'Total');
// Chargement des donn�es
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->TitleInvoice($invoiceNumber);
$pdf->corps($client,$date_fr,$contact);
$pdf->ImprovedTable($header,$design,$pu,$quantity,$total,$toPay);
$pdf->ln(4);
$pdf->Cell(40,10,"Arrete par la presente facture a la somme de $numberToLetter ariary");
$pdf->Output("NumberINvoice_N°$invoiceNumber.pdf",'F');
$pdf->Output();
}
?>
