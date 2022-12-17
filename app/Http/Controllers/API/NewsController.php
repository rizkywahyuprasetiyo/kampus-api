<?php

namespace App\Http\Controllers\API;

use App\Models\News;
use Illuminate\Support\Str;
use App\Helpers\ResponseFormatter;
use App\Http\Requests\NewsRequest;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index(News $news)
    {
        $dataPengumuman = $news->get();

        return ResponseFormatter::success($dataPengumuman, 'Data pengumuman berhasil diambil.');
    }

    public function simpan(News $news, NewsRequest $newsRequest)
    {
        $data = $newsRequest->validated();
        $data['judul'] = Str::title($data['judul']);

        // config upload document proposal
        $namaFile = Str::slug($data['judul'], '-');
        $fileRequest = $newsRequest->gambar;
        $path = $fileRequest->storeAs('news/gambar', $namaFile . '.' . $fileRequest->extension());
        $data['gambar'] = $path;

        $dataPengumuman = $news->create($data);

        return ResponseFormatter::success($dataPengumuman, 'Data pengumuman berhasil ditambahkan.');
    }
}
