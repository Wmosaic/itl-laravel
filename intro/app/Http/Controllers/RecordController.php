<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    private Request $request;

    function __construct(Request $request)
    {
        $this->request = $request;
    }

    function serve()
    {
        $records = Record::whereNull('delete_date')->get();
        $data = [
            'records' => $records,
        ];

        return view('records', $data);
    }

    function create()
    {
        return view('create_record');
    }

    function save()
    {
        $data = $this->request->only('description');
        $message = (Record::create($data)) ? 0 : 1; //buenoomalo
        if($message) //Si malo
        {
            return redirect()->to('create')->with(['message' => "Bad message"]);
        }
        return redirect()->to('records')->with(['message' => "Good message"]);
    }

    function update(int $id){
        $data = $this->request->only('id', 'new-description');


        //Default bad message
        $message = "Bad message";

        if ($record = Record::where('id', $id)->first())
        {
            $message = ($record->fill(['description'=> $data['new-description']])->save())
            ? 0 : 1;

            if($message)
            {
                return redirect()->to('view')->with(['message' => "Bad message"]);
            }
            return redirect()->to('records')->with(['message' => "Good message"]);

        }

        return redirect()->to('view')->with(['message' => $message]);
    }

    function view(int $id)
    {
        if($record = Record::where('id', $id)->first())
        {
            return view('view_record', compact('record'));
        }
        return redirect()->to('records')->with(['message' => "Bad message"]);
    }

    function delete(Record $record)
{

    $record->delete_date = now();
    $success = $record->save();

    if ($success){
        return redirect()->to('records')->with(['message' => "Good message"]);
    }
    return redirect()->to('records')->with(['message' => "Bad message"]);

}

}
