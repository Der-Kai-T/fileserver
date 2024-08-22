<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileController extends Controller
{
    public function index()
    {
        $this->check_permission("file.index");
        return view('app.file.index', [
            "files" => File::all()
        ]);
    }

    public function download(File $file)
    {
        return Storage::disk("local")->download($file->storagePath.$file->file_name, $file->title.".".$file->file_type);
    }

    public function create()
    {
        $this->check_permission("file.create");
        return view('app.file.form', []);
    }

    public function store(Request $request)
    {
        $this->check_permission("file.create");
        $data = $request->validate([
            'title' => 'required',
            'file' => 'required|file',
            'note' => ['nullable', 'string'],
        ]);

        $path = (new File())->storagePath;

        //upload file
        if ($request->file('file')) {
            $file = $request->file('file');
            $original_name = $file->getClientOriginalName();
            $file_type = explode(".", $original_name);
            $file_type = $file_type[count($file_type) - 1];

            $new_name = $this->genereate_new_file_name() . "." . strtolower($file_type);

            $file_model = File::create([
                "title" => $data['title'],
                "file_name" => $new_name,
                "note" => $data['note'],
                "file_type" => $file_type,
            ]);

            $request->file->storeAs($path, $new_name, 'local');

            return redirect("/edit/file/$file_model->id/edit")->with("success", "Datei erfolgreich hochgeladen");
        }


    }

    public function edit(File $file)
    {
        $this->check_permission("file.update");
        return view("app.file.form", [
            "file" => $file
        ]);
    }

    public function update(Request $request, File $file)
    {
        $this->check_permission("file.update");
        $data = $request->validate([
            'title' => 'required',
            'note' => ['nullable', 'string'],
        ]);

        $file->update($data);

        return redirect("/edit/file/$file->id/edit")->with("success", "Datei erfolgreich bearbeitet");
    }

    public function destroy(File $file)
    {
        $this->check_permission("file.destroy");
        $file_title = $file->title;

        //delete file from storage
        Storage::disk("public")->delete($file->storagePath . $file->file_name);

        //delete file from database
        $file->delete();


        return redirect("/edit/file/")->with("success", "Datei $file_title gelöscht");
    }


    protected function genereate_new_file_name()
    {

        return Str::uuid();
    }
}
