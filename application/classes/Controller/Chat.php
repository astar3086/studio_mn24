<?php

namespace Controller;

use \Smarty\View;
use \Model\Item;
use \Model\User;
use \Model\ItemCores;
use \Model\ULogin;
use Model\GalleryImages;

use \Pagination;
use \Request;



class Chat extends \Builder
{
	/**
	 * @var \smarty\View
	 */
	public $template;
    public $user_contacts = 5;
    public $user_messages = 120;

    public function action_index()
    {

        $user_id        = \Registry::getCurrentUser()->id;
        $short_history  = $this->shortHistory( $this->user_contacts );

        $this->template->assign([
            'short_history'   => $short_history,
        ]);

        $this->response->body($this->template->fetch('chat/index.tpl'));

    }

	public function action_message()
	{

        \Assets::js('page', base_UI.'js/pages/chat.js');
        $user_id      = \Registry::getCurrentUser()->id;
        $receiver_id  = $this->request->param('id');

        $receiver = \Model\User::model()->findByPk( $receiver_id );

        $criteria    = (new \DBCriteria());
        $criteria->condition = ' ( session = "'.$receiver_id."#".$user_id.'" ) OR
        ( session = "'.$user_id."#".$receiver_id.'" ) ';

        $session  = \Model\Chat::model()->find( $criteria );

        $short_history  = $this->userCustomHistory( $user_id, $receiver_id,
            $session->session, $this->user_messages );

        $this->template->assign([
            'short_history' => $short_history,
            'session'       => $session->session,
            'receiver'      => $receiver

        ]);

        $this->response->body($this->template->fetch('chat/message.tpl'));

	}

    public function action_addMessage()
    {

        if(Request::current()->is_ajax())
        {
            $sender_id  = \Registry::getCurrentUser()->id;
            $user       = \Model\User::model()->findByPk($sender_id);

            $receiver_id  = $this->request->post('receiver_id');
            $message      = $this->request->post('message');

            $session  = \Model\Chat::model()->findByAttributes(
                ['session' => $receiver_id."#".$sender_id]
            );

            if ( $session ){
                $sess_send = $receiver_id."#".$sender_id;
            } else {
                $sess_send = $sender_id."#".$receiver_id;
            }

            $user_send_message  = new \Model\Chat;
            $user_send_message->sender_id   = $sender_id;
            $user_send_message->receiver_id = $receiver_id;
            $user_send_message->message     = $message;
            $user_send_message->session     = $sess_send;
            $user_send_message->save();

            $tplObj = \smarty\View::factory('chat'.DS.'message_ajax');

            $tplObj->assign([
                'item'     => $user_send_message,
                'session'  => $sess_send,
                'user'     => $user
            ]);

            $this->response->body( $tplObj );

            return true;

        }

    }

    // -----------Find New Messages
    public function action_newHistory()
    {

        if(Request::current()->is_ajax())
        {
            $sender_id    = \Registry::getCurrentUser()->id;
            $receiver_id  = $this->request->post('receiver_id');
            $session      = $this->request->post('session');

            $condition = ' cht.read = 0
                AND cht.receiver_id = "'.$sender_id.'" ';

            $user_full_history  = $this->userCustomHistory( $sender_id, $receiver_id,
                $session, 10, $condition );

            $tplObj = \smarty\View::factory('chat'.DS.'history_ajax');

            $tplObj->assign([
                'full_history'  => $user_full_history,
                'sender_id'     => $sender_id
            ]);

            $this->response->body($tplObj);

            return true;

        }

    }

    public function action_fullHistory()
    {

        if(Request::current()->is_ajax())
        {
            $sender_id      = \Registry::getCurrentUser()->id;
            $receiver_id  = $this->request->post('receiver_id');
            $session  = $this->request->post('session');

            $user_full_history  = $this->userCustomHistory( $sender_id, $receiver_id, $session );
            $tplObj = \smarty\View::factory('chat'.DS.'history_ajax');

            $tplObj->assign([
                'full_history'  => $user_full_history,
                'sender_id'     => $sender_id
            ]);

            $this->response->body($tplObj);

            return true;

        }

    }

    // -----------All Users Chats
    public function shortHistory( $limit )
    {

        $user_id      = \Registry::getCurrentUser()->id;

        $criteria    = (new \DBCriteria());
        $criteria->select = ' cht.sendtime, cht.message, usr1.fio as sender_fio, usr2.fio as receiver_fio,
          usr1.id as sender_id, usr2.id as receiver_id, usr1.photo as sender_photo, usr2.photo as receiver_photo ';

        $criteria->condition = ' cht.sender_id = "'.$user_id.'"
        OR  cht.receiver_id = "'.$user_id.'" ';

        $criteria->group = ' cht.session';

        $criteria->mergeWith(array(
            'join'=>'INNER JOIN user AS usr1 ON usr1.id = cht.sender_id
                     INNER JOIN user AS usr2 ON usr2.id = cht.receiver_id',
        ));

        $criteria->limit = $limit;
        $data = \Model\Chat::model()->findAll( $criteria );
        return $data;

    }

    // -----------Chat Session
    public function userCustomHistory( $sender_id, $receiver_id, $session,
                                       $limit = false, $condition = false )
    {

        $criteria    = (new \DBCriteria());
        $criteria->select = ' cht.sendtime, cht.message, usr1.fio as sender_fio, usr2.fio as receiver_fio,
          usr1.id as sender_id, usr2.id as receiver_id, usr1.photo as sender_photo, usr2.photo as receiver_photo ';

        $criteria->mergeWith(array(
            'join'=>'INNER JOIN user AS usr1 ON usr1.id = cht.sender_id
                     INNER JOIN user AS usr2 ON usr2.id = cht.receiver_id',
        ));

        if ( $limit ) $criteria->limit = $limit;
        if ( !$limit ) {

            $criteria->limit = 200;
            $criteria->offset = $this->user_messages;

        }

        $criteria->order = ' cht.sendtime DESC ';

        if ( $condition ) {

            $criteria->condition = $condition;

        } else {

            $criteria->condition = ' ( cht.session = "'.$session.'" ) ';

        }

        $criteria->params    = [
            ':sender_id'   => $sender_id,
            ':receiver_id' => $receiver_id
        ];

        $data = \Model\Chat::model()->findAll( $criteria );

        // --------------Update Readed---------------//
        $criteria2    = (new \DBCriteria());
        $criteria2->condition = ' receiver_id = :receiver_id ';

        $criteria2->params    = [
            ':receiver_id' => $sender_id
        ];

        \Model\Chat::model()->updateAll(
            [ 'read' => 1 ], $criteria2 );

        return $data;

    }


}