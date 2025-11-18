<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CommentController extends Controller
{
    public function store(Request $request, Gallery $gallery): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'comment' => 'required|string|max:1000',
        ], [
            'name.required' => 'Nama wajib diisi',
            'name.max' => 'Nama maksimal 255 karakter',
            'email.email' => 'Format email tidak valid',
            'comment.required' => 'Komentar wajib diisi',
            'comment.max' => 'Komentar maksimal 1000 karakter',
        ]);

        try {
            $comment = Comment::create([
                'gallery_id' => $gallery->id,
                'name' => $request->name,
                'email' => $request->email,
                'comment' => $request->comment,
                'is_approved' => false, // Comments need approval
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Komentar berhasil dikirim! Menunggu persetujuan admin.',
                'comment' => $comment
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menyimpan komentar: ' . $e->getMessage()
            ], 500);
        }
    }

    public function index(Gallery $gallery): JsonResponse
    {
        $comments = $gallery->approvedComments()
            ->select('id', 'name', 'comment', 'created_at')
            ->orderBy('created_at', 'desc')
            ->limit(50) // Limit to 50 comments for better performance
            ->get();

        return response()->json([
            'success' => true,
            'comments' => $comments
        ]);
    }
}
