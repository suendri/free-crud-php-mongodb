<?php

function e(mixed $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function url(string $path = ''): string
{
    return rtrim(URL, '/') . '/' . ltrim($path, '/');
}

function asset(string $path = ''): string
{
    return rtrim(AST, '/') . '/' . ltrim($path, '/');
}

function is_active_menu(string $menu): bool
{
    $page = $_GET['page'] ?? '';
    $current = trim((string) $page, '/');
    $menu = trim($menu, '/');

    if ($current === '' && $menu === 'dashboard') {
        return false;
    }

    return $current === $menu || str_starts_with($current, $menu . '/');
}

function csrf_token(): string
{
    if (empty($_SESSION['_csrf_token'])) {
        $_SESSION['_csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['_csrf_token'];
}

function csrf_field(): string
{
    return '<input type="hidden" name="_csrf_token" value="' . e(csrf_token()) . '">';
}
