<?php 

// i use it laravel. where all file in vendor.. all data come to database and convert in excel file.

    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Style\Fill;
    use PhpOffice\PhpSpreadsheet\Style\Border;
    use Yajra\DataTables\Html\Editor\Fields\Select;

    ini_set('max_execution_time', 0);
    ini_set('memory_limit', '-1');
    date_default_timezone_set('asia/dhaka');


    $frm = date('Y-m', strtotime($request->date));
    $branch_code = $request->branch_code;
    $data = DB::connection(' database_name ')->table(' table_name')->where( 'condition' )->get();

        //dd($data);
    if (count($data) <= 0) { 
        return redirect()->back()->with('warning', 'Data not found.');
    }

    $spreadsheet = new Spreadsheet();
    $spreadsheet->getProperties()->setTitle("Noninstall Contract info");

    $spreadsheet->createSheet();
    $spreadsheet->setActiveSheetIndex(0);
    $spreadsheet->getActiveSheet(0)->setTitle("Noninstall Contract info Report");

    $spreadsheet->getActiveSheet()->SetCellValue("A1", strtoupper('SN'));
    $spreadsheet->getActiveSheet()->SetCellValue("B1", strtoupper('Record Type'));
    $spreadsheet->getActiveSheet()->SetCellValue("C1", strtoupper('Fi Code'));
    $spreadsheet->getActiveSheet()->SetCellValue("D1", strtoupper('Branch Code'));
    $spreadsheet->getActiveSheet()->SetCellValue("E1", strtoupper('Fi SubJect Code'));

    $spreadsheet->getActiveSheet()->SetCellValue("F1", strtoupper('Fi Subject Code Old '));
    $spreadsheet->getActiveSheet()->SetCellValue("G1", strtoupper('FI Contract Code '));
    $spreadsheet->getActiveSheet()->SetCellValue("H1", strtoupper('Fi Contract Old Code'));
    $spreadsheet->getActiveSheet()->SetCellValue("I1", strtoupper('Contract Type'));
    $spreadsheet->getActiveSheet()->SetCellValue("J1", strtoupper('Contract Phase'));

    $spreadsheet->getActiveSheet()->SetCellValue("K1", strtoupper('Contract Status'));
    $spreadsheet->getActiveSheet()->SetCellValue("L1", strtoupper('Currency Code'));
    $spreadsheet->getActiveSheet()->SetCellValue("M1", strtoupper('Currency Code Of credit'));
    $spreadsheet->getActiveSheet()->SetCellValue("N1", strtoupper('Starting Date Of the Contract'));
    $spreadsheet->getActiveSheet()->SetCellValue("O1", strtoupper('Request Date of the Contract'));

    $spreadsheet->getActiveSheet()->SetCellValue("P1", strtoupper('Planned End Date Of The Contract'));
    $spreadsheet->getActiveSheet()->SetCellValue("Q1", strtoupper('Actual End Date Of The Contract'));
    $spreadsheet->getActiveSheet()->SetCellValue("R1", strtoupper('Default Status'));
    $spreadsheet->getActiveSheet()->SetCellValue("S1", strtoupper('Date Of Last Payment'));
    $spreadsheet->getActiveSheet()->SetCellValue("T1", strtoupper('Flag Subsidized Credit'));

    $spreadsheet->getActiveSheet()->SetCellValue("U1", strtoupper('Flag Pre Finance Of Laon'));
    $spreadsheet->getActiveSheet()->SetCellValue("V1", strtoupper('Code Reorganized Credit'));
    $spreadsheet->getActiveSheet()->SetCellValue("W1", strtoupper('Third Party Guarantee Type'));
    $spreadsheet->getActiveSheet()->SetCellValue("X1", strtoupper('Security Type'));
    $spreadsheet->getActiveSheet()->SetCellValue("Y1", strtoupper('Amount Guaranteed BY Third Party Guarantor '));

    $spreadsheet->getActiveSheet()->SetCellValue("Z1", strtoupper('amount_guaranteed_by_security_type'));
    $spreadsheet->getActiveSheet()->SetCellValue("AA1", strtoupper('Basis For classification Qualitative Judgment'));
    $spreadsheet->getActiveSheet()->SetCellValue("AB1", strtoupper('Sanction Limit'));
    $spreadsheet->getActiveSheet()->SetCellValue("AC1", strtoupper('Total OutStanding Amount '));
    $spreadsheet->getActiveSheet()->SetCellValue("AD1", strtoupper(' NR of Days of Payment Delay '));

    $spreadsheet->getActiveSheet()->SetCellValue("AE1", strtoupper('Overdue Amount'));
    $spreadsheet->getActiveSheet()->SetCellValue("AF1", strtoupper('Recovery Date'));
    $spreadsheet->getActiveSheet()->SetCellValue("AG1", strtoupper('Recovery during the reporting Period'));
    $spreadsheet->getActiveSheet()->SetCellValue("AH1", strtoupper('Curmulative Recovery'));
    $spreadsheet->getActiveSheet()->SetCellValue("AI1", strtoupper('Date Of Law Suit'));


    $spreadsheet->getActiveSheet()->GetStyle("A1:BT1")->getFont()->setBold(true);

    $spreadsheet->getActiveSheet()->GetColumnDimension("A")->SetAutoSize(true);
    $spreadsheet->getActiveSheet()->GetColumnDimension("B")->SetAutoSize(true);
    $spreadsheet->getActiveSheet()->GetColumnDimension("C")->SetAutoSize(true);
    $spreadsheet->getActiveSheet()->GetColumnDimension("D")->SetAutoSize(true);
    $spreadsheet->getActiveSheet()->GetColumnDimension("E")->SetAutoSize(true);

    $spreadsheet->getActiveSheet()->GetColumnDimension("F")->SetAutoSize(true);
    $spreadsheet->getActiveSheet()->GetColumnDimension("G")->SetAutoSize(true);
    $spreadsheet->getActiveSheet()->GetColumnDimension("H")->SetAutoSize(true);
    $spreadsheet->getActiveSheet()->GetColumnDimension("I")->SetAutoSize(true);
    $spreadsheet->getActiveSheet()->GetColumnDimension("J")->SetAutoSize(true);

    $spreadsheet->getActiveSheet()->GetColumnDimension("K")->SetAutoSize(true);
    $spreadsheet->getActiveSheet()->GetColumnDimension("L")->SetAutoSize(true);
    $spreadsheet->getActiveSheet()->GetColumnDimension("M")->SetAutoSize(true);
    $spreadsheet->getActiveSheet()->GetColumnDimension("N")->SetAutoSize(true);
    $spreadsheet->getActiveSheet()->GetColumnDimension("O")->SetAutoSize(true);

    $spreadsheet->getActiveSheet()->GetColumnDimension("P")->SetAutoSize(true);
    $spreadsheet->getActiveSheet()->GetColumnDimension("Q")->SetAutoSize(true);
    $spreadsheet->getActiveSheet()->GetColumnDimension("R")->SetAutoSize(true);
    $spreadsheet->getActiveSheet()->GetColumnDimension("S")->SetAutoSize(true);
    $spreadsheet->getActiveSheet()->GetColumnDimension("T")->SetAutoSize(true);

    $spreadsheet->getActiveSheet()->GetColumnDimension("U")->SetAutoSize(true);
    $spreadsheet->getActiveSheet()->GetColumnDimension("V")->SetAutoSize(true);
    $spreadsheet->getActiveSheet()->GetColumnDimension("W")->SetAutoSize(true);
    $spreadsheet->getActiveSheet()->GetColumnDimension("X")->SetAutoSize(true);
    $spreadsheet->getActiveSheet()->GetColumnDimension("Y")->SetAutoSize(true);

    $spreadsheet->getActiveSheet()->GetColumnDimension("Z")->SetAutoSize(true);
    $spreadsheet->getActiveSheet()->GetColumnDimension("AA")->SetAutoSize(true);
    $spreadsheet->getActiveSheet()->GetColumnDimension("AB")->SetAutoSize(true);
    $spreadsheet->getActiveSheet()->GetColumnDimension("AC")->SetAutoSize(true);
    $spreadsheet->getActiveSheet()->GetColumnDimension("AD")->SetAutoSize(true);

    $spreadsheet->getActiveSheet()->GetColumnDimension("AE")->SetAutoSize(true);
    $spreadsheet->getActiveSheet()->GetColumnDimension("AF")->SetAutoSize(true);
    $spreadsheet->getActiveSheet()->GetColumnDimension("AG")->SetAutoSize(true);
    $spreadsheet->getActiveSheet()->GetColumnDimension("AH")->SetAutoSize(true);
    $spreadsheet->getActiveSheet()->GetColumnDimension("AI")->SetAutoSize(true);



    $count = 2;
    $sn = 1;
    foreach ($data as $row) {

    $spreadsheet->getActiveSheet()->setCellValueExplicit('A' . $count, $sn++, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $spreadsheet->getActiveSheet()->setCellValueExplicit('B' . $count, $row->record_type, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $spreadsheet->getActiveSheet()->setCellValueExplicit('C' . $count, $row->fi_code, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $spreadsheet->getActiveSheet()->setCellValueExplicit('D' . $count, $row->branch_code, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $spreadsheet->getActiveSheet()->setCellValueExplicit('E' . $count, $row->fi_subject_code, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);

    $spreadsheet->getActiveSheet()->setCellValueExplicit('F' . $count, $row->fi_subject_code_old, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $spreadsheet->getActiveSheet()->setCellValueExplicit('G' . $count, $row->fi_contract_code, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $spreadsheet->getActiveSheet()->setCellValueExplicit('H' . $count, $row->fi_contract_code_old, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $spreadsheet->getActiveSheet()->setCellValueExplicit('I' . $count, $row->contract_type, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $spreadsheet->getActiveSheet()->setCellValueExplicit('J' . $count, $row->contract_phase, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);

    $spreadsheet->getActiveSheet()->setCellValueExplicit('K' . $count, $row->contract_status, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $spreadsheet->getActiveSheet()->setCellValueExplicit('L' . $count, $row->currency_code, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $spreadsheet->getActiveSheet()->setCellValueExplicit('M' . $count, $row->currency_code_of_credit, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $spreadsheet->getActiveSheet()->setCellValueExplicit('N' . $count, $row->starting_date_of_the_contract, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $spreadsheet->getActiveSheet()->setCellValueExplicit('O' . $count, $row->request_date_of_the_contract, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);

    $spreadsheet->getActiveSheet()->setCellValueExplicit('P' . $count, $row->planned_end_date_of_the_contract, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $spreadsheet->getActiveSheet()->setCellValueExplicit('Q' . $count, $row->actual_end_date_of_the_contract, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $spreadsheet->getActiveSheet()->setCellValueExplicit('R' . $count, $row->default_status, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $spreadsheet->getActiveSheet()->setCellValueExplicit('S' . $count, $row->date_of_last_payment, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $spreadsheet->getActiveSheet()->setCellValueExplicit('T' . $count, $row->flag_subsidized_credit, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);

    $spreadsheet->getActiveSheet()->setCellValueExplicit('U' . $count, $row->flag_pre_finance_of_loan, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $spreadsheet->getActiveSheet()->setCellValueExplicit('V' . $count, $row->code_reorganized_credit, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $spreadsheet->getActiveSheet()->setCellValueExplicit('W' . $count, $row->third_party_guarantee_type, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $spreadsheet->getActiveSheet()->setCellValueExplicit('X' . $count, $row->security_type, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $spreadsheet->getActiveSheet()->setCellValueExplicit('Y' . $count, $row->amount_guaranteed_by_third_party_guarantor, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);

    $spreadsheet->getActiveSheet()->setCellValueExplicit('Z' . $count, $row->amount_guaranteed_by_security_type, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $spreadsheet->getActiveSheet()->setCellValueExplicit('AA' . $count, $row->basis_for_classification_qualitative_judgment, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $spreadsheet->getActiveSheet()->setCellValueExplicit('AB' . $count, $row->sanction_limit, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $spreadsheet->getActiveSheet()->setCellValueExplicit('AC' . $count, $row->total_outstanding_amount, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $spreadsheet->getActiveSheet()->setCellValueExplicit('AD' . $count, $row->nr_of_days_of_payment_delay, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);

    $spreadsheet->getActiveSheet()->setCellValueExplicit('AE' . $count, $row->overdue_amount, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $spreadsheet->getActiveSheet()->setCellValueExplicit('AF' . $count, $row->recovery_due, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $spreadsheet->getActiveSheet()->setCellValueExplicit('AG' . $count, $row->recovery_during_the_reporting_period, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $spreadsheet->getActiveSheet()->setCellValueExplicit('AH' . $count, $row->cumulative_recovery, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $spreadsheet->getActiveSheet()->setCellValueExplicit('AI' . $count, $row->date_of_law_suit, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);

    //$spreadsheet->getActiveSheet()->getStyle('CA' . $count)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ff8080');
    $count++;
    } // end :: loops

    $filename = 'Noninstall-' . date('YMd'). '.xlsx';
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');
    header('Cache-Control: max-age=1');
    $write = IOFactory::createWriter($spreadsheet, 'Xlsx');
    $write->save('php://output');
    die();



    ?>