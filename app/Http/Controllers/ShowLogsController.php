<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowLogsController extends Controller
{
    //

    public function index()
  {
      $customerLogs = file(storage_path('logs/customer.log'));
      $customerLogData = [];
  
      foreach ($customerLogs as $log) {
          // Extract JSON data from the log entry
          preg_match('/\{.*\}/', $log, $matches);
          $logData = json_decode($matches[0], true);
          
          if ($logData !== null) {
              $customerLogData[] = $logData;
          }
      }
  
      // Reverse the array to get data in descending order
      $customerLogData = array_reverse($customerLogData);
  
      return view('pages.logs.extra', ['customerLogs' => $customerLogData]);
  }
  
}
