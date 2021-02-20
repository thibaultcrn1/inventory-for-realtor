<?php
if($_POST){
    require('fpdf/fpdf.php');
    $name = $_POST['usname'];
    $dob = $_POST['dob'];
    $job = $_POST['job'];
    $title = 'User Report';

    $pdf = new FPDF();
    $pdf -> AddPage();
    $pdf->SetTitle($title);
    // Arial bold 15
    $pdf->SetFont('Arial','B',15);
    // Calculate width of title and position
    $w = $pdf->GetStringWidth($title)+6;
    $pdf->SetX((210-$w)/2);
    // Colors of frame, background and text
    $pdf->SetDrawColor(221,221,221,1);
    $pdf->SetFillColor(10,158,0,1);
    $pdf->SetTextColor(255,255,255,1);
    // Thickness of frame (1 mm)
    $pdf->SetLineWidth(1);
    // Title
    // Cell(width, height, content, border, nextline parametters, alignement[c - center], fill)
    $pdf->Cell($w, 9, $title, 1, 1, 'C', true);
    // Line break
    $pdf->Ln(10);

    $pdf->SetTextColor(0,0,0,1);
    $w = $pdf->GetStringWidth($job)+6;
    $pdf->SetX((170-$w)/2);
    $pdf->Cell(40, 10, 'Nom:', 1, 0, 'C');
    $pdf->Cell($w, 10, $name, 1, 1, 'C');

    $pdf->SetX((170-$w)/2);
    $pdf->Cell(40, 10, 'DOB:', 1, 0, 'C');
    $pdf->Cell($w, 10, $dob, 1, 1, 'C');

    $pdf->SetX((170-$w)/2);
    $pdf->Cell(40, 10, 'Métier:', 1, 0, 'C');
    $pdf->Cell($w, 10, $job, 1, 1, 'C');
    $pdf->Output();
}
?>

<?php include 'includes/header.php'; ?>

<div class="container">
    <form action='' method="POST">
        <input type="text" name="usname" placeholder="Name" required>
        <input type="text" name="dob" placeholder="DOB" required>
        <input type="text" name="job" placeholder="Current Job" required>
        <input type="submit" value="Add User">
    </form>
</div>

<?php include 'includes/footer.php'; ?>