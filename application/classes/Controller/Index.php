<?php

namespace Controller;

use \Smarty\View;
use \Model\Item;
use \Model\User;
use \Model\ItemCores;
use \Model\ULogin;
use Model\GalleryImages;



class Index extends \Builder
{
	/**
	 * @var \smarty\View
	 */
	public $template;
    public $navigation = 30;
    private $formula_id = 5;

	public function action_index()
	{

        \Assets::css('page2', base_UI.'css/rangeslider.css');
        \Assets::js('page1', base_UI.'js/plugins/range/rangeslider.min.js');
        \Assets::js('page2', base_UI.'js/plugins/range/range_script.js');

        \Assets::js('attr',base_UI.'js/pages/attr.js');
        \Assets::js('jumper',base_UI.'js/index/recovery_pass_jumper.js');

        $user_id    = \Registry::getCurrentUser()->iduser;
        $data_formula   = $this->dataFormula();

        $this->template->assign([
            'data_formula'   => $data_formula,
        ]);

        $this->response->body($this->template->fetch('main.tpl'));

	}

    public function dataFormula( $limit = false )
    {

        $data_= \Model\PaymentFormula::model()
            ->findByPk( $this->formula_id );

        return $data_;
    }

    /**
     * gets info from social network. If profile already linked to user authenticates, otherwise create new user instance
     * @throws \Kohana_Database_Exception
     */
    public function action_uloginAuth()
    {
        $s = file_get_contents('http://ulogin.ru/token.php?token='.$_POST['token'].'&host='.$_SERVER['HTTP_HOST']);
        $user = json_decode($s, true);

        if(strlen($user['error'])> 0)
        {
            $this->response->body($this->template->fetch('internal.tpl'));
            return;
        }

        $condition = (new \DBCriteria())
            ->addColumnCondition(
                [
                    'uid'    => $user['uid'],
                    'network' => $user['network']
                ]);


        /** @var $ULogin \Model\ULogin */
        $ULogin = \Model\ULogin::model()->with('user')->find($condition);

        if(null === $ULogin)
        {
            \Session::instance()->set('UloginData',$user);

            $user['bdate'] = date('Y-m-d', strtotime($user['bdate']));

            $user_model = new User();
            $user_model->login = $user['login'];
            $user_model->first_name  = $user['first_name'];
            $user_model->email    = $user['email'];

            $access_level = new \Auth\Access();
            $access_level->set(\Auth\Access::User_Login);
            $user_model->access_level =  $access_level->getValue();

            if(!$user_model->save())
            {
                throw new \Kohana_Database_Exception('Unable to save user model');
            }

            $ULogin          = new ULogin();
            $ULogin->network = $user['network'];
            $ULogin->uid     = $user['uid'];
            $ULogin->profile     = $user['identity'];
            $ULogin->user_id = $user_model->id;

            if(!$ULogin->save())
            {
                $this->response->body('Unable to save social network data');
            }

            \Auth\Base::startSession($ULogin['user']);
            $this->redirect(\Route::get('pages')->uri(['controller'=>'Map','action'=>'Add']));
        }
        else
        {
            \Auth\Base::startSession($ULogin['user']);
            $this->redirect(\Route::get('pages')->uri(['controller'=>'Map','action'=>'Add']));
        }
    }

}