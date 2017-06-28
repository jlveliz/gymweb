<?php

namespace GymWeb\Http\Controllers\Admin\Report;

use Illuminate\Http\Request;
use GymWeb\Http\Controllers\Controller;
use GymWeb\RepositoryInterface\MemberRepositoryInterface;
use GymWeb\RepositoryInterface\MembershipAssistanceDetailRepositoryInterface;
use  GymWeb\Services\ExportExcelService;
use  GymWeb\Services\ExportPdfService;

class MemberReportController extends Controller
{
    
    private $member;
	private $assistance;
    private $excelService;
    private $pdfService;

    function __construct(MemberRepositoryInterface $member, MembershipAssistanceDetailRepositoryInterface $assistance, ExportExcelService $excelService,ExportPdfService $pdfService )
    {
        $this->middleware('auth');
        $this->member = $member;
        $this->assistance = $assistance;
        $this->excelService = $excelService;
        $this->pdfService = $pdfService;

    }

    public function showReports()
    {
        $members = $this->member->enum();
        return view('admin.reports.member',compact('members'));
    }

    public function getAssistance(Request $request)
    {
        $asisstances = $this->assistance->reportCountAssistances($request->all());
        return response()->json($asisstances,200);
    }

    public function printAssistance($request)
    {
        $arrayParams = explode('&', $request);
        $params = [];
        foreach ($arrayParams as $key => $value) {
            $newArr = explode('=', $value);

            $params[ $newArr[0] ] = $newArr[1];
        }
        
        $asisstances = $this->assistance->reportCountAssistances($params);
        

        if ($asisstances) {
            switch ($params['format']) {
                case 'excel':
                    return $this->excelService->exportAssistance($asisstances);
                    break;
                
                default:
                    return $this->pdfService->exportAssistance($asisstances);
                    break;
            }
        }


    }
}
