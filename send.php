<?php
// Встановіть ваші секретні дані тут:
$token = "8131730990:AAGY4dhYYbERxFUXerJb2ihBAtwkKhCS_tc";
$chat_id = "864261928";

$data = json_decode(file_get_contents('php://input'), true);

$message = "🚗 НОВИЙ ЗАПИТ НА ОРЕНДУ АВТО\n\n" .
           "👤 Ім'я: " . $data['name'] . "\n" .
           "📱 Телефон: " . $data['phone'] . "\n" .
           "📅 Дата: " . $data['date'] . "\n" .
           "🚙 Авто: " . $data['car'] . "\n" .
           "💬 Побажання: " . ($data['message'] ?: 'Не вказано') . "\n\n" .
           "⏰ Час запиту: " . date('d.m.Y H:i:s');

$url = "https://api.telegram.org/bot$token/sendMessage";

$options = [
    'chat_id' => $chat_id,
    'text' => $message,
    'parse_mode' => 'HTML'
];

file_get_contents($url . '?' . http_build_query($options));

http_response_code(200);
echo json_encode(['status' => 'ok']);
?>
