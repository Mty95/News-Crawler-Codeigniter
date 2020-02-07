<?php
use Mty95\AdminDashboard\ThemeController;

/**
 * @deprecated
 * Class Authentication
 */
class Authentication extends ThemeController
{
	protected $module = 'auth';
	protected $resourceUrl = 'auth';

	public function index(): void
	{
		$this->render('login');
	}

	public function register(): void
	{

	}

	public function logout(): void
	{

	}
}
