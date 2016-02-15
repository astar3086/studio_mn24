<?php
namespace Controller\Admin;

use Auth\Base;
use Assets;
use Builder\System;
use Model\ULogin;
use Model\User;
use Utils\Url;

use Utils\Math;
use Utils\Protect;

/**
 * @package Controller
 */
class Payments extends System
{

    /**
     *
     */
    public function action_index()
    {

        Assets::js('datatable_jquery',base_UI.'js/plugins/datatables/jquery.dataTables.js');
        Assets::js('datatable',base_UI.'js/plugins/datatables/dataTables.bootstrap.js');

        Assets::js('icheck',base_UI.'js/plugins/iCheck/icheck.min.js');

        $this->response->body( $this->template->fetch('admin/payments/Index.tpl') );
    }

    public function action_Add()
    {
            $this->addCKEditor();
            $this->addBootstrapModal();
            $this->addSelect2();

        $userCredit = \Model\UserCredit::model()->findAll();
        $users = \Model\User::model()->findAll();

        $this->template->assign(
                [
                    'userCredit'   => $userCredit,
                    'users'        => $users,
                ]
            );

            //Alerts BootBox
            \Assets::js('BootBox', base_UI.'libs/BootBox/bootbox.js');
            $this->response->body($this->template->fetch('admin/payments/add.tpl'));
    }

    public function action_Edit()
    {
        if($item_id = \Utils\Protect::Validate($this->request->param('id'),'int'))
        {

            \Assets::js('sight', base_UI.'js/admin/Payments/Edit.js');
            $this->addCKEditor();
            $this->addBootstrapModal();
            $this->addSelect2();

            //Alerts BootBox
            \Assets::js('BootBox', base_UI.'libs/BootBox/bootbox.js');

            //Item Data
            $data  = \Model\UserPayment::model()
                ->with('iduser0', 'iduserCredit')->findByPk($item_id);

            $userCredit = \Model\UserCredit::model()->findAll();
            $users = \Model\User::model()->findAll();

            $this->template->assign(
                [
                    'data'   => $data,
                    'userCredit'   => $userCredit,
                    'users'        => $users,
                ]
            );

            $this->response->body($this->template->fetch('admin/payments/edit.tpl'));
        }
    }

    /**
     *
     */
    public function action_AddData()
    {
        $this->response->headers('Content-Type', 'application/json');
        $user_id    = \Registry::getCurrentUser()->iduser;

        $item = new \Model\UserPayment();
        $zone_info = $_POST;

        if ( $zone_info ){
            $item->price    = $zone_info['price'];
            $item->date_pay = $zone_info['date_pay'];
            $item->iduser   = $zone_info['iduser'];
            $item->iduser_credit = $zone_info['iduser_credit'];

            if(!$item->save())
            {
                $this->response->body(json_encode(['code' => -1]));
                return;
            }

            $this->response->body(json_encode(['code' => 0]));
        }

    }

    /**
     *
     */
    public function action_EditData()
    {

        if(false !== ($item_id = Protect::Validate( $this->request->param('id'),'int' )))
        {
            $this->response->headers('Content-Type', 'application/json');
            $user_id    = \Registry::getCurrentUser()->iduser;

            $item = \Model\UserPayment::model()->findByPk( $item_id );
            $zone_info = $_POST;

            if ( $zone_info ){
                $item->price        = $zone_info['price'];

                if(!$item->save())
                {
                    $this->response->body(json_encode(['code'=>-1]));
                    return;
                }
            }

            $this->response->body(json_encode(['code'=>0]));
        }

    }

    public function action_delete()
    {

        if(false !== ($id = Protect::Validate( $_POST['id'],'int' )))
        {
            $status = false;
            $User= \Model\UserPayment::model()->findByPk( $id );

            if (  \Model\UserPayment::model()->deleteAllByAttributes( ['idpages' => $id] ) ){
                $status = 0;
            }

            $this->response->body(json_encode(['code'=>$status]));
            return true;
        }
    }

    public function action_GetJson()
    {
        $data  = \Model\UserPayment::model()
            ->with('iduser0', 'iduserCredit')->findAll();

        $access = new \Auth\Access(\Registry::getCurrentUser()->access_level);
        if($access->get(\Auth\Access::User_Is_Admin))
        {
            $aoColumnsData = [];

            if ( !$data ){
                $this->response->body(json_encode(['aaData' => $aoColumnsData]) );
                return;
            }

            /** @var $item User */
            foreach($data as $key=>$item)
            {

                $tmp = [
                    'id'     => $item->iduser_payment,
                    'price'  => $item->price,
                    'date'   => date("Y-m-d H:i", $item->date_pay),
                    'remaining'  => $item->iduserCredit->price_remaining,
                    'user'   => $item->iduser0->first_name .
                        " ". $item->iduser0->last_name
                ];
                $aoColumnsData[] = $tmp;
            }

            $this->response->body(json_encode(['aaData' => $aoColumnsData]));
        }
        else
        {
            throw new \HTTP_Exception_403('Admin Only');
        }
    }


}