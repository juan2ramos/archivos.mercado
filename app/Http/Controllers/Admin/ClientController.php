<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\ManageFiles\ViewFiles;
use App\Models\Category;
use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:isAdmin')->except('show', 'filesByClient');
    }

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

        $isFileCreated = Auth::user()->isAdmin();

        if (!$isFileCreated && Gate::denies('authorizedClient', $client)) {
            return redirect()->route('dashboard');
        }

        $files = $viewFiles->clientFiles($client);
        
        if (request()->isJson()) {
            return $files;
        }

        return view('admin.users.show', compact('client', 'files', 'isFileCreated'));
    }

    public function edit(Client $client)
    {
        return view('admin.users.edit', compact('client'));
    }

    public function update(UpdateClientRequest $request, Client $client, ViewFiles $viewFiles)
    {
        $client = $request->updateClient($viewFiles);

        return redirect()->route('users.edit', $client->nit)->with(['success' => 'Usuario actulizado']);
    }

    public function destroy(Client $client)
    {
        if (Gate::denies('isAdmin')) {
            abort(404);
        }
        $user = $client->user();
        $client->delete();
        $user->delete();
        return ['success' => true];
    }

    public function uploadFile(Client $client, ViewFiles $viewFiles)
    {
        $categories = Category::all();
        $directories = $viewFiles->directories($client->nit);

        return view('admin.users.uploadFile', compact('client', 'categories', 'directories'));
    }

    public function filesByClient(ViewFiles $viewFiles)
    {

        $client = Auth::user()->client;
        return $this->show($client, $viewFiles);

    }

}
