<?php

namespace App\Http\Controllers;

use App\Models\EmployeeFolder;
use App\Models\EmployeeFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EmployeeDiskController extends Controller
{
    /**
     * Employee klasörlerini listele
     */
    public function getFolders($employeeId)
    {
        $folders = EmployeeFolder::with('files')
            ->where('employee_id', $employeeId)
            ->where('company_id', auth()->user()->company_id)
            ->get();

        return response()->json(['folders' => $folders]);
    }

    /**
     * Yeni klasör oluştur
     */
    public function createFolder(Request $request, $employeeId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $folder = EmployeeFolder::create([
            'company_id' => auth()->user()->company_id,
            'employee_id' => $employeeId,
            'name' => $request->name,
        ]);

        // Public/files/company_x/employee_y/folder_z klasörünü oluştur
        $path = public_path('files/company_'.$folder->company_id.'/employee_'.$employeeId.'/folder_'.$folder->id);
        if(!File::exists($path)){
            File::makeDirectory($path, 0755, true);
        }

        return response()->json([
            'success' => true,
            'folder' => $folder
        ]);
    }

    /**
     * Dosya yükle
     */
    public function uploadFile(Request $request, $folderId)
    {
        $request->validate([
            'file' => 'required|file|max:10240', // 10MB
        ]);

        $folder = EmployeeFolder::findOrFail($folderId);

        // Dosya yükleme path
        $destinationPath = public_path('files/company_'.$folder->company_id.'/employee_'.$folder->employee_id.'/folder_'.$folder->id);

        if(!File::exists($destinationPath)){
            File::makeDirectory($destinationPath, 0755, true);
        }

        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $file->move($destinationPath, $fileName);

        // Veritabanına kaydet
        $employeeFile = EmployeeFile::create([
            'folder_id' => $folderId,
            'file_name' => $fileName,
            'file_path' => 'files/company_'.$folder->company_id.'/employee_'.$folder->employee_id.'/folder_'.$folder->id.'/'.$fileName,
        ]);

        return response()->json([
            'success' => true,
            'file' => $employeeFile
        ]);
    }

    /**
     * Klasör içindeki dosyaları listele
     */
    public function getFiles($folderId)
    {
        $folder = EmployeeFolder::with('files')
            ->where('company_id', auth()->user()->company_id)
            ->findOrFail($folderId);

        return response()->json([
            'files' => $folder->files,
            'folder' => $folder
        ]);
    }

    /**
     * Dosya indir
     */
    public function downloadFile(EmployeeFile $file)
    {
        $folder = $file->folder;

        if($folder->company_id != auth()->user()->company_id){
            abort(403, 'Bu dosyayı indirme yetkiniz yok.');
        }

        $filePath = public_path($file->file_path);

        if(!File::exists($filePath)){
            abort(404, 'Dosya bulunamadı.');
        }

        return response()->download($filePath, $file->file_name);
    }
}
