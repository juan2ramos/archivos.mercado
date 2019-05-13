<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateClientRequest;
use App\ManageFiles\ViewFiles;
use App\Models\Category;
use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function index(Request $request)
    {
        $clients = ($search = $request->search) ? Client::search($search) : collect();

        return view('admin.users.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(CreateClientRequest $request)
    {
        $request->createClient();

        return redirect()->back()->with(['success' => 'Usuario creado ']);
    }

    public function show(Client $client, ViewFiles $viewFiles)
    {

        $files = $viewFiles->clientFiles($client);

        if (request()->isJson()) {
            return $files;
        }

        return view('admin.users.show', compact('client', 'files'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        return ['success' => true];
    }

    public function uploadFile(Client $client, ViewFiles $viewFiles)
    {
        $categories = Category::all();
        $directories = $viewFiles->directories($client->nit);

        return view('admin.users.uploadFile', compact('client', 'categories', 'directories'));
    }

}
