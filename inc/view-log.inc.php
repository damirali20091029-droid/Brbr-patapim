<?php
$logFile = 'log/' . PATH_LOG;

if (file_exists($logFile)) {
    $lines = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    if (!empty($lines)) {
        echo '<ol>';
        foreach ($lines as $line) {
            $parts = explode('|', $line);
            $dt = isset($parts[0]) ? date('d-m-Y H:i:s', (int)$parts[0]) : '';
            $page = $parts[1] ?? '';
            $ref = $parts[2] ?? '';

            echo "<li>$dt - $page -&gt; $ref</li>";
        }
        echo '</ol>';
    } else {
        echo '<p>Журнал пуст.</p>';
    }
} else {
    echo '<p>Файл журнала не существует.</p>';
}