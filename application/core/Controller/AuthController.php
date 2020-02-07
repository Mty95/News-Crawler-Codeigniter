<?php
namespace Core\Controller;

use App\Model\User\Repository;
use App\Model\User\User;
use Mty95\AdminDashboard\ThemeController;
use NewFramework\Exceptions\EntityException;

class AuthController extends ThemeController
{
	/** @var User */
	protected $user = null;

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('user_id'))
		{
			$repository = Repository::take();
			try {
				$this->user = $repository->findOrFail($this->session->userdata('user_id'));

				/* ¡This is great man, user property is accessible for all views XD!  */
//				get_instance()->user =& $this->user;

			} catch (EntityException $e) {
				$this->destroyUserSession();
				$this->redirect('login');
			}
		}
	}

	protected function destroyUserSession(): void
	{
		$this->session->userdata = [];
		$this->session->unset_userdata('user_id');
	}

	protected function setUserSession(User $user): void
	{
		$this->session->set_userdata('user_id', $user->id);
	}

	/**
	 * @override
	 *
	 * @param string $page
	 * @param array $data
	 * @return object|string
	 */
	protected function render(string $page, array $data = [])
	{
		$data['user'] = $this->user;
		$data['pageTitle'] = 'TodoNoticias';
		$data['sources'] = \App\Model\Source\Repository::take()->findAll();

		return parent::render($page, $data);
	}
}
