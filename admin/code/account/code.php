<?php  
require '../vendor/autoload.php';
require("../../include/ketnoi.php");
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Csv;

if(isset($_POST['export_excel_btn']))
{
    $file_ext_name = $_POST['export_file_type'];
    $fileName = "DSTaikhoan";

    $student = "SELECT * FROM tbl_account";
    $query_run = mysqli_query($kn, $student);

    if(mysqli_num_rows($query_run) > 0)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'STT');
        $sheet->setCellValue('B1', 'Tên đăng nhập');
        $sheet->setCellValue('C1', 'Mật khẩu');
        $sheet->setCellValue('D1', 'Họ Tên');
        $sheet->setCellValue('E1', 'Email');

        $rowCount = 2;
        $sn = "1";
        foreach($query_run as $data)
        {
            $sheet->setCellValue('A'.$rowCount, $sn);
            $sheet->setCellValue('B'.$rowCount, $data['Username']);
            $sheet->setCellValue('C'.$rowCount, $data['Password']);
            $sheet->setCellValue('D'.$rowCount, $data['HoTen']);
            $sheet->setCellValue('E'.$rowCount, $data['Email']);
            $rowCount++;
            $sn++;
        }
        
        if($file_ext_name == 'xlsx')
        {
            $writer = new Xlsx($spreadsheet);
            $final_filename = $fileName.'.xlsx';
        }
        elseif($file_ext_name == 'xls')
        {
            $writer = new Xls($spreadsheet);
            $final_filename = $fileName.'.xls';
        }
        elseif($file_ext_name == 'csv')
        {
            $writer = new Csv($spreadsheet);
            $final_filename = $fileName.'.csv';
        }

        // $writer->save($final_filename);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attactment; filename="'.urlencode($final_filename).'"');
        $writer->save('php://output');

    }
    else
    {
        $_SESSION['status'] = "Không có dữ liệu";
        header('Location: index.php');
        exit(0);
    }
}

 ?> 