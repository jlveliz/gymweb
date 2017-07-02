<?php
namespace GymWeb\Services;

use Excel;

/**
* 
*/
class ExportExcelService 
{
	

	private $memberReportFileName  = "member_report";
	private $memberReportFileView  = "admin.exports.memberassistance";

	
	private function export($filename,$view,$data) {

		return Excel::create($filename, function($excel) use ($data,$view) {
		    
		    $excel->sheet('First sheet', function($sheet) use ($data,$view) {
		        $sheet->loadView($view,compact('data'));
		    });

		})->export('xlsx');;
	}


	public function exportAssistance($data)
	{
		return $this->export($this->memberReportFileName,$this->memberReportFileView,$data);
	}

}