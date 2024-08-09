<?php

namespace Yuricronos\LaravelService\Features\Livewire;

use Illuminate\Support\Facades\Route;
// use Livewire\Features\SupportFileUploads\FilePreviewController;
// use Livewire\Features\SupportFileUploads\FileUploadController;
use Livewire\Livewire;
// use Livewire\Mechanisms\HandleRequests\HandleRequests;

class SupportLivewireManager
{
    public static function buildRouting(string $appRoot = "")
    {
        if (empty($appRoot)) {
            return;
        }

        $updatePath = sprintf("/%s%s", $appRoot, config('lrvlsrvce.livewire_update'));
        Livewire::setUpdateRoute(fn($handle) => Route::post($updatePath, $handle));

        // Route::post($updatePath, [HandleRequests::class, 'handleUpdate'])->name('livewire.update');
        // Route::post('/livewire/upload-file', [FileUploadController::class, 'handle'])->name('livewire.upload-file');
        // Route::get('/livewire/preview-file/{filename}', [FilePreviewController::class, 'handle'])->name('livewire.preview-file');
    }
}
