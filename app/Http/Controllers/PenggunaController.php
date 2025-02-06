<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="Users API Documentation",
 *     description="Documentation for Users API",
 *     @OA\Contact(
 *         name="Fadlan",
 *         email="fadlananshari06@gmail.com"
 *     )
 * )
 */

/**
 * @OA\Schema(
 *     schema="Pengguna",
 *     type="object",
 *     @OA\Property(property="id", type="string", description="ID pengguna"),
 *     @OA\Property(property="name", type="string", description="Nama pengguna"),
 *     @OA\Property(property="email", type="string", description="Email pengguna"),
 *     @OA\Property(property="age", type="integer", description="Umur pengguna")
 * )
 */
class PenggunaController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/pengguna",
     *     summary="Menampilkan semua pengguna",
     *     description="Mengambil semua data pengguna dari database.",
     *     tags={"Pengguna"},
     *     @OA\Response(
     *         response=200,
     *         description="Sukses mengambil data pengguna",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="string", example="Success"),
     *             @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/Pengguna"))
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Terjadi kesalahan saat mengambil data"
     *     )
     * )
     */
    public function index()
    {
        return response()->json([
            'status' => 'Success',
            'data' => Pengguna::all()
        ]);
    }

    /**
     * @OA\Get(
     *     path="/api/pengguna/{id}",
     *     summary="Menampilkan pengguna berdasarkan ID",
     *     description="Mengambil data pengguna berdasarkan ID.",
     *     tags={"Pengguna"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID pengguna",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Sukses mengambil data pengguna",
     *         @OA\JsonContent(ref="#/components/schemas/Pengguna")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Pengguna tidak ditemukan"
     *     )
     * )
     */
    public function show($id)
    {
        $pengguna = Pengguna::find($id);
        if (!$pengguna) {
            return response()->json(['error' => 'User not found'], 404);
        }
        return response()->json([
            'status' => 'Success', 
            'data' => $pengguna
        ]);
    }

    /**
     * @OA\Post(
     *     path="/api/pengguna",
     *     summary="Menyimpan pengguna baru",
     *     description="Menyimpan data pengguna baru ke dalam database.",
     *     tags={"Pengguna"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "email", "age"},
     *             @OA\Property(property="name", type="string", example="John Doe"),
     *             @OA\Property(property="email", type="string", format="email", example="john@example.com"),
     *             @OA\Property(property="age", type="integer", example=25)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Pengguna berhasil disimpan",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="string", example="Success"),
     *             @OA\Property(property="data", ref="#/components/schemas/Pengguna")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Validasi gagal"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:pengguna,email',
            'age' => 'required|integer',
        ]);

        $pengguna = Pengguna::create([
            'id' => Str::uuid(),
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
        ]);

        return response()->json([
            'status' => 'Success', 
            'data' => $pengguna
        ], 201);
    }

    /**
     * @OA\Put(
     *     path="/api/pengguna/{id}",
     *     summary="Memperbarui data pengguna",
     *     description="Memperbarui data pengguna berdasarkan ID.",
     *     tags={"Pengguna"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID pengguna",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "email", "age"},
     *             @OA\Property(property="name", type="string", example="Jane Doe"),
     *             @OA\Property(property="email", type="string", format="email", example="jane@example.com"),
     *             @OA\Property(property="age", type="integer", example=30)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Pengguna berhasil diperbarui",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="string", example="Success"),
     *             @OA\Property(property="data", ref="#/components/schemas/Pengguna")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Pengguna tidak ditemukan"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $pengguna = Pengguna::find($id);
        if (!$pengguna) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:pengguna,email,' . $pengguna->id,
            'age' => 'required|integer',
        ]);

        $pengguna->update($request->all());

        return response()->json([
            'status' => 'Success', 
            'data' => $pengguna
        ]);
    }

    /**
     * @OA\Delete(
     *     path="/api/pengguna/{id}",
     *     summary="Menghapus pengguna",
     *     description="Menghapus data pengguna berdasarkan ID.",
     *     tags={"Pengguna"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID pengguna",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Pengguna berhasil dihapus",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="string", example="Success"),
     *             @OA\Property(property="message", type="string", example="User deleted")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Pengguna tidak ditemukan"
     *     )
     * )
     */
    public function destroy($id)
    {
        $pengguna = Pengguna::find($id);
        if (!$pengguna) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $pengguna->delete();

        return response()->json([
            'status' => 'Success', 
            'message' => 'User deleted'
        ], 200);
    }
}
