<?php
require_once "DOMPDF/dompdf_config.inc.php";
if(isset($_POST['html'])){

$html =$_POST['html'];

$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("download.pdf");

}

?>


<FORM ACTION="" METHOD=POST>

HTML:<BR>
<TEXTAREA NAME="html" COLS=40 ROWS=6></TEXTAREA>

<P><INPUT TYPE=SUBMIT VALUE="submit">
</FORM>

