<?php


namespace App\ManageFiles;

use App\Models\Client;
use App\Models\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
                'id' => $item->id,
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


    public function deleteFile($path)
    {
        return Storage::delete($path);
    }

    public function updateDirectory($data)
    {
        DB::transaction(function () use ($data) {
            $path = $this->getRootFile($data['nit']) . '/' . $data['path'];
            $pathBack = $path . $data['nameBack'];
            $pathNew = $path . $data['name'];

            $this->updateDirectoryDB($path, $pathBack, $pathNew);
            $this->createDirectory($pathNew);
            $this->createDirectories($pathBack, $pathNew);
            $this->moveFiles($pathBack, $pathNew);
            $this->removeDirectory($pathBack);
        });

        return $data['name'];
    }

    public function updateNit($data){

        DB::transaction(function () use ($data) {
            $path = $this->getRootFile();
            $pathBack = $path . $data['nameBack'];
            $pathNew = $path . $data['nit'];

            $this->updateDirectoryDB($path, $pathBack, $pathNew);
            $this->createDirectory($pathNew);
            $this->createDirectories($pathBack, $pathNew);
            $this->moveFiles($pathBack, $pathNew);
            $this->removeDirectory($pathBack);
        });
    }

    public function delete($data)
    {
        $path = $this->getRootFile($data['nit']) . '/' . $data['path'] . $data['name'];
        if ($data['isDirectory']) {
            return $this->removeDirectory($path);
        }

        $file = File::findOrFail($data['id']);
        return $file->delete();
    }
    public function removeNit($nit)
    {
        $path = $this->getRootFile() . $nit;
        return $this->removeDirectory($path);
    }
    private function removeDirectory($path)
    {
        return Storage::deleteDirectory($path);
    }

    private function updateDirectoryDB($path, $pathBack, $pathNew)
    {
        DB::table('files')
            ->where('path', 'like', '%' . $path . '%')
            ->update([
                'directory' => DB::raw("REPLACE(directory, '$pathBack', '$pathNew')"),
                'path' => DB::raw("REPLACE(path, '$pathBack', '$pathNew')")
            ]);
    }

    private function moveFiles($pathBack, $pathNew)
    {
        $files = Collect(Storage::allFiles($pathBack));

        $files->map(function ($file) use ($pathBack, $pathNew) {
            Storage::move($file, Str::replaceFirst($pathBack, $pathNew, $file));
        });
    }

    private function createDirectories($pathBack, $pathNew)
    {
        $directories = Collect(Storage::allDirectories($pathBack));

        $directories->map(function ($directory) use ($pathBack, $pathNew) {
            $this->createDirectory(Str::replaceFirst($pathBack, $pathNew, $directory));
        });
    }

    private function createDirectory($path)
    {
        return Storage::makeDirectory($path);
    }
}
