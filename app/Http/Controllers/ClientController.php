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
}
