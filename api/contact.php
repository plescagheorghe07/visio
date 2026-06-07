<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/bootstrap.php';

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    json_response(['success' => false, 'message' => 'Method not allowed'], 405);
}

if (!csrf_verify($_POST['csrf_token'] ?? null)) {
    json_response(['success' => false, 'message' => __('contact_error')], 403);
}

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');

if ($name === '' || $email === '' || $message === '') {
    json_response(['success' => false, 'message' => __('contact_error')], 422);
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    json_response(['success' => false, 'message' => __('contact_error')], 422);
}

try {
    contacts_repo()->create([
        'name'       => $name,
        'email'      => $email,
        'phone'      => $phone ?: null,
        'subject'    => $subject ?: null,
        'message'    => $message,
        'ip_address' => $_SERVER['REMOTE_ADDR'] ?? null,
        'user_agent' => substr($_SERVER['HTTP_USER_AGENT'] ?? '', 0, 500),
    ]);
    json_response(['success' => true, 'message' => __('contact_success')]);
} catch (Throwable) {
    json_response(['success' => false, 'message' => __('contact_error')], 500);
}
