<?php

namespace App\OpenApi;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="User API Documentation",
 *     description="Documentation for User API",
 *     @OA\Contact(
 *         name="Muhamad Fadlan Anshari",
 *         email="fadlananshari06@gmail.com"
 *     )
 * )
 * @OA\Server(
 *     url="http://127.0.0.1:8000/api",
 *     description="Local API Server"
 * )
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer"
 * )
 */
class Documentation
{
}