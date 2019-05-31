<?php


namespace App\ManageFiles;


use App\Models\Client;
use App\Models\File;
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

        return $this->getDirectories()->concat($this->getFiles());

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
                'date' => '',
                'category' => '',
            ];
        });
        return $directories;
    }

    private function getFiles()
    {
        $files = File::where('directory', $this->getPath())->get();

        $files = $files->map(function ($item) {
            return [
                'name' => $item->name,
                'path' => $item->path,
                'type' => $item->extension,
                'date' => $item->month . ' ' . $item->year,
                'category' => $item->category->name,
            ];
        });

        return $files;
    }

    private function getPath()
    {
        $routeFiles = ($this->routeFiles) ? '/' . $this->routeFiles : '';
        return $this->root . $routeFiles;
    }


    public function getRootFile($nit = '')
    {
        $root = env('ROOT_FILES', '/');
        return (preg_match('/\/$/', $root) ?
            $root . $nit :
            $root . '/' . $nit);
    }

    public function directories($nit)
    {

        $directoriesPath = $this->getRootFile($nit);
        $directories = collect(Storage::allDirectories($directoriesPath));
        $directories->prepend($this->getRootFile() . $nit);

        return $directories;
    }
}
