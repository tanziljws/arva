<?php

/**
 * Database Import Script for Railway MySQL
 * 
 * Usage: php import-database.php
 */

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

$sqlFile = __DIR__ . '/../gallery_sekolah_new.sql';

if (!File::exists($sqlFile)) {
    echo "Error: SQL file not found at: {$sqlFile}\n";
    exit(1);
}

echo "Reading SQL file...\n";
$sql = File::get($sqlFile);

// Remove comments and database/use statements
$sql = preg_replace('/--.*$/m', '', $sql); // Remove single line comments
$sql = preg_replace('/\/\*.*?\*\//s', '', $sql); // Remove multi-line comments
$sql = preg_replace('/CREATE DATABASE.*?;/i', '', $sql);
$sql = preg_replace('/USE\s+[^;]+;/i', '', $sql);
$sql = preg_replace('/SET\s+SQL_MODE[^;]*;/i', '', $sql);
$sql = preg_replace('/START\s+TRANSACTION;/i', '', $sql);
$sql = preg_replace('/COMMIT;/i', '', $sql);
$sql = preg_replace('/\/\*!40101.*?\*\/\s*/s', '', $sql); // Remove MySQL version comments

// Split by semicolon and clean up
$statements = array_filter(
    array_map('trim', explode(';', $sql)),
    function($stmt) {
        $stmt = trim($stmt);
        return !empty($stmt) && 
               strlen($stmt) > 5 && // Minimum length
               !preg_match('/^SET\s+/i', $stmt) &&
               !preg_match('/^START/i', $stmt) &&
               !preg_match('/^COMMIT/i', $stmt);
    }
);

echo "Connecting to database...\n";
try {
    DB::connection()->getPdo();
    echo "Connected successfully!\n\n";
} catch (\Exception $e) {
    echo "Error connecting to database: " . $e->getMessage() . "\n";
    exit(1);
}

echo "Importing SQL statements...\n";
$count = 0;
$total = count($statements);
$errors = 0;

foreach ($statements as $statement) {
    if (empty(trim($statement))) continue;
    
    try {
        DB::unprepared($statement);
        $count++;
        if ($count % 10 == 0) {
            echo "Processed {$count}/{$total} statements...\n";
        }
    } catch (\Exception $e) {
        $errors++;
        $errorMsg = $e->getMessage();
        // Skip errors for statements that might already exist or are harmless
        if (strpos($errorMsg, 'already exists') !== false || 
            strpos($errorMsg, 'Duplicate') !== false ||
            strpos($errorMsg, 'Unknown table') !== false ||
            strpos($errorMsg, 'active transaction') !== false) {
            // Silent skip for known harmless errors
        } else {
            echo "Warning ({$errors}): " . substr($errorMsg, 0, 100) . "...\n";
        }
    }
}

echo "\n✅ Import completed!\n";
echo "   - Successfully executed: {$count} statements\n";
echo "   - Errors/Warnings: {$errors}\n";

