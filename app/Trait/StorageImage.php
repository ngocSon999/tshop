<?php

namespace App\Trait;

use Illuminate\Support\Facades\Storage;

trait StorageImage
{
    /**
     * @throws \Exception
     */
    public function storageImages($files, $folder): array
    {
        if (empty($files)) {
            return [];
        }

        if (!is_array($files)) {
            $files = [$files];
        }

        $data = [];
        $folderName = 'images/' . $folder;
        if (!Storage::disk('public')->exists($folderName)) {
            Storage::disk('public')->makeDirectory($folderName);
        }
        foreach ($files as $file) {
            $fileName = $folder . '_' . time() . '.' . $file->getClientOriginalExtension();

            $path = $file->storeAs($folderName, $fileName, 'public');
            $data[] = Storage::url($path);
        }

        return $data;
    }

    public function storageImage($file, $folder): string
    {
        $folderName = 'images/' . $folder;
        if (!Storage::disk('public')->exists($folderName)) {
            Storage::disk('public')->makeDirectory($folderName);
        }
        $fileName = $folder . '_' . time() . '.' . $file->getClientOriginalExtension();

        $path = $file->storeAs($folderName, $fileName, 'public');

        return Storage::url($path);
    }

    public function deleteImage($path): void
    {
        $relativePath = str_replace('/storage/', '', $path);
        if (Storage::disk('public')->exists($relativePath)) {
            Storage::disk('public')->delete($relativePath);
        }
    }
}
