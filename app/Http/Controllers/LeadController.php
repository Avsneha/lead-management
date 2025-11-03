<?php

namespace App\Http\Controllers;

use App\Mail\LeadUpdatedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Lead;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Carbon\Carbon;

class LeadController extends Controller
{
    public function index(Request $request) {
        $leads = Lead::orderBy('date_added','desc')->paginate(10);
        return view('leads.index', compact('leads'));
    }

    public function create() {
        return view('leads.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:leads,email',
            'phone'=>'required',
            'status'=>'required'
        ]);

        Lead::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'status'=>$request->status,
            'date_added'=>Carbon::now(),
            'last_updated'=>now()->setTimezone('Asia/Kolkata'),
        ]);

        return redirect()->route('leads.index')->with('success','Lead added');
    }

    public function edit($id) {
        $lead = Lead::findOrFail($id);
        return view('leads.edit', compact('lead'));
    }

    public function update(Request $request, $id) {
        $lead = Lead::findOrFail($id);

        $request->validate([
            'name'=>'required',
            'email'=>"required|email|unique:leads,email,$id",
            'phone'=>'required',
            'status'=>'required'
        ]);

         $oldStatus = $lead->status;

        $lead->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'status'=>$request->status,
            'last_updated'=>Carbon::now()
        ]);

         // ✅ If status changed, store in history
        if ($oldStatus !== $request->status) {
            \App\Models\LeadHistory::create([
                'lead_id' => $lead->id,
                'old_status' => $oldStatus,
                'new_status' => $request->status,
                'changed_by' => auth()->id(),
                'changed_at' => now()->setTimezone('Asia/Kolkata'),
            ]);
        }

         // Send email notification using Mailtrap
    Mail::to('avsneha99@gmail.com')->send(new LeadUpdatedMail($lead));

        return redirect()->route('leads.index')->with('success','Lead updated');
    }

    public function destroy($id) {
        $lead = Lead::findOrFail($id);
        $lead->delete();
        return redirect()->route('leads.index')->with('success','Lead deleted');
    }

    public function showImportForm() {
        return view('leads.import');
    }

    public function import(Request $request) {
        $request->validate(['file'=>'required|mimes:xlsx,xls']);
        $file = $request->file('file');

        $spreadsheet = IOFactory::load($file->getPathName());
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        $success = 0;
        $failed = 0;

        foreach ($rows as $key=>$row) {
            if($key==0) continue; // skip header
            $name=$row[0] ?? null;
            $email=$row[1] ?? null;
            $phone=$row[2] ?? null;
            $status=$row[3] ?? 'New';

            if(!$name || !$email || !$phone || Lead::where('email',$email)->exists()) {
                $failed++;
                continue;
            }

            Lead::create([
                'name'=>$name,
                'email'=>$email,
                'phone'=>$phone,
                'status'=>$status,
                'date_added'=>Carbon::now(),
                'last_updated'=>Carbon::now()
            ]);
            $success++;
        }

        return redirect()->route('leads.index')
            ->with('success', "Import completed. Success: $success, Failed: $failed");
    }

    public function export() {
        $leads = Lead::all();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->fromArray(['Name','Email','Phone','Status','Date Added'],NULL,'A1');

        $rowNum=2;
        foreach($leads as $lead){
            $sheet->setCellValue('A'.$rowNum,$lead->name);
            $sheet->setCellValue('B'.$rowNum,$lead->email);
            $sheet->setCellValue('C'.$rowNum,$lead->phone);
            $sheet->setCellValue('D'.$rowNum,$lead->status);
            $sheet->setCellValue('E'.$rowNum,$lead->date_added);
            $rowNum++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'leads.xlsx';
        $filePath = public_path($fileName);
        $writer->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }


    public function history($id)
    {
        $lead = Lead::findOrFail($id);
        $history = \App\Models\LeadHistory::where('lead_id', $id)
                    ->orderBy('changed_at', 'desc')
                    ->with('user')
                    ->get();

        return view('leads.history', compact('lead', 'history'));
    }


    
    


    
}
