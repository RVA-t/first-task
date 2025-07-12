<?php

$lockKey = 'script_lock_key';
$lockTTL = 5;

$redis = new Redis();
try {
    $redis->connect('redis', 6379);
} catch (Exception $e) {
    echo "Не удалось подключиться к Redis: ", $e->getMessage(), "\n";
    exit(1);
}

$lock = $redis->set($lockKey, 1, ['nx', 'ex' => $lockTTL]);

if (!$lock) {
    echo "Скрипт уже выполняется. Повторный запуск запрещён.\n";
    exit;
}

echo "Скрипт начал работу...\n";
sleep(5);
echo "Скрипт завершён.\n";
