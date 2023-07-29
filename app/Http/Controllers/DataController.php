<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\TData;

class DataController extends Controller
{
    public function index(){

        $DataDiri = array(
            'title' => 'Test Web Developer',
            'company' => 'R17 Group',
            'nama' => 'Muludin Faqih',
            'email' => 'mauludinfaqih1@gmail.com',
        );

        $TData = TData::select('*')->get();

        return view('index',compact('TData','DataDiri'));
    }

    public function insertDataFromURL(Request $req){
        
        $client = new Client();
        $url = $req->urls;

        //Validate URL
        $validate = $req->validate([
            'urls' => 'required|url'
        ]);

        //Get Response
        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody());

        //Validate Data
        $check = TData::select('id')->get();
        if(count($check) != 0){
            return $response = response()->json([
                'title' => 'Data Available',
                'icon' => 'info',
                'text' => 'Currently data is available',
                'msg' => '2',
            ]);
        }
        
        if($responseBody != null){
            //Insert To Database
            foreach($responseBody as $value){
                $InsertTData = new TData();
                $InsertTData->nama = $value->nama;
                $InsertTData->jabatan = $value->jabatan;
                $InsertTData->jenis_kelamin = $value->jenis_kelamin;
                $InsertTData->alamat = $value->alamat;
                $insert = $InsertTData->save();
            }
            $response = response()->json([
                'title' => 'Success',
                'icon' => 'success',
                'text' => 'Data has been entered into the database',
                'msg' => '1',
            ]);
        }else{
            $response = response()->json([
                'title' => 'Empty Data',
                'icon' => 'question',
                'text' => 'Empty data in the url',
                'msg' => '0',
            ]);
        }

        return $response;
    }

    public function getDatatables(){
        
        $Data = DB::table('t_data')
        ->select(
            't_data.id as ID',
            't_data.nama as Nama',
            't_data.jabatan as Jabatan',
            't_data.jenis_kelamin as JenisKelamin',
            't_data.alamat as Alamat',
        )->get();
        return Datatables::of($Data)
        ->addColumn('modify', '
            <a data-placement="top" data-id="{{$ID}}" data-bs-toggle="modal" data-bs-target="#ModalEdit" type="button" class="EditData btn btn-primary btn-sm text-white" title="Edit" >Edit</a>
        ')
        ->addColumn('delete', '
            <a data-placement="top" data-id="{{$ID}}" data-bs-toggle="modal" data-bs-target="#ModalDelete" type="button" class="delData btn btn-danger btn-sm text-white" title="Delete" >Delete</a>
        ')
        ->rawColumns(['modify', 'delete'])
        ->removeColumn('ID')
        ->make(true);
    }

    public function postDeleteData(Request $req){

		$ID = $req->id;

        //Remove Data
        TData::where('id',$ID)->delete();

        return redirect()->back()->with('Success', 'Success, Data Has Been Delete'); 
	}

    public function postEditData(Request $req){

        $ID = $req->id;
        //Edit Data
        TData::where('id',$ID)
		->update([
			'nama' => $req->NamaEdit,
			'jabatan' => $req->JabatanEdit,
			'jenis_kelamin' => $req->JenisKelaminEdit,
			'alamat' => $req->AlamatEdit
		]);

        return redirect()->back()->with('Success', 'Success, Data Has Been Update'); 
    }

    public function postAddNewData(Request $req){

        $InsertTData = new TData();
        $InsertTData->nama = $req->NamaAdd;
        $InsertTData->jabatan = $req->JabatanAdd;
        $InsertTData->jenis_kelamin = $req->JenisKelaminAdd;
        $InsertTData->alamat = $req->AlamatAdd;
        $insert = $InsertTData->save();

        return redirect()->back()->with('Success', 'Success, Data Has Been Add'); 
    }
}
