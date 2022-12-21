<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;


class ClientController extends Controller
{
    public function create(ClientRequest $request)
    {
        $data = $request->all();
        Client::create($data);
        return redirect('/clients/')->with(['success'=>'Client Added!']);
    }

    public function delete($id)
    {
        $data = Client::find($id);
        $data->delete();
        return redirect('/clients/')->with(['success'=>'Client Deleted!']);
    }

    public function editClient($id)
    {
        $data = Client::where('id',$id)->first();
        return view('clientEdit',['data'=>$data]);
    }
    public function updateClient(ClientRequest $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        Client::where('id',$id)->update($data);
        return redirect('/clients/')->with(['success'=>'Client Updated!']);
    }
}
