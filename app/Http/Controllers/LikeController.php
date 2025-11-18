<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    public function toggle(Request $request, Gallery $gallery): JsonResponse
    {
        $ipAddress = $request->ip();
        $userAgent = $request->userAgent();

        try {
            // Use database transaction for consistency
            return DB::transaction(function () use ($gallery, $ipAddress, $userAgent) {
                // Check if user already liked this gallery
                $existingLike = Like::where('gallery_id', $gallery->id)
                    ->where('ip_address', $ipAddress)
                    ->first();

                if ($existingLike) {
                    // Unlike
                    $existingLike->delete();
                    $liked = false;
                    $message = 'Like dihapus';
                } else {
                    // Like
                    Like::create([
                        'gallery_id' => $gallery->id,
                        'ip_address' => $ipAddress,
                        'user_agent' => $userAgent,
                    ]);
                    $liked = true;
                    $message = 'Berhasil di-like!';
                }

                // Get fresh count
                $likesCount = Like::where('gallery_id', $gallery->id)->count();

                return response()->json([
                    'success' => true,
                    'message' => $message,
                    'liked' => $liked,
                    'likes_count' => $likesCount
                ]);
            });
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function status(Request $request, Gallery $gallery): JsonResponse
    {
        $ipAddress = $request->ip();
        
        $liked = Like::where('gallery_id', $gallery->id)
            ->where('ip_address', $ipAddress)
            ->exists();

        $likesCount = $gallery->likes()->count();

        return response()->json([
            'success' => true,
            'liked' => $liked,
            'likes_count' => $likesCount
        ]);
    }
}
