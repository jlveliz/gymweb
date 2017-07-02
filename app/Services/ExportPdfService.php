<?php
namespace GymWeb\Services;

use PDF;

/**
* 
*/
class ExportPdfService 
{
	

	private $memberReportFileName  = "member_report";
	private $memberReportFileView  = "admin.exports.memberassistance";

	
	private function export($filename,$view,$data) {

		$pdf = PDF::loadView($view, compact('data'));
		return $pdf->stream($filename.'.pdf');
	}


	public function exportAssistance($data)
	{
		return $this->export($this->memberReportFileName,$this->memberReportFileView,$data);
	}

}