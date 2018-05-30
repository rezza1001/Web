<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\Controller;

use App\Post;
use App\Subscribe;
use App\User;
use Auth;

use PHPExcel;
use PHPExcel_IOFactory;
use PHPExcel_Style_Border;
use PHPExcel_Style_Fill;

class ExportController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}
	public function index() {
		$user = Auth::user();
			return redirect('/');
	}
	public function subscriber() {
		$subscribes = Subscribe::latest('created_at')->paginate(20);
		return view('admin.subscribe.index', compact('subscribes'));
	}
	public function export() {
		$subscribes  = Subscribe::latest('created_at')->get();
		$objPHPExcel = new PHPExcel();
		// Set document properties
		$objPHPExcel->getProperties()->setCreator("KOKIKU")
		            ->setLastModifiedBy("KOKIKU")
		            ->setTitle("Office 2007 XLSX KOKIKU")
		            ->setSubject("Office 2007 XLSX KOKIKU")
		            ->setDescription("KOKIKU.")
		            ->setKeywords("office 2007 openxml php")
		            ->setCategory("KOKIKU");

		// Add some data
		$objPHPExcel->setActiveSheetIndex(0)
		            ->setCellValue('A1', 'Email')
		            ->setCellValue('B1', 'Status')
		            ->setCellValue('C1', 'Reason');
		$i = 1;
		foreach ($subscribes as $subscribe) {
			$i++;
			if ($subscribe->status == 1) {
				$status = 'Subscribed';
			} else {
				$status = 'Unubscribed';
			}
			$objPHPExcel->setActiveSheetIndex(0)
			            ->setCellValue('A'.$i, $subscribe->email)
				->setCellValue('B'.$i, $status)
				->setCellValue('C'.$i, $subscribe->message);
		}
		// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle('Subscriber');
		$objPHPExcel->getActiveSheet()->getColumnDimension("A")->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension("B")->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension("C")->setAutoSize(true);

		foreach ($objPHPExcel->getActiveSheet()->getRowDimensions() as $rd) {
			$rd->setRowHeight(24);
		}

		$objPHPExcel->getActiveSheet()->getStyle("A1")->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle('A1:C1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
		$objPHPExcel->getActiveSheet()->getStyle('A1:C1')->getFill()->getStartColor()->setARGB('ffff99');
		$objPHPExcel->getActiveSheet()->getStyle("A1:C1")->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle('A1:C1')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Subscriber.xls"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');// Date in the past
		header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');// always modified
		header('Cache-Control: cache, must-revalidate');// HTTP/1.1
		header('Pragma: public');// HTTP/1.0

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		exit;
	}
}
