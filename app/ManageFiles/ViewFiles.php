<?php


namespace App\ManageFiles;


use App\Models\Client;
use Illuminate\Support\Facades\Storage;

class ViewFiles
{
    private $root;
    private $routeFiles;
    private $client;

    public function clientFiles(Client $client)
    {
        $this->client = $client;
        $this->root = $this->getRootFile($this->client->nit);
        $this->routeFiles = request()->get('route_files');
        $this->getFiles();
        return $this->getDirectories();

    }

    private function getDirectories()
    {
        $directories = collect(Storage::directories($this->getPath()));
        $directories = $directories->map(function ($item) {
            $match = explode('/', $item);
            return [
                'name' => end($match),
                'path' => $item,
                'type' => 'directory',
            ];
        });
        return $directories;
    }

    private function getFiles()
    {
        $client = $this->client->load('files');
        return $client->files;
    }

    private function getPath()
    {
        return $this->root . '/' . $this->routeFiles;
    }


    public function getRootFile($nit = '')
    {
        $root = env('ROOT_FILES', '/');
        return (preg_match('/\/$/', $root) ?
            $root . $nit :
            $root . '/' . $nit);
    }

    public function directories($nit){

        $directoriesPath = $this->getRootFile($nit);
        $directories = collect(Storage::allDirectories($directoriesPath));
        $directories->prepend($this->getRootFile().$nit);

        return $directories;
    }
}
