<?php
namespace App\Services;

use Carbon\Carbon;

class CommonService
{

    public static function generateInvoiceWeeks(): array
    {
        $RunningYear=Carbon::now()->format('Y');
       // dd($RunningYear);
        $lastMonth=Carbon::now()->addMonth(-1)->format('M Y');
        //dd($lastMonth);
        $startDate=Carbon::parse($RunningYear)->modify('last fri');
       // dd($startDate);
        $endDate=Carbon::parse( $lastMonth)->modify('last sat');
       // dd($endDate);
        for ($weeks=[]; $endDate <= $startDate; $startDate->modify('-1 week')){
            $key=$startDate->format('W-Y');
            $from=$startDate->format('Y-m-d');
            $to= (clone $startDate)->modify('-6 days')->format('Y-m-d');
           // dd($to);
            $weeks["W$key"] = $from .' / '. $to;
          //  dd($weeks);
        }

        return $weeks;
    }

    public static function generateInvoicNumber(): string
    {
        return "FGM".Carbon::now()->format('Y-m')."-".time();
    }

    public static function generateInvoiceMonths(): array
    {
        $RunningYear=Carbon::now()->format('Y');
       // dd($RunningYear);
        $lasYear=Carbon::now()->addYear(-1)->format('M Y');
      //  dd($lasYear);
        $startDate=Carbon::parse($RunningYear)->startOfMonth();
      //  dd($startDate);
        $endDate=Carbon::parse( $lasYear);
       // dd($endDate);
        for ($month=[]; $endDate <= $startDate; $startDate->modify('-1 month')){
            $key=$startDate->format('m-Y');
           // dd($key);
            $from=$startDate->format('Y-m-d');
            $to= (clone $startDate)->modify('-1 month')->format('Y-m-d');
           // dd($to);
            $month["M$key"] = $from .' / '. $to;
          //  dd($month);
        }

        return $month;
    }
}

?>
