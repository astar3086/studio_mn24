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
class Boot extends System
{

    /**
     *
     */
    public function action_index()
    {

        Assets::js('datatable_jquery',base_UI.'js/plugins/datatables/jquery.dataTables.js');
        Assets::js('datatable',base_UI.'js/plugins/datatables/dataTables.bootstrap.js');
        Assets::js('icheck',base_UI.'js/plugins/iCheck/icheck.min.js');

        if($boot_id = \Utils\Protect::Validate($this->request->param('id'),'int'))
        {

            $this->template->assign(
                [
                    'code'   => $boot_id,
                ]
            );

        }

        $this->response->body( $this->template->fetch('admin/boot/Index.tpl') );
    }


}