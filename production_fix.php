<?php
/**
 * Script untuk memperbaiki production server
 * 
 * CARA PAKAI:
 * 1. Upload file ini ke root folder project di production (alwaysdata.net)
 * 2. Akses via browser: https://erika-sie.alwaysdata.net/production_fix.php
 *    ATAU
 *    Jalankan via SSH: php production_fix.php
 * 3. Setelah selesai, HAPUS file ini untuk keamanan!
 */

// Cek apakah dijalankan via CLI atau browser
$isCli = php_sapi_name() === 'cli';

if (!$isCli) {
    // Jika via browser, cek apakah sudah login atau tambahkan password sederhana
    // UNCOMMENT baris di bawah jika ingin proteksi password
    // $password = $_GET['pass'] ?? '';
    // if ($password !== 'your-secret-password') {
    //     die('Unauthorized');
    // }
    
    echo "<!DOCTYPE html><html><head><title>Production Fix</title>";
    echo "<style>body{font-family:monospace;padding:20px;background:#1e1e1e;color:#d4d4d4;}";
    echo ".success{color:#4ec9b0;}.error{color:#f48771;}.info{color:#569cd6;}</style></head><body>";
    echo "<h1>🔧 Production Server Fix</h1>";
}

function output($message, $type = 'info') {
    global $isCli;
    if ($isCli) {
        echo $message . "\n";
    } else {
        $class = $type === 'success' ? 'success' : ($type === 'error' ? 'error' : 'info');
        echo "<div class='$class'>$message</div>";
    }
}

output("=== Memulai Perbaikan Production Server ===\n", 'info');

// 1. Cek apakah file model sudah benar
output("\n1. Memeriksa file app/Models/kategoriAset.php...", 'info');
$modelPath = __DIR__ . '/app/Models/kategoriAset.php';

if (!file_exists($modelPath)) {
    output("❌ File tidak ditemukan: $modelPath", 'error');
    exit(1);
}

$modelContent = file_get_contents($modelPath);
if (strpos($modelContent, "protected \$table = 'kategori_aset';") === false) {
    output("⚠️ Model belum menggunakan kategori_aset, memperbaiki...", 'error');
    
    // Perbaiki model
    $modelContent = preg_replace(
        "/protected \$table = 'kategoriAset';/",
        "protected \$table = 'kategori_aset';",
        $modelContent
    );
    
    if (strpos($modelContent, "protected \$table = 'kategori_aset';") !== false) {
        file_put_contents($modelPath, $modelContent);
        output("✓ Model berhasil diperbaiki", 'success');
    } else {
        output("❌ Gagal memperbaiki model. Silakan edit manual.", 'error');
    }
} else {
    output("✓ Model sudah benar menggunakan kategori_aset", 'success');
}

// 2. Clear cache menggunakan artisan
output("\n2. Membersihkan cache Laravel...", 'info');

$commands = [
    'config:clear',
    'cache:clear',
    'route:clear',
    'view:clear',
    'optimize:clear'
];

foreach ($commands as $cmd) {
    $command = "php artisan $cmd 2>&1";
    $output = [];
    $returnVar = 0;
    
    exec($command, $output, $returnVar);
    
    if ($returnVar === 0) {
        output("  ✓ php artisan $cmd", 'success');
    } else {
        output("  ⚠️ php artisan $cmd (mungkin sudah clear)", 'info');
    }
}

// 3. Verifikasi
output("\n3. Verifikasi...", 'info');
$modelContent = file_get_contents($modelPath);
if (strpos($modelContent, "protected \$table = 'kategori_aset';") !== false) {
    output("✓ Model sudah benar: protected \$table = 'kategori_aset';", 'success');
} else {
    output("❌ Model masih salah! Silakan edit manual.", 'error');
}

output("\n=== Selesai ===", 'info');
output("\n⚠️ PENTING: Hapus file production_fix.php setelah selesai untuk keamanan!", 'error');

if (!$isCli) {
    echo "</body></html>";
}

