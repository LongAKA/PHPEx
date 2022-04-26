<?php
require_once('../TCPDF-main/tcpdf.php');

/* create new PDF document */
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

/* set document information */
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 001');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');


/* set header and footer fonts */
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

/* set default monospaced font */
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

/* set margins */
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

/* set auto page breaks
 $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);*/

/* set image scale factor 
 $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); */

/* set some language-dependent strings (optional) */
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

/* --------------------------------------------------------- */

/* set default font subsetting mode */
$pdf->setFontSubsetting(true);

/* Set font
 dejavusans is a UTF-8 Unicode font, if you only need to
 print standard ASCII chars, you can use core fonts like
 helvetica or times to reduce file size. */
$pdf->SetFont('dejavusans', '', 14, '', true);

/* Add a page */
/* This method has several options, check the source code documentation for more information. */
$pdf->AddPage();

/* set text shadow effect */
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196),
 'opacity'=>1, 'blend_mode'=>'Normal'));

/* Set some content to print */
$html = 
'<div style="display: flex; flex-direction: row;">
    <div class="bm_e">
        <p >TRƯỜNG THỰC HÀNH SƯ PHẠM</p>
        <h3 style="font-size: 12px;">BAN WEBSITE & TRUYỀN THÔNG</h3>
    </div>
    <div class="bm_e">
        <h3>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</h3>
        <h3 style="text-align: center;">ĐỘC LẬP TỰ DO HẠNH PHÚC</h3>
        <span style="text-transform: inherit; padding-left: 70px">Trà Vinh, ngày 12 tháng 5 năm 2022</span>
    </div>
</div>
    <h2 class="h2_aa">BẢNG KÊ BÀI VIẾT TRÊN TRANG WEB<br>TRƯỜNG THỰC HÀNH SƯ PHẠM TỪ THÁNG <input type="text" class="txt_a1" name="txt_month" required> ĐẾN THÁNG <input type="text" class="txt_a1" name="txt_month1" required> NĂM 2021</h2>

    <div class="form-excel">
        <p>Căn cứ quyết định số 245/QĐ_THSP ngày 22/09/2016 của Hiệu trưởng Trường Thực hành Sư phạm về việc thành lập Ban Website và truyền thông Trường Thực hành Sư phạm</p>
        <p>Căn cứ qui chế chi tiêu nội bộ của Trường Thực hành Sư phạm</p>
        <p>Căn cứ vào số lượng bài viết đăng trên website Trường Thực hành Sư phạm.</p>
        <p>Ban Website và Truyền thông lập danh sách bài viết đăng trên website của trường từ tháng 4 đến tháng 10 năm 2021 như sau:</p>
    </div>';

/* Print text using writeHTMLCell() */
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

/* --------------------------------------------------------- */

/* Close and output PDF document
 This method has several options, check the source code documentation for more information. */
$pdf->Output('example_001.pdf', 'I');

/*============================================================+
 END OF FILE
 ============================================================+*/