<?php

namespace App\Core;

class Controller
{
	protected function isPost(): bool
	{
		if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
			return true;
		}

		http_response_code(405);
		header('Allow: POST');
		return false;
	}

	protected function validId($id): ?int
	{
		$validated = filter_var($id, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
		return $validated === false ? null : $validated;
	}

	protected function postString(string $key): string
	{
		return isset($_POST[$key]) && is_string($_POST[$key]) ? trim($_POST[$key]) : '';
	}

	protected function textLength(string $value): int
	{
		return function_exists('mb_strlen') ? mb_strlen($value, 'UTF-8') : strlen($value);
	}

	protected function flashRedirect(string $path, string $type, string $message, array $old = [], array $errors = []): void
	{
		if (session_status() !== PHP_SESSION_ACTIVE) {
			session_start();
		}

		$_SESSION['flash'] = [
			'type' => $type,
			'message' => $message,
			'old' => $old,
			'errors' => $errors,
		];
		header('Location: ' . URL . '/' . ltrim($path, '/'));
		exit;
	}

	protected function redirect(string $path): void
	{
		header('Location: ' . URL . '/' . ltrim($path, '/'));
		exit;
	}

	protected function notFound(): void
	{
		http_response_code(404);
		$this->guest('error/404');
	}

	// Layout home
	public function guest($view, $data = [])
	{
		require_once ROOT . "layouts/guest.php";
	}

	// layout dashboard
	public function dashboard($view, $data = [])
	{
		require_once ROOT . "layouts/dashboard.php";
	}
}
